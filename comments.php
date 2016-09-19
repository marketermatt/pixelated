<?php 
	// Prevent the direct loading
	
	if(!empty($_SERVER['SCRIPT-FILENAME']) && basename($_SERVER['SCRIPT-FILENAME']) == 'comments.php') {
		die(__('You cannot access this file', PTS_DOMAIN));
	}

	// Check if post is pwd protected

	if(post_password_required()){
		?>
			<p><?php _e('This post is password protected. Enter the password to view the comments.', PTS_DOMAIN); ?></p>
		<?php
		return;
	}
	
	if(have_comments()) :?>
		<div class="comments">
		<h4 class="title-alt"><span><?php comments_number(__('No Comments', PTS_DOMAIN), __('One Comment', PTS_DOMAIN), __('% Comments', PTS_DOMAIN)); ?></span></h4>

		<ul class="comments-list">
			<?php wp_list_comments('callback=pts_comments'); ?>
		</ul>

		<?php if (get_comment_pages_count() > 1 && get_option('page_comments')): ?>
			
			<div class="comments-nav">
				<div class="pull-left"><?php previous_comments_link(__('&larr; Older Comments', PTS_DOMAIN)); ?></div>
				<div class="pull-right"><?php next_comments_link(__('Newer Comments &rarr;', PTS_DOMAIN)); ?></div>
				<div class="clear"></div>
			</div>

		<?php endif ?>	
		
		</div>

	<?php elseif(!comments_open() && !is_page() && post_type_supports(get_post_type(), 'comments')) : ?>
		
		<p><?php _e('Comments are closed', PTS_DOMAIN) ?></p>

	<?php 
	endif;

	// Display Comment Form
	comment_form(array('title_reply' => '<span>' . __('Leave a Review', PTS_DOMAIN) . '</span>'));
?>