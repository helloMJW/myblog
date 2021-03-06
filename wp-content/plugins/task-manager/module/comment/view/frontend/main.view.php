<?php
/**
 *
 *
 * @author Jimmy Latour <jimmy.eoxia@gmail.com>
 * @since 1.0.0.0
 * @version 1.3.6.0
 * @copyright 2015-2017 Eoxia
 * @package support
 * @subpackage view
 */

namespace task_manager;

if ( ! defined( 'ABSPATH' ) ) { exit; }

View_Util::exec( 'comment', 'frontend/edit', array(
	'task_id' => $task_id,
	'point_id' => $point_id,
	'comment' => $comment_schema,
) );

View_Util::exec( 'comment', 'frontend/list-comment', array(
	'comments' => $comments,
) );
