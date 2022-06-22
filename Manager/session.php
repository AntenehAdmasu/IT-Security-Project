<?php
session_start();
require_once 'Access.php';
ini_set("display_errors", 0);
class SessionClass
{
    public function userAuthenticationwithRedirectCheck()
    {
        if (!isset($_SESSION["USER_NAME"])) {
            header("Location:" . BASE_URL . "User/login.php", true, 303);
            exit();
        } else {
            if (!isset($_SESSION["CODE"])) {
                echo "here";
                header("Location:2FA.php");
                exit();
            } else {
                if ($_SESSION["ROLE"] == 2) {
                    header("Location:" . BASE_URL . "User/ban.php", true, 303);
                    exit();
                }
            }
        }
    }
    public function adminAuthenticationwithRedirectCheck()
    {
        if (!isset($_SESSION["USER_NAME"])) {
            header("Location:" . BASE_URL . "User/login.php", true, 303);
            exit();
        } else {
            if (!isset($_SESSION['CODE'])) {
                echo 'redirecting';
                header("Location:" . BASE_URL . "User/2FA.php", true, 303);
                exit();
            } else {
                if ($_SESSION["ROLE"] == 1) {
                    header("Location:" . BASE_URL . "User/index.php", true, 303);
                    exit();
                }
            }
        }
    }
    public function authenticationwithoutRedirectCheck()
    {
        if (isset($_SESSION["USER_NAME"])) {
            if (!isset($_SESSION['CODE'])) {
                header("Location:" . BASE_URL . "User/2FA.php", true, 303);
                exit();
            } else 
            if ($_SESSION["ROLE"] == 2) {
                header("Location:" . BASE_URL . "User/ban.php", true, 303);
                exit();
            } else if ($_SESSION["ROLE"] == 1) {
                header("Location:" . BASE_URL . "User/index.php", true, 303);
                exit();
            }
        }
    }
    public function destorySession()
    {
        if (isset($_SESSION["USER_NAME"])) {
            unset($_SESSION["USER_NAME"]);
        }
        if (isset($_SESSION["ROLE"])) {
            unset($_SESSION["ROLE"]);
        }
        session_destroy();
        header("Location:" . BASE_URL . "User/login.php", true, 303);
        exit();
    }
    public function setUser($userName, $role)
    {
        $_SESSION['USER_NAME'] = $userName;
        $_SESSION['ROLE'] = $role;
    }
    public function setCode($code)
    {
        $_SESSION["CODE"] = $code;
    }
}
