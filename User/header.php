<?php
include "../Manager/session.php";
$sessionClass = new sessionClass();
$sessionClass->userAuthenticationwithRedirectCheck();
ini_set("display_errors", 0);
?>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=, initial-scale=1.0">
   <title>Document</title>
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">

   <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

   <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans&display=swap" rel="stylesheet">
   <link rel="stylesheet" href="css/style.css">
   <link rel="stylesheet" href="css/home.css">
   <link rel="stylesheet" href="css/common.css">
   <link rel="stylesheet" href="css/sign-up.css">
   <script src="https://www.google.com/recaptcha/api.js" async defer></script>
</head>
<body>
    <header>
        <nav>
            <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="review.php">View Review</a></li>
                <li><a href="logout.php">logout</a></li>  
            </ul>
            
        </nav>
        </header>