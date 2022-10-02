<?php include('./includes/header.php'); 
include ('../config/dbcon.php');
?>


<?php 



$id = $_GET['veiwid'];
  $sql = "SELECT * FROM users where id=$id ";
  $result = mysqli_query($con, $sql);

if($row=$result->fetch_assoc()){
$id=$row["id"];
?>

<!-- <a href="employeesInfo.php"><input id="submitBtn" class="signForm btn  btn-success" type="submit" value="Back " name="submit"/></a><br /> -->
<div class="container-fluid ms-5 d-flex align-items-center justify-content-center"><div class="card " style="width: 20rem;">

<img text-center  src="<?php echo './images/'.$row['image']; ?>" width='100' height='100'> 

 
  <div class="card-body">
    <h5 class="card-title">User Details</h5>
    <!-- <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p> -->
  </div>
  <ul class="list-group list-group-flush">
    <li class="list-group-item"><?php echo"ID: " .$row["id"] ?></li>
    <li class="list-group-item"><?php echo"Name : " .$row["first_name"] .' ' .$row["last_name"]?></li>
    <li class="list-group-item"><?php echo"Email : " .$row["email"] ?></li>
    <li class="list-group-item"><?php echo"Birthday : " .$row["birthday"] ?></li>
    <li class="list-group-item"><?php echo"phone : " .$row["phone"] ?></li>
    <li class="list-group-item"><?php echo"Role : " .$row["role"] ?></li>
    
  </ul>
  <div class="card-body">
    <a href="users.php" class="card-link">Back</a>
    <!-- <a href="#" class="card-link">Another link</a> -->
  </div>
</div></div>

<?php

}?>