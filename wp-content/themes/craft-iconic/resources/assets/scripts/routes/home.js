export default {
  init() {
    // JavaScript to be fired on the home page
  },
  finalize() {
    // JavaScript to be fired on the home page, after the init JS
    $('.portfolio-slick').slick({
      infinite: true,
      slidesToScroll: 1,
      dots: true,
      arrows: false,
      appendDots: '.section4 .slider-nav',
      slidesToShow: 1,
      responsive: [
        {
          breakpoint: 990,
          settings: {
            autoplay: true,
            autoplaySpeed: 5000,
          }
        }
      ],
    });

    $('.testimonial-slick').slick({
      infinite: true,
      slidesToScroll: 1,
      slidesToShow: 1,
      dots: false,
      arrows: true,
      responsive: [
        {
          breakpoint: 990,
          settings: {
            dots: false,
            arrows: false,
            autoplay: true,
            autoplaySpeed: 5000,
          }
        }
      ],
    });
  },
};
