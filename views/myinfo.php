<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Моя информация</title>
    <link href='/../public/css/style_myinfo_form.css' rel="stylesheet" type="text/css">
</head>
<body>
<div id="logout">
    <label id="headlabel">
        <?php
        if (empty($infoUser['name']))
            echo "Добро пожаловать, гость";
        else {
            echo "{$infoUser['name']} {$infoUser['surname']}";
        }
        ?>
    </label>
    <form name="exit" action="" method="POST">
        <input id="exit" type="submit" name="exit" value="Выйти">
    </form>
</div>
<header>Моя информация</header>
<div id="main">
    <form name="test" action="" method="POST">
        <input class="inputs" type="text" name="name" placeholder="Имя" disabled
               value="<?php echo $infoUser['name'] ?>"><br>
        <input class="inputs" type="text" name="surname" placeholder="Фамилия" disabled
               value="<?php echo $infoUser['surname'] ?>"><br>
        <?php
        if ($infoUser['gender'] == 'male') echo '<input class="inputs" type="text" disabled value="Мужской">';
        else echo '<input class="inputs" type="text" disabled value="Женский">';
        ?>
        <br>
        <input class="inputs" type="text" name="numberGroup" placeholder="Номер группы (от 2 до 5 цифр или букв)"
               disabled value="<?php echo $infoUser['numberGroup'] ?>"><br>
        <input class="inputs" type="text" name="email" placeholder="E-mail" disabled
               value="<?php echo $infoUser['email'] ?>"><br>
        <input class="inputs" type="text" name="countEge" placeholder="Суммарное число баллов ЕГЭ" disabled
               value="<?php echo $infoUser['countEge'] ?>"><br>
        <input class="inputs" type="text" name="yearOfBirth" placeholder="Год рождения" disabled
               value="<?php echo $infoUser['yearOfBirth'] ?>"><br><br>
        <label for="">Местный</label>
        <div class="chekbox1">
            <input type="radio" name="location" disabled
                   value="urban" <?php if ($infoUser['location'] == 'urban') echo 'checked="checked"'; ?>><br>
        </div>
        <label for="">Иногородний</label>
        <div class="chekbox2">
            <input type="radio" name="location" disabled
                   value="nonresident" <?php if ($infoUser['location'] == 'nonresident') echo 'checked="checked"'; ?>><br>
        </div>
        <input id="submit" type="submit" name="edit" value="Редактировать"><br>
        <div class="iHaveAccountBlock">
            <a class="iHaveAccount" href="list">Список студентов</a>
        </div>
    </form>
</div>
</body>
</html>