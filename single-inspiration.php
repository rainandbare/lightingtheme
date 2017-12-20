<?php get_header(); ?>
 <main class="main-page single-collections">
	<div class="container">
    <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
          <h1 class="single-product-title"><?= the_title(); ?></h1> 
          <img src=<?php the_post_thumbnail_url(); ?> alt="">
<?php endwhile;?>
<?php endif; ?>
	</div>
</main> <!-- /.main -->

<?php get_footer(); ?>