(function($) {

  // Smooth Scroll
  $('body').on('click', 'a[href^=#]:not([href=#])', function(e){
    e.preventDefault();
    var anchor = $(this).attr('href');
    $('html,body').animate({scrollTop: $(anchor).offset().top}, 300);
  });


})(jQuery);