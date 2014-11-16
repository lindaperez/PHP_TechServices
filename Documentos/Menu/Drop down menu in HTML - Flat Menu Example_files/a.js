(function($){
	$(function(){
		// init mails
		var imgs = document.getElementsByTagName('img');
		var mq = /\?mquery=([^\.]+)\.(.+)/,a;
		for (var i=0; i<imgs.length; i++)
			if (a = mq.exec(imgs[i].src))
				$(imgs[i]).wrap('<a href="mai'+'lto:'+a[1]+'@'+a[2]+'.com">');
	});
})(jQuery);
