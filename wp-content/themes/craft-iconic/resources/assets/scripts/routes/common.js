import Typed from 'typed.js';

export default {
  init() {
    // JavaScript to be fired on all pages
  },
  finalize() {
    // JavaScript to be fired on all pages, after page specific JS is fired
    // toggles hamburger and nav open and closed states
    // Can also be included with a regular script tag

    $('document').ready(function(){

      var options = {
        // strings: ['<i>First</i> sentence.', '&amp; a second sentence.'],
        stringsElement: '#typed-strings',
        startDelay: 1200,
        typeSpeed: 40,
        backSpeed: 30,
        backDelay: 1800
      };

      var typed = new Typed('#typed', options);
    });

    var removeClass = true;
    $('.hamburger').click(function () {
      $('.hamburger').toggleClass('is-active');
      $('#sideNav').toggleClass('sideNav-open');
      $('.sideNavBody').toggleClass('sideNavBody-push');
      removeClass = false;
    });

    $('.sideNav').click(function() {
      removeClass = false;
    });

    document.addEventListener('touchstart', function(e) {
      if (removeClass && !$(e.target).hasClass('sideNav') && $('.sideNav').has($(e.target)).length === 0) {
         $('.hamburger').removeClass('is-active');
         $('#sideNav').removeClass('sideNav-open');
         $('.sideNavBody').removeClass('sideNavBody-push');
      }
      removeClass = true;
    }, false);

    $(window).scroll(function () {
      if ($(this).scrollTop() > 100) {
        $('.scrollup').fadeIn();
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
