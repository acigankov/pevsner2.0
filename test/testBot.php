<?php
define('ROOT', $_SERVER['DOCUMENT_ROOT']);
include_once ROOT . '/config/config.php'; 

sendMessageTelegram('Привет! Я сообщенька от твоего' . PHP_EOL .  'БОТА');