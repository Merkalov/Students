<?php

namespace Models;

class Student
{
    public function addInfo()
    {
        $database = \Database::connectDb();
        $user_id = $this->foundUserId();
        $database->insert('info', [
            'user_id' => $user_id,
            'name' => $_POST['name'],
            'last_name' => $_POST['last_name'],
            'gender' => $_POST['gender'],
            'number_group' => $_POST['number_group'],
            'email' => $_POST['email'],
            'count_ege' => $_POST['count_ege'],
            'year_of_birth' => $_POST['year_of_birth'],
            'location' => $_POST['location'],
        ]);

    }

    public function updateInfo()
    {
        $database = \Database::connectDb();
        $user_id = $this->foundUserId();
        $database->update('info', [
            'user_id' => $user_id,
            'name' => $_POST['name'],
            'last_name' => $_POST['last_name'],
            'gender' => $_POST['gender'],
            'number_group' => $_POST['number_group'],
            'email' => $_POST['email'],
            'count_ege' => $_POST['count_ege'],
            'year_of_birth' => $_POST['year_of_birth'],
            'location' => $_POST['location'],
        ],
            [
                'user_id' => $user_id
            ]
        );
    }

    public function getInfoThisUserOnID($user_id)
    {
        $database = \Database::connectDb();
        $user_info = $database->select('info',
            [
                'name',
                'last_name',
                'gender',
                'number_group',
                'email',
                'count_ege',
                'year_of_birth',
                'location'
            ],
            [
                'user_id' => $user_id
            ]
        );
        return array_shift($user_info);
    }

    public function getInfoSomeStudents($start_limit, $sort, $typeSort)
    {
        $database = \Database::connectDb();
        if (empty($sort))
            $sort = 'count_ege';
        if (empty($typeSort))
            $typeSort = 'desc';
        $typeSort = mb_strtoupper($typeSort);
        $info_users = [];
        $info_users = $database->select('info',
            [
                'name',
                'last_name',
                'number_group',
                'count_ege'
            ],
            [
                "LIMIT" => [$start_limit, 15],
                "ORDER" => [$sort => $typeSort]
            ]
        );
        return $info_users;
    }

    public function getInfoOnID($user_id)
    {
        $database = \Database::connectDb();
        $info_user = [];
        $info_user = $database->select('info',
            [
                'name',
                'last_name',
                'number_group',
                'count_ege'],
            [
                'user_id' => $user_id
            ]
        );
        return $info_user;
    }

    public function foundUserId()
    {
        $database = \Database::connectDb();
        $user_id = $database->select('users',
            ['id'],
            [
                'hash_cookie' => $_COOKIE['hash_cookie']
            ]
        );
        $user_id = array_shift($user_id);
        $user_id = $user_id['id'];
        return $user_id;
    }

    //Получить полное имя текущего пользователя для вывода в хеадер
    public function getFullName($user_id)
    {
        $database = \Database::connectDb();
        $full_name = [];
        $full_name = $database->select('info',
            [
                'name',
                'last_name'
            ],
            [
                'user_id' => $user_id
            ]
        );
        return array_shift($full_name);
    }

    public function searchID($search_query)
    {
        $database = \Database::connectDb();
        $info_users = [];
        $user_id = $database->select('info',
            ['user_id'],
            [
                "OR" => [
                    "name" => $search_query,
                    "last_name[REGEXP]" => $search_query,
                    "number_group" => $search_query,
                    "count_ege" => $search_query
                ]
            ]
        );
        return $user_id;
    }


}
