<?php Namespace WordPress\Plugin\Encyclopedia;

use WP_Widget, WP_Query;

class Items_Widget extends WP_Widget {

  function __construct(){
    parent::__construct (
      'encyclopedia_items',
      sprintf('%s %s', Post_Type_Labels::getEncyclopediaType(), Post_Type_Labels::getItemPluralName()),
      Array('description' => sprintf(I18n::t('A list of your %s.'), Post_Type_Labels::getItemPluralName()))
    );
  }

  static function registerWidget(){
    if (doing_Action('widgets_init'))
      register_Widget(static::class);
    else
      add_Action('widgets_init', Array(static::class, __FUNCTION__));
  }

  function getDefaultOptions(){
    # Default settings
    return Array(
      'title'   => '',
      'number_of_items' => Null,
      'orderby' => 'title',
      'order'   => 'ASC',
    );
  }

  function loadOptions(&$options){
    setType($options, 'ARRAY');
    $options = Array_Filter($options);
    $options = Array_Merge($this->getDefaultOptions(), $options);
    setType($options, 'OBJECT');
  }

  function Form($options){
    $this->loadOptions($options);
    ?>

    <p>
      <label for="<?php echo $this->get_Field_Id('title') ?>"><?php _e('Title:') ?></label>
      <input type="text" id="<?php echo $this->get_Field_Id('title') ?>" name="<?php echo $this->get_Field_Name('title')?>" value="<?php echo HTMLSpecialChars($options->title) ?>" class="widefat">
    </p>

    <p>
      <label for="<?php echo $this->get_Field_Id('number_of_items') ?>"><?php echo I18n::t('Number of terms:') ?></label>
      <input type="number" id="<?php echo $this->get_Field_Id('number_of_items') ?>" name="<?php echo $this->get_Field_Name('number_of_items')?>" value="<?php echo esc_Attr($options->number_of_items) ?>" min="0" max="<?php echo PHP_INT_MAX ?>" step="1" class="widefat">
      <small><?php echo I18n::t('Leave blank to show all terms.') ?></small>
    </p>

    <p>
      <label for="<?php echo $this->get_Field_Id('orderby') ?>"><?php echo I18n::t('Order by:') ?></label>
      <select id="<?php echo $this->get_Field_Id('orderby') ?>" name="<?php echo $this->get_Field_Name('orderby') ?>" class="widefat">
        <option value="title" <?php selected($options->orderby, 'title') ?>><?php echo __('Title') ?></option>
        <option value="ID" <?php selected($options->orderby, 'ID') ?>>ID</option>
        <option value="author" <?php selected($options->orderby, 'author') ?>><?php echo I18n::t('Author') ?></option>
        <option value="date" <?php selected($options->orderby, 'date') ?>><?php echo I18n::t('Date') ?></option>
        <option value="modified" <?php selected($options->orderby, 'modified') ?>><?php echo I18n::t('Last modification') ?></option>
        <option value="rand" <?php selected($options->orderby, 'rand') ?>><?php echo I18n::t('Random') ?></option>
        <option value="comment_count" <?php selected($options->orderby, 'comment_count') ?>><?php echo I18n::t('Comment Count') ?></option>
        <option value="menu_order" <?php selected($options->orderby, 'menu_order') ?>><?php echo I18n::t('Menu Order') ?></option>
      </select>
    </p>

    <p>
      <label for="<?php echo $this->get_Field_Id('order') ?>"><?php echo I18n::t('Order:') ?></label>
      <select id="<?php echo $this->get_Field_Id('order') ?>" name="<?php echo $this->get_Field_Name('order') ?>" class="widefat">
        <option value="ASC" <?php selected($options->order, 'ASC') ?>><?php _e('Ascending') ?></option>
        <option value="DESC" <?php selected($options->order, 'DESC') ?>><?php _e('Descending') ?></option>
      </select>
    </p>

    <?php
  }

  function Widget($widget, $options){
    # Load widget args
    setType($widget, 'OBJECT');

    # Load options
    $this->loadOptions($options);

    # Load widget title
    $widget->title = apply_Filters('widget_title', $options->title, (Array) $options, $this->id_base);

    # Load the Query
    $widget->items = new WP_Query(Array(
      'post_type' => Post_Type::post_type_name,
      'orderby' => $options->orderby,
      'order' => $options->order,
      'nopaging' => (Bool) empty($options->number_of_items),
      'posts_per_page' => (Int) $options->number_of_items,
      'ignore_sticky_posts' => True
    ));

    if (!$widget->items->have_Posts()) return;

    # Display Widget
    echo $widget->before_widget;
    !empty($widget->title) && print($widget->before_title . $widget->title . $widget->after_title);
    echo Template::load('encyclopedia-items-widget.php', Array('widget' => $widget, 'options' => $options));
    echo $widget->after_widget;

    # Reset Post data
    WP_Reset_Postdata();
  }

}

Items_Widget::registerWidget();
