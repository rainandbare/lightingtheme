<?php
/**
 * Template part for displaying Collections, Projects and Inspirations posts on their archive page
 */
?>
<a class="archive-collection-single" data-type="all <?php suzette_custom_taxonomies($post->ID, $taxonomy); ?>" href="<?php echo get_permalink(); ?>">
    <article>
    	<div class="img" style="background-image: url(<?php the_post_thumbnail_url('full'); ?>);"></div>
    </article>
    <div class="overlay">
     	<h4><?php the_title(); ?></h4>
    </div>
</a>