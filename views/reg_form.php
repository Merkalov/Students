<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Регистрация</title>
    <link href="/../public/css/style_reg_form.css" rel="stylesheet" type="text/css">
</head>
<body>
<header>Регистрация</header>
<div id="Login_header">
    <div id="image">
        <form name="test" action="" method="POST">
            <input type="text" name="email" placeholder="E-mail"><br>
            <input type="password" name="pass" placeholder="Пароль"><br>
            <input type="password" name="pass2" placeholder="Повторите пароль"><br>
            <input id="submit" type="submit" name="register" value="Регистрация"><br>
            <div class="iHaveAccountBlock">
                <a class="iHaveAccount" href="login">У меня уже есть аккаунт</a>
            </div>
        </form>
    </div>
</div>
</body>
</html>