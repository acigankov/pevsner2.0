$(document).ready(function () {
  //button up
  $(window).scroll(function () {
    if ($(this).width() >= 768) {
      //если ширина окна >= 768 пикселов
      if ($(this).scrollTop() >= 200) {
        //показываем
        $("#button-up").css({ display: "initial" });
      } else if ($(this).scrollTop() <= 200) {
        //убираем
        $("#button-up").css({ display: "none" });
      }
    }
  });
  $("#button-up").click(function (e) {
    $("html, body").animate({ scrollTop: 0 }, 800);
    $(this).css({
      display: "none"
    });
    e.preventDefault();
  });

  //скролл при клике на якорь //TODO переделать на data
  $(".anchor__link").on("click", function (e) {
    //отменяем стандартную обработку нажатия по ссылке
    e.preventDefault();
    //для ссылокзабираем идентификатор блока с атрибута href
    var destination = $(this).attr("href"),
      //узнаем высоту от начала страницы до блока на который ссылается якорь
      top = $(destination).offset().top;
    //анимируем переход на расстояние - top за 1000 мс
    $("body,html").animate({ scrollTop: top }, 1000);
  });

  // Fancy-box. Images and gallery
  $("[data-fancybox]").fancybox({
    protect: true,
    toolbar: true
  });

  //карусель меню
  $(".carousel").carousel({
    interval: false,
    touch: true,
    wrap: true
  });

  //карусель отзывов
  $(".carousel-testimonials").carousel({
    interval: 5000000,
    touch: true,
    wrap: true
  });

  //тултип у звонилки
  // $(function () {
  //     $('[data-toggle="tooltip"]').tooltip();
  // });

  // if ($(window).width() >= 768) {
  //     $('.pulse').mouseover(function () {
  //         $(this).tooltip('show');
  //     });
  // }

  //форма отзыва

  $("#testimonial-comment").on("input", function () {
    $(".symbols").text($(this).val().length + "/200");
    if ($(this).val().length >= 200 || $(this).val().length < 10) {
      $(".symbols").css({ color: "#dc3545" });
    } else {
      $(".symbols").css({ color: "#28a745" });
    }
  });

  //конец файла
});
