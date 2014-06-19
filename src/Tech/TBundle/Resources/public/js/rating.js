// JavaScript Document
/*************************************************
Star Rating System
Modified Version: 17 February, 2009
Author: Ritesh Agrawal
Modified by: Miguel Manchego
Inspriation: Will Stuckey's star rating system (http://miguelmanchego.com/wp-content/demos/jquery/star-rating/)
Demonstration: http://php.scripts.psu.edu/rja171/widgets/rating.php
Usage: $('#rating').rating('www.url.to.post.com', {maxvalue:5, curvalue:0});
Return result to .starRpta
You can send element id $('#rating').rating('script.php', {maxvalue:5, curvalue:0, id:25});
That is useful to insert results in a database

arguments
url : required -- post changes to 
options
	maxvalue: number of stars
	curvalue: number of selected stars
	

************************************************/

jQuery.fn.rating = function(url, options) {
	
	if(url == null) return;
	
	var settings = {
        url       : url, // post changes to 
        maxvalue  : 5,   // max number of stars
        curvalue  : 0    // number of selected stars		
    };
	
    if(options) {
       jQuery.extend(settings, options);
    };
   jQuery.extend(settings, {cancel: (settings.maxvalue > 1) ? true : false});
   
   
   var container = jQuery(this);
	
	jQuery.extend(container, {
            averageRating: settings.curvalue,
            url: settings.url,
			id: settings.id
        });

	for(var i= 0; i <= settings.maxvalue ; i++){
		var size = i
        if (i == 0) {
			if(settings.cancel == true){
	             var div = '<div class="cancel"><a href="#0" title="Cancel Rating">Borrar Calificación</a></div>';
				 container.append(div);
			}			
        } 
		else {
            var div = '<div class="star"><a href="#'+1+'" title=" '+1+'/'+size+'">'+1+'</a></div>';
			 container.append(div);
            div = '<div class="star"><a href="#'+2+'" title=" '+2+'/'+size+'">'+2+'</a></div>';
            container.append(div);
            div = '<div class="star"><a href="#'+3+'" title=" '+3+'/'+size+'">'+3+'</a></div>';
            container.append(div);
            div = '<div class="star"><a href="#'+4+'" title=" '+4+'/'+size+'">'+4+'</a></div>';
            container.append(div);
            div = '<div class="star"><a href="#'+5+'" title=" '+5+'/'+size+'">'+5+'</a></div>';
            container.append(div);


        }	

	}
	var divrpta = '<div class="starRpta"></div>';
	container.append(divrpta);
	
	var stars = jQuery(container).children('.star');
    var cancel = jQuery(container).children('.cancel');
	
    stars
	        .mouseover(function(){
                event.drain();
                event.fill(this);
            })
            .mouseout(function(){
                event.drain();
                event.reset();
            })
            .focus(function(){
                event.drain();
                event.fill(this)
            })
            .blur(function(){
                event.drain();
                event.reset();
            });

    stars.click(function(){
		if(settings.cancel == true){
            settings.curvalue = stars.index(this) + 1;
            $.post(container.url, 
				{ rating: jQuery(this).children('a')[0].href.split('#')[1],
					id: container.id
				},
				function(data){
    				//$(".starRpta").html(data);
					jQuery(container).children('.starRpta').html(data);
  				}
			);
			return false;
		}
		else if(settings.maxvalue == 1){
			settings.curvalue = (settings.curvalue == 0) ? 1 : 0;
			$(this).toggleClass('on');
			$.post(container.url, 
				{ rating: jQuery(this).children('a')[0].href.split('#')[1],
				  id: container.id
				},
				function(data){
    				//$(".starRpta").html(data);
					jQuery(container).children('.starRpta').html(data);
  				}
			);
			return false;
		}
		return true;
			
    });

        // cancel button events
	if(cancel){
        cancel
            .mouseover(function(){
                event.drain();
                jQuery(this).addClass('on')
            })
            .mouseout(function(){
                event.reset();
                jQuery(this).removeClass('on')
            })
            .focus(function(){
                event.drain();
                jQuery(this).addClass('on')
            })
            .blur(function(){
                event.reset();
                jQuery(this).removeClass('on')
            });
        
        // click events.
        cancel.click(function(){
            event.drain();
			settings.curvalue = 0;
			//$(".starRpta").html("");
			jQuery(container).children('.starRpta').html("");
			/*
            $.post(container.url, {
                "rating": jQuery(this).children('a')[0].href.split('#')[1], 
            });
			*/
            return false;
        });
	}
        
	var event = {
		fill: function(el){ // fill to the current mouse position.
			var index = stars.index(el) + 1;
			/*
			stars
				.children('a').css('width', '100%').end()
				.lt(index).addClass('hover').end();
			*/
			stars
				.children('a').css('width', '100%').end()
				.slice(0,index).addClass('hover').end();
		},
		drain: function() { // drain all the stars.
			stars
				.filter('.on').removeClass('on').end()
				.filter('.hover').removeClass('hover').end();
		},
		reset: function(){ // Reset the stars to the default index.
			///stars.lt(settings.curvalue).addClass('on').end();			
			stars.slice(0,settings.curvalue).addClass('on').end();
			//jQuery(container).children('.starRpta').slice(0,settings.curvalue).addClass('on').end();
		}
	}        
	event.reset();
	
	return(this);	

}