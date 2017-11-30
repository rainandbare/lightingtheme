<?php get_header(); ?>
<main class="main-page">
	<div class="container">
		
		<?php if ( have_posts() ) : ?>
			<h1 class="title">Search Results for: <?php echo get_search_query(); ?></h1>
			<h2>Need a new search?</h2>
			<p>If you didn't find what you were looking for, try a new search!</p>
			<?php get_search_form(); ?>
			<section class="search-results-collection">
				<?php while ( have_posts() ) : the_post(); ?>
    				<? get_template_part( 'templates/post-on-blog-page', get_post_format() ); ?>
    			<?php endwhile; // End the loop. Whew. ?>
			</section>
		<?php else : ?>
			<h1 class="title">Search Results for: <?php echo get_search_query(); ?></h1>
			<h2>Nothing Found</h2>
			<p>Sorry, but nothing matched your search criteria. Please try again with some different keywords.</p>
			<?php get_search_form(); ?>

		<?php endif; ?>

	</div><!-- /.container -->
</main> <!-- /.main -->

<?php get_footer(); ?>
