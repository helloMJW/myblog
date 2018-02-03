<?php Namespace WordPress\Plugin\Encyclopedia;

abstract class Content_Filter {

  static function init(){
    add_Filter('the_content', Array(static::class, 'addRelatedItems'));
    add_Action('plugins_loaded', Array(static::class, 'registerContentFilter'));
  }

  static function registerContentFilter(){
    $cross_linker_priority = Options::get('cross_linker_priority') == 'before_shortcodes' ? 10.5 : 15;
    add_Filter('the_content', Array(static::class, 'addCrossLinks'), $cross_linker_priority);
    add_Filter('bbp_get_forum_content', Array(static::class, 'addCrossLinks'), $cross_linker_priority);
    add_Filter('bbp_get_topic_content', Array(static::class, 'addCrossLinks'), $cross_linker_priority);
    add_Filter('bbp_get_reply_content', Array(static::class, 'addCrossLinks'), $cross_linker_priority);
  }

  static function addRelatedItems($content){
		global $post;

		if ($post->post_type == Post_Type::post_type_name && is_Single($post->ID)){
      if (!has_Shortcode($content, 'encyclopedia_related_items') && Options::get('related_items') != 'none' && !post_password_required()){
        $attributes = Array( 'max_items' => Options::get('number_of_related_items') );

        if (Options::get('related_items') == 'above')
          $content = Shortcodes::Related_Items($attributes) . $content;
        else
          $content .= Shortcodes::Related_Items($attributes);
      }
		}

    return $content;
	}

  static function addCrossLinks($content){
    global $post;

    # If this is for the excerpt we bail out
    if (doing_Filter('get_the_excerpt')) return $content;

    # Check if Cross-Linking is activated for this post
    if (apply_Filters('encyclopedia_link_items_in_post', True, $post)){
      $content = Core::addCrossLinks($content, $post);
    }

    return $content;
  }

}

Content_Filter::init();
