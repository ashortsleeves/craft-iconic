import Typed from 'typed.js';
import Cookies from 'js.cookie';
import parallax from 'jquery-parallax';

export default {
  init() {
    // JavaScript to be fired on all pages
  },
  finalize() {
    // JavaScript to be fired on all pages, after page specific JS is fired
    // toggles hamburger and nav open and closed states
    // Can also be included with a regular script tag

    $('.service-section:nth-of-type(even) .jumbo-bg').parallax();


    if($('#typed').length != 0) {
      var options = {
        stringsElement: '#typed-strings',
        startDelay: 1200,
        typeSpeed: 40,
        backSpeed: 30,
        backDelay: 1800
      };

      var typed = new Typed('#typed', options);

    }

    if(Cookies.get('craftIconicAudit') != true){
      setTimeout(function(){
          $('.audit-form').removeClass('hidden');
      }, 15000);
      Cookies.set('craftIconicAudit', true, {
        expires: 1
      });
    }

    //hamburger menu
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

    $('.audit-close').click(function(){
      $('.audit-form').addClass('hidden');
    })
  },
};
