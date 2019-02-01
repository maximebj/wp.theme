(function($) {

  // Smooth Scroll
  $('body').on('click', 'a[href^="\\#"]:not(a[href="\\#"])', function(e){
    e.preventDefault();
    var anchor = $(this).attr('href');
    $('html,body').animate({scrollTop: $(anchor).offset().top}, 300);
  });


})(jQuery);
