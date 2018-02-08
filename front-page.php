<?php get_header();  ?>
<main class="main-home">
<?php if ( have_posts() ) : ?>
	<?php while ( have_posts() ) : the_post(); ?>   
	<?php $sliderSpeed = get_field('slider_speed')*1000;?>
	<div class="frontpage-slider" data-slideSpeed="<?php echo $sliderSpeed ?>">
		<?php
		if( have_rows('slider') ):
		    while ( have_rows('slider') ) : the_row();
		      	if (get_row_layout() == 'image'){ 
		      		$imageURL = get_sub_field('image');  
			        $imageInfo = get_sub_field('info'); 
			        $imageLink = get_sub_field('link'); 
			        $iconColor = get_sub_field('info_icon_color')?>
			        <div class="slide" style="background-image: url( <?php echo $imageURL['url']; ?> );">
			        	<?php if ($imageLink !== ""){  ?>
			        		<a class="slide-link" href="<?php echo $imageLink; ?>"></a>
			        	<?php }	?>
			        	<?php if ($imageInfo !== ""){  ?>
				        	<div class="info clearfix">
				        		<div class="info-content"><?php echo $imageInfo; ?></div>
				        		<button class="info-icon">
									<svg viewBox="0 0 82 168" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
									    <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
									        <path d="M42.4589293,0.1739671 C47.4392187,0.1739671 51.6783301,1.91779203 55.1763905,5.40549419 C58.674451,8.89319636 60.423455,13.1197551 60.423455,18.0852971 C60.423455,23.0508392 58.674451,27.3069543 55.1763905,30.8537701 C51.6783301,34.4005858 47.4392187,36.1739671 42.4589293,36.1739671 C37.4786398,36.1739671 33.2098843,34.4005858 29.6525347,30.8537701 C26.0951851,27.3069543 24.316537,23.0508392 24.316537,18.0852971 C24.316537,13.1197551 26.065541,8.89319636 29.5636014,5.40549419 C33.0616619,1.91779203 37.3600615,0.1739671 42.4589293,0.1739671 Z M57.2218563,52.3968635 L57.2218563,141.858349 C57.2218563,148.827304 57.9629597,153.466452 59.4451887,155.775931 C60.9274177,158.08541 63.1210838,159.807365 66.0262526,160.941846 C68.9314214,162.076327 74.2377217,162.643559 81.9453125,162.643559 L81.9453125,167.019392 L2.79467947,167.019392 L2.79467947,162.643559 C10.7394269,162.643559 16.0753713,162.116843 18.8026727,161.063397 C21.529974,160.00995 23.6939959,158.267737 25.2948032,155.836707 C26.8956106,153.405676 27.6960022,148.74627 27.6960022,141.858349 L27.6960022,98.9508704 C27.6960022,86.8767508 27.1624078,79.0570524 26.0952029,75.4915405 C25.2651547,72.898441 23.9608127,71.0954536 22.1821379,70.0825241 C20.4034631,69.0695946 17.972644,68.5631374 14.8896077,68.5631374 C11.5694147,68.5631374 7.53781228,69.170886 2.79467947,70.3864014 L0.304547198,66.0105679 L49.3957263,52.3968635 L57.2218563,52.3968635 Z" id="i" fill="<?php echo $iconColor;?>"></path>
									    </g>
									</svg>
				        		</button>
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
		endif; ?>
	</div>
    <div class="blurb">
		<?php the_field('front_page_content'); ?>
	</div>
	<?php endwhile; ?>
<?php endif; ?>
</main> <!-- /.main -->
<?php get_footer(); ?>