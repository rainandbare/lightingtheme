<?php //this is the blog page not the page called home! ?>
<?php get_header(); 
/**
/* 
Template Name: Blog Home
*/
?>
<main class="main-page">
		<?php if ( have_posts() ) : 
				$firstPost = true;?>
		<section class="intro">
			<?php $page_for_posts_id = get_option('page_for_posts');?>
			<p><?=get_post_field( 'post_content', $page_for_posts_id ); ?></p>
		</section>
		 	<?php while ( have_posts() ) : the_post(); ?>
				<?php if ($firstPost){ ?> 
					<section class="banner">
						<a href=" <?= get_permalink(); ?> ">
							<img src="<?php the_post_thumbnail_url('full'); ?>">
							<h2><?php the_title(); ?></h2>
						</a>
					</section>
					<section class="other-blog-articles"> 
				<?php } else { 
					get_template_part( 'templates/post-on-blog-page', get_post_format() ); ?>
				<?php } ?>

				<?php $firstPost = false; ?>
			    <?php endwhile; ?>
			    	</section>
			    <!-- end of the loop -->
				<?php 
					global $wp_query; // you can remove this line if everything works for you
				 
				// don't display the button if there are not enough posts
				if (  $wp_query->max_num_pages > 1 ){ ?>
		 				<!-- <div id="loadMorePosts" class="misha_loadmore">Load More</div> -->
					 		<button id="loadMorePosts" class="loadmore btn redbtn">Load More</button>
				<?php }?>
		 
			<?php else : ?>
			    <p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>
			<?php endif; ?>
</main> 
<?php get_footer(); ?>