<?php

namespace Controllers;

class ErrorsController
{
    public static function actionShowErrors()
    {
        ob_start();
        $err = [];
        $err = $_SESSION['err'];
        require_once(ROOT . '\views\error_show.php');
        ob_end_flush();
    }

    public function actionNoAccess()
    {
        ob_start();
        require_once(ROOT . '\views\no_access.php');
        if (isset($_POST['login'])) {
            header('Location: /login');
        }
        if (isset($_POST['register'])) {
            header('location: /register');
        }
        ob_end_flush();
    }

    public function actionNotFound()
    {
        ob_start();
        require_once(ROOT . '\views\404.php');
        if (isset($_POST['ok'])) {
            header('Location: /login');
        }
        ob_end_flush();
    }
}