<?php while (have_posts()) : the_post(); ?>
	<?php the_content(); ?>
	<?php edit_post_link('<i class="fa fa-pencil"></i> Edit') ?>
	<?php wp_link_pages(array('before' => '<nav class="pagination">', 'after' => '</nav>')); ?>

	<?php 
	$css = get_post_meta( $post->ID, 'css', true );
	if ( !empty($css) ) :
	?>
	<style type="text/css"><?php echo $css; ?></style>
<?php endif; ?>
<?php endwhile; ?>
