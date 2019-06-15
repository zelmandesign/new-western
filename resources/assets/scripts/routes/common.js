import '@fortawesome/fontawesome-free/js/all.js';

export default {
  init() {
    // JavaScript to be fired on all pages
    $('.banner .nav li a').addClass('hvr-underline-from-left');
    $('#gform_submit_button_1').addClass('btn btn-lg btn-outline-danger');
  },
  finalize() {
    // JavaScript to be fired on all pages, after page specific JS is fired
    // Carousel Fix
    $( '.carousel-item' ).first().addClass('active');
    // Menu items smoothscroll
    $('.banner a[href^="#"], #property-carousel a[href^="#"]').bind('click.smoothscroll',function (e) {
      e.preventDefault();
      var target = this.hash,
          $target = $(target);
  
      $('html, body').stop().animate( {
        'scrollTop': $target.offset().top-40,
      }, 900, 'swing', function () {
        window.location.hash = target;
      } );
    });
    // Scroll to Top
    $(window).scroll(function () {
        if ($(this).scrollTop() > 100) {
            $('.scrollup').fadeIn().css('display','flex');
        } else {
            $('.scrollup').fadeOut();
        }
    });

    $('.scrollup').click(function () {
        $('html, body').animate({
            scrollTop: 0,
        }, 600);
        return false;
    });
  },
};
