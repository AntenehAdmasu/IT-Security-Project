<?php
include 'adminHeader.php';
include '../Manager/TokenGenerate.php';

?>



<div class="user-wrapper">


    <?php
    include_once '../Manager/config.php';
    $token = newToken();
    $query = "SELECT * FROM users ORDER BY id DESC";
    $mine = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($mine, $query)) {
        echo "The statement failed";
    } else {

        mysqli_stmt_execute($mine);
        $count = 0;
        $result = mysqli_stmt_get_result($mine);
        $count++;
        if ($count == 1) {
            echo ' 
    
  <div  class="card grey-text">
  <div class="table-card ">
      <table class=" responsive-table ">
      <thead>
        <tr id="car-table">
     
                <th>Full Name</th>
                <th>Email</th>
                <th>STATUS</th>
                <th>ACTION</th>
        </tr>
  
  
  
  
  
    
      </thead>';
        }

        while ($row = mysqli_fetch_assoc($result)) {
            $id = $row['ID'];
            $name = $row['user_name'];
            if ($name != $_SESSION["USER_NAME"]) {
                $email = $row['email'];

                echo '

                <tbody >
    
                <tr>
                
    
                <td class ="entry">' . $name . '</td>
            
                <td class ="entry">' . $email . '</td>

                <td class ="entry">
                ';
                if($row['ban']==false){
                     echo  '<span class="chip lighten-5 green green-text">Available</span>';
                }else{
                    echo'<span class="chip lighten-5 red red-text">Banned</span>';
                }
              echo  '
                  </td>
                <td >
                <form method="post" action="../Manager/banHandler.php">
                <input type="hidden" name="user_id" value=' . $id . '><br>
                <input type="hidden" name="token" value=' . $token . '><br>

                <input hidden type="radio" name="validated"  value="Yes" checked>
                <input hidden type="radio" name="validated" value="No" >
                ';
                if ($row['ban'] == true) {

                    echo ' <button class="btn waves-effect waves-light pink darken-4" type="submit" name="unban">unban</button>
                ';
                } else {
                    echo ' <button  class="btn waves-effect waves-light pink darken-4" type="submit" name="ban">ban</button>';
                }


                echo ' 
                <input type="hidden" name="user_id" value=' . $id . '><br>
                <input type="hidden" name="token" value=' . $token . '><br>
                </form>
                </td>
                </tr>
            ';
                $count++;
            }
        }
    }
    if ($count == 0) {
        echo '<div  style="margin-top:300px" class="center">No Users </div>';
    }
    ?>

</div>

</body>

<script src="jquery-3.4.1.min.js"></script>
<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>


<script src="jquery-3.4.1.min.js"></script>
<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>


<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>

<script src="../js/script.js"></script>
</body>

</html>