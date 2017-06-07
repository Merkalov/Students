<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8">
    <title>Список студентов</title>
    <link href="/../public/css/style_list.css" rel="stylesheet" type="text/css">
</head>
<body>
<!--<header>Список студентов</header>-->
<div id="header1">
    <label id="headlabel">
        <?php
            echo "{$userName['name']} {$userName['surname']}";
        ?>
    </label>
    <form name="test" action="" method="Post">
        <input class = "exit" type="submit" name="exit" value="Выйти">
        <input class = "exit profile" type="submit" name="profile" value="Профиль">
    </form>
</div>
<div id="search">
    <label id="label1">Список студентов</label>
    <form name="found" action="" method="POST">
        <input class = "found" type="submit" name="found" value="Найти">
        <input class="searchInput" type="text" name="search" placeholder="Поиск">
    </form>
</div>
<div id="main">
    <table>
        <tr>
            <td class="firstStr">№</td>
            <td class="firstStr"><?php echo  $this->page->getLinkSort($page, $typeSort, 'name', 'Имя'); ?> </td>
            <td class="firstStr"><?php echo  $this->page->getLinkSort($page, $typeSort, 'surname', 'Фамилия'); ?> </td>
            <td class="firstStr"><?php echo  $this->page->getLinkSort($page, $typeSort, 'numberGroup', 'Номер группы'); ?> </td>
            <td class="firstStr"><?php echo  $this->page->getLinkSort($page, $typeSort, 'countEge', 'Число баллов'); ?> </td>
        </tr>
    <?php
    $i = $startLimit;
    foreach ($infoStudents as $user){
            $i++;
            echo <<<END
              <tr>
                <td class="id">{$i}</td>
                <td class="name">{$user['name']}</td>
                <td class="surname">{$user['surname']}</td>
                <td class="numberGroup">{$user['numberGroup']}</td>
                <td class="countEge">{$user['countEge']}</td>
            </tr>
END;
    }
    ?>
    </table>
</div>
<div class="page_str">
    <?php
    $this->page->printLinkPage($sort, $typeSort);
    ?>
</div>
</body>
</html>