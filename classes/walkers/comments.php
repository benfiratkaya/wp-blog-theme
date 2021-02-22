<?php
	class BenFiratKaya_Walker_Comment extends Walker_Comment {
		var $tree_type = 'comment';
		var $db_fields = array(
			'parent' 	=> 'comment_parent',
			'id' 			=> 'comment_ID'
		);

		// constructor – wrapper for the comments list
		function __construct() {
			echo '<div class="comments-list">';
		}

		// start_lvl – wrapper for child comments list
		function start_lvl(&$output, $depth = 0, $args = array()) {
			$GLOBALS['comment_depth'] = $depth + 2;
			echo '<div class="comments-list media-comment-reply">';
		}

		// end_lvl – closing wrapper for child comments list
		function end_lvl(&$output, $depth = 0, $args = array()) {
			$GLOBALS['comment_depth'] = $depth + 2;
			echo '</div>';
		}

		// start_el – HTML for comment template
		function start_el(&$output, $comment, $depth = 0, $args = array(), $id = 0) {
			$depth++;
			$GLOBALS['comment_depth'] = $depth;
			$GLOBALS['comment'] = $comment;
			$parent_class = (empty($args['has_children']) ? '' : 'parent');
			$tag = $args['style'];
			$add_below = 'comment';

			$comment_author = esc_html(get_comment_author($comment));
			$comment_author_url = esc_url(get_comment_author_url($comment));
			$comment_author_avatar_url = esc_url(get_avatar_url($comment, ['size' => $args['avatar_size']]));
			$comment_link = esc_url(get_comment_link()); ?>

			<<?php echo $tag; ?> id="comment-<?php comment_ID() ?>" <?php comment_class($parent_class, $comment); ?> itemprop="comment" itemscope itemtype="http://schema.org/Comment">
				<article id="div-comment-<?php comment_ID() ?>">
					<div class="media media-comment">
						<?php if (empty($comment_author_url)): ?>
							<img alt="<?php echo esc_attr($comment_author.' Avatar'); ?>" class="rounded-circle shadow media-comment-author" src="<?php echo $comment_author_avatar_url; ?>">
						<?php else: ?>
							<a href="<?php echo $comment_author_url; ?>" rel="external nofollow">
								<img alt="<?php echo esc_attr($comment_author.' Avatar'); ?>" class="rounded-circle shadow media-comment-author" src="<?php echo $comment_author_avatar_url; ?>">
							</a>
						<?php endif; ?>
						<div class="media-body">
							<div class="media-comment-bubble">
								<div class="row mb-2">
									<div class="col-12 col-md">
										<?php if (empty($comment_author_url)): ?>
											<h6 class="text-primary my-0" itemprop="author">
												<?php echo $comment_author; ?>
												<?php if (benfiratkaya_is_comment_by_post_author($comment)): ?>
													<?php echo benfiratkaya_writer_badge(); ?>
												<?php endif; ?>
											</h6>
										<?php else: ?>
											<a href="<?php echo $comment_author_url; ?>" rel="external nofollow">
												<h6 class="my-0" itemprop="author">
													<?php echo $comment_author; ?>
													<?php if (benfiratkaya_is_comment_by_post_author($comment)): ?>
														<?php echo benfiratkaya_writer_badge(); ?>
													<?php endif; ?>
												</h6>
											</a>
										<?php endif; ?>
									</div>
									<div class="col-12 col-md-auto">
										<time datetime="<?php printf('%sT%s', get_comment_date('Y-m-d'), get_comment_time('H:iP')); ?>" itemprop="datePublished">
											<a class="text-muted small" href="<?php echo $comment_link; ?>" itemprop="url">
												<?php printf('%s %s', get_comment_date(), get_comment_time()); ?>
											</a>
										</time>
									</div>
								</div>
								<div class="text-sm lh-160" itemprop="text">
									<?php comment_text(); ?>
								</div>
								<div class="clearfix">
									<?php if ($comment->comment_approved === '0'): ?>
										<div class="float-left text-warning">
											<?php _e('Your comment is awaiting moderation.'); ?>
										</div>
									<?php endif; ?>
									<div class="icon-actions float-right">
										<?php edit_comment_link('<span class="text-muted"><i class="fas fa-edit mr-1"></i>'.__('Edit').'</span>', '', ''); ?>
										<?php
											comment_reply_link(
												array_merge(
													$args,
													array(
														'reply_text' 	=> '<span class="text-muted"><i class="fas fa-reply mr-1"></i>'.__('Reply').'</span>',
														'add_below' 	=> $add_below,
														'depth' 			=> $depth,
														'max_depth' 	=> $args['max_depth']
													)
												)
											);
										?>
									</div>
								</div>
							</div>
						</div>
					</div>
				</article>
		<?php }

		// end_el – closing HTML for comment template
		function end_el(&$output, $comment, $depth = 0, $args = array()) {
			$tag = $args['style'];
			echo "</$tag>";
		}

		// destructor – closing wrapper for the comments list
		function __destruct() {
			echo '</div>';
		}
	}
?>
