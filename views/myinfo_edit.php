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
        <input class="inputs" type="text" name="name" placeholder="Имя" value="<?php echo $infoUser['name'] ?>"><br>
        <input class="inputs" type="text" name="surname" placeholder="Фамилия"
               value="<?php echo $infoUser['surname'] ?>"><br>
        <select name="gender" required="required">
            <option style="color:gray" disabled="disabled" selected="selected" value="null">Выбериет пол</option>
            <option value="male"
                    class="option1" <?php if ($infoUser['gender'] == 'male') echo 'selected = "selected"'; ?>>Мужской
            </option>
            <option value="female"
                    class="option1" <?php if ($infoUser['gender'] == 'female') echo 'selected = "selected"'; ?>>Женский
            </option>
        </select>
        <br>
        <input class="inputs" type="text" name="numberGroup" placeholder="Номер группы (от 2 до 5 цифр или букв)"
               value="<?php echo $infoUser['numberGroup'] ?>"><br>
        <input class="inputs" type="text" name="email" placeholder="E-mail"
               value="<?php echo $infoUser['email'] ?>"><br>
        <input class="inputs" type="text" name="countEge" placeholder="Суммарное число баллов ЕГЭ"
               value="<?php echo $infoUser['countEge'] ?>"><br>
        <input class="inputs" type="text" name="yearOfBirth" placeholder="Год рождения"
               value="<?php echo $infoUser['yearOfBirth'] ?>"><br><br>
        <label for="">Местный</label>
        <div class="chekbox1">
            <input type="radio" name="location"
                   value="urban" <?php if ($infoUser['location'] == 'urban') echo 'checked="checked"'; ?>><br>
        </div>
        <label for="">Иногородний</label>
        <div class="chekbox2">
            <input type="radio" name="location"
                   value="nonresident" <?php if ($infoUser['location'] == 'nonresident') echo 'checked="checked"'; ?>><br>
        </div>
        <input id="submit" type="submit" name="save" value="Сохранить"><br>
    </form>
</div>
</body>
</html>