<?php


include_once '../config/config.php'; 

$w = 1;
$d = 7;
$row = 1;
if (($handle = fopen("week2.csv", "r")) !== FALSE) {
    while (($data = fgetcsv($handle, 1000, ";", "\r")) !== FALSE) {
        $num = count($data);
        echo "<p> $num полей в строке $row: <br /></p>\n";
        $row++;
        for ($c=0; $c < $num; $c++) {
            echo $data[$c] . "<br />\n";
        }
        
    $week_num = $data[0];    
    $table_id = $data[1];    
    $day_id = $data[2];    
    $food_time_id = $data[3];    
    $product = $data[4];    
    //prepareRequest($week_num , $table_id, $day_id, $food_time_id, $product);
        
//    echo '<pre>';
//    var_dump($data);
//    echo '</pre>';
        
    }
    fclose($handle);
}

function echoCsv ($week_num , $table_id, $day_id, $food_time_id, $product) {
    echo 'week_num  = ' . $week_num  . '</br>';
    echo '$table_id = ' . $table_id . '</br>';
    echo '$day_id = ' . $day_id . '</br>';
    echo '$food_time_id = ' . $food_time_id . '</br>';
    echo '$product= ' . $product . '</br>';
}

function prepareRequest ($week_num , $table_id, $day_id, $food_time_id, $product) {
    echo '(' . $week_num . ',' . $table_id . ',' . $day_id . ',' . $food_time_id . ',' . getProductIdbyName($product) . '),' . '<br>';
}