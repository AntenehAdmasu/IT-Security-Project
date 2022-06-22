<?php
session_start();
require_once 'config.php';
require_once 'Access.php';
require_once 'TokenGenerate.php';


ini_set("display_errors", 0);
if ($_SESSION['ROLE'] == 2) {
    if (checkToken($_POST['token']) && $_POST['validated'] == "No") {
        if (isset($_POST['ban'])) {
            echo $_POST['user_id'];
            $id = $_POST['user_id'];
            $query = "UPDATE users SET ban=true WHERE id=?;";

            $stmt = mysqli_stmt_init($conn);
            mysqli_stmt_prepare($stmt, $query);
            mysqli_stmt_bind_param($stmt, "i", $id);
            mysqli_stmt_execute($stmt);
            header("Location:" . BASE_URL . "User/ban.php", true, 303);
            exit();
        } else if (isset($_POST['unban'])) {
            echo $_POST['user_id'];
            $id = $_POST['user_id'];
            $query = "UPDATE users SET ban=false WHERE id=?;";
            $stmt = mysqli_stmt_init($conn);
            mysqli_stmt_prepare($stmt, $query);
            mysqli_stmt_bind_param($stmt, "i", $id);
            mysqli_stmt_execute($stmt);
            header("Location:" . BASE_URL . "User/ban.php", true, 303);
            exit();
        } else {
            header("Location:" . BASE_URL . "User/ban.php", true, 303);
            exit();
        }
    } else {
        header("Location:" . BASE_URL . "User/Error.php", true, 303);
        exit();
    }
} else {
    header('HTTP/1.1 403 Forbidden', TRUE, 403);
    exit();
}
