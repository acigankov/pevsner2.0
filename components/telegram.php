<?php

// сюда нужно вписать токен вашего бота
define('TELEGRAM_TOKEN', '948906412:AAEpaHq2tij1iSDAeDU-XgaupW7ZduYhJ9M');

// сюда нужно вписать ваш внутренний айдишник
define('TELEGRAM_CHATID', '-338299075');

//sendMessageTelegram('Привет! Я сообщенька от твоего' . PHP_EOL .  'БОТА');

function sendMessageTelegram($text)
{
    $ch = curl_init();
    curl_setopt_array(
        $ch,
        array(
            CURLOPT_URL => 'https://api.telegram.org/bot' . TELEGRAM_TOKEN . '/sendMessage',
            CURLOPT_POST => TRUE,
            CURLOPT_RETURNTRANSFER => TRUE,
            CURLOPT_TIMEOUT => 10,
            CURLOPT_POSTFIELDS => array(
                'chat_id' => TELEGRAM_CHATID,
                'text' => $text,
            ),
        )
    );
    curl_exec($ch);
    
}
