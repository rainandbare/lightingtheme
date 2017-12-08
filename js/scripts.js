var app = {};
$(function(){
	console.log('its working');
	app.menuToggle();
	app.windowResize();
	app.frontPageSlider();
	app.collectionSlider();
	app.mobileMenu();
	app.toggleRequestPrintCatalogue();
	app.togglePhotoInfo();
	app.videoLazyLoad();
	app.sortCustomTaxonomies();
});
app.width = window.innerWidth;
app.windowResize = function(){

	$( window ).resize(function() {
		var originalWidth = app.width;
		app.width = window.innerWidth;
		console.log(originalWidth, app.width);
		//if the window size transitions from over 891 to under 891
		if((originalWidth >= 891) && (app.width < 891)){
			console.log('do the mobile deed');
			$('.dropdown-content').show();
			$('.fullscreen-nav').css('display', 'none');

		}
		//if the window size transitions from under 891 to over 891
		if((originalWidth <= 890) && (app.width > 890)){
			console.log('desktop alert alert!!');
			$('.dropdown-content').hide();
			$('.fullscreen-nav').css('display', 'flex');
			$('#nav-icon4').removeClass('open');
		}
	});

}
app.menuToggle = function() {
	//hover functionality
	//have to reload when screen width changes
	
		$('.toggleButton').mouseenter(function(){
			if(app.width >= 891){
			    clearTimeout($(this).data('timeoutId'));
			    $(this).parent().children('.dropdown-content').stop(true, true).slideDown("slow");
			}
		}).mouseleave(function(){
			if(app.width >= 891){
			    var toggleButton = $(this),
			        timeoutId = setTimeout(function(){
			            toggleButton.parent().children('.dropdown-content').slideUp("slow");
			        }, 100);
			    //set the timeoutId, allowing us to clear this trigger if the mouse comes back over
			    toggleButton.data('timeoutId', timeoutId); 
			}
		});

		$('.dropdown-content').mouseenter(function(){
			if(app.width >= 891){
				clearTimeout($(this).parent().children('.toggleButton').data('timeoutId'));
			}
		}).mouseleave(function(){
			if(app.width >= 891){
			    var toggleButton = $(this).parent().children('.toggleButton'),
			        timeoutId = setTimeout(function(){
			            toggleButton.parent().children('.dropdown-content').slideUp("slow");
			        }, 100);
			    //set the timeoutId, allowing us to clear this trigger if the mouse comes back over
			    toggleButton.data('timeoutId', timeoutId); 
			}
		});
	//click functionality
	//don't forget touchstart
}	
app.mobileMenu = function(){
	$('#mobile-menu-icon').on('click', function(){
		console.log('clicked');
		$('.fullscreen-nav').toggle();
		$('#nav-icon4').toggleClass('open');
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
    	autoplay: true,
  		autoplaySpeed: 9000,
    });
}
app.collectionSlider = function() {
    
 $('.collection-slider-feature').slick({
  slidesToShow: 1,
  slidesToScroll: 1,
  arrows: false,
  fade: true,
  asNavFor: '.collection-slider-nav'
});
$('.collection-slider-nav').slick({
  slidesToShow: 3,
  slidesToScroll: 1,
  asNavFor: '.collection-slider-feature',
  dots: true,
  centerMode: true,
  focusOnSelect: true
});
	
}
app.toggleRequestPrintCatalogue = function(){
	$('button#requestcatalogue').on('click', function(){
		$('#popup-requestcatalogue').fadeIn('fast');
		$('#close-requestcatalogue').on('click', function(){
			$('#popup-requestcatalogue form').find("input[type=text], textarea").val("");
			$('#popup-requestcatalogue').fadeOut('fast');
		});
	});
}
app.togglePhotoInfo = function(){
	$('.info-icon').on('click', function(){
		$(this).parent().find('.info-content').slideToggle();
	});
}


app.videoLazyLoad = function(){
	var youtube = document.querySelectorAll( ".youtube" );
	for (var i = 0; i < youtube.length; i++) {
		var source = "https://img.youtube.com/vi/"+ youtube[i].dataset.embed +"/sddefault.jpg";
		var image = new Image();
				image.src = source;
				image.addEventListener( "load", function() {
					youtube[ i ].appendChild( image );
				}( i ) );
				youtube[i].addEventListener( "click", function() {
					var iframe = document.createElement( "iframe" );
							iframe.setAttribute( "frameborder", "0" );
							iframe.setAttribute( "allowfullscreen", "" );
							iframe.setAttribute( "src", "https://www.youtube.com/embed/"+ this.dataset.embed +"?rel=0&showinfo=0&autoplay=1" );
							this.innerHTML = "";
							this.appendChild( iframe );
				} );	
	};
}

app.sortCustomTaxonomies = function(){
	$('#sortTypesList button').on("click", function(){
		var category = $(this).attr('id');
		console.log(category);
		
		var articles = document.getElementById('sortArticles').children;
		
		for (var i = articles.length - 1; i >= 0; i--) {
			articles[i].classList.remove('hide');
			if (!Array.from(articles[i].classList).includes(category)) {
				articles[i].classList.add('hide');
				console.log(articles[i])
			};
		}
		//hide all the articles that do not match the class of the li
	});
}
