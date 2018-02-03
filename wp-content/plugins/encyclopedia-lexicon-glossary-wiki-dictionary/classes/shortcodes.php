<?php Namespace WordPress\Plugin\Encyclopedia;

abstract class Shortcodes {

  static function init(){
    add_Shortcode('encyclopedia_related_items', Array(static::class, 'Related_Items'));
  }

	static function Related_Items($attributes = Null){
    $attributes = is_Array($attributes) ? $attributes : Array();

    $attributes = Array_Merge(Array(
      'number' => 5
    ), $attributes);

    $related_items = Core::getTagRelatedItems($attributes);

		return Template::load('encyclopedia-related-items.php', Array(
      'attributes' => $attributes,
      'related_items' => $related_items
    ));
	}


}

Shortcodes::init();
