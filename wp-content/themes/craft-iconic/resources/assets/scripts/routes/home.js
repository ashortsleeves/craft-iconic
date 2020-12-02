import appear from 'jquery-appear-original';

export default {
  init() {
    // JavaScript to be fired on the home page
  },
  finalize() {
    // JavaScript to be fired on the home page, after the init JS
    $('.image-portfolio').delay(1000).queue(function(next){
      $(this).addClass('visible').dequeue();
    });

    $('#btn1').appear();
    $('#btn1').on('appear', function(event, $all_appeared_elements) {
      $(this).addClass("animate");
    });

    function ciShow(col, i) {
      var selector = '.section3 .col-sm-6:nth-of-type('+i+')'

      $(selector).appear();
      $(selector).on('appear', function(event, $all_appeared_elements) {
        var time = 150;

        $(col).each(function(){
          setTimeout( function(){
            $('.section3 .col-sm-6:nth-of-type('+i +')').addClass("animate");
            i++;
          }, time)
          time += 150;
        });
      });
    }

    ciShow('.section3 .col-sm-6:nth-of-type(-n+3)', 1);
    ciShow('.section3 .col-sm-6:nth-of-type(+n+4)', 4);

    $('.portfolio-slick').slick({
      infinite: true,
      slidesToScroll: 1,
      dots: true,
      arrows: false,
      appendDots: '.section4 .slider-nav',
      slidesToShow: 1,
      autoplay: true,
      autoplaySpeed: 3000,
    });

    $('.testimonial-slick').slick({
      infinite: true,
      slidesToScroll: 1,
      slidesToShow: 1,
      dots: false,
      arrows: true,
      autoplay: true,
      autoplaySpeed: 5000,
      nextArrow: '<i class="fas fa-chevron-right"></i>',
      prevArrow: '<i class="fas fa-chevron-left"></i>',
      // appendArrows: '.testimonial-slick .slider-nav',
      responsive: [
        {
          breakpoint: 991,
          settings: {
            dots: false,
            arrows: false,
          }
        }
      ],
    });
  },
};
