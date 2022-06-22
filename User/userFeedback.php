<?php
    include 'adminHeader.php';

?>
    
  <div class="feedback-wrapper">


<?php
include_once '../Manager/config.php';
$query="SELECT * FROM feedbacks ORDER BY id DESC";
    $mine=mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($mine,$query)){
        echo "The statement failed";
    }else{
    
    mysqli_stmt_execute($mine);
    $count=0;
    $result=mysqli_stmt_get_result($mine);
    $count = 1;
    while($row=mysqli_fetch_assoc($result)){
        $id=$row['id'];
        $name= $row['user_name'];
        $email= $row['email'];
        $comment= $row['comment'];
      
echo'

<div class="card ">
<div class="card-content ">
  <!-- header section -->
  <div class="invoice-address">
        <h5>'.htmlspecialchars($name).'</h5>
      </div>
  <!-- logo and title -->
  <div class="row mt-3 ">
    <div class="col m6 s12 pull-m6">
      <h6 class="indigo-text invoice-number mr-1">comment# '.htmlspecialchars($count).'</h6>

    </div>
  </div>
  <div class="divider mb-3 mt-3 pink darken-4"></div>
  <!-- invoice address and contact -->
  <div class="row invoice-info">
    <div class="col m4 l4 s6">
    
      
    <!-- <div >-->
    <!--   <span>'.htmlspecialchars($email).'</span>-->
    <!-- </div>-->
      <div >
        <span>'.htmlspecialchars($comment).'</span>
      </div>
    </div>
  </div>
</div>
</div>
<hr>
';
$count++;
}
}
if($count==0){
  echo '<div  style="margin-top:300px" class="center">No records </div>';
}
?>


    <div class="col xl9 m8 s12">
    
    </div>
    </div>
    
</body>

<script src="jquery-3.4.1.min.js"></script>
<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>


<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>

<script src="../js/script.js"></script>
</body>

</html>