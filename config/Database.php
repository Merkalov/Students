<?php

Use Medoo\Medoo;
class Database
{
    private static $connection;

    public static function connectDb()
    {
        if (!self::$connection) {
            self::$connection = new Medoo([
                'database_type' => 'mysql',
                'database_name' => 'students',
                'server' => 'localhost',
                'username' => 'root',
                'password' => 'root',
                'charset' => 'utf8'
            ]);
        }

        return self::$connection;
    }
}