<?php
if (isset($_COOKIE["token"])) {
    header("Location: menu.php");
} else {
    echo '
<!doctype html>
<html lang="ru">
<head> 
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css">
    <title>index</title>
</head>
<body>
<form action="authorization.php">
        <button type="submit" class="btn btn-primary">Авторизация</button>
</form>
<form action="registration.php">
        <button type="submit" class="btn btn-primary">Регистрация</button>
</form>
</body>
</html>';
}
