<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css">
    <title>registration</title>
</head>
<body>
<form method="post" action="server.php?method=registration">
    <div class="form-group">
        <label for="email">Адрес электронной почты</label>
        <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp">
        <small id="emailHelp" class="form-text text-muted">Мы никогда никому не передадим Вашу электронную почту.</small>
    </div>
    <div class="form-group">
        <label for="password">Пароль</label>
        <input type="text" class="form-control" id="password" name="password">
    </div>
    <button type="submit" class="btn btn-primary">Регистрация</button>
</form>
</body>
</html>