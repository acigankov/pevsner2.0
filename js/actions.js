  //модальки акции
  $(".akcii__item").on("click", function (e) {
    e.preventDefault();
    getAkciiContent($(this).data("id"));
    $("#modal-akcii").modal("show");
  });

  //получение данных для модалек

  function getAkciiContent(id) {
    $.ajax({
      url: "libs/getAkcii.php", //url страницы
      cache: false, // выключили кэш
      type: "POST", //метод отправки
      dataType: "html", //формат данных
      data: { id: id }, // данные НЕ ЗАБЫВАЙ , ЧТО НАДО ОТПРАВЛЯТ ОБЪЕКТ

      success: function (response) {
        //Данные отправлены успешно

        var result = $.parseJSON(response);

        $("#modal-akcii-name").html(result.name);
        $("#modal-akcii-img").attr("src", result.img);
        $("#modal-akcii-description").html(result.description);
      },
      error: function (response) {
        // Данные не отправлены
      }
    });
  }