<?php get_header(); ?>
 <main class="main-page single-collections single-inspiration">
	<div class="container">
    <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
          <h1><? echo the_title(); ?></h1> 
          <section class="credits flex">
			<?php $prev_post = get_previous_post();
			if (!empty( $prev_post )){ ?>
			  <a class="btn" href="<?php echo $prev_post->guid ?>">Next Inspiration</a>
          	<?php } else {
          		$latest = new WP_Query( array(
				    'posts_per_page' => 1,
				    'post_type' => array ( 'inspiration' ),
				) );
				if ( $latest->have_posts() ) { while ( $latest->have_posts() ) {$latest->the_post(); ?>
				      <a class="btn" href=" <?php the_permalink(); ?> ">Next Inspiration</a>
				<?php }
				} 
				wp_reset_postdata();
          	}; ?> 
          </section>
          <img src=<?php the_post_thumbnail_url('full'); ?> alt="">
<?php endwhile;?>
<?php endif; ?>
<div class="below-images flex">
	<a class="back-button" href="<?= site_url();?>/inspirations"><h6>← Back to All Inspirations</h6></a>
	<div class="social-share">
        <?php echo do_shortcode('[Sassy_Social_Share]') ?>
    </div>
</div>
	</div>
</main> <!-- /.main -->

<?php get_footer(); ?>