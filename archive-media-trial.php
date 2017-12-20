<?php get_header(); ?>

<main class="main-page">
  <div class="container">
      <h2>Media</h2>
      <div class="clearfix">
      <?php if (have_posts() ) : ?>
        <section class="basic-main">
          <section class="basic-archive">
            <?php while ( have_posts() ) : the_post(); ?> 
        <!--  <a class="basic-post" href="<?php echo get_permalink(); ?>">
                <article>
                  <div class="img"> -->
                   <img src="<?php the_post_thumbnail_url('full'); ?>" alt=""> 
                  <!-- </div>        
                  <button class="btn redbtn">Read More</button>
                  <h3><?php the_title(); ?></h3>
                </article>
              </a> --> 
              <?php the_content(); ?>
           <?php endwhile; ?> <!-- end of loop -->
           <?php if (  $wp_query->max_num_pages > 1 ){ ?>
          </section>
          <button id="loadMorePosts" class="basic-archive-load loadmore btn redoutline">Load More</button>
          <?php }?>   
        </section>
      <?php endif; ?>
        <!-- <aside class="sidebar-basic-archive">
          <h4>Request a Media Kit</h4>
          <?php echo do_shortcode('[contact-form-7 id="1865" title="Request a Press Kit"]'); ?>
        </aside>     -->  
      </div>
  </div>
</main> <!-- /.main -->

<?php get_footer(); ?>