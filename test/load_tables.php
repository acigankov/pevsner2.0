<?php

include_once '../config/config.php'; 

$row = 1;
if (($handle = fopen("tables_w1.csv", "r")) !== FALSE) {
    while (($data = fgetcsv($handle, 1000, ";", "\r")) !== FALSE) {
//        $num = count($data);
//            echo "<p> $num полей в строке $row: <br /></p>\n";
//        $row++;
//        for ($c=0; $c < $num; $c++) {
//            echo $data[$c] . "<br />\n";
//        }
        
    $name = $data[0];    
    $image = $data[1];    
    $week_num = $data[2];    
    $table_id = $data[3];    
    $day_id = $data[4];    
    echoCsvTables($name, $image, $week_num, $table_id, $day_id);
        
//    echo '<pre>';
//    var_dump($data);
//    echo '</pre>';
        
    }
    fclose($handle);
}


function echoCsvTables($name , $image, $week_num, $table_id, $day_id) {
    echo '(' . '"' . $name . '"' . ',' . '"' .$image . '"' . ',' . $week_num . ',' . $table_id . ',' . $day_id . '),<br/>' ;
    
}