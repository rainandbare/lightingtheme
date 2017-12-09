<?php
/**
 * Template part for displaying Collections, Projects and Inspirations posts on their archive page
 */
?>
<?php 
	$boxheight = get_field('box_height');
 ?>
<a class="<?= $boxheight ?> archive-collection-single" data-type="all <?php suzette_custom_taxonomies($post->ID, $taxonomy); ?>" href="<?php echo get_permalink(); ?>">
    <article>
      <img src="<?php the_post_thumbnail_url('full'); ?>" alt="">
      <h4><?php the_title(); ?></h4> 
    </article>
</a>