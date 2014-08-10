$(function() {
  $('div.question p, div.question ul').hide();
  $('div.question').click(function() {
     $(this).children('p, ul').slideToggle(300);
  });
});
