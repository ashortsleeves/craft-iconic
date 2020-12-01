export default {
  init() {
    // JavaScript to be fired on the home page
  },
  finalize() {
    // JavaScript to be fired on the home page, after the init JS
    $('.image-portfolio').delay(1000).queue(function(next){
      $(this).addClass('visible').dequeue();
    });

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
