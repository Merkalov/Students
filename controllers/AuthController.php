<?php

namespace Controllers;

use Models\Helper;
use Models\Auth;
use Models\Cookie;

Class AuthController
{
    public function actionLogin()
    {
        ob_start();
        if (Cookie::checkCookie())
            FrontController::_redirect('myinfo', 301);
        else {
            echo FrontController::_render('login_form', []);//загружаем шаблон страницы, параметрами передаём пустой массив
            if (isset($_POST['login'])) {    //Кнопка нажата -> делаем
                $err = [];
                $err = Helper::validationLoginForm(); //запускаем проверки
                if (!empty($err)) {
                    $_SESSION['err'] = $err;
                    FrontController::_redirect('error', 301);
                }
                $err = Auth::login();  //Заходим
                if (empty($err))
                    FrontController::_redirect('myinfo', 301);
                else {
                    $_SESSION['err'] = $err;
                    FrontController::_redirect('error', 301);
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
                FrontController::_redirect('error', 301);
            } else {
                Auth::register();
                FrontController::_redirect('myinfo/edit', 301);
            }
        }
        ob_end_flush();
    }
}