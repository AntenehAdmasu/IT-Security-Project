<?php
ini_set("display_errors", 0);
 function get_random_string($length = 60) {
     
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}
function get_random_string2($length = 30) {
     
    $characters = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}
function generate_captcha_string($length = 5) {
    
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $random_string = '';
    for($i = 0; $i < $length; $i++) {
        $random_character = $characters[mt_rand(0, $charactersLength - 1)];
        $random_string .= $random_character;
    }
    $_SESSION['captcha'] = $random_string;
    return $random_string;
  }
  
function newToken(){
    $_SESSION['token']= get_random_string(60);
    return $_SESSION['token'];
}

function checkToken($token){
    if( isset($_SESSION['token']) && $_SESSION['token'] == $token){
        return true;
    }
    return false;
}
function checkCaptcha($captcha){
    if( isset($_SESSION['captcha'] ) && $_SESSION['captcha'] == $captcha){
        return true;
    }
    return false;
}

?>