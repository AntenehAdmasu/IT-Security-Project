<?php
$DbAccessKey = parse_ini_file('../private.ini');
define("BASE_URL", "http://" .$_SERVER['HTTP_HOST']."/Lab/Advanced_IT_Sec/");
$CAPTCHA_SECRET_SITE = $DbAccessKey['CAPTCHA_SECRET_SITE'];
$CAPTCHA_SECRET_KEY = $DbAccessKey['CAPTCHA_SECRET_KEY'];
?>