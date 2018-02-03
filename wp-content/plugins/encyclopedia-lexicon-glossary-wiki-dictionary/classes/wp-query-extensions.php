<?php Namespace WordPress\Plugin\Encyclopedia;

abstract class WP_Query_Extensions {

  static function init(){
    add_Filter('query_vars', Array(static::class, 'registerQueryVars'));
    add_Filter('pre_get_posts', Array(static::class, 'filterQuery'));
    add_Filter('posts_where', Array(static::class, 'filterPostsWhere'), 10, 2);
    add_Filter('posts_fields', Array(static::class, 'filterPostsFields'), 10, 2);
    add_Filter('posts_orderby', Array(static::class, 'filterPostsOrderBy'), 10, 2);
  }

  static function registerQueryVars($query_vars){
    $query_vars[] = 'prefix'; # Will store the the filter of the user search
    return $query_vars;
  }

  static function filterQuery($query){
		if (!$query->get('suppress_filters') && (Core::isEncyclopediaArchive($query) || Core::isEncyclopediaSearch($query))){
      # Order the terms in the backend by title, ASC.
      if (!$query->get('order')) $query->set('order', 'asc');
      if (!$query->get('orderby')) $query->set('orderby', 'title');

      if ($query->is_Main_Query()){
        # Take an eye on the prefix filter
        if (!$query->get('post_title_like') && get_Query_Var('prefix'))
          $query->set('post_title_like', RawUrlDecode(get_Query_Var('prefix')) . '%');

        # Change the number of terms per page
        if (!$query->get('posts_per_page'))
          $query->set('posts_per_page', Options::get('terms_per_page'));
      }
		}
	}

	static function filterPostsWhere($where, $query){
		global $wpdb;

		$post_title_like = $query->get('post_title_like');

		if (!empty($post_title_like))
      return sprintf('%s AND %s LIKE "%s" ', $where, $wpdb->posts.'.post_title', esc_SQL($post_title_like));
		else
			return $where;
	}

  static function filterPostsFields($fields, $query){
    global $wpdb;

    if ($query->get('orderby') == 'post_title_length')
      $fields .= ", LENGTH({$wpdb->posts}.post_title) post_title_length";

    return $fields;
  }

  static function filterPostsOrderBy($orderby, $query){
    if ($query->get('orderby') == 'post_title_length')
      $orderby = sprintf('post_title_length %s', $query->get('order'));

    return $orderby;
  }

}

WP_Query_Extensions::init();
