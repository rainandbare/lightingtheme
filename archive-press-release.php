<?php get_header(); ?>

<main class="main-page">
  <div class="container">
      <h2>Press Releases</h2>

      <?php if (have_posts() ) : ?>
        <section class="basic-main no-sidebar">
          <section class="basic-archive">
            <?php while ( have_posts() ) : the_post(); ?> 
              <? get_template_part( 'templates/basic-archive-post', get_post_format() ); ?>
           <?php endwhile; ?> <!-- end of loop -->
           <?php if (  $wp_query->max_num_pages > 1 ){ ?>
          </section>
          <button id="loadMorePosts" class="basic-archive-load loadmore btn redbtn">Load More</button>
          <?php }?>   
        </section>
      <?php endif; ?>
  </div>
</main> <!-- /.main -->

<?php get_footer(); ?>