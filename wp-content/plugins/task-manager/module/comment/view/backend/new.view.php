<?php
/**
 * La vue d'édition des commentaires.
 *
 * @author Jimmy Latour <jimmy.eoxia@gmail.com>
 * @since 1.0.0.0
 * @version 1.3.6.0
 * @copyright 2015-2017 Eoxia
 * @package comment
 * @subpackage view
 */

namespace task_manager;

if ( ! defined( 'ABSPATH' ) ) { exit; } ?>

<li class="comment new">
	<form action="<?php echo esc_attr( admin_url( 'admin-ajax.php' ) ); ?>" method="POST">
		<ul class="wpeo-comment-container">

			<input type="hidden" name="action" value="edit_comment" />
			<?php wp_nonce_field( 'edit_comment' ); ?>
			<input type="hidden" name="comment_id" value="<?php echo esc_attr( $comment->id ); ?>" />
			<input type="hidden" name="post_id" value="<?php echo esc_attr( $task_id ); ?>" />
			<input type="hidden" name="parent_id" value="<?php echo esc_attr( $point_id ); ?>" />

			<li class="wpeo-comment-date"><span class="fa fa-calendar-o"></span>
				<input type="text" class="date-time" name="date" value="<?php echo esc_attr( current_time( 'd/m/Y h:i' ) ); ?>" />
			</li>

			<li class="wpeo-comment-content">
				<input type="hidden" name="content" value="<?php esc_attr( $comment->content ); ?>" />
				<div class="content" contenteditable="true">
					<?php echo $comment->content; ?>
				</div>
				<?php if ( empty( $comment->id ) ) : ?>
					<span class="wpeo-point-new-placeholder"><?php esc_html_e( 'Votre commentaire ici...', 'task-manager' ); ?></span>
				<?php endif; ?>
			</li>
			<li class="wpeo-comment-time"><span class="fa fa-clock-o"></span> <input type="text" name="time" value="<?php echo esc_attr( $comment->time_info['elapsed'] ); ?>" /></li>

			<?php if ( ! empty( $comment->id ) ) : ?>
				<li class="wpeo-save-point"><i data-parent="edit" class="action-input fa fa-floppy-o" aria-hidden="true"></i></li>
			<?php else : ?>
				<span data-parent="edit" class="wpeo-point-new-btn action-input dashicons dashicons-plus-alt"></span>
			<?php endif; ?>

		</ul>
	</form>
</li>
