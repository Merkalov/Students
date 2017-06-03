<?php

namespace Models;

class Auth
{
    public static function login()
    {
        $database = \Database::connectDb();
        $email = Helper::filtrationEnterData($_POST['email']);
        $pass = Helper::filtrationEnterData($_POST["pass"]);

        $passInDb = $database->select(
            'users',
            ['password'],
            ["email" => $email]
        );

        $passInDb = array_shift($passInDb); //из двумерного масива $passInDb вытаскиваем строку
        $passInDb = array_shift($passInDb); //вытащили строку

        $err = [];

        if (empty($passInDb))
            $err[] = 'Данного имейла не сущевствует';
        elseif (password_verify($pass, $passInDb)) //сравнили пароли
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