<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>CSS</title>
    <link href='../public/css/style_error.css' rel="stylesheet" type="text/css">
</head>
<body>
<div class="head">
    <?php
    use Models\Errors;
    Errors::showErrors($err);
    ?>
</div>
<div id="container">
    <form name="test" action="" method="POST">
        <input type="button" class="button" onclick="history.back();" value="Назад"/>
    </form>
</div>
</body>
</html>