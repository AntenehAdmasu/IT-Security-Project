<?php
include_once 'config.php';
session_start();
$temp  = "C:/uploads/".$_GET['file'];
$filename = "C:/uploads/". basename(realpath($temp));
$found = false;
// echo $_SESSION['USER_NAME'];
$query = "SELECT * FROM feedbacks WHERE user_name=?";
$stmt = mysqli_stmt_init($conn);
if (!mysqli_stmt_prepare($stmt, $query)) {
   
    $generalError =  "Something Went wrong";
} else {
    mysqli_stmt_bind_param($stmt, "s", $_SESSION['USER_NAME']);
    // echo $_SESSION['USER_NAME'];
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    while($row = mysqli_fetch_assoc($result)){
        if(strcmp($row['file_name'],basename(realpath($temp))) == 0){
            $found = true;
header("Content-type: application/pdf"); 

            readfile($filename);
        }
    }



}

//$file = "adminLogin.php"; 
    
// Header Content Type
if(!$found)echo 'Unauthorized access';
//  header("Content-Length: " . filesize($file)); 
  
// Send the file to the browser.


?>