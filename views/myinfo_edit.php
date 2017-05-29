<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Моя информация</title>
    <link href='../public/css/style_myinfo_form.css' rel="stylesheet" type="text/css">
</head>
<body>
<div id="logout">
    <label id="headlabel">
        <?php
        if (empty($info_user['name']))
            echo "Добро пожаловать, гость";
        else {
            echo "{$info_user['name']} {$info_user['last_name']}";
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
        <input class="inputs" type="text" name="name" placeholder="Имя" value="<?php echo $info_user['name'] ?>"><br>
        <input class="inputs" type="text" name="last_name" placeholder="Фамилия"
               value="<?php echo $info_user['last_name'] ?>"><br>
        <select name="gender" required="required">
            <option style="color:gray" disabled="disabled" selected="selected" value="null">Выбериет пол</option>
            <option value="male"
                    class="option1" <?php if ($info_user['gender'] == 'male') echo 'selected = "selected"'; ?>>Мужской
            </option>
            <option value="female"
                    class="option1" <?php if ($info_user['gender'] == 'female') echo 'selected = "selected"'; ?>>Женский
            </option>
        </select>
        <br>
        <input class="inputs" type="text" name="number_group" placeholder="Номер группы (от 2 до 5 цифр или букв)"
               value="<?php echo $info_user['number_group'] ?>"><br>
        <input class="inputs" type="text" name="email" placeholder="E-mail"
               value="<?php echo $info_user['email'] ?>"><br>
        <input class="inputs" type="text" name="count_ege" placeholder="Суммарное число баллов ЕГЭ"
               value="<?php echo $info_user['count_ege'] ?>"><br>
        <input class="inputs" type="text" name="year_of_birth" placeholder="Год рождения"
               value="<?php echo $info_user['year_of_birth'] ?>"><br><br>
        <label for="">Местный</label>
        <div class="chekbox1">
            <input type="radio" name="location"
                   value="urban" <?php if ($info_user['location'] == 'urban') echo 'checked="checked"'; ?>><br>
        </div>
        <label for="">Иногородний</label>
        <div class="chekbox2">
            <input type="radio" name="location"
                   value="nonresident" <?php if ($info_user['location'] == 'nonresident') echo 'checked="checked"'; ?>><br>
        </div>
        <input id="submit" type="submit" name="save" value="Сохранить"><br>
    </form>
</div>
</body>
</html>