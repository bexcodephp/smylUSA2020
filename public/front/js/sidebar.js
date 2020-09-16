if (jQuery(window).width() >= 992) {
  var num = 100; //number of pixels before modifying styles
  $(window).bind('scroll', function() {
    if ($(window).scrollTop() > num) {
      // $('div.nav_wrapper').removeClass('absolute');
      // $('div.nav_wrapper').addClass('fixed');
      $('#aside').addClass('fixed');
      alert();
    } else {
      alert();
      // $('div.nav_wrapper').removeClass('fixed');
      // $('div.nav_wrapper').addClass('absolute');
    }
  });
}