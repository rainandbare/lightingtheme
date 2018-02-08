
<?php get_header(); ?>

<main class="main-page">
	<div class="container">
		<h1 class="page-title"><?php the_title(); ?></h1>
  		<?php get_template_part( 'loop', 'index' ); ?>
	</div>
</main> <!-- /.main -->

<?php get_footer(); ?>