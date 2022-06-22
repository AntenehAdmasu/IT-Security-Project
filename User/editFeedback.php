<?php

    include 'header.php';
    include '../Manager/config.php';

    
    $id = $_GET['id'];
    $q="SELECT * FROM feedbacks WHERE user_name=?";
    $s=mysqli_stmt_init($conn);
    mysqli_stmt_prepare($s,$q);
    mysqli_stmt_bind_param($s, "s",$_SESSION["USER_NAME"]);
    mysqli_stmt_execute($s);
    $feedbacks= mysqli_stmt_get_result($s);
    $found = false;
    while($feedback=mysqli_fetch_assoc($feedbacks)){  
        if($id == $feedback['id']){
            $found = true;
        }
    }

    if(!$found){
        echo "unauthorized access";
        exit;
    }

     include '../Manager/editFeedback.php';




    $query="SELECT * FROM feedbacks WHERE id=?";

    $stmt = mysqli_stmt_init($conn);
   

    if (mysqli_stmt_prepare($stmt, $query)) {
        mysqli_stmt_bind_param($stmt, "i", $id);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        $row = mysqli_fetch_assoc($result);
    } 



$username = $row['user_name'];
$email =$row['email'];
$comment = $row['comment'];
$filename = $row['file_name'];


?>
<form action="editFeedback.php?id=<?php echo $id?>" method="post" id="feedbackForm" enctype="multipart/form-data">
Name: <input type="text" name="name" value = <?php echo htmlspecialchars($username)?>><br/>
<div class="err"><?php echo $userNameError; ?></div>
Email: <input type="email" name="email" value = <?php echo htmlspecialchars($email)?>><br/>
<div class="err"><?php echo $emailError; ?></div>
Comment: <textarea name="comment"><?php echo htmlspecialchars($comment)?></textarea><br/>
File: <input type="file" accept=".pdf" name="PDFfile"><br/>
<div class="err"><?php echo $fileError; ?></div>
<?php $ff = "../Manager/view.php?file=".urlencode ($filename); ?>
old file: <a href=<?php echo $ff?> > <?php echo $filename?></a>

<input type="hidden" name="id" value="<?php echo htmlspecialchars($id)?>"><br>
<input type="hidden" name="token" value="<?=newToken()?>"><br>
<div class="g-recaptcha" data-sitekey=<?=$CAPTCHA_SECRET_SITE?>></div> 
<button type="submit" name="updateFeedback">Submit Comment</button>

</body>
</html>
</body>
</html>