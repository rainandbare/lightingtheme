<footer>
	<div class="container hf-container">
		<section class="footer-menu flex">
			<?php suzette_footer_links(); ?>  
			<div class="madeWithLove flex">Made with <i class="fa fa-heart" aria-hidden="true"></i> in Toronto</div>
		</section>
		<section class="footer-utilities flex">
			<div class="footer-utilities-address flex">
				<div class="HQLogo">
					<i class="fa fa-map-marker" aria-hidden="true"></i>
					<h6>HQ</h6>
				</div>
				<div class="address-container">
					<h6>Toronto</h6>
					<div class="address flex">
						<address class="longAddress">
							388 Carlaw Ave. Suite 207<br>
							Toronto, ON M4M 2T4<br>
							Canada
						</address>
						<div class="contact">
							E. info@visoinc.com<br>
							P. +1 416.461.8476<br>
							F. +1 416.439.1603
						</div>
					</div>
				</div>
				<div class="address-container">
					<h6>Portugal</h6>
					<div class="address flex">
						<address>
							Doroana Park, Nave 4<br>
							Regueira de Pontes<br>
							2415-199 Leiria
						</address>
						<div class="contact">
							E. info@visoinc.com<br>
							P. +351.244.236.842
						</div>
					</div>
				</div>
			</div>
			<div class="footer-utilities-extras flex">
				<nav class="social-nav">
					<?php get_template_part( 'templates/nav', 'social') ?>
				</nav>
				<div class="catalogue-links flex">
					<?php 
		            $frontpage_id = get_option( 'page_on_front' );
		            $catalogueURL = get_field( "catalogue_upload", $frontpage_id ); ?>
		            <a class="btn" href="<?= $catalogueURL; ?>" download="" target="_blank">DOWNLOAD CATALOGUE</a>
					<button id="requestcatalogue" class="btn">Request Print Catalogue</button>
					<div id="popup-requestcatalogue" class="popup popup-window printcalenderpopup">
						<div class="popup-form">
							<button id="close-requestcatalogue" class="popup-close"><i class="fa fa-close" aria-hidden="true"></i></button>
							<h3>Request Print Catalogue</h3>
							<?php echo do_shortcode( '[contact-form-7 id="25530" title="Request Hard Copy_copy"]' ) ?>
						</div>
					</div>
				</div>
				<div class="newsletter">
					<!-- <form action="" class="oneline-form flex">
						<input type="text" placeholder="Get Inspired with our Newsletter!">
						<input type="submit" class="fa" value="&#xf0da;">
					</form> -->
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