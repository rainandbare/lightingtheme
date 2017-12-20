<?php get_header(); ?>
 <main class="main-post main-page single-press-release single-media">
	<div class="container">
    <?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>   
      <article class="post">
        <h1><?php the_title(); ?></h1>
        <?php the_content(); ?>
      </article>
    <?php endwhile; ?>
	</div>
</main> <!-- /.main -->

<?php get_footer(); ?>