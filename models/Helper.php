<?php

namespace Models;
class Helper
{
    public static function validationRegForm()
    {
        $database = \Database::connectDb();
        $err = [];

        $email = Helper::filtrationEnterData($_POST['email']);
        if (empty($email))
            $err[] = 'Поле Email не может быть пустым!';
        elseif (!filter_var($email, FILTER_VALIDATE_EMAIL))
            $err[] = 'Не правильно введен E-mail';
        elseif (strlen($email) > 30)
            $err = 'Email не может содержать больше 30 знаков';

        $row = $database->select(
            'users',
            ["email"],
            ["email" => $email]
        );
        if (!empty($row))
            $err[] = 'К сожалению email: <b>' . $email . '</b> уже зарегистрирован!<br>';

        $password = Helper::filtrationEnterData($_POST['pass']);
        if (empty($password))
            $err[] = 'Поле Пароль не может быть пустым';
        elseif (strlen($password) > 20)
            $err = 'Пароль не может содержать больше 20 знаков';

        $password2 = Helper::filtrationEnterData($_POST['pass2']);
        if (empty($password2))
            $err[] = 'Поле подтверждения пароля не может быть пустым';
        elseif (strlen($password) > 20)
            $err = 'Поле подтверждения пароля не может содержать больше 20 знаков';

        if ($password != $password2)
            $err[] = 'Пароли не совподают';

        return $err;
    }

    public static function validationLoginForm()
    {
        $database = \Database::connectDb();
        $err = [];
        $email = Helper::filtrationEnterData($_POST['email']);
        if (empty($email))
            $err[] = 'Поле Email не может быть пустым!';
        elseif (filter_var($email, FILTER_VALIDATE_EMAIL))
            $err[] = 'Не правильно введен E-mail';
        elseif (strlen($email) > 30)
            $err = 'Email не может содержать больше 30 знаков';

        $password = Helper::filtrationEnterData($_POST['pass']);
        if (empty($password))
            $err[] = 'Поле Пароль не может быть пустым';
        elseif (strlen($password) > 20)
            $err = 'Пароль не может содержать больше 20 знаков';

        if (!empty($email)) {
            $email = $database->select(
                'users',
                ['email'],
                ['email' => $email]
            );
            if (empty($email)) {
                $err[] = "Пользователь с таким Email'ом не найден.";
            }
        }
        return $err;
    }

    public static function validationMyInfoForm()
    {
        $err = [];

        $name = Helper::filtrationEnterData($_POST['name']);
        $name = Helper::registerAlignment($name);
        if (empty($name))
            $err[] = 'Поле имя не может быть пустым';
        elseif (strlen($name) > 20)
            $err[] = 'Поле имя не может содержать больше 20 символов';
        elseif (preg_match('@[a-zA-Z]@u', $name))
            $err[] = 'Поле имя не может содержать буквы латинского алфавита. Только кирилица';
        elseif (preg_match('@[0-9]@u', $name))
            $err[] = 'Поле имя не может содержать цифры или иные символы отличие от кирилицы.';


        $surname = Helper::filtrationEnterData($_POST['surname']);
        $surname = Helper::registerAlignment($surname);
        if (empty($surname))
            $err[] = 'Поле фамилия не может быть пустым';
        elseif (mb_strlen($surname, 'utf-8') > 20)
            $err[] = 'Поле фамилия не может содержать больше 20 символов';
        elseif (preg_match('@[a-zA-Z]@u', $surname))
            $err[] = 'Поле фамилия не может содержать буквы латинского алфавита. Только кирилица';
        elseif (preg_match('@[0-9]@u', $surname))
            $err[] = 'Поле фамилия не может содержать цифры. Только кирилица';

        if (empty($_POST['gender']))
            $err[] = 'Выберите пол';

        $numberGroup = Helper::filtrationEnterData($_POST['numberGroup']);
        $numberGroup = mb_strtolower($numberGroup, 'utf-8');
        if (empty($numberGroup))
            $err[] = 'Поле "Номер группы" не может быть пустым!';
        elseif (!preg_match("~([0-9]+)([а-яё]*)~ui", $numberGroup))
            $err[] = 'Номер группы должен содержать цифры. Так же может содержать буквы.';
        elseif (mb_strlen($numberGroup, 'utf-8') < 2 && mb_strlen($numberGroup, 'utf-8') > 5)
            $err[] = 'Номер группы должен содержать от 2 до 5 символов';

        $email = Helper::filtrationEnterData($_POST['email']);
        $email = mb_strtolower($email, 'utf-8');
        if (empty($email))
            $err[] = 'Поле Email не может быть пустым!';
        elseif (!filter_var($email, FILTER_VALIDATE_EMAIL))
            $err[] = 'Не правильно введен E-mail';
        elseif (strlen($email) > 30)
            $err = 'Email не может содержать больше 30 знаков';

        $countEge = Helper::filtrationEnterData($_POST['countEge']);
        if (empty($countEge))
            $err[] = 'Поле "кол-во баллов по ЕГЭ" не может быть пустым!';
        elseif (!preg_match('~[0-9]+~', $countEge))
            $err[] = 'Поле "кол-во баллов по ЕГЭ" должно содержать только цифры';
        elseif ($countEge > 200)
            $err[] = 'Не верно указано кол-во баллов по ЕГЭ. Укажите баллы за 2 обязательных предмета';
        elseif ($countEge < 0)
            $err[] = 'Не верно указано кол-во баллов по ЕГЭ. Введено значение меньше нуля.';

        $yearOfBirth = Helper::filtrationEnterData($_POST['yearOfBirth']);
        if (!preg_match('~[0-9]{4}~', $yearOfBirth))
            $err[] = 'Не вверно введен год рождения.';

        if (empty($_POST['location']))
            $err[] = 'Выберите прописку';

        return $err;
    }

    public static function validationSearchQuery($searchQuery)
    {
        $err = [];
        if (empty($searchQuery))
            $err[] = 'Поле Поиск не может быть пустым!';
        elseif (mb_strlen($searchQuery, 'utf-8') > 50)
            $err[] = 'Поле Поиск не может содержать больше 50 символов';
        elseif (preg_match('~^[\w\+\s]+$~ui', $searchQuery) == 0) { //а-яёА-ЯЁ
            $err[] = 'Поле поиск может содержать только буквы и цифры.';
        } elseif (preg_match('~\s~', $searchQuery) == 1)
            $err[] = 'Поле поиск может содержать только фамилию, или только имя, или только номер группы, или только число баллов. ';

        return $err;
    }

    public static function filtrationEnterData($data)
    {
        $data = trim($data);
        $data = strip_tags($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    public static function registerAlignment($data)
    {
        $data = mb_strtolower($data, 'utf-8');
        $data = mb_convert_case($data, MB_CASE_TITLE, "UTF-8");  //ucfirst
        return $data;
    }
}
