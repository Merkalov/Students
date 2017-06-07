<?php

namespace Controllers;
use Models\Url;
use Models\Page;


Class FrontController
{
    private $routes;  //маршруты

    public function __construct()
    {
        $routesPath = ROOT . '/config/routes.php';
        $this->routes = include($routesPath);
    }

    private function getURI()
    {
        If (!empty($_SERVER['REQUEST_URI'])) {
            $url = mb_strtolower($_SERVER['REQUEST_URI']); //в нижний регистр
            return trim($url, '/');
        }
    }

    public function start()
    {
        //получить строку запроса
        $uri = $this->getURI();
        ob_start(); //Уворачиваемя от вывода любой инфы, ведь мы всюду суём заголовки

        $total = count($this->routes); //для вычисления последенго элемента массива
        $counter = 0; //для вычисления последенго элемента массива

        //Проверить наличие такого маршрута в routes.php
        foreach ($this->routes as $uriPattern => $path) {
            $counter++;
            if (preg_match("~$uriPattern~ui", $uri)) {  //Если шаблон найден в строке запроса. строка запроса имеет известное имя, то
                $editedPath = preg_replace("~$uriPattern~ui", $path, $uri);
                $segments = explode('/', $editedPath);    //разделяем

                $controllerName = ucfirst(array_shift($segments)) . 'Controller'; // Извлекаем первый эллемент массива и добавляем слово контроллер
                $actionName = 'action' . ucfirst(array_shift($segments)); //Извлекаем второй эллемент массива, экшен.
                $parameters = $segments; //Оставшиеся параметры вроде открытой страницы, типа сортировки передаёт экшену в виде $parameters

                $controllerName = 'Controllers\\' . $controllerName; //Добавляем неймспейс \Controllers\. use Controllers\AuthController НЕ РАБОТАЕТ.
                $controllerObject = new $controllerName;
                $controllerObject->$actionName($parameters);

                break; //строка найдена, объект создан, экшен запущен, прекращаем работу цикла.

            } elseif ($total == $counter) {  //если строка запроса не найдена и это последний эллемент массива путей, то 404
                self::_redirect('404', 302);
                break;
            }
        }
        ob_end_flush();
    }
}