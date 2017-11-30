<?php 
/**
/* 
Template Name: About
*/
get_header(); ?>
<?php while ( have_posts() ) : the_post(); ?>
<main class="main main-about">
 	<div class="colorBar"></div>
    <div class="container flexMe">
    	<section class="about-body">
			<h1>Molly McGlynn</h1>
			<?php $frontpage_id = get_option( 'page_on_front' );?>
			<h4><?php the_field('about_short', $frontpage_id); ?></h4>
			<div class="profileImageContainer">
		        <img src="<?php the_post_thumbnail_url('large');?>" alt="">
			</div>
	        <div class="about-content"><?php the_content(); ?></div>
    	</section>
    	<h2 class="about-heading"><?php the_title(); ?></h2>
     </div>
</main> <!-- /.main -->

<?php endwhile; // End the loop. Whew. ?>
<?php get_footer(); ?>
