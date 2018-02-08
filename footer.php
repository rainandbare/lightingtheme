<footer>
<?php if(is_front_page()){ ?>
	<section class="footer-main">
  <?php } else { ?>
<div class="madeWithLove flex">Made with <i class="fa fa-heart" aria-hidden="true"></i> in Toronto</div>
<?php $frontpage_id = get_option( 'page_on_front' ); ?>
<?php $headerBackground = get_field('header_background_image', $frontpage_id); ?>
<section class="footer-main" style="background-image: url(<?php echo $headerBackground['url'] ?>);">
  <?php } ?>
	<div class="container hf-container">
		<section class="footer-menu flex">
			<?php suzette_footer_links(); ?>  
			<div class="footer-utilities-extras flex">
				<nav class="social-nav">
					<?php get_template_part( 'templates/nav', 'social') ?>
				</nav>
				<div class="catalogue-links flex">
					<?php get_template_part( 'templates/catalogue', 'links') ?>
				</div>
				<div class="newsletter">
					<div id="mc_embed_signup">
					<form action="https://visoinc.us2.list-manage.com/subscribe/post?u=06b249944dadd382cc0a2de04&amp;id=0754c2fbda" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate oneline-form searchform" target="_blank" novalidate>
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
			<nav class="social-nav">
				<?php get_template_part( 'templates/nav', 'social') ?>
			</nav>
		</section>
		<section class="sub-footer">
			<?php suzette_sub_footer_links(); ?>  
		</section>
	</div>
	<script type="text/javascript">
	    adroll_adv_id = "A52RJ6LSONGSLCUL46WE5H";
	    adroll_pix_id = "4WI3DF6ZM5FELGKE2GTR27";
	    /* OPTIONAL: provide email to improve user identification */
	    /* adroll_email = "username@example.com"; */
	    (function () {
	        var _onload = function(){
	            if (document.readyState && !/loaded|complete/.test(document.readyState)){setTimeout(_onload, 10);return}
	            if (!window.__adroll_loaded){__adroll_loaded=true;setTimeout(_onload, 50);return}
	            var scr = document.createElement("script");
	            var host = (("https:" == document.location.protocol) ? "https://s.adroll.com" : "http://a.adroll.com");
	            scr.setAttribute('async', 'true');
	            scr.type = "text/javascript";
	            scr.src = host + "/j/roundtrip.js";
	            ((document.getElementsByTagName('head') || [null])[0] ||
	                document.getElementsByTagName('script')[0].parentNode).appendChild(scr);
	        };
	        if (window.addEventListener) {window.addEventListener('load', _onload, false);}
	        else {window.attachEvent('onload', _onload)}
	    }());
	</script>
</footer>
<!--Start of Tawk.to Script-->
<script type="text/javascript">
var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
(function(){
var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
s1.async=true;
s1.src='https://embed.tawk.to/5a57c34a4b401e45400c041b/default';
s1.charset='UTF-8';
s1.setAttribute('crossorigin','*');
s0.parentNode.insertBefore(s1,s0);
})();
</script>
<!--End of Tawk.to Script-->

<?php wp_footer(); ?>
</body>
</html>	