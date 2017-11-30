<?php // If there are no posts to display, such as an empty archive page ?>

<?php if ( ! have_posts() ) : ?>

	<h2>Nothing Found</h2>
	<p>Sorry, but nothing matched your search criteria. Please try again with some different keywords.</p>
	<?php get_search_form(); ?>

<?php endif; // end if there are no posts ?>

<?php // if there are posts, Start the Loop. ?>

<?php while ( have_posts() ) : the_post(); ?>
    <? get_template_part( 'templates/basic-archive-post', get_post_format() ); ?>

<?php endwhile; // End the loop. Whew. ?>

