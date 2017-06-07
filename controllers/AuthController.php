<?php

namespace Controllers;

use Models\Helper;
use Models\Auth;
use Models\Cookie;
use Models\Url;
use Models\View;

Class AuthController
{
    public $view;
    public $url;
    public $errors;
    public function __construct(){
        $this->view = new View();
        $this->url = new Url();
    }

    public function actionLogin()
    {
        ob_start();
        if (Cookie::checkCookie())
            $this->url->_redirect('myinfo', 301);
        else {
            $this->view->_render('login_form', []); //загружаем шаблон страницы, параметрами передаём пустой массив
            if (isset($_POST['login'])) {    //Кнопка нажата -> делаем
                $err = [];
                $err = Helper::validationLoginForm(); //запускаем проверки
                if (!empty($err)) {
                    $_SESSION['err'] = $err;
                    $this->url->_redirect('error', 301);
                }
                $err = Auth::login();  //Заходим
                if (empty($err))
                    $this->url->_redirect('myinfo', 301);
                else {
                    $_SESSION['err'] = $err;
                    $this->url->_redirect('error', 301);
                }
            }
        }
        ob_end_flush();
    }

    public function actionRegister()
    {
        ob_start();
        require_once(ROOT . '\views\reg_form.php');
        if (isset($_POST['register'])) {
            $err = Helper::validationRegForm();
            if (!empty($err)) {
                $_SESSION['err'] = $err;
                $this->url->_redirect('error', 301);
            } else {
                Auth::register();
                $this->url->_redirect('myinfo/edit', 301);
            }
        }
        ob_end_flush();
    }
}