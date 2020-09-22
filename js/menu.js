//переключение столов. 
$('#pills-tab-select').on('change', function (e) {
    e.preventDefault();
    
    //анимация блока со столом
    $('#pills-tabContent').fadeOut(200).fadeIn(200);
    $('#menu-carousel-block').carousel(0);
    //делаем активную кнопку понедельник
    $('.days-line button').filter(':first').addClass('active').siblings().removeClass('active');
    //айди стола
    var table_id = $(this).val();
    
    getMenu(table_id);
    
});

//переключение дней. 
$('.day-switcher').on('click', function (e) {
    if (!$(this).hasClass('active')) {
        e.preventDefault();
        
        //анимация блока со слайдером
        $('#menu-carousel-block').fadeOut(200).fadeIn(200);
        //возваращаем карусель на первый слайд
        $('#menu-carousel-block').carousel(0);

        var day_id = $(this).data('day-id');
        var table_id = $('#pills-tab-select :selected').val();

        getMenu(table_id, day_id);
    }
});


function getMenu(table_id , day_id = 1) {
    
    var dishes_names_all = $('#dishes-names-all span');
    var food_images = $('#menu-carousel-block .carousel-dishes .carousel-item-img img');
    var food_names = $('#menu-carousel-block .carousel-dishes .dish-name');
    var food_descriptions = $('#menu-carousel-block .carousel-dishes .dish-description');
    var food_weight = $('#menu-carousel-block .carousel-dishes .dish-weight');

    $.ajax({
        url: 'libs/ajaxmenu.php', //url страницы 
        cache: false, // выключили кэш
        type: "POST", //метод отправки
        dataType: "html", //формат данных
        data: {table_id: table_id,
            day_id: day_id,
            caller: 'days'
        }, //отправляемые данные
        success: function (response, textStatus, jqXHR) { //Если данные отправлены успешно
            var result = $.parseJSON(response);
            $('#table-image').attr('src', result[0].table_image);
            $('#table-description').text(result[0].table_description);
            for (var i = 0; i < result.length; i++) {
                dishes_names_all.eq(i).text((i + 1) + '. ' + result[i].product_name);
                food_images.eq(i).attr('src', result[i].product_image);
                food_names.eq(i).text(result[i].product_name);
                food_descriptions.eq(i).text('(' + result[i].product_description + ')');
                food_weight.eq(i).text('(' + result[i].product_weight + ' гр.)');
            }
        },
        error: function (response, textStatus, jqXHR) { // Если данные не отправлены
            $('#pills-tabContent').text('данные не получены, попробуйте позднее');
            console.log('response status: ' + jqXHR.statusText);
        }
    });
}


//конец файла
