<?php //index.php is the last resort template, if no other templates match ?>
<?php get_header(); ?>

<main class="main-page">
  <div class="container clearfix">
  	 <h1 class="page-title"><?php the_archive_title();?></h1>
      <div class="clearfix ">
      <?php if (have_posts() ) : ?>
          <section class="basic-archive">
            <?php while ( have_posts() ) : the_post(); ?> 
             <? get_template_part( 'templates/post-on-blog-page', get_post_format() ); ?>
           <?php endwhile; ?> <!-- end of loop -->
           <?php if (  $wp_query->max_num_pages > 1 ){ ?>
          </section>
          <button id="loadMorePosts" class="basic-archive-load loadmore btn redoutline">Load More</button>
          <?php }?>   
      <?php endif; ?>

  </div> <!-- /.container -->
</main> <!-- /.main -->

<?php get_footer(); ?>