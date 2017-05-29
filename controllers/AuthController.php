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
            header('Location: /myinfo');
        else {
            require_once(ROOT . '\views\login_form.php'); //загружаем шаблон страницы
            if (isset($_POST['login'])) {    //Кнопка нажата -> делаем

                $err = [];
                $err = Helper::validationLoginForm(); //запускаем проверки
                if (!empty($err)) {
                    $_SESSION['err'] = $err;
                    header('location: /error');
                }
                $err = Auth::login();  //Заходим
                if (empty($err))
                    header('Location: /myinfo');
                else {
                    $_SESSION['err'] = $err;
                    header('location: /error');
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
                header('location: /error');
            } else {
                Auth::register();
                header('Location: /myinfo/edit');
            }
        }
        ob_end_flush();
    }
}