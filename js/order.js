
//ЗАКАЗ

//inputmask
$(
".check[name=order-input-tel] , .check[name=call_input_tel] , .check[name=testimonial_input_tel]"
).inputmask({
mask: "9-(999)-999-99-99",
jitMasking: true
});

//подставляем сумму и заказ из карточки в форму
$(".menu-cards .card-link button").on("click", function () {
let sum = $(this).data("sum");
let order = $(this).data("order");

$("#modal-order .form-sum_forShow").text(sum + " руб.");
$("form#form-order [name=form_order_sum]").val(sum);
$("#modal-order .form-order_forShow").text(order);
$("form#form-order [name=form_order_order]").val(order);
$(".redeem-promo").css({ display: "block" });
//колхозим проверку набора
if (sum < 1980) {
    $(".redeem-promo").css({ display: "none" });
}
});

//вспомогательные функции для валидация полей.
function validateName(selector) {
if (selector.val().length < 3) {
    selector.addClass("is-invalid");
} else selector.removeClass("is-invalid");
selector.addClass("is-valid");
}
function validateTestimonial(selector) {
if (selector.val().length < 10 || selector.val().length > 200) {
    selector.addClass("is-invalid");
} else selector.removeClass("is-invalid");
selector.addClass("is-valid");
}

function validateTel(selector) {
if (selector.val().length !== 17) {
    selector.addClass("is-invalid");
} else selector.removeClass("is-invalid");
selector.addClass("is-valid");
}

function validateCheckBox(selector) {
if (!selector.prop("checked")) {
    selector.addClass("is-invalid");
} else selector.removeClass("is-invalid");
selector.addClass("is-valid");
}
function validateSelect(selector) {
if (selector.val() === "0") {
    selector.addClass("is-invalid");
} else selector.removeClass("is-invalid");
selector.addClass("is-valid");
}

function validateEmail(selector) {
var pattern = /.+@.+\..+/i;
if (!pattern.test(selector.val())) {
    selector.addClass("is-invalid");
} else selector.removeClass("is-invalid");
selector.addClass("is-valid");
}

//обработка фомы

// Fetch all the forms we want to apply custom Bootstrap validation styles to
var forms = document.getElementsByClassName("needs-validation");
// Loop over them and prevent submission
var validation = Array.prototype.filter.call(forms, function (form) {
if (form.checkValidity() === false) {
    //форма заказа
    $(".check[name=order-input-name]").keyup(function () {
    validateName($(".check[name=order-input-name]"));
    });
    $(".check[name=order-input-adress]").keyup(function () {
    validateName($(".check[name=order-input-adress]"));
    });
    $(".check[name=order-input-tel]").keyup(function () {
    validateTel($(".check[name=order-input-tel]"));
    });
    $(".check[name=order-input-email]").keyup(function () {
    validateEmail($(".check[name=order-input-email]"));
    });
    $("#order_input_check").change(function () {
    validateCheckBox($("#order_input_check"));
    });
    $("#selected_table").change(function () {
    validateSelect($("#selected_table"));
    });

    //форма звонка
    $(".check[name=call_input_name]").keyup(function () {
    validateName($(".check[name=call_input_name]"));
    });
    $(".check[name=call_input_tel]").keyup(function () {
    validateTel($(".check[name=call_input_tel]"));
    });
    $(".check[name=call_input_check], #call_input_check").change(function () {
    validateCheckBox($(".check[name=call_input_check], #call_input_check"));
    });

    //форма отзыва
    $(".check[name=testimonial_input_name]").keyup(function () {
    validateName($(".check[name=testimonial_input_name]"));
    });
    $(".check[name=testimonial_input_tel]").keyup(function () {
    validateTel($(".check[name=testimonial_input_tel]"));
    });
    $(".check[name=testimonial]").keyup(function () {
    validateTestimonial($(".check[name=testimonial]"));
    });
    $(
    ".check[name=testimonial_input_check], #testimonial_input_check"
    ).change(function () {
    validateCheckBox(
        $(".check[name=testimonial_input_check], #testimonial_input_check")
    );
    });
}

form.addEventListener(
    "submit",
    function (event) {
    if (
        form.checkValidity() === false ||
        $(this).find(".check").hasClass("is-invalid")
    ) {
        event.preventDefault();
        event.stopPropagation();

        //форма заказа
        validateName($(".check[name=order-input-name]"));
        $(".check[name=order-input-name]").keyup(function () {
        validateName($(".check[name=order-input-name]"));
        });
        validateName($(".check[name=order-input-adress]"));
        $(".check[name=order-input-adress]").keyup(function () {
        validateName($(".check[name=order-input-adress]"));
        });
        validateTel($(".check[name=order-input-tel]"));
        $(".check[name=order-input-tel]").keyup(function () {
        validateTel($(".check[name=order-input-tel]"));
        });
        validateEmail($(".check[name=order-input-email]"));
        $(".check[name=order-input-email]").keyup(function () {
        validateEmail($(".check[name=order-input-email]"));
        });
        validateCheckBox($("#order_input_check"));
        $("#order_input_check").change(function () {
        validateCheckBox($("#order_input_check"));
        });
        validateSelect($("#selected_table"));
        $("#selected_table").change(function () {
        validateSelect($("#selected_table"));
        });

        //форма звонка
        validateName($(".check[name=call_input_name]"));
        $(".check[name=call_input_name]").keyup(function () {
        validateName($(".check[name=call_input_name]"));
        });
        validateTel($(".check[name=call_input_tel]"));
        $(".check[name=call_input_tel]").keyup(function () {
        validateTel($(".check[name=call_input_tel]"));
        });
        validateCheckBox(
        $(".check[name=call_input_check], #call_input_check")
        );
        $(".check[name=call_input_check], #call_input_check").change(
        function () {
            validateCheckBox(
            $(".check[name=call_input_check], #call_input_check")
            );
        }
        );
        //форма отзыва
        validateName($(".check[name=testimonial_input_name]"));
        $(".check[name=testimonial_input_name]").keyup(function () {
        validateName($(".check[name=testimonial_input_name]"));
        });
        validateTel($(".check[name=testimonial_input_tel]"));
        $(".check[name=testimonial_input_tel]").keyup(function () {
        validateTel($(".check[name=testimonial_input_tel]"));
        });
        validateTestimonial($(".check[name=testimonial]"));
        $(".check[name=testimonial]").keyup(function () {
        validateTestimonial($(".check[name=testimonial]"));
        });
        validateCheckBox(
        $(".check[name=testimonial_input_check], #testimonial_input_check")
        );
        $(
        ".check[name=testimonial_input_check], #testimonial_input_check"
        ).change(function () {
        validateCheckBox(
            $(
            ".check[name=testimonial_input_check], #testimonial_input_check"
            )
        );
        });
    } else {
        event.preventDefault();
        $("#form-order button[type=submit]")
        .attr("disabled", "disabled")
        .text("Ожидание...");
        $("#form-call button[type=submit]")
        .attr("disabled", "disabled")
        .text("Ожидание...");
        $("#form-testimonial button[type=submit]")
        .attr("disabled", "disabled")
        .text("Ожидание...");
        var result_ = $(".result_");
        sendAjaxForm(result_, $(form));
    }
    },
    false
);
});

//функция отправки формы аяксом
function sendAjaxForm(result_, form) {
$.ajax({
    url: "libs/mail.php", //url страницы
    cache: false, // выключили кэш
    type: "POST", //метод отправки
    dataType: "html", //формат данных
    data: form.serialize(), // Сеарилизуем объект
    success: function (response) {
    //Данные отправлены успешно
    var result = $.parseJSON(response);
    $(".redeem-promo").css({ display: "none" });
    form.css({ display: "none" });
    result_.removeClass("d-none");
    result_.text(result.text);
    // console.log(result);
    $(".form_order_number").val(result.order_num);
    if (result.url.length > 1) {
        $(".result_").text(
        "Заказ #" +
            result.order_num +
            " принят,  осталось только оплатить!🙂 Для оплаты картой нажмите большую кнопку :"
        );
        $(".result_button").removeClass("d-none").addClass("d-flex");
        // $('#btn-yk-url').attr('href', result.url);
    }
    $(".result_").addClass("forGA4");
    $(".result_").text(
        "Заказ #" +
        result.order_num +
        " (" +
        result.order_description +
        ") " +
        " принят"
    );
    //$('.result_').text('К сожалению, в настоящее время приём заказов приостановлен. Менеджер свяжется с Вами, как только мы возобновим доставку');
    $("#form-order button[type=submit]")
        .removeAttr("disabled")
        .text("Заказать");
    },
    error: function (response) {
    // Данные не отправлены
    form.css({ display: "none" });
    result_.removeClass("d-none");
    result_.text("Ошибка. Данные не отправленны. Ошибка AJAX");
    }
});

$("#modal-order").on("hidden.bs.modal", function () {
    $("form").css({ display: "initial" });
    $(".result_").addClass("d-none");
    $("input").removeClass("is-valid is-invalid");
    $("#modal-order .result_button").css({ display: "none" });
    $("form").trigger("reset");
    $(".redeem-promo").css({ display: "initial" });
});

$("#modal-call").on("hidden.bs.modal", function () {
    $("form").css({ display: "initial" });
    $(".result_").addClass("d-none");
    $("input").removeClass("is-valid is-invalid");
    $("form").trigger("reset");
});
}


$(".form-check-input-kisel").on("change", function () {
let sum = Number($(".form_order_sum").val());
let add_sum = Number($(".form_order_product_days").val() * 100);
if ($(this).prop("checked")) {
    $(".form_order_sum").val(add_sum + sum);
    $(".form-sum_forShow").text(add_sum + sum + " руб.");
    $(".form_order_kisel_add").val("Кисель");
} else {
    $(".form_order_sum").val(sum - add_sum);
    $(".form-sum_forShow").text(sum - add_sum + " руб.");
    $(".form_order_kisel_add").text("");
}
});

$(".form-check-input-addproduct").on("change", function () {
let sum = Number($(".form_order_sum").val());
let add_sum = Number($(".form_order_product_days").val() * 200);
if ($(this).prop("checked")) {
    $(".form_order_sum").val(add_sum + sum);
    $(".form-sum_forShow").text(add_sum + sum + " руб.");
    $(".form_order_product_add").val("Дополнительное Блюдо");
} else {
    $(".form_order_sum").val(sum - add_sum);
    $(".form-sum_forShow").text(sum - add_sum + " руб.");
    $(".form_order_product_add").text("");
}
});
