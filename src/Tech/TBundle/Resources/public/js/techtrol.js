$(function(){

  $('.carousel').carousel({
      interval: 8000
  });

  var video = $('#modal-video');
  // don't show the video for 1 week after been played
  if (window.innerWidth > 767) {
    var played = localStorage.getItem('video-techtrol-2013');
    var week = 604800000
    var now = Date.now()
    if (played == null || played < (now - week)) {
      video.modal();
      video.on('modal:close', function() {
        video.remove();
      });
      localStorage.setItem('video-techtrol-2013', now);
    }
  }


});
