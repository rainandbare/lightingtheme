<?php
/**
 * Template part for displaying posts
 */
?>
<article class="blog-article">
	<!-- <img src="<?php the_post_thumbnail_url('large'); ?>"> -->
	<a class="blog-link" href=" <?= get_permalink(); ?> ">
		<?php 
		if(has_post_thumbnail() === false){
			$imageURL = site_url( '/wp-content/uploads/viso-logo.jpg' );
		} else {
			$imageURL = get_the_post_thumbnail_url();
		}; ?>
		<div class="blog-image" style="background-image: url(<?= $imageURL; ?>);"></div>
		<div class="read-more-overlay">
			<button class="redbtn btn">Read More</button>
		</div>
	</a>
	<div class="designNotesLogo">
		<img src="<?php echo get_template_directory_uri(); ?>/img/Design_Notes_Logo.svg" alt="design-notes-logo">
	</div>
	<h3><?php the_title(); ?></h3>
	<h6> <?php the_date() ?> </h6>
	<?php the_excerpt(); ?>
</article>