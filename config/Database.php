<?php

Use Medoo\Medoo;
class Database
{
    public static function connectDb()
    {
        $database = new Medoo(
            [
            'database_type' => 'mysql',
            'database_name' => 'students',
            'server' => 'localhost',
            'username' => 'root',
            'password' => '',
            'charset' => 'utf8'
            ]
        );
        return $database;
    }
}
