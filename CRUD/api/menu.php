<?php
$forms = $_POST;
if (isset($_COOKIE["token"])) {
    if(isset($forms["flag"])) {
        $html = '
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css">
    <title>menu</title>
</head>
<body>
<form method="get" action="server.php">
    <input type="hidden" name="method" value="logout">
    <button type="submit" class="btn btn-primary" style="float:right;">Выйти из системы</button>
</form>

<table class="table table-dark">
    <tr>
        <td>id</td>
        <td>textBox</td>
        <td>textArea</td>
        <td>radioButton</td>
        <td>checkBox1</td>
        <td>checkBox2</td>
        <td>checkBox3</td>
        <td>datalist</td>
        <td></td>
        <td></td>
    </tr>
        ';
        $i = 1;
        while (isset($forms["id".$i])) {
            $html = $html.'
    <tr>
        <td>'.$i.'</td>
        <td>'.$forms["textBox".$i].'</td>
        <td>'.$forms["textArea".$i].'</td>
        <td>'.$forms["radioButton".$i].'</td>
        <td>'.$forms["checkBox1".$i].'</td>
        <td>'.$forms["checkBox2".$i].'</td>
        <td>'.$forms["checkBox3".$i].'</td>
        <td>'.$forms["datalist".$i].'</td>
        <td>
            <form action="updateForm.php" method="post">
                <input type="hidden" name="id" value="' . $forms["id".$i] . '">
                <input type="hidden" name="textBox" value="' . $forms["textBox".$i] . '">
                <input type="hidden" name="textArea" value="' . $forms["textArea".$i] . '">
                <input type="hidden" name="radioButton" value="' . $forms["radioButton".$i] . '">
                <input type="hidden" name="checkBox1" value="' . $forms["checkBox1".$i] . '">
                <input type="hidden" name="checkBox2" value="' . $forms["checkBox2".$i] . '">
                <input type="hidden" name="checkBox3" value="' . $forms["checkBox3".$i] . '">
                <input type="hidden" name="datalist" value="' . $forms["datalist".$i] . '">
                <button class="btn btn-primary" type="submit">обновить</button>
            </form>
        </td>
        <td>
            <form action="server.php?method=deleteForm" method="post">
                <input type="hidden" name="id" value="'.$forms["id".$i].'">
                <button class="btn btn-primary" type="submit">удалить</button>  
            </form>
        </td>
    </tr>';
            $i++;
        }

        echo $html.'
</table>

<form action="addForm.php">
    <button type="submit" class="btn btn-primary">Добавить форму</button>
</form>
</body>
</html>';
    } else {
        echo '
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css">
    <title>menu</title>
</head>
<body>
<form method="get" action="server.php">
    <input type="hidden" name="method" value="logout">
    <button type="submit" class="btn btn-primary" style="float:right;">Выйти из системы</button>
</form>
<form method="get" action="server.php">
    <input type="hidden" name="method" value="getForms">
    <button type="submit" class="btn btn-primary">Получить формы</button>
</form>
<form action="addForm.php">
    <button type="submit" class="btn btn-primary">Добавить форму</button>
</form>
</body>
</html>'; }
} else {
    echo '
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css">
    <title>menu</title>
</head>
<body>
    <label for="next">Простите, вы не авторизованы</label>
    <form action="authorization.php" id="next">
          <button type="submit" class="btn btn-primary">Авторизоваться</button>
    </form>
</body>
</html>
';
}

