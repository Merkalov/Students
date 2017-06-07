<?php

namespace Controllers;

use Models\Url;
use Models\View;

class ErrorsController
{
    public $view;
    public $url;
    public function __construct()
    {
        $this->view = new View();
        $this->url = new Url();
    }

    public function actionShowErrors()
    {
        ob_start();
        $parameters = [];
        $parameters['err'] = $_SESSION['err'];
        $this->view->_render('error_show', $parameters);
        ob_end_flush();
    }

    public function actionNoAccess()
    {
        ob_start();
       $this->view->_render('no_access', []);
        if (isset($_POST['login']))
            $this->url->_redirect('login', 301);
        if (isset($_POST['register']))
            $this->url->_redirect('register', 301);
        ob_end_flush();
    }

    public function actionNotFound()
    {
        ob_start();
       $this->view->_render('404', []);
        if (isset($_POST['ok'])) {
            $this->url->_redirect('login', 301);
        }
        ob_end_flush();
    }
}