<?php

include_once $_SERVER['DOCUMENT_ROOT'] . '/config/config.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/libs/yandex-kassa/lib/autoload.php';

use YandexCheckout\Client;

//форма звонка

if (isset($_POST['form_call'])) {
    
    $error_msg = false;

    if (isset($_POST['call_input_name']) && !empty($_POST['call_input_name'])) {
        $name = htmlspecialchars($_POST['call_input_name']);
    } else {
        $error_msg = 'Ошибка! данные не переданы ';
    }

    if (strlen($name) < 3) {
        $error_msg = 'Ошибка! неккоректный номер телефона, попробуйте еще раз';
    }

    if (isset($_POST['call_input_tel']) && !empty($_POST['call_input_tel'])) {
        $tel = htmlspecialchars($_POST['call_input_tel']);
        $tel_for_bd = preg_replace('~[^0-9]+~', '', $tel);
        $tel_for_bd = substr_replace($tel_for_bd, '+7', 0, 1);
    } else {
        $error_msg = 'Ошибка! данные не переданы';
    }

    if (strlen($tel) != 17) {
        $error_msg = 'Ошибка! неккоректный номер телефона, попробуйте еще раз';
    }

    if (isset($_POST['comment']) && !empty($_POST['comment'])) {
        $comment = htmlspecialchars($_POST['comment']);
        
    } else {
        $comment = '';
    }
    
    
    if (!$error_msg) {
        //сохраняем чувака
        if (saveUser($name, $tel_for_bd, $comment)) {

            $to = 'acigankov@inbox.ru, v.v.ilyin@yandex.ru, zakaz@pevsner.ru';
            $subject = 'Pevsner.ru. Гражданин ждет звонка';
            $message = 'hello Manager! <br>' . "\r\n"
                    . $name . ' ждет звонка и просит перезвонить по номеру : <br>' . "\r\n"
                    . $tel_for_bd . '<br>' . "\r\n"
                    . 'Комментарий : ' . $comment;
            
            $message_to_telegram = 'ЗАКАЗ ЗВОНКА 🦹' . PHP_EOL
                    . $name . ' ждет звонка и просит перезвонить по номеру : ' . PHP_EOL
                    . $tel_for_bd . PHP_EOL
                    . 'Комментарий : ' . $comment; 
            
            sendMessageTelegram($message_to_telegram);

            // Для отправки HTML-письма должен быть установлен заголовок Content-type
            $headers = 'Content-type: text/html; charset=utf-8' . "\r\n" .
                    'MIME-Version: 1.0' . "\r\n" .
                    // Дополнительные заголовки
                    'From: zakaz@pevsner.ru' . "\r\n" .
                    'Reply-To: zakaz@pevsner.ru' . "\r\n" .
                    'X-Mailer: PHP/' . phpversion();

            if (mail($to, $subject, $message, $headers . '-f zakaz@pevsner.ru')) {
                unset($_POST);
            }

            $result = [
                'text' => "Cпасибо за обращение, $name. Наш менеджер свяжется с Вами в ближайшее время."
            ];
            
            echo json_encode($result, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES | JSON_NUMERIC_CHECK);
            exit();
        }
    } else {
        echo json_encode($error_msg, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES | JSON_NUMERIC_CHECK);
        exit();
    }
}
//форма отзыва

if (isset($_POST['form_testimonial'])) {
    
    $error_msg = false;

    if (isset($_POST['testimonial_input_name']) && !empty($_POST['testimonial_input_name'])) {
        $name = htmlspecialchars($_POST['testimonial_input_name']);
    } else {
        $error_msg = 'Ошибка! данные не переданы ';
    }

    if (strlen($name) < 3) {
        $error_msg = 'Ошибка! неккоректный номер телефона, попробуйте еще раз';
    }

    if (isset($_POST['testimonial_input_tel']) && !empty($_POST['testimonial_input_tel'])) {
        $tel = htmlspecialchars($_POST['testimonial_input_tel']);
        $tel_for_bd = preg_replace('~[^0-9]+~', '', $tel);
        $tel_for_bd = substr_replace($tel_for_bd, '+7', 0, 1);
    } else {
        $error_msg = 'Ошибка! данные не переданы';
    }

    if (strlen($tel) != 17) {
        $error_msg = 'Ошибка! неккоректный номер телефона, попробуйте еще раз';
    }

    if (isset($_POST['testimonial']) && !empty($_POST['testimonial'])) {
        $testimonial = htmlspecialchars($_POST['testimonial']);
        
    } else {
        $error_msg = 'Ошибка! неккоректный текст отзыва! Попробуйте еще раз';
    }
    
    
    if (!$error_msg) {
        //сохраняем отзыв
        if (saveTestimonial($name, $tel_for_bd, $testimonial)) {

            $to = 'acigankov@inbox.ru, v.v.ilyin@yandex.ru, zakaz@pevsner.ru';
            $subject = 'Pevsner.ru. Новый отзыв';
            $message = 'hello Manager! <br>' . "\r\n"
                    . 'Имя :' .  $name . '<br>' . "\r\n"
                    . 'Телефон :' . $tel_for_bd . '<br>' . "\r\n"
                    . 'Текст отзыва : ' . $testimonial;
            
            $message_to_telegram = 'Pevsner.ru. Новый отзыв 💬' . PHP_EOL
                    . 'Имя :' .  $name . PHP_EOL
                    . 'Телефон :' . $tel_for_bd . PHP_EOL
                    . 'Текст отзыва : ' . $testimonial; 
            
            sendMessageTelegram($message_to_telegram);

            // Для отправки HTML-письма должен быть установлен заголовок Content-type
            $headers = 'Content-type: text/html; charset=utf-8' . "\r\n" .
                    'MIME-Version: 1.0' . "\r\n" .
                    // Дополнительные заголовки
                    'From: zakaz@pevsner.ru' . "\r\n" .
                    'Reply-To: zakaz@pevsner.ru' . "\r\n" .
                    'X-Mailer: PHP/' . phpversion();

            if (mail($to, $subject, $message, $headers . '-f zakaz@pevsner.ru')) {
                unset($_POST);
            }

            $result = [
                'text' => "Cпасибо за обращение, $name. Мы прикладываем все усилия, чтобы наш сервис стал лучше :)"
            ];
            
            echo json_encode($result, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES | JSON_NUMERIC_CHECK);
            exit();
        }
    } else {
        echo json_encode($error_msg, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES | JSON_NUMERIC_CHECK);
        exit();
    }
}


//форма заказа
if (isset($_POST['form_order'])) {
    
    $error_msg = false;
    
    //имя
    if (isset($_POST['order-input-name']) && !empty($_POST['order-input-name'])) {
        $name = htmlspecialchars($_POST['order-input-name']);
    } else {
        $error_msg = 'Ошибка передачи данных. order-input-name';
    }

    if (strlen($name) < 3) {
        $error_msg = "Ошибка! Неккоректное имя команды! Имя должно содержать не меньше трех символов";
    }

    //адрес
    if (isset($_POST['order-input-adress']) && !empty($_POST['order-input-adress'])) {
        $adress = htmlspecialchars($_POST['order-input-adress']);
    } else {
        $error_msg = 'Ошибка! данные не переданы! order-input-adress';
    }

    if (strlen($adress) < 3) {
        $error_msg = "Ошибка! Неккоректный адрес ! Имя должно содержать не меньше 3-х символов";
    }

    //телефон
    if (isset($_POST['order-input-tel']) && !empty($_POST['order-input-tel'])) {
        $tel = htmlspecialchars($_POST['order-input-tel']);
        //отрезаем лишнее у телефона
        $tel_for_bd = preg_replace('~[^0-9]+~', '', $tel);
        $tel_for_bd = substr_replace($tel_for_bd, '+7', 0, 1);
    } else {
        $error_msg = 'Ошибка! данные не переданы! reg_input_tel';
    }

    if (strlen($tel) != 17) {
        $error_msg = 'Ошибка! неккоректный номер телефона, попробуйте еще раз';
    }

    //email
    if (isset($_POST['order-input-email']) && !empty($_POST['order-input-email'])) {
        $email = htmlspecialchars($_POST['order-input-email']);
    } else {
        $error_msg = 'Ошибка! данные не переданы! order-input-email';
    }

    $pattern_email = "/^([a-z0-9_\.-])+@[a-z0-9-]+\.([a-z]{2,4}\.)?[a-z]{2,4}$/i";
    if (!preg_match($pattern_email, $email)) {
        $error_msg = 'Ошибка! неккоректный email, попробуйте еще раз';
    }

    //сумма
    if (isset($_POST['form_order_sum']) && !empty($_POST['form_order_sum'])) {
        $sum = htmlspecialchars($_POST['form_order_sum']);
    } else {
        $error_msg = 'Ошибка! данные не переданы! form_order_sum';
    }

    //состав заказа
    if (isset($_POST['form_order_order']) && !empty($_POST['form_order_order'])) {
        $order_description = htmlspecialchars($_POST['form_order_order']);
    } else {
        $error_msg = 'Ошибка! данные не переданы! form_order_order';
    }

    //выбранный стол
    if (isset($_POST['selected_table']) && !empty($_POST['selected_table'])) {
        $selected_table = htmlspecialchars($_POST['selected_table']);
    } else {
        $error_msg = 'Ошибка! данные не переданы! selected_table';
    }

    //код продукта
    if (isset($_POST['form_order_product_code']) && !empty($_POST['form_order_product_code'])) {
        $product_code = htmlspecialchars($_POST['form_order_product_code']);
    } else {
        $error_msg = 'Ошибка! данные не переданы! form_order_product_code';
    }

    //тип оплаты
    if (isset($_POST['payment_type']) && !empty($_POST['payment_type'])) {
        $payment_type = (int) ($_POST['payment_type']);
    } else {
        $error_msg = 'Ошибка! данные не переданы! payment_type';
    }

    //коммент
    if (isset($_POST['comment'])) {
        $comment = $_POST['comment'];
    } 
    
    //был промокод
    if (isset($_POST['has_promo'])) {
        $has_promo = true;
    } else {
        $has_promo = false;
    } 

    //когда везти
    if (isset($_POST['delivery_time'])) {
        $delivery_time = $_POST['delivery_time'];
    } else {
        $error_msg = 'Ошибка! данные не переданы! comment';
    
    }
    //дополнительно
    if (isset($_POST['form_order_kisel_add'])) {
        $add_kisel = $_POST['form_order_kisel_add'];
    } else {
        $error_msg = 'Ошибка! данные не переданы! form_order_kisel_add';
    }
    if (isset($_POST['form_order_product_add'])) {
        $add_product = $_POST['form_order_product_add'];
    } else {
        $error_msg = 'Ошибка! данные не переданы! form_order_product_add';
    }


    //если нет ошибок
    if (!$error_msg) {
        //если сохрнанился заказ
        $order_num = saveOrder($name, $adress, $tel_for_bd, $email, $sum, $order_description, $comment, $delivery_time, $payment_type, $selected_table);
        if ($order_num) {
            //$payment_type === 1 ? $payment_type_for_email = 'наличные' : $payment_type_for_email = 'картой';
            switch($payment_type) {
                case 1 :
                    $payment_type_for_email = 'наличные';
                    $payment_api_code = '1';
                    break;
                case 2 :
                    $payment_type_for_email = 'картой на сайте';
                    $payment_api_code = '2';
                    break;
                case 3 :
                    $payment_type_for_email = 'картой при получении';
                    $payment_api_code = '94';
                    break;
            }
            //отправляем себе данные о заказе
            $to = 'acigankov@inbox.ru, v.v.ilyin@yandex.ru, zakaz@pevsner.ru';
            $subject = '«Pevsner.ru». Новый заказ';
            $message = 'hello Manager! <br>' . "\r\n"
                    . 'Покупатель : ' . $name . ' <br>' . "\r\n"
                    . 'Адрес : ' . $adress . ' <br>' . "\r\n"
                    . 'Телефон  : ' . $tel_for_bd . '<br>' . "\r\n"
                    . 'Email : ' . $email . ' <br>' . "\r\n"
                    . 'Сумма : ' . $sum . ' <br>' . "\r\n"
                    . 'Заказ : ' . $order_description . ' <br>' . "\r\n"
                    . 'Номер Заказа : ' . $order_num . ' <br>' . "\r\n"
                    . 'Способ Оплаты : ' . $payment_type_for_email . ' <br>' . "\r\n"
                    . 'Стол : ' . $selected_table . ' <br>' . "\r\n"
                    . 'Доп блюдо 1 : ' . $add_kisel . ' <br>' . "\r\n"
                    . 'Доп блюдо 2 : ' . $add_product . ' <br>' . "\r\n"
                    . 'Когда привезти : ' . $delivery_time . ' <br>' . "\r\n"
                    . 'Купон применен : ' . $has_promo = $has_promo ? 'Да' : 'Нет' . ' <br>' . "\r\n"
                    . 'Комментарий : ' . $comment . ' <br>' . "\r\n";
            // Для отправки HTML-письма должен быть установлен заголовок Content-type
            
            $message_to_telegram = '«Pevsner.ru». Новый #заказ 🥳' . PHP_EOL
                . 'Покупатель : ' . $name . PHP_EOL
                . 'Адрес : ' . $adress . PHP_EOL
                . 'Телефон : ' . $tel_for_bd . PHP_EOL
                . 'Email : ' . $email . PHP_EOL
                . 'Сумма : ' . $sum . PHP_EOL
                . 'Заказ : ' . $order_description . PHP_EOL
                . 'Стол : ' . $selected_table . PHP_EOL
                . 'Доп блюдо 1 : ' . $add_kisel . PHP_EOL
                . 'Доп блюдо 2 : ' . $add_product . PHP_EOL
                . 'Номер Заказа  : ' . $order_num . PHP_EOL
                . 'Способ Оплаты : ' . $payment_type_for_email .  PHP_EOL
                . 'Когда привезти: ' . $delivery_time .  PHP_EOL
                . 'Комментарий: ' . $comment .  PHP_EOL;
                
            //отправляем сообщеньку в телеграм
            sendMessageTelegram($message_to_telegram);

            //отправляем заказ в Frontpad
            $orderDetails = [
                'product_code' => $product_code,
                'address' => $adress,
                'tel' => $tel_for_bd,
                'comment' => $comment,
                'name' => $name,
                'order_num' => $order_num,
                'payment_api_code' => $payment_api_code, 
                'email' => $email 
            ];

            sendOrderToFrontpad($orderDetails);


            
            $headers = 'Content-type: text/html; charset=utf-8' . "\r\n" .
                    'MIME-Version: 1.0' . "\r\n" .
                    // Дополнительные заголовки
                    'From: zakaz@pevsner.ru' . "\r\n" .
                    'Reply-To: zakaz@pevsner.ru' . "\r\n" .
                    'Return-Path: zakaz@pevsner.ru' . "\r\n" .
                    'X-Mailer: PHP/' . phpversion();


            if (mail($to, $subject, $message, $headers, '-f zakaz@pevsner.ru')) {
                //если писмьо ушло себе, отправляем чуваку
                $to = $email;
                $subject = '«Pevsner.ru». Ваш Заказ принят';

                $message = '<html lang="ru">
    <head>
        <meta charset="UTF-8">
        <title>«Pevsner.ru». Ваш Заказ принят</title>
    </head>
    <body>
    <center>
        <table border="0" cellpadding="" cellspacing="0"
               style="padding:0; 
               width: 600px;max-width: 
               100%;margin: 0 auto; 
               text-align: center; 
               font-family: Trebuchet MS, Helvetica, sans-serif; 
               font-size: 20px; 
               font-weight: 600;
               background-color: #00B670;
               color:#fff;
        ">
            <tbody>
                <tr>
                    <td>
                        <a href="https://pevsner.ru" target="_blank">
                            <img src="https://pevsner.ru/img/design/logo/logo.png" width="200" alt="logo">
                        </a>
                    </td>
                </tr>
                <tr>
                    <td style="padding: 60px 0 20px 0;">Здравствуйте, ' . $name . ' </td>
                </tr>
                <tr>
                    <td>Ваш заказ был принят. Ожидайте звонка менеджера для уточнения деталей. Менеджер свяжется с Вами в рабочее время с 09.00 до 19.00 </td>
                </tr>
                <tr>
                    <td style="padding: 30px 0 10px 0; text-transform: uppercase">Ваш заказ: </td>
                </tr>
                <tr>
                    <td style="">Номер заказа: #' . $order_num . '</td>
                </tr>
                <tr>
                    <td style="">Сумма заказа: ' . $sum . ' руб.</td>
                </tr>
                <tr>
                    <td style="">Состав заказа: ' . $order_description . ', ' . $selected_table .  '</td>
                </tr>
                <tr>
                    <td style="">Адрес заказа: ' . $adress . '</td>
                </tr>
                <tr>
                    <td style="padding-top:30px">C Уважением,</td>
                </tr>
                <tr>
                    <td>pevsner.ru</td>
                </tr>
            </tbody>
        </table>
    </center>   
 
</body>
</html>
';

                mail($to, $subject, $message, $headers, '-f zakaz@pevsner.ru');


                //если оплата картой даем ссылку на оплату
                if ($payment_type === 2) {

                    // $client = new Client();
                    // $client->setAuth($yk_shop_id, $yk_apikey);
                    // $payment = $client->createPayment(
                    //         array(
                    //     'amount' => array(
                    //         'value' => $sum,
                    //         'currency' => 'RUB',
                    //     ),
                    //     'confirmation' => array(
                    //         'type' => 'redirect',
                    //         'return_url' => 'https://pevsner.ru',
                    //     ),
                    //     'capture' => true,
                    //     'description' => 'Заказ №' . $order_num . ' - ' . $order_description,
                    //         ), uniqid('', true)
                    // );

                    $url_to_user = uniqid();
                    $result = [
                        'text' => "Спасибо за заказ , $name , Менеджер свяжется после оплаты :) Ваш номер заказа : #$order_num",
                        'order_num' => $order_num,
                        'url' => $url_to_user
                    ];
                } else {
                    $result = [
                        'text' => "Спасибо за заказ , $name , Менеджер свяжется для уточнения деталей :) Ваш номер заказа : #$order_num",
                        'order_num' => $order_num,
                        'url' => ''
                    ];
                }

                echo json_encode($result, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES | JSON_NUMERIC_CHECK);
                exit();
                
            } else {

                $result = [
                    'text' => 'ошибка отправки письма'
                ];

                echo json_encode($result, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES | JSON_NUMERIC_CHECK);
                exit();
            }
            
        } else {

            $result = [
                'text' => 'ошибка сохранения заказа'
            ];

            echo json_encode($result, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES | JSON_NUMERIC_CHECK);
            exit();
        }
    } else {
        echo json_encode($error_msg, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES | JSON_NUMERIC_CHECK);
        exit();
    }
    
} else {
    
    $result = [
        'text' => 'Ошибка отправки данных, попробуйте 123позднее.'
    ];
    echo json_encode($result, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES | JSON_NUMERIC_CHECK);
    exit();
}
?>