<?php

namespace Models;

class Cookie
{
    public static function checkCookie()
    {
        if (isset($_COOKIE['hash_cookie'])) {
            $database = \Database::connectDb();
            $hash_cookie = $database->select(
                'users',
                ['hash_cookie'],
                [
                    "AND" => [
                        'hash_cookie' => $_COOKIE['hash_cookie'],
                        'user_ip' => $_SERVER['REMOTE_ADDR']
                    ]
                ]
            );
        }
        if (!empty($hash_cookie)) {
            return true;
        } else return false;
    }

    public static function createCookie()
    {
        $database = \Database::connectDb();
        $hash_cookie = md5($_POST['email']);
        setcookie('hash_cookie', $hash_cookie, time() + 360000000, '/');
        $database->update('users',
            [
                'hash_cookie' => $hash_cookie,
                'user_ip' => $_SERVER['REMOTE_ADDR']
            ],
            ['email' => $_POST['email']]
        );
    }

    public static function deleteCookie()
    {
        setcookie('hash_cookie', '', time() - (3600000000), '/');
    }
}
