<?php Namespace WordPress\Plugin\Encyclopedia;

abstract class Post_Type {
  const
    post_type_name = 'encyclopedia'; # Name of the post type

  static function init(){
    add_Filter('post_updated_messages', Array(static::class, 'filterUpdatedMessages'));
    add_Action('init', Array(static::class, 'registerPostType'));
    add_filter('post_type_link', Array(static::class, 'filterPostTypeLink'), 1, 2);
  }

  static function registerPostType(){
    $labels = Array(
      'name' => Post_Type_Labels::getEncyclopediaType(),
      'singular_name' => Post_Type_Labels::getItemSingularName(),
      'add_new' => sprintf(I18n::t('Add %s'), Post_Type_Labels::getItemSingularName()),
      'add_new_item' => sprintf(I18n::t('New %s'), Post_Type_Labels::getItemSingularName()),
      'edit_item' => sprintf(I18n::t('Edit %s'), Post_Type_Labels::getItemSingularName()),
      'view_item' => sprintf(I18n::t('View %s'), Post_Type_Labels::getItemSingularName()),
      'search_items' => sprintf(I18n::t('Search %s'), Post_Type_Labels::getItemPluralName()),
      'not_found' =>  sprintf(I18n::t('No %s found'), Post_Type_Labels::getItemPluralName()),
      'not_found_in_trash' => sprintf(I18n::t('No %s found in Trash'), Post_Type_Labels::getItemPluralName()),
      'parent_item_colon' => '',
      'all_items' => sprintf(I18n::t('All %s'), Post_Type_Labels::getItemPluralName()),
      'archives' => sprintf(I18n::t('%s Index Page'), Post_Type_Labels::getEncyclopediaType())
    );

    $post_type_args = Array(
      'labels' => $labels,
      'public' => True,
      'show_ui' => True,
      'menu_icon' => 'dashicons-welcome-learn-more',
      'has_archive' => Post_Type_Labels::getArchiveSlug(),
      'map_meta_cap' => True,
      'hierarchical' => False,
      'rewrite' => Array(
        'slug' => Post_Type_Labels::getItemSlug(),
        'with_front' => False
      ),
      'supports' => Array('title', 'author'),
      'menu_position' => 20, # below Pages
    );

    register_Post_Type(static::post_type_name, $post_type_args);

    # Add optionally post type support
    if (Options::get('enable_editor'))
      add_Post_Type_Support(static::post_type_name, 'editor');

    if (Options::get('enable_excerpt'))
      add_Post_Type_Support(static::post_type_name, 'excerpt');

    if (Options::get('enable_custom_fields'))
      add_Post_Type_Support(static::post_type_name, 'custom-fields');
  }

  static function addMetaBoxes(){
		# There will be added no other meta boxes yet
	}

  static function getAssociatedTaxonomies(){
    $arr_all_taxonomies = get_Taxonomies(Null, 'objects');
    if (empty($arr_all_taxonomies)) return False;

    $arr_associated_taxonomies = Array();

    foreach ($arr_all_taxonomies as $taxonomy){
      if (in_Array(Post_Type::post_type_name, $taxonomy->object_type)){
        $arr_associated_taxonomies[] = $taxonomy;
      }
    }

    return empty($arr_associated_taxonomies) ? False : $arr_associated_taxonomies;
  }

  static function filterUpdatedMessages($arr_messages){
    $revision_id = empty($_GET['revision']) ? False : IntVal($_GET['revision']);

    $arr_messages[static::post_type_name] = Array(
      1 => sprintf(I18n::t('%1$s updated. (<a href="%2$s">View %1$s</a>)'), Post_Type_Labels::getItemSingularName(), get_Permalink()),
      2 => __('Custom field updated.'),
      3 => __('Custom field deleted.'),
      4 => sprintf(I18n::t('%s updated.'), Post_Type_Labels::getItemSingularName()),
      5 => sprintf(I18n::t('%1$s restored to revision from %2$s'), Post_Type_Labels::getItemSingularName(), WP_Post_Revision_Title($revision_id, False)),
      6 => sprintf(I18n::t('%1$s published. (<a href="%2$s">View %1$s</a>)'), Post_Type_Labels::getItemSingularName(), get_Permalink()),
      7 => sprintf(I18n::t('%s saved.'), Post_Type_Labels::getItemSingularName()),
      8 => sprintf(I18n::t('%s submitted.'), Post_Type_Labels::getItemSingularName()),
      9 => sprintf(I18n::t('%1$s scheduled. (<a target="_blank" href="%2$s">View %1$s</a>)'), Post_Type_Labels::getItemSingularName(), get_Permalink()),
      10 => sprintf(I18n::t('Draft updated. (<a target="_blank" href="%1$s">Preview %2$s</a>)'), add_Query_Arg(Array('preview' => 'true'), get_Permalink()), Post_Type_Labels::getItemSingularName())
    );

    return $arr_messages;
  }

  static function getArchiveLink($filter = '', $taxonomy_term = Null){
    $permalink_structure = get_Option('permalink_structure');

    # Get base url
    if ($taxonomy_term)
      $base_url = get_Term_Link($taxonomy_term);
    else
      $base_url = get_Post_Type_Archive_Link(static::post_type_name);

    if (empty($permalink_structure))
      return add_Query_Arg(Array('prefix' => RawURLEncode($filter)), $base_url);
    else
      return User_TrailingSlashIt(sprintf('%1$s/prefix:%2$s', rtrim($base_url, '/'), RawURLEncode($filter)));
  }

  static function filterPostTypeLink($link, $post){
    if (!empty($post->post_type) && $post->post_type == static::post_type_name){
      if ($taxonomies = static::getAssociatedTaxonomies()){
        foreach ($taxonomies as $taxonomy){
          $terms = wp_get_object_terms($post->ID, $taxonomy->name);
          if ($terms){
            $first_term = reset($terms);
            $term_slug = $first_term->slug;
          }
          else {
            $term_slug = sanitize_Title( __('Uncategorized') );
          }

          $link = str_replace("%{$taxonomy->name}%", $term_slug, $link);
        }
      }
    }

    return $link;
  }

}

Post_Type::init();
