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
    //var food_weight = $('#menu-carousel-block .carousel-dishes .dish-weight');

    var calories_item = $('#menu-carousel-block .carousel-dishes .kbgu-calories-item');
    var proteins_item = $('#menu-carousel-block .carousel-dishes .kbgu-proteins-item');
    var fats_item = $('#menu-carousel-block .carousel-dishes .kbgu-fats-item');
    var carbohydrates_item = $('#menu-carousel-block .carousel-dishes .kbgu-calocarbohydratesries-item');

    var calories_all = 0;
    var proteins_all = 0;
    var fats_all = 0;
    var carbohydrates_all = 0;

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
            console.log(result[0].table_image);
            //колхоз 4 недели без фоток 
            let table_all_imgsrc = result[0].table_image;
            
            if(table_all_imgsrc.indexOf('tables/4-') + 1) {
                table_all_imgsrc = '/img/design/sections/menu/no_menu_image.jpg'
            }
            // конец колхоза
            $('#table-image').attr('src', table_all_imgsrc);
            $('#table-description').text(result[0].table_description);
            for (var i = 0; i < result.length; i++) {

                calories_all+=result[i].product_calories;
                proteins_all+=result[i].product_proteins;
                fats_all+=result[i].product_fats;
                //console.log(fats_all);
                carbohydrates_all+=result[i].product_carbohydrates;

                dishes_names_all.eq(i).text((i + 1) + '. ' + result[i].product_name);

                if(result[i].product_calories) {
                    calories_item.eq(i).text(result[i].product_calories + ' Ккал') ;
                } else {calories_item.eq(i).text('Уточняйте у менеджера') ;} 
                proteins_item.eq(i).text(result[i].product_proteins) ;
                fats_item.eq(i).text(result[i].product_fats) ;
                carbohydrates_item.eq(i).text(result[i].product_carbohydrates) ;
                
                food_images.eq(i).attr('src', result[i].product_image);
                food_names.eq(i).text(result[i].product_name);
                food_descriptions.eq(i).text('(' + result[i].product_description + ')');
                //food_weight.eq(i).text('(' + result[i].product_weight + ' гр.)' );
            }
            
            $('.kbgu-calories-all').text(calories_all.toFixed(2) + ' Ккал');
            $('.kbgu-proteins-all').text(proteins_all.toFixed(2));
            $('.kbgu-fats-all').text(fats_all.toFixed(2));
            $('.kbgu-carbohydrates-all').text(carbohydrates_all.toFixed(2));
            

        },
        error: function (response, textStatus, jqXHR) { // Если данные не отправлены
            $('#pills-tabContent').text('данные не получены, попробуйте позднее');
            console.log('response status: ' + jqXHR.statusText);
        }
    });
}


//конец файла
