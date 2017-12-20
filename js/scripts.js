var app = {};
$(function(){
	console.log('its working');
	app.menuToggle();
	app.windowResize();
	app.frontPageSlider();
	app.collectionSlider();
	app.mobileMenu();
	app.toggleRequestPrintCatalogue();
	app.toggleProjectsDetail();
	app.togglePhotoInfo();
	app.videoLazyLoad();
	app.sortCustomTaxonomies();
	app.toggleInfo();
});
app.width = window.innerWidth;
app.windowResize = function(){

	$( window ).resize(function() {
		var originalWidth = app.width;
		app.width = window.innerWidth;
		//if the window size transitions from over 891 to under 891
		if((originalWidth >= 891) && (app.width < 891)){
			$('.dropdown-content').show();
			$('.fullscreen-nav').css('display', 'none');

		}
		//if the window size transitions from under 891 to over 891
		if((originalWidth <= 890) && (app.width > 890)){
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
		$('.fullscreen-nav').toggle();
		$('#nav-icon4').toggleClass('open');
	});
}
app.frontPageSlider = function() {
    $('.frontpage-slider').slick({
    	slidesToShow: 1,
  		slidesToScroll: 1,
    	dots: true,
    	pauseOnFocus: false,
    	pauseOnHover: false,
    	speed: 900,
    	autoplay: true,
  		autoplaySpeed: 9000,
    });

    // On before slide change
    $('.frontpage-slider').on('afterChange', function(event, slick, currentSlide, nextSlide){
		$('.info-content').slideUp();
		//stop video
	});

}
app.collectionSlider = function() {
    
	$('.collection-slider').slick({
	  slidesToShow: 1,
	  slidesToScroll: 1,
	  dots: true,
	  variableWidth: true
	});

	//on click of variation image
	$('.variation').on('click', function(){
		//get variation name
		const name = $(this).data('finish');
		const slideIndex = $( 'img.slide#' + name ).parent().index();
		console.log(slideIndex - 1);
		var slider = $( '.collection-slider' );
		slider[0].slick.slickGoTo(parseInt(slideIndex - 1));
	})

	
	$('.project-slider').slick({
	  slidesToShow: 3,
	  slidesToScroll: 2,
	  dots: true,
	  centerMode: true,
	  variableWidth: true
	});

	

}
app.toggleRequestPrintCatalogue = function(){
	$('button#requestcatalogue, button#requestcatalogueseemore').on('click', function(){
		console.log('hello');
		$('#popup-requestcatalogue').fadeIn('fast');
		$('#close-requestcatalogue').on('click', function(){
			$('#popup-requestcatalogue form').find("input[type=text], textarea").val("");
			$('#popup-requestcatalogue').fadeOut('fast');
		});
	});
}
app.toggleProjectsDetail = function(){
	$('.project-thumbnails li').on('click', function(){
		//get data
		const id = parseInt($(this).data('project'));
		const data = JSON.parse($('#projectJSON').text());
		const projectIDS = Object.keys(data)
		var currentProjectIndex = projectIDS.indexOf(id + '')

		initProject(id);

		$('#nextProject').click(function(){
			$('#projectTitle').text('');
			$('section.project-credits ul').html('');
			if($('.collections-project-slider').hasClass('slick-initialized')){
				$('.collections-project-slider').slick('unslick');
			}
			$('.collections-project-slider').html('');
			$('#current').text(1);
			if (currentProjectIndex + 1 >= projectIDS.length){
				var nextProjectIndex = 0;
			} else {
				var nextProjectIndex = currentProjectIndex + 1;
			}
			var nextProjectID = parseInt(projectIDS[nextProjectIndex]);	
			currentProjectIndex = nextProjectIndex;	

			initProject(nextProjectID);
		});

		function initProject(id){
			$('#projectTitle').append(data[id]['title']);
			var imageURLs = data[id]['images'];
			var credits = data[id]['credits'];

			$('#total').text(imageURLs.length);
			//for each image in the image array - append a div with an image inside it to collections-project-slider
			imageURLs.forEach(function(url){
				const html = "<div><img class='slide' src='" + url + "'/></div>";
				$('.collections-project-slider').append(html);
			});
			if(imageURLs.length > 1){
				$('.collections-project-slider').slick({
					variableWidth: true,
					centerMode: true
				});
			} else {
				$('.collections-project-slider img').css('margin', 'auto');
			}
			//for each credit in the credit array - append an li with an h5 and an h6 inside of it
			var titles = Object.keys(credits);
				for (var i = titles.length - 1; i >= 0; i--) {
					const html = "<li><h5>" + titles[i] + "</h5><h6>" + Object.values(credits)[i] + "</h6</li>";
					$('section.project-credits ul').prepend(html);
				}
			$('.collections-project-slider').on('beforeChange', function(event, slick, currentSlide, nextSlide){
			  $('#current').text(nextSlide + 1);
			});
			$('#project-popup').fadeIn('fast');
			$('#close-project-popup').on('click', function(){
				$('#project-popup').fadeOut('fast', function(){
				//once finished
					$('#projectTitle').text('');
					$('section.project-credits ul').html('');
					if(imageURLs.length > 1){
						$('.collections-project-slider').slick('unslick');
					}
					$('.collections-project-slider').html('');
					$('#current').text(1);

				});
			});
		}




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
					$('.frontpage-slider').slick('slickPause');
				} );	
	};
}

app.sortCustomTaxonomies = function(){
	//dropdown menu functionality
	function DropDown(el) {
	    this.dd = el;
	    this.placeholder = this.dd.children('span');
	    this.opts = this.dd.find('ul.dropdown > li');
	    this.val = '';
	    this.index = -1;

	    var obj = this;

        obj.dd.on('click', function(event){
            $(this).toggleClass('active');
            return false;
        });

        obj.opts.on('click',function(){
            var opt = $(this);
            obj.val = opt.text();
            obj.index = opt.index();
            obj.placeholder.text('Filter By: ' + obj.val);
            obj.category = opt.attr('id');
            changeResults(obj.category);
        });
	}


	function changeResults(category) {
		var articles = document.getElementById('sortArticles').children;
		
		for (var i = articles.length - 1; i >= 0; i--) {
			articles[i].classList.remove('hide');
			// console.dir(articles[i].dataset.type.split(' '))

			if (!Array.from(articles[i].dataset.type.split(' ')).includes(category)) {
				articles[i].classList.add('hide');
				console.log(articles[i])
			};
		}
	}
	DropDown($('#sortCollections'));
}
app.toggleInfo = function(){
	$('.toggledown').on('click', function(){
		$(this).find('.see-more').slideToggle();
  		$(this).find('.circle-plus').toggleClass('opened');
	});
}