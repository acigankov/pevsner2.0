//переключение столов. 
$('[data-booklet-table]').on('change', function (e) {
    e.preventDefault();

    const table_id = $(this).val();
    getRestrictionsById(table_id);

    function getRestrictionsById(id) {
        $.ajax({
            url: "libs/getRestrictions.php", //url страницы
            cache: false, // выключили кэш
            type: "POST", //метод отправки
            dataType: "html", //формат данных
            data: { id: id }, // данные НЕ ЗАБЫВАЙ , ЧТО НАДО ОТПРАВЛЯТЬ ОБЪЕКТ
        
            success: function (response) {
                //Данные отправлены успешно
        
                const result = $.parseJSON(response);
                const tableEl = $('[data-booklet-content]');

                tableEl.fadeOut(200);

                let content = '';
                for (let i = 0; i < result.length; i++) {
                    
                    content += '<tr><th style="width:5%;" scope="row">' + (i + 1) + '</th><td style="width:15%;" class="text-right">' + result[i]['name'] + '</td><td style="width:80%;" class="text-left">' + result[i]['restriction_text'] + '</td></tr>';
                }

                tableEl.html(content).fadeIn(200);//анимация блока стаблицей
            },
            error: function (response) {
                // Данные не отправлены
                const tableEl = $('[data-booklet-content]');
                tableEl.html('<tr><td><h2>Данных нет</h2></td></tr>');
            }
        });
    }
});