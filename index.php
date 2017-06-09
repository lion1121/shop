<?php

//FRONT CONTROLLER


// 1. ОБЩИЕ НАСТРОЙКИ

ini_set('display_errors', 1);
error_reporting(E_ALL);
session_start();

// 2. ПОДКЛЮЧЕНИЕ ФАЙЛОВ СИСТЕМЫ

define('ROOT', dirname(__FILE__));
require_once(ROOT . '/components/Autoload.php');



// 3. ВЫЗОВ ROUTER
$router = new Router();
$router->run();
; ?>