
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
    





<div  class=" valign-wrapper log" style="width:100%;height:100%;position: absolute;">
    <div class="valign log" style="width:100%;">
        <div class="container">
           <div class="row">
              <div class="col s12 m6 offset-m3">
                 <div class="card grey lighten-5">
                    <div class="card-content">
                       <span  style='margin-top:30px;'class="card-title center black-text">LOG IN</span>
                       <form method="post" action="../Manager/Authentication.php">
                       <div class='form'>                         
                          <div class="row">
                             <div class="input-field col s12">
                                <input id="email" name="adminEmail" type="email">
                                <label for="email" >Email</label>
                             </div>
                          </div>
                          <div class="row">
                             <div class="input-field col s12">
                                <input id="password" name="adminPassword" type="password">
                                <label for="password" >Password</label>
                             </div>
                          </div>
                          <div class="row">
                              <div class="input-field col s12">
                                 <div class="input-group">
                                       <img src='../Manager/captcha.php' >
                                      
                                       <input required type="text"name="captcha">
                                      
                                    </div>
                              </div>
                           </div>
                          <div class="row">
                             <div class="input-field col s12">
                             <input type="submit" name="admin_login" class="btn" value="log in"> 
                    
                           
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
 
    <script src="../js/script.js"></script>
</html>