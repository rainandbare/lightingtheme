<?php get_header(); ?>

<main class="main-page media-archive">
  <div class="container">
      <h1 class="page-title">Media</h1>
      <div class="clearfix media-container">
      <?php if (have_posts() ) : ?>
        <section class="basic-main">
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
        <aside class="sidebar-basic-archive">
          <h4>Request a Media Kit</h4>
          <?php echo do_shortcode('[contact-form-7 id="1865" title="Request a Press Kit"]'); ?>
        </aside>      
      </div>
  </div>
</main> <!-- /.main -->

<?php get_footer(); ?>