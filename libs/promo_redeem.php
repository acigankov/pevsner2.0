<?php

include_once $_SERVER['DOCUMENT_ROOT'] . '/config/config.php';


if(isset($_POST) && (isset($_POST['form_redeem_code']))){
    
    $code = $_POST['redeem_code'];
    
    $codes = checkPromocodebyCode($code);
    if ($codes[0]['status'] == 3) {
        //гасим купон
        redeemPromocodeByCode($code);
        //отдаем сумму скидки
        $result['sum'] = 0;
    }else {
        $result['error'] = 'неверный или уже использованный купон';
    }
    
    echo json_encode($result, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES | JSON_NUMERIC_CHECK);
}
