/* ========================================================================
 * DOM-based Routing
 * Based on http://goo.gl/EUTi53 by Paul Irish
 *
 * Only fires on body classes that match. If a body class contains a dash,
 * replace the dash with an underscore when adding it to the object below.
 *
 * .noConflict()
 * The routing is enclosed within an anonymous function so that you can 
 * always reference jQuery with $, even when in .noConflict() mode.
 *
 * Google CDN, Latest jQuery
 * To use the default WordPress version of jQuery, go to lib/config.php and
 * remove or comment out: add_theme_support('jquery-cdn');
 * ======================================================================== */



 (function($) {

        // Detect shipping country change
        $('select[name=calc_shipping_country]').change(function() {
          setTimeout(addBootstrapClasses, 2);
        });

        // Add bootstrap classes to form inputs
        function addBootstrapClasses()
        {          
          var $inputs = $('select, input[type=text]');
          $('select, input[type=text]').addClass('form-control');
        }

// Use this variable to set up the common and page specific functions. If you 
// rename this variable, you will also need to rename the namespace below.
var Roots = {
  // All pages
  common: {
    init: function() {


      $(function(){
        //Add the 'zoom' class to image links
        $('a[href*=".png"], a[href*=".gif"], a[href*=".jpeg"], a[href*=".jpg"]').each(function() {
          // Prevent adding zoom class to query-string image links
          if (this.href.indexOf('?') < 0 && !$(this).hasClass("thumbReplace")) {
            $(this).addClass('zoom');
          }
        });

        $('.zoom').fancybox({
          padding: 0,
          title: false
        });



        var $mainImageContainer = $('a.woocommerce-main-image');

// Add the full size image as the product image data-src attribute
var oldImageFS = $mainImageContainer.attr('href');
$mainImageContainer.children('img.wp-post-image').data('src', oldImageFS);

var medSuffix = "-300x415", smallSuffix = "-160x220";
$mainImageContainer.zoom();

// Handle inserting the mini thumbnails into the main product image when clicked
$('.thumbReplace').click(function(e){
          // Prevent from loading the image directly
          e.preventDefault();

          // remove the original zoom
          $mainImageContainer.trigger('zoom.destroy');

          // Get the URLs of the thumbnail just clicked
          var newImageFS = $(this).attr('href'),
              newImageMed = $(this).children('img').attr('src').replace(smallSuffix, medSuffix);

          // Replace the main image with the new images
          $mainImageContainer.attr('href', newImageFS);
          $mainImageContainer.children('img.wp-post-image').attr('src', newImageMed);
          $mainImageContainer.children('img.wp-post-image').data('src', newImageFS);

          // Reinvoke the zoom plugin
          $('a.woocommerce-main-image').zoom();
        });

});

}
},
  // Home page
  home: {
    init: function() {
      // JavaScript to be fired on the home page
    }
  },
  // About us page, note the change from about-us to about_us.
  about_us: {
    init: function() {
      // JavaScript to be fired on the about us page
    }
  }
};

// The routing fires all common scripts, followed by the page specific scripts.
// Add additional events for more control over timing e.g. a finalize event
var UTIL = {
  fire: function(func, funcname, args) {
    var namespace = Roots;
    funcname = (funcname === undefined) ? 'init' : funcname;
    if (func !== '' && namespace[func] && typeof namespace[func][funcname] === 'function') {
      namespace[func][funcname](args);
    }
  },
  loadEvents: function() {
    UTIL.fire('common');

    $.each(document.body.className.replace(/-/g, '_').split(/\s+/),function(i,classnm) {
      UTIL.fire(classnm);
    });
  }
};

$(document).ready(UTIL.loadEvents);

})(jQuery); // Fully reference jQuery after this point.
