		
var app = {};

if (!Array.from) {
  Array.from = (function () {
    var toStr = Object.prototype.toString;
    var isCallable = function (fn) {
      return typeof fn === 'function' || toStr.call(fn) === '[object Function]';
    };
    var toInteger = function (value) {
      var number = Number(value);
      if (isNaN(number)) { return 0; }
      if (number === 0 || !isFinite(number)) { return number; }
      return (number > 0 ? 1 : -1) * Math.floor(Math.abs(number));
    };
    var maxSafeInteger = Math.pow(2, 53) - 1;
    var toLength = function (value) {
      var len = toInteger(value);
      return Math.min(Math.max(len, 0), maxSafeInteger);
    };

    // The length property of the from method is 1.
    return function from(arrayLike/*, mapFn, thisArg */) {
      // 1. Let C be the this value.
      var C = this;

      // 2. Let items be ToObject(arrayLike).
      var items = Object(arrayLike);

      // 3. ReturnIfAbrupt(items).
      if (arrayLike == null) {
        throw new TypeError("Array.from requires an array-like object - not null or undefined");
      }

      // 4. If mapfn is undefined, then let mapping be false.
      var mapFn = arguments.length > 1 ? arguments[1] : void undefined;
      var T;
      if (typeof mapFn !== 'undefined') {
        // 5. else
        // 5. a If IsCallable(mapfn) is false, throw a TypeError exception.
        if (!isCallable(mapFn)) {
          throw new TypeError('Array.from: when provided, the second argument must be a function');
        }

        // 5. b. If thisArg was supplied, let T be thisArg; else let T be undefined.
        if (arguments.length > 2) {
          T = arguments[2];
        }
      }

      // 10. Let lenValue be Get(items, "length").
      // 11. Let len be ToLength(lenValue).
      var len = toLength(items.length);

      // 13. If IsConstructor(C) is true, then
      // 13. a. Let A be the result of calling the [[Construct]] internal method of C with an argument list containing the single item len.
      // 14. a. Else, Let A be ArrayCreate(len).
      var A = isCallable(C) ? Object(new C(len)) : new Array(len);

      // 16. Let k be 0.
      var k = 0;
      // 17. Repeat, while k < len… (also steps a - h)
      var kValue;
      while (k < len) {
        kValue = items[k];
        if (mapFn) {
          A[k] = typeof T === 'undefined' ? mapFn(kValue, k) : mapFn.call(T, kValue, k);
        } else {
          A[k] = kValue;
        }
        k += 1;
      }
      // 18. Let putStatus be Put(A, "length", len, true).
      A.length = len;
      // 20. Return A.
      return A;
    };
  }());
}


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
	app.conditionalInputs();
	app.frontPageArrows();
	app.smoothScollToHash();
});

app.width = window.innerWidth;
app.windowResize = function(){

	$( window ).resize(function() {
		app.frontPageArrows();
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
app.smoothScollToHash = function(){
	if(window.location.hash) {

    var offset = -250;

    // smooth scroll to the anchor id
    $('html, body').animate({
        scrollTop: ($(window.location.hash).offset().top + offset) + 'px'
    }, 1000, 'swing');
	}    
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
}	
app.mobileMenu = function(){
	$('#mobile-menu-icon').on('click', function(){
		$('.fullscreen-nav').toggle();
		$('#nav-icon4').toggleClass('open');
	});
}
app.frontPageSlider = function() {
	var speed = $('.frontpage-slider').data('slideSpeed');
    $('.frontpage-slider').slick({
    	slidesToShow: 1,
  		slidesToScroll: 1,
    	dots: true,
    	pauseOnFocus: false,
    	pauseOnHover: false,
    	speed: 900,
    	autoplay: true,
  		autoplaySpeed: speed,
  		responsive: [
		    {
		      breakpoint: 890,
		      settings: {
		        arrows: false,
		      },
		    }]
    });

    // On before slide change
    $('.frontpage-slider').on('beforeChange', function(event, slick, currentSlide, nextSlide){
		$('.info-content').slideUp();
		$('.info-icon').each(function(i){
			$(this).removeClass('toggled');
		});
	});


}
app.frontPageArrows = function(){
	if($('body').hasClass('home')){
	    var dotsUl = document.getElementsByClassName('slick-dots');
	    dotsUl[0].addEventListener('click', function(e){
			console.dir(e.target);
			if (e.target.nodeName === 'UL'){
				var firstChild = e.target.children[0];
				var lastChild = e.target.children[e.target.children.length - 1];
				if((e.offsetX < firstChild.offsetLeft) && (e.offsetX > firstChild.offsetLeft - 50) ){
					console.log('previous pic');
					$('.frontpage-slider').slick('slickGoTo', parseInt($('.frontpage-slider').slick('slickCurrentSlide'))-1);

				}
				if ((e.offsetX > lastChild.offsetLeft) && (e.offsetX < lastChild.offsetLeft + 50)){
					console.log('next pic');
					$('.frontpage-slider').slick('slickGoTo', parseInt($('.frontpage-slider').slick('slickCurrentSlide'))+1);

				}
			}
		});
	}
	
}
app.collectionSlider = function() {
    
	$('.collection-slider').slick({
		dots: true
	});
	$('.project-thumbnails-slider').slick();
	//on click of variation image
	$('.variation').on('click', function(){
		if($(this).data('finish') !== 'none'){
			//get variation name
			const name = $(this).data('finish');
			console.log(name, 'hi');
			var slideIndex = $( '#' + name ).parent().index();
			console.log(slideIndex);
			if(slideIndex !== 0){
				slideIndex--
			}
			const slider = $( '.collection-slider' );
			slider[0].slick.slickGoTo(parseInt(slideIndex));
			highlightVariation();
		}

	});
	highlightVariation();

	function highlightVariation(){

		var cur = $('.collection-slider .slick-current div').attr('id')
		$
		('.variation').each(function(i){
			const finishName = $(this).data('finish');
			if (finishName === cur){
				$(this).addClass('selected-variation');
			} else {
				$(this).removeClass('selected-variation');

			}
		});
	}
	$('.project-slider').on('init reInit beforeChange', function(event, slick, currentSlide, nextSlide){
	  $('#total').text(slick.slideCount);
	  var i = (currentSlide ? currentSlide : 0) + 1;
	  $('#current').text(i);
	});	
	$('.project-slider').slick({
	  slidesToShow: 2,
	  slidesToScroll: 1,
	  centerMode: true,
	  variableWidth: true,
	  responsive: [
				    {
				      breakpoint: 767,
				      settings: "unslick"

				    }
				  ]
	});
	// $('.project-slider').slick('getSlick');
	$('.project-slider-under2').on('init reInit beforeChange', function(event, slick, currentSlide, nextSlide){
	  $('#total').text(slick.slideCount);
	  var i = (currentSlide ? currentSlide : 0) + 1;
	  $('#current').text(i);
	});	

	$('.project-slider-under2').slick({
		dots: false,
		responsive: [
			    {
			      breakpoint: 767,
			      settings: "unslick"

			    }
	  ]
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
			$('.collections-project-slider').html('').removeClass('project-slider-under2');
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
			console.log(data, id);
			$('#projectTitle').append(data[id]['title']);
			var imageURLs = data[id]['images'];
			var credits = data[id]['credits'];

			$('#total').text(imageURLs.length);
			//for each image in the image array - append a div with an image inside it to collections-project-slider

			imageURLs.forEach(function(url){

				if((imageURLs.length === 2) && ($(window).width() >= 767)){
					var html = '<div class="slide" style="background-image: url(' + url + ')"></div>'
				} else {
					var html = "<div><img class='slide' src='" + url + "'/></div>";
				}
				$('.collections-project-slider').append(html);
			});
			
			if(imageURLs.length > 2){
				$('.collections-project-slider').slick({
					slidesToShow: 1,
	  				slidesToScroll: 1,
					variableWidth: true,
					centerMode: false,
					arrows: true,
					infinite: true,
					responsive: [
							    {
							      breakpoint: 767,
							      settings: "unslick"

							    }
							  ]
				});
			} else if(imageURLs.length === 2){
				// console.log(imageURLs.length)
				$('.collections-project-slider').slick({
					dots: false,
					responsive: [
				    {
				      breakpoint: 767,
				      settings: "unslick"

				    }
				  ]
				}).addClass('project-slider-under2');

			} else {
				$('.collections-project-slider img').css('margin', '5px auto');
			}
			// //for each credit in the credit array - append an li with an h5 and an h6 inside of it
			var titles = Object.keys(credits);
			// console.log(titles)
			for (var i = titles.length - 1; i >= 0; i--) {
				const html = "<li><h5>" + titles[i] + "</h5><h6>" + credits[titles[i]] + "</h6</li>";
				$('section.project-credits ul').prepend(html);
			}
			$('.collections-project-slider').on('beforeChange', function(event, slick, currentSlide, nextSlide){
			  $('#current').text(nextSlide + 1);
			});
			$('#project-popup').fadeIn('fast', function(){
				if($('.collections-project-slider').hasClass('slick-slider')){
					$('.collections-project-slider').slick('setPosition');
				}
			});
			
			$('#close-project-popup').on('click', function(){
				$('#project-popup').fadeOut('fast', function(){
					$('#projectTitle').text('');
					$('section.project-credits ul').html('');
					if(imageURLs.length > 1){
						$('.collections-project-slider').slick('unslick');
						console.log('collections unslicked')
					} else if (imageURLs.length = 2){
						$('.collections-project-slider').removeClass('project-slider-under2');
					}
					$('.collections-project-slider').html('').removeClass('project-slider-under2');
					$('#current').text(1);
				});
			});
		}
	});
}
app.togglePhotoInfo = function(){
	$('.info-icon').on('click', function(){
		$(this).toggleClass('toggled');
		$(this).parent().find('.info-content').slideToggle();

	});
	$('.info-content').on('click', function(){
		$(this).parent().find('.info-icon').removeClass('toggled');
		$(this).slideUp();
	});
}


app.videoLazyLoad = function(){
	var youtube = document.querySelectorAll( ".youtube" );
	for (var i = 0; i < youtube.length; i++) {
		var source = "https://img.youtube.com/vi/"+ youtube[i].dataset.embed +"/sddefault.jpg";
		var image = new Image();
				image.src = source;
				image.addEventListener( "load", function() {
					// youtube[ i ].appendChild( image );
					// youtube[ i ].css("background-image", "url(" + image + ")");  
					youtube[ i ].style.backgroundImage = "url(" + image.src + ")";
				}( i ) );
				youtube[i].addEventListener( "click", function() {
					console.log('clickec')
					var iframe = document.createElement( "iframe" );
					iframe.setAttribute( "frameborder", "0" );
					iframe.setAttribute( "allowfullscreen", "" );
					iframe.setAttribute( "src", "https://www.youtube.com/embed/"+ this.dataset.embed +"?rel=0&showinfo=0&autoplay=1&controls=0" );
					this.innerHTML = "";
					this.appendChild( iframe );
					const youtubeDIV = this;
					$('.frontpage-slider')
						.slick('slickPause')
						.css('z-index', 10)
						.on('beforeChange', function(event, slick, currentSlide, nextSlide){
							youtubeDIV.innerHTML = '<div class="play-button"></div>';
							$(this).css('z-index', 0);
						});
				} );	
	};
}

app.sortCustomTaxonomies = function(){
	//dropdown menu functionality
	DropDown($('#sortCollections'));
	
	function DropDown(el) {

	    this.dd = el;
	    this.placeholder = this.dd.children('span');
	    this.opts = this.dd.find('ul.dropdown > li');
	    this.val = '';
	    this.index = -1;

	    var obj = this;

        obj.dd.on('click', function(event){
        	// console.log(this)
            $(this).toggleClass('active').find('.dropdown').slideToggle();
            return false;
        });

        obj.opts.on('click',function(){
            var opt = $(this);
            obj.val = opt.text();
            obj.index = opt.index();
            obj.placeholder.text('Filter - ' + obj.val);
            obj.category = opt.attr('id');
            changeResults(obj.category);
        });
	}
	function changeResults(category) {
		var articles = document.getElementById('sortArticles').children;
		var fakei = 1;
		for (var i = articles.length - 1; i >= 0; i--) {
			//remove anyone who is hidden
			articles[i].classList.remove('hide', 'actually1column');
			if (Array.from(articles[i].dataset.type.split(' ')).indexOf(category) === -1) {
				articles[i].classList.add('hide');
			} else {
				if(category != 'all'){
					articles[i].classList.add('actually1column');
				}
				// console.log(fakei)
				// if( (fakei+1) % 2 === 0){
				// 	//every 2nd - 1 article (2 span)
				// 	articles[i].classList.add('actually2column');
				// 	console.log('2 column');
				// }
				// if( fakei % 3 === 0){
				// 	//every 3rd article (1 span)
				// 	articles[i].classList.add('actually3column');
				// 	console.log('3 column');
				// }
				// fakei++;
			};
		}
			

	}

}
app.toggleInfo = function(){
	$('.toggledown').on('click', function(e){
		if(e.target.nodeName !== 'A' ){
			$(this).find('.see-more').slideToggle();
	  		$(this).find('.circle').toggleClass('toggled');
		}
	});
	var html = "<div class='circle'><div class='x'></div></div>"
	$('.suzette-toggle').prepend(html);
	$('.suzette-toggle h5').on('click', function(e){
	  	$(this).parent().find('.circle').toggleClass('toggled');
	});
}
app.conditionalInputs = function(){

	showConditionalInput($('select[name="project-type"]'), 'select[name="project-type"] option:selected', 'Other', $('#project-elaboration'));
	showConditionalInput($('input[name="checkboxes"]'), 'input:checked', 'yes', $('#customization-elaboration'));
	
	function showConditionalInput(element, currentOption, requiredOption, hiddenInput){
		element.on('change', function(){
			const isTrue = $(currentOption).val() === requiredOption ? true : false;
			console.log(isTrue);
		if (isTrue){
			hiddenInput.slideDown();
		} else {
			hiddenInput.slideUp();
		}
	});
	}
}
