// JavaScript Document
/*************************************************
Star Rating System
Modified Version: 17 February, 2009
Author: Ritesh Agrawal
Modified by: Miguel Manchego
Inspriation: Will Stuckey's star rating system (https://miguelmanchego.com/wp-content/demos/jquery/star-rating/)
Demonstration: https://php.scripts.psu.edu/rja171/widgets/rating.php
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

jQuery.fn.rate= function(options) {
        
        var url="<?echo 'votaste <b>'?>";
        if(url === null) return;
            var settings = {
            url       : url, // post changes to 
            maxvalue  : 5,   // max number of stars
            curvalue  : 0   // number of selected stars
        };
        
        if(options) {
           jQuery.extend(settings, options);
        };
           jQuery.extend(settings, {cancel: (settings.maxvalue > 1) ? true : false});	
        //Buscar Curvalue
        
    var data = {
        iid_solicitud: settings.iid,
        iid_pregunta: settings.id_preg
    };
    
   $.ajax({
        type: 'post',
        url:  settings.path,
        data: data,
        dataType: 'json',
        success: function(data) {           
            if (data.error !== undefined && data.error !== '') {
                alert(data.error);
   
            } else {
                settings.curvalue= data['id'];
                
                
                
            }
        },
        error: function(e, ts, et) {
            alert(ts);
 
        },
    async: false
    });
        
    
        
    var container = jQuery(this);
	jQuery.extend(container, {
            averageRating: settings.curvalue,
            url: settings.url,
			id: settings.id
        });
        
	for(var i= 0; i <= settings.maxvalue ; i++){
		var size = i;
                
        if (i !== 0) {           
             var div = '<div class="star"><a>'+i+'</a></div>';
			 jQuery(container).append(div);
        }	

	}
        
    
	var divrpta = '<div class="starRpta"></div>';
	jQuery(container).append(divrpta);
        
         //$(settings.name).append(divrpta);
	var cancel = jQuery(container).children('.cancel');
	var stars = jQuery(container).children('.star');
        if (settings.curvalue===1){
            
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
                event.fill(this);
            })
            .blur(function(){
                event.drain();
                event.reset();
            });
                
                 
                  
    stars.click(function(){
        
		if(settings.cancel === true){
                    settings.curvalue = stars.index(this) + 1;
                    
                
                var data = {
                    iid_solicitud:settings.iid ,
                    valor: settings.curvalue,
                    iid_pregunta: settings.id_preg
                };
                    $.ajax({
                    type: 'post',
                    url: settings.path2,
                    data: data,
                    dataType: 'json',
                    success: function(data) {

                        if (data.error !== undefined && data.error !== '') {
                            alert(data.error);
                        } else {
                           // alert(data['rating']);

                        }
                    },
                    error: function(e, ts, et) {
                        alert(ts);

                    }
                });

            
		}
		return true;
                
    });
                
        // cancel button events
	if(cancel){
        cancel
            .mouseover(function(){
                event.drain();
                jQuery(this).addClass('on');
            })
            .mouseout(function(){
                event.reset();
                jQuery(this).removeClass('on');
            })
            .focus(function(){
                event.drain();
                jQuery(this).addClass('on');
            })
            .blur(function(){
                event.reset();
                jQuery(this).removeClass('on');
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
	};
    
	event.reset();
	
	return(this);	

}