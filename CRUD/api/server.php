<?php 
error_reporting(-1);
require_once("application/Application.php");

Class Router {
    private Application $application;

    function __construct() {
        $this->application = new Application();
    } 

    public function accept($params, $body): ?bool
    {
        $method = $params['method'];
        if ($method != 'authorization' &&
            $method != 'registration' &&
            $method != 'logout') {
            if (!$this->application->checkToken($_COOKIE["token"])) {
                return null;
            }
        }

        if ($method) {
            switch ($method) {
                // form
                case 'addForm': {
                    if($this->application->addForm($body)) {
                        header("Location: menu.php");
                        return true;
                    }
                    return false;
                }
                case 'getForms' : {
                    $forms = $this->application->getForms();
                    $html = '
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css">
    <title>получить формы</title>
</head>
<body>
<form action="menu.php" method="post">
';
                    $i = 1;
                    foreach($forms as $form) {
                        $html = $html.'
    <div>
        <input type="hidden" name="id' . $i . '" value="' . $form["id"] . '">
        <input type="hidden" name="textBox' . $i . '" value="' . $form["textBox"] . '">
        <input type="hidden" name="textArea' . $i . '" value="' . $form["textArea"] . '">
        <input type="hidden" name="radioButton'  . $i . '" value="' . $form["radioButton"] . '">
        <input type="hidden" name="checkBox1' . $i . '" value="' . $form["checkBox1"] . '">
        <input type="hidden" name="checkBox2' . $i . '" value="' . $form["checkBox2"] . '">
        <input type="hidden" name="checkBox3' . $i . '" value="' . $form["checkBox3"] . '">
        <input type="hidden" name="datalist' . $i . '" value="' . $form["datalist"] . '">
    </div>
    ';
                        $i++;
                    }
                    echo $html.'
<input type="hidden" name="flag" value="">
<button type="submit" class="btn btn-primary">получить данные</button>
</form>
</body>
</html>';
                    return "form";
                }
                case 'updateForm' : {
                    if ($this->application->updateForm($body)){
                        header("Location: menu.php");
                        return true;
                    }
                    return false;
                }
                case 'deleteForm' : {
                    if ($this->application->deleteForm($body)) {
                        header("Location: menu.php");
                        return true;
                    }
                    return false;
                }

                // authentication
                case 'authorization': {
                    $token = $this->application->authorization($body);
                    if ($token) {
                        setcookie("token", $token, time()+6000);
                        header('Location: menu.php');
                        return true;
                    }
                    return false;
                }
                case 'registration': {
                    if ($this->application->registration($body)) {
                        header('Location: authorization.php');
                        return true;
                    }
                    return false;
                }
                case 'logout': {
                    header("Location: index.php");
                    return setcookie("token","", time()-6000);
                }
            }

        }
        return false;
    }

    public function answer($data): array
    {
        if($data) {
            return array('status'=>'OK', 'response'=>$data);
        }
        return array('status'=>'ERROR');
    }
}
$router = new Router();

json_encode(
    $router->answer(
        $router->accept($_GET, (object)$_POST)
    )
);