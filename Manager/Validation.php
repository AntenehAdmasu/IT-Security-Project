<?php
require_once 'Access.php';
require_once 'Database.php';
ini_set("display_errors", 0);
class ValidationClass
{
    public $databaseClass;
    public function __construct(){
        $this->databaseClass= new DatabaseClass();
    }


    public function emailSignupCheck($email)
    {
        if (empty($email)) {
            return "Email is required";
        } else {
            if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
                return  $this->databaseClass->checkEmail($email);
            } else {
                return "Invalid Email";
            }
        }
    }
    public function UserNameSignupCheck($userName)
    {
        if (empty($userName)) {
            return "Username is required";
         } else {
             if (preg_match('/^[a-zA-Z0-9]{2,}$/', $userName)) {
                return  $this->databaseClass->checkUser($userName);;
             } else {
                 return "Invalid Username, username can only contain letter, numbers and '_' and it should be in the range 2-15";
             }
        }
    }
    public function passwordSignupCheck($password){
        if (empty($password)) {
            return  "Password is required";
        } else if (strlen($password) < 8) {
            return "Password must be atleast 8 characters long";
        }
    }
    public function cPasswordSignupCheck($password, $confirmPassword){
        if ($password != $confirmPassword) {
           return "Password doesn't match";
        }
    }
    public function captchaCheck($captcha){
        if (empty($captcha)) {
            return  "Captcha is eempty";
        }
    }
    public function emailLoginCheck($email)
    {
        if (empty($email)) {
            return "Email is required";
        } else {  
            return  "";
        }
    }
    public function passwordLoginCheck($password){
        if (empty($password)) {
            return  "Password is required";
        } else{
            return "";
        }
    }


 
}
