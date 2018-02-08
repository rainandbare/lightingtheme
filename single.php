<?php get_header(); ?>

<main class="main-post">
  <?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
<section class="banner" style="background-image: url(<?php the_post_thumbnail_url('full'); ?>)">
    </section>
    <!-- <img class="main" src="<?php the_post_thumbnail_url('full'); ?>" alt=""> -->
    <section class="container clearfix">
      <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
        <h1 class="entry-title page-title"><?php the_title(); ?></h1>
        
        <div class="entry-content">
          <?php the_content(); ?>
        </div><!-- .entry-content -->
        <div class="entry-meta">
          <?php hackeryou_posted_on(); ?>
          <?php hackeryou_posted_in(); ?>
        </div><!-- .entry-utility -->
        <div id="nav-below" class="post-nav-below">
          <p class="nav-previous"><?php previous_post_link('%link', '&larr; Previous Post'); ?></p>
          <p class="nav-next"><?php next_post_link('%link', 'Next Post &rarr;'); ?></p>
        </div><!-- #nav-below -->
        <!--   <?php //comments_template( '', true ); ?> -->
      </article><!-- #post-## -->

        <?php get_sidebar(); ?>
        </section>
      <?php endwhile; // end of the loop. ?>

</main> <!-- /.main -->

<?php get_footer(); ?>