<?php

namespace Models;

class Auth
{
    public static function login()
    {
        $database = \Database::connectDb();
        $email = $_POST['email'];
        Helper::filtrationEnterQuery('email');
        $pass = $_POST["pass"];
        Helper::filtrationEnterQuery('pass');

        $hash = $database->select(
            'users',
            ['password'],
            ["email" => $email]
        );

        $str = array_shift($hash); //из двумерного масива $hash вытаскиваем строку
        $str = array_shift($str); //вытащили строку

        $err = [];
        if (empty($str))
            $err[] = 'Данного имейла не сущевствует';
        elseif (password_verify($pass, $str)) //сравнили пароли
            Cookie::createCookie();
        else $err[] = 'Не верный пароль';

        return $err;
    }

    public static function register()
    {
        $database = \Database::connectDb();
        $hash = password_hash($_POST["pass"], PASSWORD_DEFAULT);
        $database->insert('users', [
            'email' => $_POST['email'],
            'password' => $hash,
        ]);
        Cookie::createCookie();
    }
}