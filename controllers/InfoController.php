<?php

namespace Controllers;

use Models\Cookie;
use Models\Helper;
use Models\Page;
use Models\Student;

class InfoController
{
    public $student;
    public $user_id;

    public function __construct()
    {
        $this->student = new Student();
        $this->user_id = $this->student->foundUserId();
    }

    public function actionMyInfo()
    {
        ob_start();
        If (Cookie::checkCookie()) { //Чекаем куки->вернули тру делаем

            $options = [];
            $options['info_user'] = $this->student->getInfoThisUserOnID($this->user_id); //Переменная для вывода инфы в шаблоне

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
            $options['info_user'] = $this->student->getInfoThisUserOnID($this->user_id); //Переменная для вывода инфы в шаблоне
            //$options['page'] = $page;

            echo FrontController::_render('myinfo_edit', $options);

            if (isset($_POST['save'])) {
                $err = Helper::validationMyInfoForm();
                if (!empty($err)) {
                    $_SESSION['err'] = $err;
                    FrontController::_redirect('error', 301);
                } elseif (empty($info_user['name'])) { //Если не определенно имя студента->значит он только зарегался
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
            $this->user_id = $this->student->foundUserId();
            $options['user_name'] = $this->student->getFullName($this->user_id);

            $options['page'] = array_shift($parameters);
            $options['sort'] = array_shift($parameters);
            $options['typeSort'] = array_shift($parameters);

            if (is_numeric($page)) {
                $options['start_limit'] = ($options['page'] - 1) * 15; //limit для запроса в базу данных
                $options['info_users'] = $this->student->getInfoSomeStudents($options['start_limit'], $options['sort'],  $options['typeSort']); //загружаем инфу для выбранной страницы
                echo FrontController::_render('list', $options);
            }

            if (isset($_POST['exit'])) {
                Cookie::deleteCookie();
                FrontController::_redirect('login', 301);
            }

            if (isset($_POST['profile']))
                FrontController::_redirect('myinfo', 301);

            if (isset($_POST['found'])) {
                $search_query = $_POST['search'];
                $search_query = Helper::filtrationEnterData($search_query);
                $search_query = Helper::registerAlignment($search_query);
                $search_query = urlencode($search_query);
                FrontController::_redirect("list/search/{$search_query}", 301);
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
            $options['user_name'] = $this->student->getFullName($this->user_id);

            $search_query = array_shift($parameters);
            $search_query = urldecode($search_query);

            $err = [];
            $err = Helper::validationSearchQuery($search_query); //запускаем проверки
            if (!empty($err)) {
                $_SESSION['err'] = $err;
                FrontController::_redirect('error', 301);
            }

            $found_id_students = [];
            $found_id_students = $this->student->searchID($search_query); //Находим студентов в таблице users, возвращаем их id

            $info_users = [];
            if (!empty($found_id_students)) { //Двумерный массив, в котором студентики с idшками
                foreach ($found_id_students as $student_id) {
                    $info_users[] = $this->student->getInfoOnID($student_id['user_id']);//получаем инфу по студентикам// ретурн масств в массиве в массивах по массивам через массив
                }
            }
            $options['info_users'] = $info_users;
            $options['found_id_students'] = $found_id_students;

            echo FrontController::_render('search', $options);

            if (isset($_POST['exit'])) {
                Cookie::deleteCookie();
                FrontController::_redirect('login', 301);
            }

            if (isset($_POST['profile']))
                FrontController::_redirect('myinfo', 301);

            if (isset($_POST['found'])) {
                $search_query = $_POST['search'];
                $search_query = Helper::filtrationEnterData($search_query);
                $search_query = Helper::registerAlignment($search_query);
                $search_query = urlencode($search_query);
                FrontController::_redirect("list/search/{$search_query}", 301);
            }
        }
        else
            FrontController::_redirect('NoAccess', 301);
        ob_end_flush();
    }
}