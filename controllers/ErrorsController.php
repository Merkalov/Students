<?php

namespace Controllers;
use Models\Errors;
class ErrorsController
{
    public static function actionShowErrors()
    {
        ob_start();
        $parameters = [];
        $parameters['err'] = $_SESSION['err'];
        echo FrontController::_render('error_show', $parameters);
        ob_end_flush();
    }

    public function actionNoAccess()
    {
        ob_start();
        echo FrontController::_render('no_access', []);
        if (isset($_POST['login']))
            FrontController::_redirect('login', 301);
        if (isset($_POST['register']))
            FrontController::_redirect('register', 301);
        ob_end_flush();
    }

    public function actionNotFound()
    {
        ob_start();
        echo FrontController::_render('404', []);
        if (isset($_POST['ok'])) {
            FrontController::_redirect('login', 301);
        }
        ob_end_flush();
    }
}