<?php
  /**
   * Usually not best practice to use nested functions in PHP because of how PHP stores functions at compile.
   * However, a function_exists wrapper seems to be suitable.
   * This file will be included inside other functions. This approach seems to works best with how the Wordpress callback 
   * functions work for hooks.
   */
  if (!function_exists('getNotesWidgetData')) {
    
    /**
     * Fetches all of the note widget data. Packages everything in an array for easy access
     *
     * @since  0.1.3
     * @param  array   $instance       The data associated with this widget
     * @return array   $widget_data    An array of all the required data for the widget, sanitized and ajusted as needed
     */
    function getNotesWidgetData($instance) {

      $widget_data = array();

      $widget_data['title']                   = (isset( $instance['title'])                     ? sanitize_text_field($instance['title']) : '');
      $widget_data['thumb_tack_colour']       = (isset($instance['thumb_tack_colour'])          ? sanitize_text_field($instance['thumb_tack_colour']) : '');
      $widget_data['text_colour']             = (isset($instance['text_colour'])                ? sanitize_text_field($instance['text_colour']) : '');
      $widget_data['background_colour']       = (isset($instance['background_colour'])          ? sanitize_text_field($instance['background_colour']) : '');
      $widget_data['use_custom_style']        = (!empty($instance['use_custom_style'])          ? sanitize_text_field($instance['use_custom_style']) : '');
      $widget_data['wrap_widget']             = (!empty($instance['wrap_widget'] )              ? sanitize_text_field($instance['wrap_widget']) : '');
      $widget_data['show_date']               = (!empty($instance['show_date'] )                ? sanitize_text_field($instance['show_date']) : '');
      $widget_data['multiple_notes']          = (!empty($instance['multiple_notes'] )           ? sanitize_text_field($instance['multiple_notes']) : '');
      $widget_data['hide_if_empty']           = (!empty($instance['hide_if_empty'])             ? 1 : 0);
      $widget_data['font_size']               = (!empty($instance['font_size'] )                ? sanitize_text_field($instance['font_size']) : 'normal');
      $widget_data['enable_social_share']     = (!empty($instance['enable_social_share'])       ? 1 : 0);
      $widget_data['font_style']              = (!empty($instance['font_style'] )               ? sanitize_text_field($instance['font_style']) : 'kalam');
      $widget_data['do_not_force_uppercase']  = (!empty($instance['do_not_force_uppercase'])    ? 1 : 0);
      $widget_data['post_adjustment_type']    = (!empty($instance['post_adjustment_type'])      ? sanitize_text_field($instance['post_adjustment_type']) : 'none');

      
      if (!empty($instance['post_adjustment_list']) ) {
        $sanitized_adjustment_posts = array();
        $post_adjustment_list = unserialize($instance['post_adjustment_list']);
        
        foreach ($post_adjustment_list as &$post_adjustment_id) {
          $sanitized_adjustment_posts[] = sanitize_text_field($post_adjustment_id);
        }

        $widget_data['post_adjustment_list'] =  $sanitized_adjustment_posts;        
      } else {
        $widget_data['post_adjustment_list'] = array();
      }
      

      return $widget_data;

    }
  }