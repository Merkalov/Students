<!DOCTYPE html>
<html lang="ru">
<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8">
    <title>Список студентов</title>
    <link href="/../public/css/style_list.css" rel="stylesheet" type="text/css">
</head>
<body>
<!--<header>Список студентов</header>-->
<div id="header1">
    <label id="headlabel"><?php echo "{$userName['name']} {$userName['surname']}"; ?></label>
    <form name="test" action="" method="Post">
        <input class = "exit" type="submit" name="exit" value="Выйти">
        <input class = "exit profile" type="submit" name="profile" value="Профиль">
    </form>
</div>
<div id="search">
    <label id="label1">Список студентов</label>
    <form name="found" method="POST">
        <input class = "exit found" type="submit" name="found" value="Найти">
        <input class="searchInput" type="text" name="search" placeholder="Поиск">
    </form>
</div>
<div id="main">
    <table>
        <tr>
            <td class="firstStr">№</td>
            <td class="firstStr">Имя</td>
            <td class="firstStr">Фамилия</td>
            <td class="firstStr">Номер группы</td>
            <td class="firstStr">Число баллов</td>
        </tr>
        <?php
        if (!empty($foundIdStudents)){
        $i = 0;
            foreach ($infoStudents as $user){
                $i++;
            foreach ($user as $student){
                echo <<<END
                  <tr>
                    <td class="id">{$i}</td>
                    <td class="name">{$student['name']}</td>
                    <td class="surname">{$student['surname']}</td>
                    <td class="numberGroup">{$student['numberGroup']}</td>
                    <td class="countEge">{$student['countEge']}</td>
                </tr>
END;
        }
            }
        }
        ?>
    </table>
    <?php
        if (empty($foundIdStudents))
            echo "<br> Ничего не найдено.";
    ?>
</div>
<div class="page_str">
    <?php
       echo "<a href='".$this->url->getHomeUrl()."/list' class = \"page\">[Вернуться к списку студентов]</a>";
    ?>
</div>
</body>
</html>