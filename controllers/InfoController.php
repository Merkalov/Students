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
    public $page;

    public function __construct()
    {
        $this->student = new Student();
        $this->user_id = $this->student->foundUserId();
        $this->page = new Page();
    }

    public function actionMyInfo()
    {
        ob_start();
        If (Cookie::checkCookie()) { //Чекаем куки->вернули тру делаем

            $info_user = $this->student->getInfoThisUserOnID($this->user_id); //Переменная для вывода инфы в шаблоне

            require_once(ROOT . '\views\myinfo.php');

            if (isset($_POST['edit']))
                header('location: /myinfo/edit');

            if (isset($_POST['exit'])) {
                Cookie::deleteCookie();
                header('Location: /login');
            }
        } else header('location: /NoAccess');
        ob_end_flush();
    }

    public function actionMyInfoEdit()
    {
        ob_start();
        If (Cookie::checkCookie()) {
            $info_user = $this->student->getInfoThisUserOnID($this->user_id); //Переменная для вывода инфы в шаблоне

            require_once(ROOT . '\views\myinfo_edit.php');

            if (isset($_POST['save'])) {
                $err = Helper::validationMyInfoForm();
                if (!empty($err)) {
                    $_SESSION['err'] = $err;
                    header('location: /error');
                } elseif (empty($info_user['name'])) { //Если не определенно имя студента->значит он только зарегался
                    $this->student->addInfo(); // добавляем информацию в базу
                    header('Location: /myinfo');
                } else { //Если имя определено, значит обновляем информацию.
                    $this->student->updateInfo(); //обновляем информацию в базе
                    header('Location: /myinfo');
                }
            }
        } else header('location: /NoAccess');
        ob_end_flush();
    }

    public function actionList($parameters)
    {
        ob_start();
        if (Cookie::checkCookie()) {
            $page = 0;

            $user_name = [];//Переменна для вывода инфы о текущем пользователе в шаблоне
            $this->user_id = $this->student->foundUserId();
            $user_name = $this->student->getFullName($this->user_id);

            $page = array_shift($parameters);
            $sort = array_shift($parameters);
            $typeSort = array_shift($parameters);

            if (is_numeric($page)) {
                $info_users = [];//Переменна для вывода инфы в шаблоне о студентах(список)
                $start_limit = ($page - 1) * 15; //limit для запроса в базу данных
                $info_users = $this->student->getInfoSomeStudents($start_limit, $sort, $typeSort); //загружаем инфу для выбранной страницы

                require_once(ROOT . '\views\list.php');//загружаем шаблон
            }

            if (isset($_POST['exit'])) {
                Cookie::deleteCookie();
                header('Location: /login');
            }

            if (isset($_POST['profile']))
                header('Location: /myinfo');

            if (isset($_POST['found'])) {
                $search_query = $_POST['search'];
                $search_query = Helper::filtrationEnterQuery($search_query);
                $search_query = Helper::registerAlignment($search_query);
                $search_query = urlencode($search_query);
                header("location: /list/search/$search_query");
            }
        } else header('location: /NoAccess');
        ob_end_flush();
    }

    public function actionSearch($parameters)
    {
        ob_start();
        if (Cookie::checkCookie()) { //Чекаем куки->вернули тру делаем

            $user_name = [];//Переменна для вывода инфы о текущем пользователе в шаблоне
            $user_name = $this->student->getFullName($this->user_id);

            $search_query = array_shift($parameters);
            $search_query = urldecode($search_query);

            $err = [];
            $err = Helper::validationSearchQuery($search_query); //запускаем проверки
            if (!empty($err)) {
                $_SESSION['err'] = $err;
                header('location: /error');
            }

            $found_id_students = [];
            $found_id_students = $this->student->searchID($search_query); //Находим студентов в таблице users, возвращаем их id

            if (!empty($found_id_students)) { //Двумерный массив, в котором студентики с idшками
                foreach ($found_id_students as $student_id) {
                    $info_users[] = $this->student->getInfoOnID($student_id['user_id']);//получаем инфу по студентикам// ретурн масств в массиве в массивах по массивам через массив
                }
            }

            require_once(ROOT . '\views\search.php');//загружаем шаблон

            if (isset($_POST['exit'])) {
                Cookie::deleteCookie();
                header('Location: /login');
            }

            if (isset($_POST['profile']))
                header('Location: /myinfo');

            if (isset($_POST['found'])) {
                $search_query = $_POST['search'];
                $search_query = Helper::filtrationEnterQuery($search_query);
                $search_query = Helper::registerAlignment($search_query);
                $search_query = urlencode($search_query);
                header("location: /list/search/$search_query");
            }
        } else header('location: /NoAccess');
        ob_end_flush();
    }
}