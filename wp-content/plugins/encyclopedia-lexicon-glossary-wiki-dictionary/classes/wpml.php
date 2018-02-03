<?php Namespace WordPress\Plugin\Encyclopedia;

use WP_Query;

abstract class WPML {

  static function init(){
    add_Filter('gettext_with_context', Array(static::class, 'filterGettextWithContext'), 1, 4);
    add_Filter('register_post_type_args', Array(static::class, 'filterPostTypeURLs'), 10, 2);
    add_Filter('encyclopedia_available_prefix_filters', Array(static::class, 'filterAvailablePrefixFilters'));
    add_Action('encyclopedia_tag_related_items_query_object', Array(static::class, 'filterTagRelatedItems'), 10, 2);
    add_Action('admin_init', Array(static::class, 'registerTranslatableStrings'));
  }

  static function isWPMLActive(){
    return defined('ICL_SITEPRESS_VERSION');
  }

  static function filterGettextWithContext($translation, $text, $context, $domain){
    # If you are using WPML the post type slug MUST NOT be translated! You can translate your slug in WPML directly
    if (static::isWPMLActive() && $context == 'URL slug' && $domain == I18n::getTextDomain())
      return $text;
    else
      return $translation;
  }

  static function isSlugTranslationEnabled(){
    global $sitepress_settings;
    return static::isWPMLActive() && !empty($sitepress_settings['posts_slug_translation']['types'][Post_Type::post_type_name]) && !empty($sitepress_settings['posts_slug_translation']['on']);
  }

  static function filterPostTypeURLs($args, $post_type){
    if ($post_type == Post_Type::post_type_name){
      if (static::isSlugTranslationEnabled()){
        $args['rewrite']['slug'] = Post_Type_Labels::getArchiveSlug();
        $args['has_archive'] = True;
      }
    }

    return $args;
  }

  static function filterAvailablePrefixFilters($arr_filter){
    if (static::isWPMLActive() && is_Array($arr_filter)){
      foreach ($arr_filter as $index => $filter){
        # Check if there are posts behind this filter in this language
        $query = new WP_Query(Array(
          'post_type' => Post_Type::post_type_name,
          'post_title_like' => $filter->prefix . '%',
          'posts_per_page' => 1,
          'cache_results' => False,
          'no_count_rows' => True
        ));
        if (!$query->have_Posts()) unset($arr_filter[$index]);
      }
      $arr_filter = Array_Values($arr_filter);
    }

    return $arr_filter;
  }

  static function filterTagRelatedItems($query, $arguments){
    if (static::isWPMLActive()){
      $original_post_id = $arguments->post_id;
      $arr_related_items_ids = Array();

      foreach ($query->posts as $related_item)
        $arr_related_items_ids[] = $related_item->ID;

      $query->query(Array(
        'post_type' => Post_Type::post_type_name,
        'post__in' => $arr_related_items_ids,
        'orderby' => 'post__in',
        'nopaging' => True,
        'ignore_sticky_posts' => False
      ));

      foreach ($query->posts as $index => $related_item){
        if ($related_item->ID == $original_post_id){
          unset($query->posts[$index]);
          $query->post_count = count($query->posts);
          $query->rewind_Posts();
          break;
        }
      }
    }
  }

  static function registerTranslatableStrings(){
    $plugin = UCWords(Str_Replace(Array('-', '_'), ' ', I18n::getTextDomain()));

    $post_type_labels = Array(
      'Encyclopedia type' => Options::get('encyclopedia_type'),
      #'Archive URL slug' => Options::get('archive_url_slug'), # Do not translate this. It would break the permalinks!
      #'Item slug' => Options::get('item_url_slug'), # WPML has its own slug-translation support in the String Translation module
      'Item singular name' => Options::get('item_singular_name'),
      'Item plural name' => Options::get('item_plural_name'),
    );

    foreach ($post_type_labels as $string_id => $label){
      do_action('wpml_register_single_string', $plugin, $string_id, $label);
    }
  }

  static function translateRegisteredString($text, $string_id){
    $plugin = UCWords(Str_Replace(Array('-', '_'), ' ', I18n::getTextDomain()));
    return apply_Filters('wpml_translate_single_string', $text, $plugin, $string_id);
  }

  static function t($text, $string_id){
    return static::translateRegisteredString($text, $string_id);
  }

}

WPML::init();
