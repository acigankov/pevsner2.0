<?php

include_once '../config/config.php'; 

function rus2translit($string) {
    $converter = array(
        'а' => 'a',   'б' => 'b',   'в' => 'v',
        'г' => 'g',   'д' => 'd',   'е' => 'e',
        'ё' => 'e',   'ж' => 'zh',  'з' => 'z',
        'и' => 'i',   'й' => 'y',   'к' => 'k',
        'л' => 'l',   'м' => 'm',   'н' => 'n',
        'о' => 'o',   'п' => 'p',   'р' => 'r',
        'с' => 's',   'т' => 't',   'у' => 'u',
        'ф' => 'f',   'х' => 'h',   'ц' => 'c',
        'ч' => 'ch',  'ш' => 'sh',  'щ' => 'sch',
        'ь' => '\'',  'ы' => 'y',   'ъ' => '\'',
        'э' => 'e',   'ю' => 'yu',  'я' => 'ya',
        
        'А' => 'A',   'Б' => 'B',   'В' => 'V',
        'Г' => 'G',   'Д' => 'D',   'Е' => 'E',
        'Ё' => 'E',   'Ж' => 'Zh',  'З' => 'Z',
        'И' => 'I',   'Й' => 'Y',   'К' => 'K',
        'Л' => 'L',   'М' => 'M',   'Н' => 'N',
        'О' => 'O',   'П' => 'P',   'Р' => 'R',
        'С' => 'S',   'Т' => 'T',   'У' => 'U',
        'Ф' => 'F',   'Х' => 'H',   'Ц' => 'C',
        'Ч' => 'Ch',  'Ш' => 'Sh',  'Щ' => 'Sch',
        'Ь' => '\'',  'Ы' => 'Y',   'Ъ' => '\'',
        'Э' => 'E',   'Ю' => 'Yu',  'Я' => 'Ya',
    );
    return strtr($string, $converter);
}


//echo strtolower(str_replace(" ", "_", rus2translit('Каша рисовая с брусникой и клубничным соусом'))) . '.jpg';
//$i - table;
//$j - day

//$week_num = 2;
//for ($i = 1; $i < 16; $i++ ) {
//    
//    for ($j = 1; $j < 8; $j++ ) {
//        echo  'w' . $week_num . '-' . 't' . $i . '-' . 'd'. $j  . ';' 
//            . '/img/design/sections/menu/tables/' . $week_num . '-' . $i . '-' . $j . '.jpg' . ';' 
//            . $week_num . ';'
//            . $i . ';'
//            . $j . ';'    
//            . '</br>';
//    }
//}

//$row = 1;
//if (($handle = fopen("tables.csv", "r")) !== FALSE) {
//    while (($data = fgetcsv($handle, 1000, ";", "\r")) !== FALSE) {
////        $num = count($data);
////        echo "<p> $num полей в строке $row: <br /></p>\n";
////        $row++;
////        for ($c=0; $c < $num; $c++) {
////            echo $data[$c] . "<br />\n";
////        }
//        
//    $name = $data[0];    
//    $image = $data[1];    
//    $week_num = $data[2];    
//    $table_id = $data[3];    
//    $day_id = $data[4];    
//    saveTables($name, $image, $week_num, $table_id, $day_id);
//    //echoCsv($name, $image, $week_num, $table_id, $day_id);
//        
////    echo '<pre>';
////    var_dump($data);
////    echo '</pre>';
//        
//    }
//    fclose($handle);
//}

//function echoCsv ($name, $image, $week_num, $table_id, $day_id) {
//    echo 'name = ' . $name . '</br>';
//    echo '$image = ' . $image . '</br>';
//    echo '$week_num = ' . $week_num . '</br>';
//    echo '$table_id = ' . $table_id . '</br>';
//    echo '$day_id = ' . $day_id . '</br>';
//}

//
//if (isset($_POST['product_name'])) {
//    echo $_POST['product_name'];
//}
//
//

//обработка этой же формы. 

if (isset($_POST['product_name']) && (!empty($_POST['product_name'])) && ($_FILES['product_image']['size'] > 0) ) {
    $name = htmlspecialchars($_POST['product_name']);
    
    //;
    $file_name = strtolower(str_replace(" ", "_", rus2translit(basename($name))));
    $uploaddir = ROOT  . '/test/uploads/';
    //$uploadfile = $uploaddir . basename($_FILES['product_image']['name']);
    $uploadfile = $uploaddir . $file_name . '.jpg';

    if(!file_exists($uploadfile)) {
        if (move_uploaded_file($_FILES['product_image']['tmp_name'], $uploadfile)) {
            
            $image = 'img/design/sections/menu/products/' . $file_name  . '.jpg';
                      
            if (saveProducts($name, $name, $image)) {
                echo "</br>Файл корректен и был успешно загружен и запись в базу добавлена - >> $name << .\n";
            } else  {
                echo "</br>запись в бд не удалась :( << .\n";
            }
        } else {
            echo "Файл не загружен!\n";
            arrPrint($_FILES);
            arrPrint($_POST);
        }
    } else {
       echo 'такой файл существует!';
      
       arrPrint($_FILES);
       arrPrint($_POST);
    }
    
}


?>




<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <style>
    .wrapper {
        margin: 0 auto;
        margin-top: 100px;
        max-width: 600px;
    }

    .form-row {
        display: flex;
        align-items: center;
        padding: 20px;
    }

    input[type="text"] {
        padding: 5px;
        width: 100%;
    }

    label {
        display: block;
        margin-right: 10px;
    }

    .table {
        margin: 30px auto;
        width: 100%;
        text-align: center;
    }

    td,
    th {
        padding: 10px;
    }

    h2 {
        text-align: center;
    }
    </style>

</head>

<body>
    <div class="wrapper">
        <h2>Добавить блюдо</h2>
        <form id="myForm" enctype="multipart/form-data" action="#" method="post">
            <div class="form-row">
                <label for="product_name">Название блюда: </label>
                <input type="text" name="product_name" id="product_name" placeholder="название блюда">
            </div>

            <div class="form-row">
                <label for="product_image">картинка блюда: </label>
                <input type="file" name="product_image" id="product_image" placeholder="картинка блюда">
            </div>

            <input type="submit" value="загрузить">
            <input type="reset" value="Очистить" style="background: red">
        </form>
        <hr>
    </div>
    <?php $products = getProducts(); ?>
    <h2>Товары в базе ( <?= count($products)?> ) </h2>
    <div class="table">
        <center>
            <table border="1" cellspacing="0">
                <tbody>
                    <th>id</th>
                    <th>name</th>
                    <th>description</th>
                    <th>image_path</th>
                    <th>image</th>
                    <?php foreach ($products as $product): ?>
                    <tr>
                        <td><?= $product['id'] ?></td>
                        <td><?= $product['name'] ?></td>
                        <td><?= $product['description'] ?></td>
                        <td><?= $product['image'] ?></td>
                        <td><img src="../<?= $product['image'] ?>" alt="" style="max-height: 60px"></td>
                    </tr>
                    <?php endforeach ?>
                </tbody>
            </table>

            <select name="" id="">
                <?php foreach ($products as $product): ?>
                <option value="<?= $product['id'] ?>"><?= $product['name'] ?></option>
                <?php endforeach ?>
            </select>
        </center>
    </div>

    <script>
    document.getElementById("myForm").reset();
    </script>
</body>

</html>