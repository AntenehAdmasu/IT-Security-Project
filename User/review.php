<?php
include_once '../Manager/config.php';
include 'header.php';
include '../Manager/error.php';
$query="SELECT * FROM feedbacks WHERE user_name=?";
$stmt=mysqli_stmt_init($conn);
mysqli_stmt_prepare($stmt,$query);
mysqli_stmt_bind_param($stmt, "s",$_SESSION["USER_NAME"]);
mysqli_stmt_execute($stmt);
$feedbacks= mysqli_stmt_get_result($stmt);
?>

<?php
   
?>
<h3>Your Reviews</h3>

<div>
   
    <?php
        while($feedback=mysqli_fetch_assoc($feedbacks) ){  ?>
        <div class="row">
    <div class="col s12 m6">
      <div class="card blue-grey darken-1">
        <div class="card-content white-text">
          <span class="card-title">Card Title</span>
          <div>
        <h5><?php echo htmlspecialchars($feedback['user_name']) ?></h5>
            <p><?php echo htmlspecialchars($feedback['comment']) ?></p>
        </div>
        </div>
        <div class="card-action">
        <a href="editFeedback.php?id=<?php echo $feedback['id']; ?>">  Edit Feedback</a>

        </div>
      </div>
    </div>
  </div>
           
    <?php    }
    
    ?>


</div>


</body>
</html>