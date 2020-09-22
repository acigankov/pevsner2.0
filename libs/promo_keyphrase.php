<?php

include_once $_SERVER['DOCUMENT_ROOT'] . '/config/config.php';

if (isset($_POST['form_get_promo_by_keyword']) && !empty(($_POST['keyword']))) {
    
    $keyword = strtolower($_POST['keyword']); 
    
    if ($keyword !== $code_key ) {
        $error = 'Неверное кодовое слово';
    } else {
        $code = getPromocode();
        
        if($code) {
            issuePromocodeByCode($code);
            $result = $code;
        }else {
            $result = 'Коды закончились :(';
        }
        
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
