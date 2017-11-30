<div class="sidebar">
	<ul>
		<?php $frontpage_id = get_option( 'page_on_front' );
		// The Query
		$args = array(
				'page_id' => $frontpage_id,
			);
		$social_query = new WP_Query( $args );
		
		// The Loop
		if ( $social_query->have_posts() ) { while ( $social_query->have_posts() ) { $social_query->the_post();
				if( have_rows('social_links') ):
				    while ( have_rows('social_links') ) : the_row(); 
						//the_sub_field('social_type');
						if( get_sub_field('social_type') === 'fa-twitter') {
 							$twitterURL = get_sub_field('link');
  						}
				    endwhile;
				endif;
			} //endwhile
			/* Restore original Post Data */
			wp_reset_postdata();
		} else {
			// no posts found
		}
		?>
		<?php //echo $twitterURL; ?>
		<li>
			<a class="twitter-timeline" href=" <?php echo $twitterURL; ?> "></a> 
			<script async src="//platform.twitter.com/widgets.js" charset="utf-8"></script>
		</li>
		
	</ul>
</div>
	
