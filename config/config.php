<?php
//
ini_set('error_reporting', E_ALL);
ini_set('display_errors', 1);

define('ROOT', $_SERVER['DOCUMENT_ROOT']);
$actual_link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

require_once ROOT . '/components/db.php';
require_once ROOT . '/components/functions.php';
require_once ROOT . '/components/telegram.php';

//тестовый магазин
//$yk_shop_id = '';
//$yk_apikey = '';
//боевой магазин
$yk_shop_id = '644817';
$yk_apikey = 'live_h4WyaFK7w1uVz_oVJtpqzq87EWQBAha-HqNFlk1YoRo';

//промокоды 
$code_key = 'pevsner2020';
$generateCoupon = 'OFF';

//vars for template
$tables = getTables();
$faqs = getFaqs();
$akcii = getAkcii();
$foodsets = getFoodsets();
$showMenu = true;
$fooddays = getFooddays();
$dishes_first = getDishes(1, 1);
$testimonials = getTestimonials();
$timer_section = false;


$showWAphone = true;
$showInstIcon = true;
$showSectionFaq = true;
$showSectionAkcii = true;
$showOrderButton = true;
$showPevsnerSection = true;

//КБЖУ ух костыль) 

if($dishes_first) {

    $calories = 0;    
    $proteins = 0;    
    $fats = 0;    
    $carbohydrates = 0;    

    foreach($dishes_first as $dish_list) {
        $calories+= $dish_list['product_calories'];
    }
    foreach($dishes_first as $dish_list) {
        $proteins+= $dish_list['product_proteins'];
    }
    foreach($dishes_first as $dish_list) {
        $fats+= $dish_list['product_fats'];
    }
    foreach($dishes_first as $dish_list) {
        $carbohydrates+= $dish_list['product_carbohydrates'];
    }

    $kbgu = [
        'calories'      => $calories,
        'proteins'      => $proteins,
        'fats'          => $fats,
        'carbohydrates' => $carbohydrates
    ];
}

?>