<?php
ini_set("display_errors",0);
include "../Manager/session.php";
$sessionClass = new sessionClass();
ini_set("display_errors", 0);
$sessionClass->adminAuthenticationwithRedirectCheck();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
    <title>Document</title>
</head>
<body>
    <header>
        <nav class =" pink darken-4">
            <ul>
                <li><a href="ban.php">Users</a></li>
                <li><a href="userFeedback.php">User Feedbacks</a></li>
                <li><a href="logout.php">Logout</a></li>    
            </ul>
            
        </nav>
        </header>