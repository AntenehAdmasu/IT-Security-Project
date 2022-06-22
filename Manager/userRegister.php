<?php
require_once 'Validation.php';
$sessionClass = new SessionClass();

$sessionClass->authenticationwithoutRedirectCheck();
$databaseClass = new DatabaseClass();
$validateClass = new ValidationClass();
ini_set("display_errors", 0);



if (isset($_POST['Registeruser'])) {
    if (checkToken($_POST['token'])) {
        $userName = ($_POST['userName']);
        $email = ($_POST['email']);
        $password = ($_POST['password']);
        $confirmPassword = ($_POST['confirmpassword']);


        $userNameError = $validateClass->UserNameSignupCheck($userName);
        echo '1';
        $emailError = $validateClass->emailSignupCheck($email);
        echo '2';

        $passwordError = $validateClass->passwordSignupCheck($password);
        echo '3';

        $confirmPasswordError = $validateClass->cPasswordSignupCheck($password, $confirmPassword);
        echo '4';

        //$captchaError = $validateClass ->captchaCheck($captcha); 
        if (empty($userNameError) && empty($emailError) && empty($passwordError) && empty($confirmPasswordError)) {
            echo '\n any errors';
            $databaseClass->registerUser($userName, $email, $password);
        }
    } else {
        header("Location:" . BASE_URL . "User/Error.php", true, 303);
        exit();
    }
}
