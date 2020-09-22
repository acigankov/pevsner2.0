<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/config/config.php';

if(isset($_POST['table_id'])) {
    $table_id = $_POST['table_id'];
    $day_id = $_POST['day_id'];
//    $table_image = getDayImg($day_id, $table_id);
//    $table_description = getTablebyDescriptionById($table_id);
    
    $data = getDishes($day_id, $table_id);
//    array_push($data , ['table_image' => $table_image]);
//    array_push($data , ['table_description' => $table_description]);
    
    echo json_encode($data, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES | JSON_NUMERIC_CHECK);
    
}