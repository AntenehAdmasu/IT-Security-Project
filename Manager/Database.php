<?php
require_once 'Access.php';
require_once 'TokenGenerate.php';
require_once 'Error.php';
require 'Session.php';
require '../vendor/Autoload.php';
class DatabaseClass
{
    public function userLogin($email, $password)
    {

        include  'Config.php';
        $sessionClass = new SessionClass();
        $sessionClass->authenticationwithoutRedirectCheck();
        $query = "SELECT * FROM users WHERE email=?";
        $stmt = mysqli_stmt_init($conn);

        if (!mysqli_stmt_prepare($stmt, $query)) {
            return  "Something Went wrong";
        } else {
            mysqli_stmt_bind_param($stmt, "s", $email);
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);
            $userFound = false;
            while ($row = mysqli_fetch_assoc($result)) {
                if (password_verify($password, $row['password'])) {
                    $sessionClass->setUser($row['user_name'], $row["role"]);
                    echo $_SESSION['ROLE'];
                    $userFound = true;
                    if ($row['ban'] == true) {
                        return  "Your account has been banned";
                    } else {

                        header("Location:" . BASE_URL . "User/index.php", true, 303);
                        exit();
                    }
                }
            }
            if (!$userFound) {
                return  "Incorrect email or password";
            }
        }
        mysqli_stmt_close($stmt);
        return "";
    }
    public function checkUser($userName)
    {
        include  'Config.php';
        $query = "SELECT * FROM users WHERE user_name=? ";
        $stmt = mysqli_stmt_init($conn);
        if (!$stmt) {
            echo 'statmt not prepared';
        }
        echo 'reached here';
        if (!mysqli_stmt_prepare($stmt, $query)) {
            header('HTTP/1.1 500 There was an error on the server and the request could not be completed.', TRUE, 500);
            exit();
        } else {
            echo ' the error passed ' . $userName;
            mysqli_stmt_bind_param($stmt, "s", $userName);
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);
            $userFound = false;
            while ($row = mysqli_fetch_assoc($result)) {;
                $userFound = true;
                break;
            }
            if ($userFound) {
                return "User Name already Exists";
            }
        }
        mysqli_stmt_close($stmt);
        echo 'returning empty';
        return "";
    }
    public function checkEmail($email)
    {
        include  'Config.php';
        $query = "SELECT * FROM users WHERE email=?";
        $stmt = mysqli_stmt_init($conn);

        if (!mysqli_stmt_prepare($stmt, $query)) {
            header('HTTP/1.1 500 There was an error on the server and the request could not be completed.', TRUE, 500);
            exit();
        } else {
            mysqli_stmt_bind_param($stmt, "s", $email);
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);
            $emailFound = false;
            while ($row = mysqli_fetch_assoc($result)) {;
                $emailFound = true;
                break;
            }
            if ($emailFound) {

                return  "Email already Exists";
            }
        }
        mysqli_stmt_close($stmt);
        return "";
    }
    public function registerUser($userName, $email, $password)
    {
        $sessionClass = new SessionClass();
        $sessionClass->authenticationwithoutRedirectCheck();
        $gA = new \Sonata\GoogleAuthenticator\GoogleAuthenticator();
        $key = json_encode($gA->generateSecret());
        include  'Config.php';
        $query = "INSERT INTO users(user_name,email,password,authenticator) VALUES (?,?,?,?);";

        $newPassword = password_hash($password,  PASSWORD_DEFAULT);
        $stmt = mysqli_stmt_init($conn);
        print_r($stmt);
        mysqli_stmt_prepare($stmt, $query);
        mysqli_stmt_bind_param($stmt, "ssss", $userName, $email,  $newPassword, $key);
        echo 'here we go\n';
        echo "" . mysqli_stmt_execute($stmt);

        if (mysqli_stmt_execute($stmt)) {
            echo 'executing statement';
            $sessionClass->setUser($userName, 1);
            echo 'redirecting url';
            header("Location:" . BASE_URL . "User/2FASignup.php", true, 303);
            exit();
        }
        echo 'not executing';
    }

    public function getUser($userName)
    {
        include  'Config.php';
        $query = "SELECT * FROM users WHERE user_name=? ";
        $stmt = mysqli_stmt_init($conn);

        if (!mysqli_stmt_prepare($stmt, $query)) {
            header('HTTP/1.1 500 There was an error on the server and the request could not be completed.', TRUE, 500);
            exit();
        } else {
            mysqli_stmt_bind_param($stmt, "s", $userName);
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);
            $userFound = false;
            while ($row = mysqli_fetch_assoc($result)) {;
                return $row['authenticator'];
            }
        }
        mysqli_stmt_close($stmt);
        return "";
    }
}
