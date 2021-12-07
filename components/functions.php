<?php

/**
 * Переводит месяц на русский язык
 * @param int $month номер месяца
 * @return array or false
 */

function getMonthRus($month) {
    
    $monthRus = [
        1   => 'Января',
        2   => 'Февраля',
        3   => 'Марта',
        4   => 'Апреля',
        5   => 'Мая',
        6   => 'Июня',
        7   => 'Июля',
        8   => 'Августа',
        9   => 'Сентября',
        10  => 'Октября',
        11  => 'Ноября',
        12  => 'Декабря'
    ];

    if (isset($month)) {
        return $monthRus[$month];
    }
    return false;
}

function getDayRus($day) {
    $days = array(
        // в формате w возвращает порядковый номер дня недели от 0 до 6. 0 -вс 
        'Воскресенье',
        'Понедельник',
        'Вторник', 
        'Среда',
        'Четверг',
        'Пятница',
        'Суббота'
    );
    return $days[$day];
}

function getShortDayRus($day) {
    $days = array(
        // в формате w возвращает порядковый номер дня недели от 0 до 6. 0 -вс 
        'ВС',
        'ПН',
        'ВТ', 
        'СР',
        'ЧТ',
        'ПТ',
        'СБ'
    );
    return $days[$day];
}

//дебуг вывод
function arrPrint($arr) {
    echo '<pre>';
    print_r($arr);
    echo '<pre>';
}


/**
 * генерация рандомной строки
 * @params int длина строки , по умолчанию 10
 * @return string
 */

function generateRandomString($length = 10) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}



/**
 * Сохраняет в базу заказ
 * @params mixed 
 * @return bool
 */

function saveOrder($name, $region, $adress, $tel, $email, $sum, $order_description, $comment, $delivery_time, $payment_type, $selected_table = null) {

    if ($name) {

        $db = DB::getConnection();

        $sql = 'INSERT INTO orders (user, region, adress, tel, email, sum, description, comment , delivery_time , payment_type, selected_table ) '
                . 'VALUES (:user, :region, :adress, :tel, :email , :sum , :description , :comment, :delivery_time, :payment_type , :selected_table)';
        
        $result = $db->prepare($sql);
        $result->bindParam(':user', $name, PDO::PARAM_STR);
        $result->bindParam(':region', $region, PDO::PARAM_STR);
        $result->bindParam(':adress', $adress, PDO::PARAM_STR);
        $result->bindParam(':tel', $tel, PDO::PARAM_STR);
        $result->bindParam(':email', $email, PDO::PARAM_STR);
        $result->bindParam(':sum', $sum, PDO::PARAM_INT);
        $result->bindParam(':description', $order_description, PDO::PARAM_STR);
        $result->bindParam(':comment', $comment, PDO::PARAM_STR);
        $result->bindParam(':delivery_time', $delivery_time, PDO::PARAM_STR);
        $result->bindParam(':payment_type', $payment_type, PDO::PARAM_INT);
        $result->bindParam(':selected_table', $selected_table, PDO::PARAM_STR);


        if ($result->execute()) {
            $lastId = $db->lastInsertId();
            return $lastId;
        }

        return false;
    }
    
    return false;
}



/**
 * Проверяет , есть ли уже промокод 
 * @params string $code промокод 
 * @return bool
 */

function checkPromocodebyCode ($code) {
    
        $db = DB::getConnection();
        
        $sql = 'SELECT * from coupons WHERE code = :code';
        $result = $db->prepare($sql);
        $result->bindParam(':code', $code, PDO::PARAM_STR);
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $result->execute();     
        
        $codes = $result->fetchAll();
        
        if ($codes) {
            return $codes;
        }
    
    return false;
}

/**
 * Сохраняет в базу сгенерированный промокод. При сохраненни проверяет на повторение. 
 * @params string $code, int $promotion
 * @return bool
 */

function savePromocode($code , $promotion , $status = 2) {

    $db = DB::getConnection();
    $sql = 'INSERT INTO coupons (code ,  status , promotion)'
            . 'VALUES(:code , :status , :promotion)';
    $result = $db->prepare($sql);
    $result->bindParam(':code', $code, PDO::PARAM_STR);
    $result->bindParam(':status', $status, PDO::PARAM_INT);
    $result->bindParam(':promotion', $promotion, PDO::PARAM_INT);
    

    if ($result->execute()) {
        $lastId = $db->lastInsertId();
        return $lastId;
    }

    return false;
}


/**
 * Получает промокод для выдачи по кодовому слову. 
 * @params string $code промокод 
 * @return bool
 */

function getPromocode() {
    
        $db = DB::getConnection();
        $sql = 'SELECT code from coupons where status = 2 limit 1';
        $result = $db->prepare($sql);
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $result->execute();     
        $code = $result->fetchColumn();
        
        if ($code) {
            return $code;
        }
    
    return false;
}

/**
 * Обновляет статус кода на выдан
 * @params string $code промокод 
 * @return bool
 */

function issuePromocodeByCode($code) {

    $db = DB::getConnection();
    $sql = 'UPDATE coupons SET status = 3 , issue_date = NOW() where code = :code';
    $result = $db->prepare($sql);
    $result->bindParam(':code', $code, PDO::PARAM_STR);

    if ($result->execute()) {
        return true;
    }

    return false;
}

/**
 * Обновляет статус кода на погашен
 * @params string $code промокод 
 * @return bool
 */
function redeemPromocodeByCode($code) {

    $db = DB::getConnection();
    $sql = 'UPDATE coupons SET status = 4 , redeem_date = NOW() where code = :code';
    $result = $db->prepare($sql);
    $result->bindParam(':code', $code, PDO::PARAM_STR);

    if ($result->execute()) {
        return true;
    }

    return false;
}


/**
 * сохраняет  данные из формы звонка
 * @params string $code , $tel_for_bd, $comment
 * @return bool
 */
function saveUser($name, $tel_for_bd, $comment = null) {
    
    $db = DB::getConnection();
    
    $sql = 'INSERT INTO call_form (name, tel, comment) VALUES (:name, :tel, :comment)';
    
    $result = $db->prepare($sql);
    $result->bindParam(':name', $name, PDO::PARAM_STR);
    $result->bindParam(':tel', $tel_for_bd, PDO::PARAM_STR);
    $result->bindParam(':comment', $comment, PDO::PARAM_STR);
    
    if($result->execute()) {
        return true;
    }
    return false;
}

/**
 * Получить все столы
 * @params null
 * @return array
 */

function getTables() {
    
    $db = DB::getConnection();
    
    $sql = 'SELECT * from tables WHERE active = true';
    $result = $db->prepare($sql); 
    $result->setFetchMode(PDO::FETCH_ASSOC);
    $result->execute();       
    $tables = $result->fetchAll();
    
    if($tables){
        return $tables;
    }
    
    return false;
}

/**
 * Получить имя стола по id
 * @params null
 * @return array
 */

function getTableNameById($id) {
    
    $db = DB::getConnection();
    
    $sql = 'SELECT name from tables WHERE id = :id';
    $result = $db->prepare($sql); 
    $result->bindParam(':id', $id, PDO::PARAM_INT);
    $result->setFetchMode(PDO::FETCH_ASSOC);
    $result->execute();       
    $tableName = $result->fetchColumn();
    
    if($tableName){
        return $tableName;
    }
    
    return false;
}

/**
 * Получить акции для структуры меню
 * @params null
 * @return array
 */
function getAkcii() {
    
    $db = DB::getConnection();
    
    $sql = 'SELECT * from akcii WHERE active = 1';
    
    $result = $db->prepare($sql); 
    $result->setFetchMode(PDO::FETCH_ASSOC);
    $result->execute();       
    $akcii = $result->fetchAll();
    
    if($akcii){
        return $akcii;
    }
    
    return false;
}
/**
 * Получить акцию по id
 * @params null
 * @return array
 */
function getAkciiById($id) {
    
    $db = DB::getConnection();
    
    $sql = 'SELECT * from akcii
            WHERE id = :id';
    $result = $db->prepare($sql); 
    $result->bindParam(':id', $id, PDO::PARAM_INT);
    $result->setFetchMode(PDO::FETCH_ASSOC);
    $result->execute();       
    $akcii = $result->fetch();
    
    if($akcii){
        return $akcii;
    }
    
    return false;
}


/**
 * Получить faqs
 * @params null
 * @return array
 */

function getFaqs() {
    
    $db = DB::getConnection();
    
    $sql = 'SELECT * from faq';
    $result = $db->prepare($sql); 
    $result->setFetchMode(PDO::FETCH_ASSOC);
    $result->execute();       
    $faqs = $result->fetchAll();
    
    if($faqs){
        return $faqs;
    }
    
    return false;
}

function getCurrentWeek() {
    
    $db = DB::getConnection();
    
    $sql = 'SELECT week_num from current_week';
    $result = $db->prepare($sql); 
    $result->setFetchMode(PDO::FETCH_ASSOC);
    $result->execute();       
    $week_num = $result->fetchColumn();
    
    if($week_num){
        return $week_num;
    }
    
    return false;
}

function getDishes($day_id , $table_id) {
    
    $db = DB::getConnection();

    $current_week = getCurrentWeek();

    if ($day_id < date('N')) {
        switch($current_week) {
            case 1:
                $week_num = 3;
                break;
            case 2:
                $week_num = 4;
                break;
            case 3:     
                $week_num = 2;
                break;
            case 4:     
                $week_num = 1;
                break;    
        }

        // if ($current_week < 4) {
        //     $week_num = $current_week + 1; 
        // } else {
        //     $week_num = 1;
        // }

    } else {
        $week_num = $current_week;
    }
    
    $sql = "SELECT
                p.name AS product_name,
                p.description AS product_description,
                p.image AS product_image,
                p.weight AS product_weight,
                p.calories AS product_calories,
                p.proteins AS product_proteins,
                p.fats AS product_fats,
                p.carbohydrates AS product_carbohydrates,
                ft.name AS food_time,
                t.description as `table_description`,
                fdi.image as table_image

            FROM food_views AS fv
            LEFT JOIN food_weeks as fw on fv.week_num = fw.week_num
            LEFT JOIN food_days as fd on fv.day_id = fd.id
            LEFT JOIN food_time AS ft ON ft.id = fv.food_time_id
            LEFT JOIN `tables` AS t ON t.id = fv.table_id 
            LEFT JOIN products AS p ON p.id = fv.product_id 
            LEFT JOIN food_days_images AS fdi on fdi.table_id = t.id AND fdi.day_id = fv.day_id AND fdi.week_num = fw.week_num

            WHERE fv.day_id = :day_id AND fv.table_id = :table_id AND fv.week_num = :week_num 

            ORDER BY ft.name ASC";
    
    $result = $db->prepare($sql); 
    $result->bindParam(':day_id', $day_id, PDO::PARAM_INT);
    $result->bindParam(':table_id', $table_id, PDO::PARAM_INT);
    $result->bindParam(':week_num', $week_num, PDO::PARAM_INT);
    $result->setFetchMode(PDO::FETCH_ASSOC);
    $result->execute();       
    $dishes = $result->fetchAll();
    
    if($dishes){
        return $dishes;
    }
    
    return false;
}

/**
 * Получить наборы 
 * @params null
 * @return array
 */
function getFoodsets() {
    
    $db = DB::getConnection();
    
    $sql = 'SELECT * from foodsets '
            . ' WHERE active = 1 '
            . 'ORDER BY price desc';
    
    $result = $db->prepare($sql); 
    $result->setFetchMode(PDO::FETCH_ASSOC);
    $result->execute();       
    $foodsets = $result->fetchAll();
    
    if($foodsets){
        return $foodsets;
    }
    
    return false;
}

/**
 * Получить набор по id 
 * @params null
 * @return array
 */
function getFoodsetById($id) {
    
    $db = DB::getConnection();
    
    $sql = 'SELECT * from foodsets '
            . ' WHERE id = :id ';
    
    $result = $db->prepare($sql); 
    $result->bindParam(':id', $id, PDO::PARAM_INT);
    $result->setFetchMode(PDO::FETCH_ASSOC);
    $result->execute();       
    $foodsets = $result->fetch();
    
    if($foodsets){
        return $foodsets;
    }
    
    return false;
}


/**
 * Получить дни для структуры меню
 * @params null
 * @return array
 */
function getFooddays() {
    
    $db = DB::getConnection();
    
    $sql = 'SELECT * from food_days';
    
    $result = $db->prepare($sql); 
    $result->setFetchMode(PDO::FETCH_ASSOC);
    $result->execute();       
    $fooddays = $result->fetchAll();
    
    if($fooddays){
        return $fooddays;
    }
    
    return false;
}


/**
 * Получить общие фотки дней
 * @params null
 * @return array
 */
function getDayImg($day_id , $table_id) {
    
    $db = DB::getConnection();
    
    $sql = 'SELECT image from food_days_images
            WHERE table_id = :table_id AND day_id = :day_id LIMIT 1';
    
    
    $result = $db->prepare($sql); 
    $result->bindParam(':day_id', $day_id, PDO::PARAM_INT);
    $result->bindParam(':table_id', $table_id, PDO::PARAM_INT);
    $result->setFetchMode(PDO::FETCH_ASSOC);
    $result->execute();       
    $img = $result->fetchColumn();
    
    if($img){
        return $img;
    }
    
    return false;
}

/**
 * Получить описание стола по id
 * @params null
 * @return array
 */

function getTablebyDescriptionById($table_id) {
    
    $db = DB::getConnection();
    
    $sql = 'SELECT description from tables
            WHERE id = :table_id';
    $result = $db->prepare($sql); 
    $result->bindParam(':table_id', $table_id, PDO::PARAM_INT);
    $result->setFetchMode(PDO::FETCH_ASSOC);
    $result->execute();       
    $table_description = $result->fetchColumn();
    
    if($table_description){
        return $table_description;
    }
    
    return false;
}


function saveProducts($name, $description, $image) {
    
    $db = DB::getConnection();
    
    $sql = 'INSERT INTO products (name, description, image) VALUES (:name, :description, :image)'; 
    
    $result = $db->prepare($sql);
    $result->bindParam(':name', $name, PDO::PARAM_STR);
    $result->bindParam(':description', $description, PDO::PARAM_STR);
    $result->bindParam(':image', $image, PDO::PARAM_STR);
    
    if($result->execute()) {
        return true;
    }
    
    return false;
}

function getProducts() {
    
        $db = DB::getConnection();
        $sql = 'SELECT * from products ORDER BY name ASC ';
        $result = $db->prepare($sql);
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $result->execute();     
        $code = $result->fetchAll();
        
        if ($code) {
            return $code;
        }
    
    return false;
}


function getProductIdbyName($product) {
    
        $db = DB::getConnection();
        $sql = 'SELECT id from products where name = :product ';
        $result = $db->prepare($sql);
        $result->bindParam(':product', $product, PDO::PARAM_STR);
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $result->execute();     
        $product_id = $result->fetchColumn();
        
        if ($product_id) {
            return $product_id;
        }
        else return 'null';
    
    return false;
}

/**
 * получает отзывы
 * @params string $code , $tel_for_bd, $comment
 * @return bool
 */

function getTestimonials() {
    
        $db = DB::getConnection();
        $sql = 'SELECT * from testimonials where status = 1 order by date_add desc limit 10';
        $result = $db->prepare($sql);
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $result->execute();     
        $testimonials = $result->fetchAll();
        
        if ($testimonials) {
            return $testimonials;
        }
        else return 'null';
    
    return false;
}


/**
 * сохраняет  данные из формы отзывов
 * @params string $code , $tel_for_bd, $comment
 * @return bool
 */
function saveTestimonial($name, $tel_for_bd, $comment) {
    
    $db = DB::getConnection();
    
    $sql = 'INSERT INTO testimonials (author, tel, text, status) VALUES (:name, :tel, :comment, 3)';
    
    $result = $db->prepare($sql);
    $result->bindParam(':name', $name, PDO::PARAM_STR);
    $result->bindParam(':tel', $tel_for_bd, PDO::PARAM_STR);
    $result->bindParam(':comment', $comment, PDO::PARAM_STR);
    
    if($result->execute()) {
        return true;
    }
    return false;
}

/**
 * Получает таблицу ограничений
 * @params 
 * @return array
 */

function getRestrictionsByTableId($table_id) {
    
    $db = DB::getConnection();

    $sql = 'SELECT br.name as name, bv.restriction_text FROM booklet_views as bv
    LEFT JOIN booklet_restrictions as br ON bv.booklet_restrction = br.id
    WHERE bv.table_id = :table_id';

    $result = $db->prepare($sql);
    $result->bindParam(':table_id', $table_id, PDO::PARAM_INT);
    $result->setFetchMode(PDO::FETCH_ASSOC);
    $result->execute();     
    $retrictions = $result->fetchAll();
    
    if ($retrictions) {
        return $retrictions;
    }
    else return 'null';

return false;
}


//передача заказа во фронтпад////////////

function sendOrderToFrontpad($orderDetails) {

    //артикулы товаров
$product[0] = $orderDetails['product_code'];	//Пицца
// $product[1] = "10001";	//Добавка к пицце - сыр
// $product[2] = "10002";	//Добавка к пицце - бекон
// $product[3] = "10003";	//Сок
 
//количество товаров
$product_kol[0] = "1"; //всегда один
// $product_kol[1] = "1";
// $product_kol[2] = "1";
// $product_kol[3] = "1";
 
//модификаторы, если есть 
$product_mod[1] = "0";  //товар с ключом 1 является модификатором товара с ключом 0
$product_mod[2] = "0";  //товар с ключом 2 является модификатором товара с ключом 0
           	 
//детали заказа в кодировке utf-8
$param['secret'] = "BE6s6rGD5hFESsRr27ZtAEeb2723ah7BQ4SGen89zDDbYftHbe4BH8Dy5ri5Bftb8aHdnGbN9FQTN8rQbedKbG77Ze2ikenieZntts6sZHazGraKzehBNeyAifKAn2KtK2Q5dHi4fikQDnk2tzk7DHyQR6b6SNkrB3hEAtyFEHf6ZyTeS6bfEzZhs2b9Bnr3dAsDSQ7iidd7A2beSdniD9tT2ySkK7aRytfa7bkefsbGdeNZh37N3nyNKb";				//ключ api
$param['street']  = urlencode($orderDetails['address']);		//улица
$param['home']	= ""; 				//дом
$param['apart']	= "";	 			//квартира
$param['phone'] = urlencode($orderDetails['tel']);		//телефон
$param['descr']	= urlencode('ОнлайнЗаказ: #' . $orderDetails['order_num'] . '; Коммент: ' . $orderDetails['comment']); 	//комментарий
$param['name']	= urlencode($orderDetails['name']);		//имя клиента
$param['mail']	= urlencode($orderDetails['email']);		//имя клиента
$param['pay']	= urlencode($orderDetails['payment_api_code']);		//имя клиента
$tags = false;				//отметки заказа
$hook_status = false;			//отметки заказа - необязательно

//подготовка запроса	
$data = '';			
foreach ($param as $key => $value) { 
$data .= "&".$key."=".$value;
}

if($tags) {
foreach ($tags as $key => $value){
		$data .= "&tags[".$key."]=".$value."";
}
}

if($hook_status) {
foreach ($hook_status as $key => $value){
		$data .= "&hook_status[".$key."]=".$value."";
}
}
 
//содержимое заказа
foreach ($product as $key => $value){ 
$data .= "&product[".$key."]=".$value."";
$data .= "&product_kol[".$key."]=".$product_kol[$key].""; 
if(isset($product_mod[$key])) { 
$data .= "&product_mod[".$key."]=".$product_mod[$key].""; 
} 
} 

//отправка
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, "https://app.frontpad.ru/api/index.php?new_order");
curl_setopt($ch, CURLOPT_FAILONERROR, 1);
curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
curl_setopt($ch, CURLOPT_TIMEOUT, 10);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
$result = curl_exec($ch);
curl_close($ch);
 
//результат
//var_dump( $result);

// $response = json_decode($result, true);

// if ($response['result'] === 'result') {
//     return true;
// } 

}

?>