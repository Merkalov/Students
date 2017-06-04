<?php

namespace Models;

class Student
{
    public function addInfo()
    {
        $database = \Database::connectDb();
        $userID = $this->foundUserID();
        $database->insert('info', [
            'userID' => $userID,
            'name' => $_POST['name'],
            'surname' => $_POST['surname'],
            'gender' => $_POST['gender'],
            'numberGroup' => $_POST['numberGroup'],
            'email' => $_POST['email'],
            'countEge' => $_POST['countEge'],
            'yearOfBirth' => $_POST['yearOfBirth'],
            'location' => $_POST['location'],
        ]);

    }

    public function updateInfo()
    {
        $database = \Database::connectDb();
        $userID = $this->foundUserID();
        $database->update('info', [
            'userID' => $userID,
            'name' => $_POST['name'],
            'surname' => $_POST['surname'],
            'gender' => $_POST['gender'],
            'numberGroup' => $_POST['numberGroup'],
            'email' => $_POST['email'],
            'countEge' => $_POST['countEge'],
            'yearOfBirth' => $_POST['yearOfBirth'],
            'location' => $_POST['location'],
        ],
            [
                'userID' => $userID
            ]
        );
    }

    public function getInfoThisUserOnID($userID)
    {
        $database = \Database::connectDb();
        $user_info = $database->select('info',
            [
                'name',
                'surname',
                'gender',
                'numberGroup',
                'email',
                'countEge',
                'yearOfBirth',
                'location'
            ],
            [
                'userID' => $userID
            ]
        );
        return array_shift($user_info);
    }

    public function getInfoSomeStudents($startLimit, $sort, $typeSort)
    {
        $database = \Database::connectDb();
        if (empty($sort))
            $sort = 'countEge';
        if (empty($typeSort))
            $typeSort = 'desc';
        $typeSort = mb_strtoupper($typeSort);
        $infoStudents = [];
        $infoStudents = $database->select('info',
            [
                'name',
                'surname',
                'numberGroup',
                'countEge'
            ],
            [
                "LIMIT" => [$startLimit, 15],
                "ORDER" => [$sort => $typeSort]
            ]
        );
        return $infoStudents;
    }

    public function getInfoOnID($userID)
    {
        $database = \Database::connectDb();
        $infoUser = [];
        $infoUser = $database->select('info',
            [
                'name',
                'surname',
                'numberGroup',
                'countEge'],
            [
                'userID' => $userID
            ]
        );
        return $infoUser;
    }

    public function foundUserID()
    {
        $database = \Database::connectDb();
        $userID = $database->select('users',
            ['id'],
            [
                'hash_cookie' => $_COOKIE['hash_cookie']
            ]
        );
        $userID = array_shift($userID);
        $userID = $userID['id'];
        return $userID;
    }

    //Получить полное имя текущего пользователя для вывода в хеадер
    public function getFullName($userID)
    {
        $database = \Database::connectDb();
        $full_name = [];
        $full_name = $database->select('info',
            [
                'name',
                'surname'
            ],
            [
                'userID' => $userID
            ]
        );
        return array_shift($full_name);
    }

    public function searchID($searchQuery)
    {
        $database = \Database::connectDb();
        $infoStudents = [];
        $userID = $database->select('info',
            ['userID'],
            [
                "OR" => [
                    "name" => $searchQuery,
                    "surname[REGEXP]" => $searchQuery,
                    "numberGroup" => $searchQuery,
                    "countEge" => $searchQuery
                ]
            ]
        );
        return $userID;
    }


}
