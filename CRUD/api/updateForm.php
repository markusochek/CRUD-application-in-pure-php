<?php
$forms = $_POST;
if (isset($_COOKIE["token"])) {
echo '
<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css">
    <title>authorization</title>
</head>
<body>
<form method="get" action="server.php">
    <input type="hidden" name="method" value="logout">
    <button type="submit" class="btn btn-primary" style="float:right;">Выйти из системы</button>
</form>

<form method="post" action="server.php?method=updateForm">
    <div>
    <input type="hidden" name="id" value="'.$forms["id"].'">
        <div class="form-group">
            <label for="textBox">Текстовое поле</label>
            <input type="text" name="textBox" class="form-control" value="'.$forms["textBox"].'"> 
        </div>

        <div class="form-group">
            <label for="textArea">Многострочное текстовое поле</label>
            <textarea name="textArea" class="form-control">'.$forms["textArea"].'</textarea>
        </div>

        <div class="form-group">
            <label for="radioButton1">радиокнопка 1</label>
            <input type="radio" name="radioButton" id="radioButton1" value="radioButton1">
            <label for="radioButton2">радиокнопка 2</label>
            <input type="radio" name="radioButton" id="radioButton2" value="radioButton2">
            <label for="radioButton3">радиокнопка 3</label>
            <input type="radio" name="radioButton" id="radioButton3" value="radioButton3">
        </div>

        <div class="form-group">
            <label for="checkBox1">флажок 1</label>
            <input type="checkbox" name="checkBox1" id="checkBox1" value="checkBox1">
            <label for="checkBox2">флажок 2</label>
            <input type="checkbox" name="checkBox2" id="checkBox2" value="checkBox2">
            <label for="checkBox3">флажок 3</label>
            <input type="checkbox" name="checkBox3" id="checkBox2" value="checkBox3">
        </div>

        <div class="form-group">
            <label>выпадающий список</label>
            <input type="text" name="datalist" list="data">
            <datalist id="data">
                <option value="data1">
                <option value="data2">
                <option value="data3">
            </datalist>
        </div>

        <label for="reset">кнопка сброса формы</label>
        <div class="form-group">
            <input type="reset" value="стереть данные" class="btn btn-primary">
        </div>

        <label for="reset">отправить форму</label>
        <div class="form-group">
            <input type="submit" value="отправить данные" class="btn btn-primary">
        </div>

    </div>
</form>
</body>
</html>'; }