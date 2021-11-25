
  //форма с кодовым словом

  $("form.form-get-promo").on("submit", function (event) {
    event.preventDefault();
    $("form.form-get-promo button[type=submit]").attr("disabled", "disabled");
    sendGetPromoForm($(".result__"), $(this));
  });

  function sendGetPromoForm(result_msg, form) {
    $.ajax({
      url: "libs/promo_keyphrase.php", //url страницы
      cache: false, // выключили кэш
      type: "POST", //метод отправки
      dataType: "html", //формат данных
      data: form.serialize(), // Сеарилизуем объект
      success: function (response) {
        //Данные отправлены успешно

        var result = $.parseJSON(response);
        $(".form-get-promo-result").removeClass("d-none");
        result_msg.text(result);
      },
      error: function (response) {
        // Данные не отправлены
        result_msg.text("ошибка обработки AJAX вернул error");
      }
    });
  }

  //применение промокода

  $("form.form-redeem-promo").on("submit", function (event) {
    event.preventDefault();
    let price = $("input[name=form_order_sum]").val();
    $("form.form-redeem-promo button[type=submit]").attr(
      "disabled",
      "disabled"
    );
    if (price === 1980 || price === 990) {
      $("form.form-redeem-promo button[type=submit]").attr("disabled", "false");
      $("#redeem-result_")
        .text("промокод не применим к этому набору")
        .removeClass("text-muted")
        .css({ color: "red" });
    }
    let code = $("form.form-redeem-promo input#promo-input").val();

    // redeemPromoForm($(this)); // это старая логинка с уникальными промокодами
    redeemPromoCodeCrutch (code); // это недавно просили захардкодить два кода, которые просто отправлять в форме заказа.
  });

  function redeemPromoCodeCrutch (code) {
    if (code) {
      $("#redeem-result_")
          .text("купон применен! ")
          .removeClass("text-muted")
          .css({ color: "#22B573" });
      $("form#form-order").append(
        '<input type="hidden" name="has_promo" value="' + code + '">'
      );
    } else {
    $("#redeem-result_")
      .text("Неверный промокод!")
      .removeClass("text-muted")
      .css({ color: "red" });
    } 
  }

  function redeemPromoForm(form) {
    $.ajax({
      url: "libs/promo_redeem.php", //url страницы
      cache: false, // выключили кэш
      type: "POST", //метод отправки
      dataType: "html", //формат данных
      data: form.serialize(), // Сеарилизуем объект

      success: function (response) {
        //Данные отправлены успешно

        var result = $.parseJSON(response);

        if (result.error) {
          $("#redeem-result_")
            .text(result.error)
            .removeClass("text-muted")
            .css({ color: "#FF7C84" });
        } else {
          var sum = $("input[name=form_order_sum]").val();
          //пересчет скидки.
          sum = sum - result.sum;
          $("input[name=form_order_sum]").val(sum);
          $(".form-sum_forShow").text(sum + " руб.");
          $("#redeem-result_")
            .text("купон применен! ")
            .removeClass("text-muted")
            .css({ color: "#22B573" });
          $("form#form-order").append(
            '<input type="hidden" name="has_promo" value="true">'
          );
        }
      },
      error: function (response) {
        // Данные не отправлены
        $("#redeem-result_")
          .text("ошибка обработки AJAX вернул error")
          .removeClass("text-muted")
          .addClass("text-color-red");
      }
    });
  }
