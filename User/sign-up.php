<?php
include '../Manager/userRegister.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=, initial-scale=1.0">
   <title>Document</title>
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">

   <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

   <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans&display=swap" rel="stylesheet">
   <link rel="stylesheet" href="css/style.css">
   <link rel="stylesheet" href="css/common.css">
   <link rel="stylesheet" href="css/sign-up.css">
</head>

<body>
   <div class="log valign-wrapper" style="width:100%;height:100%;position: absolute;">
      <div class="log valign" style="width:100%;">
         <div class="container">
            <div class="row">
               <div class="col s12 m6 offset-m3">
                  <div class="card">
                     <div class="card-content">
                        <span style='margin-top:30px;' class="card-title center black-text">NEW ACCOUNT?</span>
                        <form id="reg-form" method="post" action="sign-up.php">
                           <div class='form'>
                              <div class="row">
                                 <div class="input-field col s12">
                                    <input id="firstname" name="userName" type="text" required>
                                    <label for="userName">User Name</label>
                                    <div><?php echo $userNameError; ?></div>
                                 </div>
                              </div>
                              <div class="row">
                                 <div class="input-field col s12">
                                    <input id="email" name="email" type="email" required>
                                    <label for="email">Email</label>
                                    <div><?php echo $emailError; ?></div>
                                 </div>
                              </div>
                              <div class="row">
                                 <div class="input-field col s12">
                                    <input id="password" name="password" type="password" required class="validate">
                                    <label for="password">Password</label>
                                    <div><?php echo $passwordError; ?></div>
                                 </div>
                              </div>
                              <div class="row">
                                 <div class="input-field col s12">
                                    <input id="confirm-password" name="confirmpassword" type="password" required>
                                    <label id="lblPasswordConfirm" data-error="Password not match" data-success="Password Match" for="confirm-password">ConfirmPassword</label>
                                    <div><?php echo $confirmPasswordError; ?></div>
                                 </div>
                              </div>
                              <div class="row">
                              <div><?php echo $generalError; ?></div>
                              <input type="hidden" name="token" value="<?=newToken()?>"><br>
                                 <div class="input-field col s12">
                                    <button id="sbtn" class="btn blue lighten-3 waves-effect waves-light" type="submit" name="Registeruser">SIGN UP
                                    </button>
                                    <div class='link'><a href="login.php">Already have an account? Log in</a></div>

                                 </div>


                              </div>
                           </div>
                        </form>
                     </div>




                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>



</body>



<script src="jquery-3.4.1.min.js"></script>
<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>


<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>

<script src="User/js/script.js"></script>

</html>