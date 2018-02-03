<?php
use WordPress\Plugin\Encyclopedia\Post_Type;

$search_url = get_Post_Type_Archive_Link(Post_Type::post_type_name);
$search_field_name = $options->search_mode == 'prefix' ? 'prefix' : 's';
$search_field_value = !empty($_GET[$search_field_name]) ? $_GET[$search_field_name] : '';

?>
<form role="search" method="get" class="encyclopedia search-form" action="<?php echo esc_URL($search_url) ?>">
  <label class="screen-reader-text" for="encyclopedia-search-term"><?php _e('Search') ?></label>
  <input type="text" id="encyclopedia-search-term" name="<?php echo esc_Attr($search_field_name) ?>" class="search-field" value="<?php echo esc_Attr($search_field_value) ?>" placeholder="<?php echo esc_Attr_X('Search &hellip;', 'placeholder') ?>">
  <button type="submit" class="search-submit submit button" id="encyclopedia-search-submit"><?php esc_attr_e('Search') ?></button>

  <?php if ($options->search_mode == 'exact'): ?>
    <input type="hidden" name="exact" value="1">
    <input type="hidden" name="sentence" value="1">
  <?php endif ?>
</form>
