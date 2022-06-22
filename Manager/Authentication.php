<?php
require 'Access.php';
require 'Validation.php';
$sessionClass = new SessionClass();

$sessionClass->authenticationwithoutRedirectCheck();
$databaseClass = new DatabaseClass();
$validateClass = new ValidationClass();

ini_set("display_errors", 1);
if (isset($_POST['user_login'])) {

    if (checkToken($_POST['token'])) {
        if (isset($_POST['g-recaptcha-response'])) {

            $recaptcha = $_POST['g-recaptcha-response'];
            $secret_key = $CAPTCHA_SECRET_KEY;
            $url = 'https://www.google.com/recaptcha/api/siteverify?secret='
                . $secret_key . '&response=' . $recaptcha;
            $response = file_get_contents($url);

            // Response return by google is in
            // JSON format, so we have to parse
            // that json
            $response = json_decode($response);

            // Checking, if response is true or not
            if ($response->success == true) {
                $email = ($_POST['userEmail']);
                $password =($_POST['userPassword']);
                $emailError = $validateClass->emailLoginCheck($email);
                $passwordError = $validateClass->passwordLoginCheck($password);

                if ((empty($emailError) &&  empty($passwordError))) {
                    $generalError = $databaseClass->userLogin($email, $password);
                } 
            } else {
                $captchaError = "Invalid captcha";
            }
        } else {
            $captchaError = "Invalid captcha";
        }
    } else {
        header("Location:" . BASE_URL . "User/Error.php", true, 303);
        exit();
    }
}
