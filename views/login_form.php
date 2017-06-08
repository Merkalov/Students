<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>CSS</title>
  <link href='/../public/css/style_login_form.css' rel="stylesheet" type="text/css">
</head>
<body>
    <header>Войдите, используя свой аккаунт</header>
    <div id="Login_header">
        <div id="image">
            <img src="../public/images/logo.png" alt="logo">
            <form name="test" action="" method="POST">
                <input class="inputs" type="text" name="email" placeholder="Email"><br>
                <input class="inputs" type="password" name="pass" placeholder="Пароль"><br>
                <input id="submit" type="submit" name="login" value="Войти">
                    <div class="regBlock">
                        <a class="reg" href="register">Регистрация</a>
                    </div>
                    <div class="forgotBlock">
                        <a class="forgot" href="#">Забыли пароль?</a>
                    </div>
            </form>
        </div>  
    </div>
</body>
</html>

