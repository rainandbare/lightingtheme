<?php
/**
 * Template part for displaying Basic Archive Posts
 */
?>
<a class="basic-post" href="<?php echo get_permalink(); ?>">
    <article>
      <img src="<?php the_post_thumbnail_url('full'); ?>" alt="">
      <h3><?php the_title(); ?></h3>
      <button class="btn redbtn">Read More</button>
    </article>
</a>