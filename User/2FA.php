<?php

declare(strict_types=1);

require '../vendor/autoload.php';
require_once '../Manager/Database.php';

$databaseClass = new DatabaseClass();
$sessionClass = new SessionClass();

// $secret = "XVQ2UMGO75XRUKJO";
$secret = json_decode($databaseClass->getUser($_SESSION["USER_NAME"]));
// $secret = $g->generateSecret();
if (isset($_POST["user_2fa_next"])) {
    $code = $_POST['usercode'];
    $g = new \Sonata\GoogleAuthenticator\GoogleAuthenticator();
    if ($g->checkCode($secret, $code)) {
        $sessionClass->setCode($code);
        header("Location: index.php");
        exit();
    } else {
        echo 'Incorrect or expired code!';
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">

    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
    <title>Document</title>
</head>

<body>

    <div class="content-2fa-login">
        <form method="post" action="2FA.php">
            <div>
                2fa lorem Lorem ipsum dolor sit amet consectetur, adipisicing elit. Quos numquam dolorem cumque reiciendis! Reprehenderit est minima delectus porro, quod sit, quidem laborum mollitia eligendi earum, nisi esse ut officiis. Mollitia!
            </div>
            <div class='form'>

                <div class="row">
                    <div class="input-field col s12">
                        <input id="code" name="usercode">
                        <label for="code">Code</label>
                    </div>
                </div>

                <div class="row">

                    <div class="input-field col s12">

                        <input type="submit" name="user_2fa_next" class="btn  pink darken-4 btn-2fa" value="Next">

                    </div>
                    <div class="input-field col s12">


                        <a href="logout.php">Back to login</a>
                    </div>


                </div>
            </div>
        </form>
    </div>


</body>

</html>