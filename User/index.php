<?php
    include 'header.php';
    include '../Manager/submitFeedback.php';
    
?>


<div class="container">



<div class="card ">
    <div class="col s12 m6 offset-m3">

    <form action="index.php" method="post" id="feedbackForm" enctype="multipart/form-data">
        <div>
        <div >
            <input placeholder="Placeholder" id="first_name" type="text"  name="name">
            <label for="first_name">Username</label>
            <div class="err"><?php echo $userNameError; ?></div>
            </div>
        </div>

        <div >
        <div>
            <input placeholder="Placeholder" id="email" type="email" name="email" >
            <label for="email">Email</label>
            <div class="err"><?php echo $emailError; ?></div>

            </div>
        </div>

        <div >
        <div >
          <textarea id="textarea1" class="materialize-textarea" name="comment"></textarea>
          <label for="textarea1">Textarea</label>
        
        </div>
        </div>

        <div>
        <div>
            <div>
        <div >
            <input type="file" accept=".pdf" name="PDFfile">
        </div>
    
        <div class="err"><?php echo $fileError; ?></div>
        
        </div>
        </div>
        
        </div>



<input type="hidden" name="token" value="<?=newToken()?>"><br>
<div class="g-recaptcha" data-sitekey=<?=$CAPTCHA_SECRET_SITE?>></div> 

<button class="btn waves-effect waves-light" type="submit" name="submitFeedback">Submit Comment</button>
</div>

    
  </div>


  </div>

   
</body>
</html>