<?php
    include 'adminHeader.php';
    include '../Manager/TokenGenerate.php';
    
?>
<form action="../Manager/banHandler.php" method="post" id="">
<div class="row">
    <div class="input-field col s12">
        <div class="input-group">
            <img src='../Manager/captcha.php' >
                                      
                <input required type="text"name="captcha">
                                      
        </div>
    </div>
</div>
<input type="hidden" name="token" value="<?=newToken()?>"><br>
<button type="submit" name="submitCaptcha">Submit</button>

    </form>
</body>
</html>
