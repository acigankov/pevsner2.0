$(document).ready(function () {

    //button up
    $(window).scroll(function () {
        if ($(this).width() >= 768) { //если ширина окна >= 768 пикселов
            if ($(this).scrollTop() >= 200) {//показываем
                $('#button-up').css({'display': 'initial'});
            } else if ($(this).scrollTop() <= 200) {  //убираем
                $('#button-up').css({'display': 'none'});
            }
        }
    });
    $('#button-up').click(function (e) {
        $('html, body').animate({scrollTop: 0}, 800);
        $(this).css({
            'display': 'none'
        });
        e.preventDefault();
    });

    //скролл при клике на якорь //TODO переделать на data
    $(".anchor__link").on("click", function (e) {
        //отменяем стандартную обработку нажатия по ссылке
        e.preventDefault();
        //для ссылокзабираем идентификатор блока с атрибута href
        var destination = $(this).attr('href'),
                //узнаем высоту от начала страницы до блока на который ссылается якорь
                top = $(destination).offset().top;
        //анимируем переход на расстояние - top за 1000 мс
        $('body,html').animate({scrollTop: top}, 1000);
    });

    // Fancy-box. Images and gallery
    $("[data-fancybox]").fancybox({
        protect: true,
        toolbar: true
    });

    //карусель меню
    $('.carousel').carousel({
        interval: false,
        touch: true,
        wrap: true
    });

    //карусель отзывов
    $('.carousel-testimonials').carousel({
        interval: 5000000,
        touch: true,
        wrap: true
    });

    //тултип у звонилки
    $(function () {
        $('[data-toggle="tooltip"]').tooltip();
    });

    if ($(window).width() >= 768) {
        $('.pulse').mouseover(function () {
            $(this).tooltip('show');
        });
    }
    

    //ЗАКАЗ

    //inputmask
    $('.check[name=order-input-tel] , .check[name=call_input_tel] , .check[name=testimonial_input_tel]').inputmask({
        mask: '9-(999)-999-99-99',
        jitMasking: true
    });

    //подставляем сумму и заказ из карточки в форму
    $('.menu-cards .card-link button').on('click', function () {
        let sum = $(this).data('sum');
        let order = $(this).data('order');
        
        $('#modal-order .form-sum_forShow').text(sum + ' руб.');
        $('form#form-order [name=form_order_sum]').val(sum);
        $('#modal-order .form-order_forShow').text(order);
        $('form#form-order [name=form_order_order]').val(order);
        $('.redeem-promo').css({display:'block'});
        //колхозим проверку набора
            if (sum < 1980) {
                $('.redeem-promo').css({display:'none'});
            }
    });

    //вспомогательные функции для валидация полей.    
    function validateName(selector) {
        if (selector.val().length < 3) {
            selector.addClass('is-invalid');

        } else
            selector.removeClass('is-invalid');
        selector.addClass('is-valid');
    }
    function validateTestimonial(selector) {
        if (selector.val().length < 10 || selector.val().length > 200 ) {
            selector.addClass('is-invalid');

        } else
            selector.removeClass('is-invalid');
        selector.addClass('is-valid');
    }
    
    function validateTel(selector) {
        if (selector.val().length !== 17) {
            selector.addClass('is-invalid');
        } else
            selector.removeClass('is-invalid');
        selector.addClass('is-valid');
    }

    function validateCheckBox(selector) {
        if (!selector.prop("checked")) {
            selector.addClass('is-invalid');
        } else
            selector.removeClass('is-invalid');
        selector.addClass('is-valid');

    }
    function validateEmail(selector) {
        var pattern = /.+@.+\..+/i;
        if (!pattern.test(selector.val())) {
            selector.addClass('is-invalid');
        } else
            selector.removeClass('is-invalid');
        selector.addClass('is-valid');
    }

    //обработка фомы            

    // Fetch all the forms we want to apply custom Bootstrap validation styles to
    var forms = document.getElementsByClassName('needs-validation');
    // Loop over them and prevent submission
    var validation = Array.prototype.filter.call(forms, function (form) {

        if (form.checkValidity() === false) {

            //форма заказа
            $('.check[name=order-input-name]').keyup(function () {
                validateName($('.check[name=order-input-name]'));
            });
            $('.check[name=order-input-adress]').keyup(function () {
                validateName($('.check[name=order-input-adress]'));
            });
            $('.check[name=order-input-tel]').keyup(function () {
                validateTel($('.check[name=order-input-tel]'));
            });
            $('.check[name=order-input-email]').keyup(function () {
                validateEmail($('.check[name=order-input-email]'));
            });
            $('#order_input_check').change(function () {
                validateCheckBox($('#order_input_check'));
            });
            
            //форма звонка
            $('.check[name=call_input_name]').keyup(function () {
                validateName($('.check[name=call_input_name]'));
            });
            $('.check[name=call_input_tel]').keyup(function () {
                validateTel($('.check[name=call_input_tel]'));
            });
            $('.check[name=call_input_check], #call_input_check').change(function () {
                validateCheckBox($('.check[name=call_input_check], #call_input_check'));
            });
            
            //форма отзыва
            $('.check[name=testimonial_input_name]').keyup(function () {
                validateName($('.check[name=testimonial_input_name]'));
            });
            $('.check[name=testimonial_input_tel]').keyup(function () {
                validateTel($('.check[name=testimonial_input_tel]'));
            });
            $('.check[name=testimonial]').keyup(function () {
                validateTestimonial($('.check[name=testimonial]'));
            });
            $('.check[name=testimonial_input_check], #testimonial_input_check').change(function () {
                validateCheckBox($('.check[name=testimonial_input_check], #testimonial_input_check'));
            });

        }

        form.addEventListener('submit', function (event) {
            if (form.checkValidity() === false || $(this).find('.check').hasClass('is-invalid')) {
                event.preventDefault();
                event.stopPropagation();

                //форма заказа
                validateName($('.check[name=order-input-name]'));
                $('.check[name=order-input-name]').keyup(function () {
                    validateName($('.check[name=order-input-name]'));
                });
                validateName($('.check[name=order-input-adress]'));
                $('.check[name=order-input-adress]').keyup(function () {
                    validateName($('.check[name=order-input-adress]'));
                });
                validateTel($('.check[name=order-input-tel]'));
                $('.check[name=order-input-tel]').keyup(function () {
                    validateTel($('.check[name=order-input-tel]'));
                });
                validateEmail($('.check[name=order-input-email]'));
                $('.check[name=order-input-email]').keyup(function () {
                    validateEmail($('.check[name=order-input-email]'));
                });
                validateCheckBox($('#order_input_check'));
                $('#order_input_check').change(function () {
                    validateCheckBox($('#order_input_check'));
                });
                //форма звонка
                validateName($('.check[name=call_input_name]'));
                $('.check[name=call_input_name]').keyup(function () {
                    validateName($('.check[name=call_input_name]'));
                });
                validateTel($('.check[name=call_input_tel]'));
                $('.check[name=call_input_tel]').keyup(function () {
                    validateTel($('.check[name=call_input_tel]'));
                });
                validateCheckBox($('.check[name=call_input_check], #call_input_check'));
                $('.check[name=call_input_check], #call_input_check').change(function () {
                    validateCheckBox($('.check[name=call_input_check], #call_input_check'));
                });
                //форма отзыва
                validateName($('.check[name=testimonial_input_name]'));
                $('.check[name=testimonial_input_name]').keyup(function () {
                    validateName($('.check[name=testimonial_input_name]'));
                });
                validateTel($('.check[name=testimonial_input_tel]'));
                $('.check[name=testimonial_input_tel]').keyup(function () {
                    validateTel($('.check[name=testimonial_input_tel]'));
                });
                validateTestimonial($('.check[name=testimonial]'));
                $('.check[name=testimonial]').keyup(function () {
                    validateTestimonial($('.check[name=testimonial]'));
                });
                validateCheckBox($('.check[name=testimonial_input_check], #testimonial_input_check'));
                $('.check[name=testimonial_input_check], #testimonial_input_check').change(function () {
                    validateCheckBox($('.check[name=testimonial_input_check], #testimonial_input_check'));
                });
                
            } else {
                event.preventDefault();
                $('#form-order button[type=submit]').attr('disabled', 'disabled').text('Ожидание...');
                $('#form-call button[type=submit]').attr('disabled', 'disabled').text('Ожидание...');
                $('#form-testimonial button[type=submit]').attr('disabled', 'disabled').text('Ожидание...');
                var result_ = $('.result_');
                sendAjaxForm(result_, $(form));
            }

        }, false);
    });

    //функция отправки формы аяксом
    function sendAjaxForm(result_, form) {
        $.ajax({
            url: 'libs/mail.php', //url страницы 
            cache: false, // выключили кэш
            type: "POST", //метод отправки
            dataType: "html", //формат данных
            data: form.serialize(), // Сеарилизуем объект
            success: function (response) { //Данные отправлены успешно
                var result = $.parseJSON(response);
                // $('.redeem-promo').css({'display': 'none'});
                // form.css({'display': 'none'});
                // result_.removeClass('d-none');
                result_.text(result.text);
                $('.order-body').text('Заказ #' + result.order_num + ' принят');
                if (result.url) {
                    $('#modal-order .result_button').removeClass('d-none').addClass('d-flex');
                    $('#btn-yk-url').attr('href', result.url);
                }
                $('#form-order button[type=submit]').removeAttr('disabled').text('Заказать');
                
            },
            error: function (response) { // Данные не отправлены
                form.css({'display': 'none'});
                result_.removeClass('d-none');
                result_.text('Ошибка. Данные не отправленны. Ошибка AJAX');
            }
        });

        $('#modal-order').on('hidden.bs.modal', function () {
            $('form').css({'display': 'initial'});
            $('.result_').addClass('d-none');
            $('input').removeClass('is-valid is-invalid');
            $('#modal-order .result_button').css({'display': 'none'});
            $('form').trigger('reset');
            $('.redeem-promo').css({'display': 'initial'});
        });
        
        $('#modal-call').on('hidden.bs.modal', function () {
            $('form').css({'display': 'initial'});
            $('.result_').addClass('d-none');
            $('input').removeClass('is-valid is-invalid');
            $('form').trigger('reset');
        });

    }

    //форма с кодовым словом
    

    $('form.form-get-promo').on('submit', function (event) {
        event.preventDefault();
        $('form.form-get-promo button[type=submit]').attr('disabled', 'disabled');
        sendGetPromoForm(($('.result__')), ($(this)));
    });

    function sendGetPromoForm(result_msg, form) {
        $.ajax({
            url: 'libs/promo_keyphrase.php', //url страницы 
            cache: false, // выключили кэш
            type: "POST", //метод отправки
            dataType: "html", //формат данных
            data: form.serialize(), // Сеарилизуем объект
            success: function (response) { //Данные отправлены успешно

                var result = $.parseJSON(response);
                $('.form-get-promo-result').removeClass('d-none');
                result_msg.text(result);
            },
            error: function (response) { // Данные не отправлены
                result_msg.text('ошибка обработки AJAX вернул error');
            }
        });
    }
    
    //применение промокода
    //колхозим поле ввода в форме заказа
    
    $('form.form-redeem-promo').on('submit', function (event) {
        event.preventDefault();
        let price = $('input[name=form_order_sum]').val();
        $('form.form-redeem-promo button[type=submit]').attr('disabled', 'disabled');
        if (price  === 1980 || price === 990) {
            $('form.form-redeem-promo button[type=submit]').attr('disabled', 'false');
            $('#redeem-result_').text('промокод не применим к этому набору').removeClass('text-muted').css({color:'red'});
        }
        redeemPromoForm($(this));
    });

    function redeemPromoForm(form) {
        $.ajax({
            url: 'libs/promo_redeem.php', //url страницы 
            cache: false, // выключили кэш
            type: "POST", //метод отправки
            dataType: "html", //формат данных
            data: form.serialize(), // Сеарилизуем объект

            success: function (response) { //Данные отправлены успешно

                var result = $.parseJSON(response);
                
                if(result.error) {
                    $('#redeem-result_').text(result.error).removeClass('text-muted').css({color:'#FF7C84'});
                }else {
                    var sum = $('input[name=form_order_sum]').val();
                    //пересчет скидки.
                    sum = sum - result.sum;
                    $('input[name=form_order_sum]').val(sum);
                    $('.form-sum_forShow').text(sum + ' руб.');
                    $('#redeem-result_').text('купон применен! ').removeClass('text-muted').css({color: '#22B573'});
                    $('form#form-order').append(
                            '<input type="hidden" name="has_promo" value="true">'
                            );
                }
                
            },
            error: function (response) { // Данные не отправлены
                 $('#redeem-result_').text('ошибка обработки AJAX вернул error').removeClass('text-muted').addClass('text-color-red');
            }
        });


    }
    
   //переключалки меню 
    
//    $('#pills-tab-select').on('change', function (e) {
//        e.preventDefault();
//        var id = "#" + $(this).val();
//        console.log(id);
//        $(id).tab('show');
//    });
//    
  
    $('.days-line button').on('click', function (e) {
        e.preventDefault();
        $(this).addClass('active').siblings().removeClass('active');
        
    }); 
    
    
    
    //форма отзыва
    
    $('#testimonial-comment').on('input', function () {
        $('.symbols').text($(this).val().length + '/200');
        if (($(this).val().length) >= 200 || ($(this).val().length) < 10) {
            $('.symbols').css({color : '#dc3545' });
        } else {
            $('.symbols').css({color : '#28a745'});
        }
    });
    
    
    
    
    //конец файла
});

