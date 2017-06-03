<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8">
    <title>Список студентов</title>
    <link href="http://students/public/css/style_list.css" rel="stylesheet" type="text/css">
</head>
<body>
<!--<header>Список студентов</header>-->
<div id="header1">
    <label id="headlabel">
        <?php
            echo "{$user_name['name']} {$user_name['last_name']}";
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
            <td class="firstStr"><?php echo  \Models\Page::getLinkSort($page, $typeSort, 'name', 'Имя'); ?> </td>
            <td class="firstStr"><?php echo  \Models\Page::getLinkSort($page, $typeSort, 'last_name', 'Фамилия'); ?> </td>
            <td class="firstStr"><?php echo  \Models\Page::getLinkSort($page, $typeSort, 'number_group', 'Номер группы'); ?> </td>
            <td class="firstStr"><?php echo  \Models\Page::getLinkSort($page, $typeSort, 'count_ege', 'Число баллов'); ?> </td>
        </tr>
    <?php
    $i = $start_limit;
    foreach ($info_users as $user){
            $i++;
            echo <<<END
              <tr>
                <td class="id">{$i}</td>
                <td class="name">{$user['name']}</td>
                <td class="last_name">{$user['last_name']}</td>
                <td class="number_group">{$user['number_group']}</td>
                <td class="count_ege">{$user['count_ege']}</td>
            </tr>
END;
    }
    ?>
    </table>
</div>
<div class="page_str">
    <?php
    \Models\Page::printLinkPage($sort, $typeSort);
    ?>
</div>
</body>
</html>