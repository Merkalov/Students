<?php
return array(
    //Авторизация
    '^login$' => 'Auth/Login',  //Асдрес в строке браузера => Контроллер/метод  $uriPatternt =>path
    '^register$' => 'Auth/Register', //Строка браузера => контроллер/метод(экшен)  $uriPatternt =>path
    '^ok$' => 'Auth/Ok',
    '^$'=> 'Auth/Login',

    //Информация о студенте
    '^myinfo$' => 'Info/MyInfo',
    '^myinfo/edit$' => 'Info/MyInfoEdit',

    //Работа со списком студентов
    '^list/([0-9]+)$' => 'Info/List/$1',
    '^list\/([0-9]+)\/([a-zA-Z=_]+)$' => 'Info/List/$1/$2',
    '^list\/([0-9]+)\/([a-zA-Z=_]+)/(asc|desc)$' => 'Info/List/$1/$2/$3',
    '^list$' => 'Info/List/1', //При открытии просто /list открывается /list/1, первая страница списка.
    '^list\/search\/([\w%]+)$' => 'Info/Search/$1',
    '^list/search$' => 'Info/Search',

    //Error, NoAccess, 404
    '^error$' => 'Errors/ShowErrors',
    '^noaccess$' => 'Errors/NoAccess', //нет доступа
    '^404$'=> 'Errors/NotFound'
);