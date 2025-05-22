$(document).ready(function () {
  $(".loading-bar").slick({
    centerMode: true,
    // centerPadding: "80px",
    dots: false,
    infinite: false,
    speed: 300,
    slidesToShow: 8,
    slidesToScroll: 3,
    focusOnSelect: true,
    asNavFor: ".labels",
    arrows: false,
    responsive: [
      {
        breakpoint: 1170,
        settings: {
          slidesToShow: 6,
          slidesToScroll: 3,
        }
      },
      {
        breakpoint: 768,
        settings: {
          slidesToShow: 4,
          slidesToScroll: 2,
        }
      },
    ]
  });

  $(".labels").slick({
    slidesToShow: 1,
    slidesToScroll: 1,
    arrows: true,
    fade: true,
    draggable: false,
    asNavFor: ".loading-bar"
  });
});
