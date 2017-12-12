<?php get_header();  ?>
<main class="main-home">
<?php if ( have_posts() ) : ?>
	<?php while ( have_posts() ) : the_post(); ?>   
	<div class="blurb">
		<?php the_content(); ?>
	</div>
	<div class="frontpage-slider">
		<?php
		if( have_rows('slider') ):
		    while ( have_rows('slider') ) : the_row();
		      	if (get_row_layout() == 'image'){ 
		      		$imageURL = get_sub_field('image');  
			        $imageInfo = get_sub_field('info'); 
			        $imageLink = get_sub_field('link'); ?>
			        <div class="slide" style="background-image: url( <?php echo $imageURL['url']; ?> );">
			        	<?php if ($imageLink !== ""){  ?>
			        		<a class="slide-link" href="<?php echo $imageLink; ?>"></a>
			        	<?php }	?>
			        	<?php if ($imageInfo !== ""){  ?>
				        	<div class="info clearfix">
				        		<div class="info-content"><?php echo $imageInfo; ?></div>
				        		<button class="info-icon">i</button>
				        	</div>
			        	<?php }	?>
			        </div>
		        <?php }	elseif (get_row_layout() == 'video'){ ?>
			        <div class="slide" style="background-color: black">
						<div class="video-container">
							<div class="youtube" data-embed=<?php the_sub_field('video_id'); ?>>
								<div class="play-button"></div>
							</div>
						</div>
					</div>
		        <?php }?>

		       
		   <?php endwhile; 
		else :
		    // no rows found
		endif;

		?>
	</div>
    
	<?php endwhile; ?>
<?php endif; ?>
</main> <!-- /.main -->
<?php get_footer(); ?>