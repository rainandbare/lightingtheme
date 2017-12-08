<?php
/**
 * Template part for displaying Collections, Projects and Inspirations posts on their archive page
 */
?>
<a class="all <?php suzette_custom_taxonomies($post->ID, $taxonomy); ?>basic-post" data-type="<?php suzette_custom_taxonomies($post->ID, $taxonomy); ?>" href="<?php echo get_permalink(); ?>">
    <article>
      <img src="<?php the_post_thumbnail_url('full'); ?>" alt="">
      <h3><?php the_title(); ?></h3> 
      <button class="btn redbtn">Read More</button>
    </article>
</a>