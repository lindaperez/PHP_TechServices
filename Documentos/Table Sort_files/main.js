if (typeof jQuery != 'undefined') {
	function checkAds() {
		var ad = $(".adsense:first")
	    if (ad.height() == "0") {
	    	ad.after('<div class="box4" style="color: #40A000;"><strong>Don\'t like ads?</strong>' +
	        		"<p>Me either! But you should know that the ads on this site help pay for hosting, domain renewal and keep me motivated to improve it,</p>" +
	        		"<p>as well as develop other oddball apps and websites. Please consider disabling your Adblock software for this domain and in return I’ll give you an appreciative high-five if we ever meet in real life.</p>"+
	        		"</div>"
	        		);
	    }
	}
	$(document).ready(function(){
	    Cufon.replace('h1', { fontFamily: 'Museo 500' });
	    Cufon.replace('h2', { fontFamily: 'Museo 500' });
	    Cufon.now();
	    setTimeout("checkAds();", 1000);
	});
};
