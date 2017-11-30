<?php get_header();  ?>
<main class="main-home">
<?php if ( have_posts() ) : ?>
	<?php while ( have_posts() ) : the_post(); ?>   
	<div class="blurb">
		<?php the_content(); ?>
	</div>
	<div class="frontpage-slider">
	<?php
		if( have_rows('banner') ):
		    while ( have_rows('banner') ) : the_row();
		        $imageURL = get_sub_field('image');  
		        $imageInfo = get_sub_field('info'); 
		        $videoLink = get_sub_field('video_link');
		        ?>
		        <div class="slide" style="background-image: url( <?php echo $imageURL['url']; ?> );">
		        	<?php if ($imageInfo !== ""){  ?>
			        	<div class="info clearfix">
			        		<div class="info-content"><?php echo $imageInfo; ?></div>
			        		<button class="info-icon">i</button>
			        	</div>
		        	<?php }	?>
		        	<?php if ($videoLink !== ""){  ?>
		        	<?php }	?>
		        </div>
		       
		   <?php endwhile; 
		else :
		    // no rows found
		endif;

		?>
		<div class="slide" style="background-color: black">
<!-- 			<i class="fa fa-play" aria-hidden="true"></i> -->
			<div class="video-container">
				<iframe width="560" height="315" src="https://www.youtube.com/embed/UkDDLp0CsOU?rel=0&amp;controls=0&amp;showinfo=0" frameborder="0" allowfullscreen></iframe>	
			</div>
			
		</div>
	</div>
    
	<?php endwhile; ?>
<?php endif; ?>
</main> <!-- /.main -->
<?php get_footer(); ?>