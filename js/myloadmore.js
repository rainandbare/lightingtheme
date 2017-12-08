jQuery(function(a){a("#loadMorePosts").click(function(){var e=a(this),o={action:"loadmore",query:misha_loadmore_params.posts,page:misha_loadmore_params.current_page};a.ajax({url:misha_loadmore_params.ajaxurl,data:o,type:"POST",beforeSend:function(a){e.text("Loading...")},success:function(a){a?(e.is(".basic-archive-load"),e.text("Load More").prev().append(a),++misha_loadmore_params.current_page==misha_loadmore_params.max_page&&e.remove()):e.remove()}})})});
// jQuery(function($){
// 	$('#loadMorePosts').click(function(){
 
// 		var button = $(this),
// 		    data = {
// 			'action': 'loadmore',
// 			'query': misha_loadmore_params.posts, // that's how we get params from wp_localize_script() function
// 			'page' : misha_loadmore_params.current_page
// 		};
 
// 		$.ajax({
// 			url : misha_loadmore_params.ajaxurl, // AJAX handler
// 			data : data,
// 			type : 'POST',
// 			beforeSend : function ( xhr ) {
// 				button.text('Loading...'); // change the button text, you can also add a preloader image
// 			},
// 			success : function( data ){
// 				if( data ) { 
// 					if( button.is('.basic-archive-load') ){
// 						button.text( 'Load More' ).prev().append(data); // insert new posts
// 					} else {
// 						button.text( 'Load More' ).prev().append(data); // insert new posts
						
// 					};

// 					misha_loadmore_params.current_page++;
 
// 					if ( misha_loadmore_params.current_page == misha_loadmore_params.max_page ) 
// 						button.remove(); // if last page, remove the button
// 				} else {
// 					button.remove(); // if no data, remove the button as well
// 				}
// 			}
// 		});
// 	});
// });