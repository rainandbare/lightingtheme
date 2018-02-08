<?php
/**
 * Template part for displaying Partners on their archive page
 */
?>

<a data-type="all <?php suzette_custom_taxonomies($post->ID, $taxonomy); ?>" class="basic-post partner-post" target="_blank" href="<?php the_field('link'); ?>">
    <article>
      <div class="img">
      	<img src="<?php the_post_thumbnail_url('full'); ?>" alt="">      
      </div>      	
      <h3><?php the_title(); ?></h3>
    </article>
</a>