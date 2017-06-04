<?php

namespace Controllers;

use Models\Cookie;
use Models\Helper;
use Models\Page;
use Models\Student;

class InfoController
{
    public $student;
    public $userID;

    public function __construct()
    {
        $this->student = new Student();
        $this->userID = $this->student->foundUserID();
    }

    public function actionMyInfo()
    {
        ob_start();
        If (Cookie::checkCookie()) { //Чекаем куки->вернули тру делаем

            $options = [];
            $options['infoUser'] = $this->student->getInfoThisUserOnID($this->userID); //Переменная для вывода инфы в шаблоне

            echo FrontController::_render('myinfo', $options);// вывод шаблона

            if (isset($_POST['edit']))
                FrontController::_redirect('myinfo/edit', 301);

            if (isset($_POST['exit'])) {
                Cookie::deleteCookie();
                FrontController::_redirect('login', 301);
            }
        }
        else
            FrontController::_redirect('NoAccess', 301);
        ob_end_flush();
    }

    public function actionMyInfoEdit()
    {
        ob_start();
        If (Cookie::checkCookie()) {
            $options = [];
            $options['infoUser'] = $infoUser = $this->student->getInfoThisUserOnID($this->userID); //Переменная для вывода инфы в шаблоне

            echo FrontController::_render('myinfo_edit', $options);

            if (isset($_POST['save'])) {
                $err = Helper::validationMyInfoForm();
                if (!empty($err)) {
                    $_SESSION['err'] = $err;
                    FrontController::_redirect('error', 301);
                } elseif (empty($infoUser['name'])) { //Если не определенно имя студента->значит он только зарегался
                    $this->student->addInfo(); // добавляем информацию в базу
                    FrontController::_redirect('myinfo', 301);
                } else { //Если имя определено, значит обновляем информацию.
                    $this->student->updateInfo();
                    FrontController::_redirect('myinfo', 301);
                }
            }
        }
        else
            FrontController::_redirect('NoAccess', 301);
        ob_end_flush();
    }

    public function actionList($parameters)
    {
        ob_start();
        if (Cookie::checkCookie()) {
            $page = 0;

            $options = [];
            $this->userID = $this->student->foundUserID();
            $options['userName'] = $this->student->getFullName($this->userID);

            $options['page'] = array_shift($parameters);
            $options['sort'] = array_shift($parameters);
            $options['typeSort'] = array_shift($parameters);

            if (is_numeric($page)) {
                $options['startLimit'] = ($options['page'] - 1) * 15; //limit для запроса в базу данных
                $options['infoStudents'] = $this->student->getInfoSomeStudents($options['startLimit'], $options['sort'],  $options['typeSort']); //загружаем инфу для выбранной страницы
                echo FrontController::_render('list', $options);
            }

            if (isset($_POST['exit'])) {
                Cookie::deleteCookie();
                FrontController::_redirect('login', 301);
            }

            if (isset($_POST['profile']))
                FrontController::_redirect('myinfo', 301);

            if (isset($_POST['found'])) {
                $searchQuery = $_POST['search'];
                $searchQuery = Helper::filtrationEnterData($searchQuery);
                $searchQuery = Helper::registerAlignment($searchQuery);
                $searchQuery = urlencode($searchQuery);
                FrontController::_redirect("list/search/{$searchQuery}", 301);
            }
        }
        else
            FrontController::_redirect('NoAccess', 301);
        ob_end_flush();
    }

    public function actionSearch($parameters)
    {
        ob_start();
        if (Cookie::checkCookie()) { //Чекаем куки->вернули тру делаем

            $options = [];
            $options['userName'] = $this->student->getFullName($this->userID);

            $searchQuery = array_shift($parameters);
            $searchQuery = urldecode($searchQuery);

            $err = [];
            $err = Helper::validationSearchQuery($searchQuery); //запускаем проверки
            if (!empty($err)) {
                $_SESSION['err'] = $err;
                FrontController::_redirect('error', 301);
            }

            $foundIdStudents = [];
            $foundIdStudents = $this->student->searchID($searchQuery); //Находим студентов в таблице users, возвращаем их id

            $infoStudents = [];
            if (!empty($foundIdStudents)) { //Двумерный массив, в котором студентики с idшками
                foreach ($foundIdStudents as $studentID) {
                    $infoStudents[] = $this->student->getInfoOnID($studentID['userID']);//получаем инфу по студентикам// ретурн масств в массиве в массивах по массивам через массив
                }
            }
            $options['infoStudents'] = $infoStudents;
            $options['found_id_students'] = $foundIdStudents;

            echo FrontController::_render('search', $options);

            if (isset($_POST['exit'])) {
                Cookie::deleteCookie();
                FrontController::_redirect('login', 301);
            }

            if (isset($_POST['profile']))
                FrontController::_redirect('myinfo', 301);

            if (isset($_POST['found'])) {
                $searchQuery = $_POST['search'];
                $searchQuery = Helper::filtrationEnterData($searchQuery);
                $searchQuery = Helper::registerAlignment($searchQuery);
                $searchQuery = urlencode($searchQuery);
                FrontController::_redirect("list/search/{$searchQuery}", 301);
            }
        }
        else
            FrontController::_redirect('NoAccess', 301);
        ob_end_flush();
    }
}