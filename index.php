<?php
session_start();
header("Content-Type: text/html; charset=utf-8");

//Общие настройки
ini_set('display_errors',1);
error_reporting(E_ALL);

//Контанта вычисляющая корневой католог.
define('ROOT', dirname(__FILE__));

//Автоподключение классов
require_once(ROOT . '\vendor\autoload.php');

//Подключение файла конфига БД
require_once (ROOT. '\config\Database.php');
//Конфиг с url
require_once (ROOT. '\config\Url.php');

//Вызов FrontController
use Controllers\FrontController;

$router = new FrontController();
$router->start();
