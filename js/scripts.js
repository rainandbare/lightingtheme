var app = {};
$(function(){
	console.log('its working');
	app.menuToggle();
	app.frontPageSlider();
	app.mobileMenu();
	app.toggleRequestPrintCatalogue();
	app.togglePhotoInfo();
});

app.menuToggle = function() {
	//hover functionality
	const width = $( window ).width();
	console.log(width);
	//have to reload when screen width changes
	if(width > 891){
		
		$('.toggleButton').on('mouseenter', function(){
			const $dropdown = $(this).parent().children('.dropdown-content');
			$dropdown.stop(true, true).slideDown();
		});

		$('.toggleButton').on('mouseleave', function(){
				//if the mouse is not on .dropdown-content
				if(!$(this).parent().children('.dropdown-content').is(":hover")){
					$(this).parent().children('.dropdown-content').slideUp();
				} 
		});

		$('.dropdown-content').on('mouseleave', function(){
			if(!$(this).parent().is(":hover")){
					$(this).slideUp();
			} 
		});
	}
	//click functionality
	//don't forget touchstart
}	
app.mobileMenu = function(){
	$('#mobile-menu-icon').on('click', function(){
		console.log('clicked');
		$('.fullscreen-nav').toggle();
	});
}
app.frontPageSlider = function() {
    $('.frontpage-slider').slick({
    	slidesToShow: 1,
  		slidesToScroll: 1,
    	dots: true,
    	arrows: false,
    	pauseOnFocus: false,
    	pauseOnHover: false,
    	speed: 900,
    	// autoplay: true,
  		autoplaySpeed: 9000,
    });
}
app.toggleRequestPrintCatalogue = function(){
	$('button#requestcatalogue').on('click', function(){
		console.log('clicked');
		$('#popup-requestcatalogue').show();
		$('#close-requestcatalogue').on('click', function(){
			$('#popup-requestcatalogue form').find("input[type=text], textarea").val("");
			$('#popup-requestcatalogue').hide();
		});
	});
}
app.togglePhotoInfo = function(){
	$('.info-icon').on('click', function(){

		$(this).parent().find('.info-content').slideToggle();
	});
}

