<div class="post-header row">

	<p class="col-md-8 small text-muted">
		<span class="byline author vcard"><?php echo __('By', 'roots'); ?> <a href="<?php echo get_author_posts_url(get_the_author_meta('ID')); ?>" rel="author" class="fn"><?php echo get_the_author(); ?></a>
		</span>
			<span class="cats">Posted in <?php the_category(', ') ?></span>
	<?php 
	echo " / ";
	$linkText = "Comment on this post";
	comments_popup_link( $linkText, $linkText, $linkText); 
	edit_post_link('Edit <i class="fa fa-pencil"></i>', ' / ', ''); ?>
	</p>

	<p class="col-md-4 small text-right text-muted">
		<time class="published" class="pull-right" datetime="<?php echo get_the_time('c'); ?>"><?php echo get_the_date(); ?></time>
	</p>
	
</div>