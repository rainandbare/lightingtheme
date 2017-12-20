<?php
/**
 * Template part for displaying Basic Archive Posts
 */
?>
<a class="basic-post" href="<?php echo get_permalink(); ?>">
    <article>
      <div class="img">
      	<img src="<?php the_post_thumbnail_url('full'); ?>" alt="">      
      </div>      	
      <button class="btn redbtn">Read More</button>
      <h3><?php the_title(); ?></h3>
    </article>
</a>