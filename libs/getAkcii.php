<?php

include_once $_SERVER['DOCUMENT_ROOT'] . '/config/config.php';

if (isset($_POST['id']) && !empty(($_POST['id']))) {
    
    $id = trim($_POST['id']); 

    $akcii = getAkciiById($id);

    $result = [
        'name' => $akcii['name'],
        'img' => $akcii['image'],
        'description' => $akcii['description']
    ];

    if(!$akcii) {
        $error = 'Ошибка в получении данных';
    }

    if(isset($error)) {
        echo json_encode($error, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES | JSON_NUMERIC_CHECK);
    }else {
        //выполняем правильный код
        echo json_encode($result, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES | JSON_NUMERIC_CHECK);
    }
    
}else {
    $error = 'ошибка обработки запроса на сервере';
    echo json_encode($error, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES | JSON_NUMERIC_CHECK);
}