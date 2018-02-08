<?php
/**
 * Template part for displaying posts
 */
?>
<article class="blog-article">
	<a class="blog-link" href=" <?= get_permalink(); ?> ">
		<?php 
		if(has_post_thumbnail() === false){
			$imageURL = site_url( '/wp-content/uploads/viso-logo.jpg' );
		} else {
			$imageURL = get_the_post_thumbnail_url($post->ID, 'large');
		}; ?>
		<div class="blog-image" style="background-image: url(<?= $imageURL; ?>);"></div>
		<div class="read-more-overlay">
			<button class="redbtn btn">Read More</button>
		</div>
	</a>
	<h3><?php relevanssi_the_title(); ?></h3>
	<h6> <?php the_date(); ?> </h6>
	<?php $type = get_post_type_object(get_post_type()); ?>
	<h4><?php echo $type->labels->singular_name ?></h4>
	<?php the_excerpt(); ?>
</article>