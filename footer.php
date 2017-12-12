<footer>
	<div class="container hf-container">
		<section class="footer-menu flex">
			<?php suzette_footer_links(); ?>  
			<div class="madeWithLove flex">Made with <i class="fa fa-heart" aria-hidden="true"></i> in Toronto</div>
		</section>
		<section class="footer-utilities flex">
			<div class="footer-utilities-left flex">
				<div class="HQLogo">
					<i class="fa fa-map-marker" aria-hidden="true"></i>
					<h6>HQ</h6>
				</div>
				<div class="footer-utilities-address flex">
					<div class="HQLogoMobile">
						<i class="fa fa-map-marker" aria-hidden="true"></i>
						<h6>HQ</h6>
					</div>
					<?php $frontpage_id = get_option( 'page_on_front' );
    					if( have_rows('addresses', $frontpage_id ) ):
    					    while ( have_rows('addresses') ) : the_row(); 
    					    	if( have_rows('address_group') ): 
    					    		while ( have_rows('address_group') ) : the_row(); ?>
								<div class="address-container">
									<h6><?php the_sub_field('location_title'); ?></h6>
									<?php if( have_rows('address') ): ?>
										<div class="address flex">
											<address>
			    					    		<?php while ( have_rows('address') ) : the_row(); 
			    					       		$addressLine = get_sub_field('address_line'); 
			    					       		echo $addressLine . "<br>"; ?>
    					 						<?php  endwhile; ?>
    					 					</address>
    					 			<?php endif;  ?>
    					 			<?php if( have_rows('conact_info') ): ?>
											<div class="contact">
			    					    		<?php while ( have_rows('conact_info') ) : the_row(); 
			    					       		$type = get_sub_field('type'); 
			    					       		$info = get_sub_field('info');
			    					       		echo $type . ". " . $info . "<br>"; ?>
    					 						<?php  endwhile; ?>
    					 					</div>
    					 			<?php endif;  ?>
    					 				</div>
								</div>
    					  		<?php endwhile; endif;  ?>
    					<?php endwhile; endif;  ?>
				</div>
			</div>
			<div class="footer-utilities-extras flex">
				<nav class="social-nav">
					<?php get_template_part( 'templates/nav', 'social') ?>
				</nav>
				<div class="catalogue-links flex">
					<?php get_template_part( 'templates/catalogue', 'links') ?>
				</div>
				<div class="newsletter">
					<!-- <form action="" class="oneline-form flex">
						<input type="text" placeholder="Get Inspired with our Newsletter!">
						<input type="submit" class="fa" value="&#xf0da;">
					</form>
					<!-- Begin MailChimp Signup Form -->
					<div id="mc_embed_signup">
					<form action="https://visoinc.us2.list-manage.com/subscribe/post?u=06b249944dadd382cc0a2de04&amp;id=0754c2fbda" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate oneline-form" target="_blank" novalidate>
					    <div id="mc_embed_signup_scroll" class="flex">
							<div class="mc-field-group">
								<input type="email" value="" name="EMAIL" class="mainInput required email" id="mce-EMAIL" placeholder="Get Inspired with our Newsletter!">
							</div>
							<div id="mce-responses" class="clear">
								<div class="response" id="mce-error-response" style="display:none"></div>
								<div class="response" id="mce-success-response" style="display:none"></div>
							</div>    
							<!-- real people should not fill this in and expect good things - do not remove this or risk form bot signups-->
					    	<div style="position: absolute; left: -5000px;" aria-hidden="true">
					    		<input type="text" name="b_06b249944dadd382cc0a2de04_0754c2fbda" tabindex="-1" value="">
					    	</div>
					    	<input type="submit" value="&#xf0da;" name="subscribe" id="mc-embedded-subscribe" class="button fa">
					    </div>
					</form>
					</div>
				<!--End mc_embed_signup-->
				</div>
			</div>
		</section>
		<section class="midsized-footer">
			<div class="madeWithLove flex">Made with <i class="fa fa-heart" aria-hidden="true"></i> in Toronto</div>
			<nav class="social-nav">
				<?php get_template_part( 'templates/nav', 'social') ?>
			</nav>
		</section>
		<section class="sub-footer">
			<?php suzette_sub_footer_links(); ?>  
		</section>
	</div>
</footer>
<script>
/* Google Analytics! */
 var _gaq=[["_setAccount","UA-XXXXX-X"],["_trackPageview"]]; // Change UA-XXXXX-X to be your site's ID
 (function(d,t){var g=d.createElement(t),s=d.getElementsByTagName(t)[0];g.async=1;
 g.src=("https:"==location.protocol?"//ssl":"//www")+".google-analytics.com/ga.js";
 s.parentNode.insertBefore(g,s)}(document,"script"));
</script>

<?php wp_footer(); ?>
</body>
</html>	