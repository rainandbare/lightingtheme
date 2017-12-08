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