<?php get_header(); ?>

<main class="main-page">
  <div class="container">
      <h1 class="page-title">Press Releases</h1>

      <?php if (have_posts() ) : ?>
        <section class="basic-main no-sidebar">
          <section class="basic-archive">
            <?php while ( have_posts() ) : the_post(); ?> 
              <? get_template_part( 'templates/basic-archive-post', get_post_format() ); ?>
           <?php endwhile; ?> <!-- end of loop -->
           <?php if (  $wp_query->max_num_pages > 1 ){ ?>
          </section>
          <button id="loadMorePosts" class="basic-archive-load loadmore btn redoutline">Load More</button>
          <?php }?>   
        </section>
      <?php endif; ?>
  </div>
</main> <!-- /.main -->

<?php get_footer(); ?>