<?php get_header(); ?>
 <main class="main-post main-page single-press-release single-media">
	<div class="container">
    <?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>   
      <article class="post">
        <h1><?php the_title(); ?></h1>
        <?php the_content(); ?>
        <div class="entry-meta">
          <?php hackeryou_posted_on(); ?>
          <?php hackeryou_posted_in(); ?>
        </div><!-- .entry-utility -->
        <div id="nav-below" class="post-nav-below">
          <p class="nav-previous"><?php previous_post_link('%link', '&larr; Previous Media Clipping'); ?></p>
          <p class="nav-next"><?php next_post_link('%link', 'Next Media Clipping &rarr;'); ?></p>
        </div><!-- #nav-below -->
      </article>
    <?php endwhile; ?>
	</div>
</main> <!-- /.main -->

<?php get_footer(); ?>