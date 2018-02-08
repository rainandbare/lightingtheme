<?php
/**
 * Template part for displaying Basic Archive Posts
 */
?>
<?php $buttonText = 'Read More';
if (get_post_type() === 'media') {
	$buttonText = 'View Clipping';
}; 
?>
<a class="basic-post" data-type="all <?php suzette_custom_taxonomies($post->ID, $taxonomy); ?>" href="<?php echo get_permalink(); ?>">
    <article>
      <div class="img">
      	<img src="<?php the_post_thumbnail_url('full'); ?>" alt="">      
      </div>      	
      <button class="btn redbtn"><?php echo $buttonText; ?></button>
      <h3><?php the_title(); ?></h3>
    </article>
</a>