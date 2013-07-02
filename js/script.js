(function($) {
	$(document).ready(function() {

		// Load picture only from à min viewport size
		// to optimize mobile loading
		// use data-src="" for image url
		// use data-viewportsize="" for the minimum size
		// eg : <span data-src="" data-viewportsize="" data-alt=""></span>

		function largeViewportPictureLoader() {
		$('span[data-viewportsize]').each(function() {

			var url = $(this).attr('data-src');
			var viewportsize = $(this).attr('data-viewportsize');
			var alttext = $(this).attr('data-alt');

			if ($(window).width() > viewportsize) {
			var html = "<img src='"+url+"' alt='"+alttext+"'>";
			$(this).after(html).remove();
			}
		});
		}

		// launch on load
		largeViewportPictureLoader();

		// launch on resize
		$(window).resize(function() {
			largeViewportPictureLoader();
		});


		// Load retina pictures after loading standard picture
		// use data-retina only
		// or data-retina="imageretina.jpg"
		// eg : <img src="image.jpg" data-retina alt="picture">
		// the picture must be in same directory with @2x.jpg at end of filename

		function retinaPictureLoader() {
		$('img[data-retina]').each(function() {
			var filename = $(this).attr('data-retina');

			// if retina source is not given, add -retina before extension
			if (filename =="") {
			var filename = $(this).attr('src');
			filename = filename.replace(/(\.[\w\d_-]+)$/i, '@2x$1');
			}

			$(this).attr('src', filename);
		});
		}

		var pixelRatio = !!window.devicePixelRatio ? window.devicePixelRatio : 1;

		// launch on load on a retina device
		if (pixelRatio > 1) {
			retinaPictureLoader();
		}

	});
})(jQuery);
