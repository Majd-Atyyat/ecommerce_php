<?php include('./includes/header.php'); 
include ('../config/dbcon.php');
?>


<?php 



$id = $_GET['veiwid'];
  $sql = "SELECT * FROM category where id=$id ";
  $result = mysqli_query($con, $sql);

if($row=$result->fetch_assoc()){
$id=$row["id"];
?>

<!-- <a href="employeesInfo.php"><input id="submitBtn" class="signForm btn  btn-success" type="submit" value="Back " name="submit"/></a><br /> -->
<div class="container-fluid mt-10 d-flex align-items-center justify-content-center"><div class="card " style="width: 18rem;">
  <div class="card-body">
    <h5 class="card-title">Category Details</Details></h5>
    <!-- <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p> -->
  </div>
  <ul class="list-group list-group-flush">
    <li class="list-group-item"><?php echo" CATEGORY ID : " .$row["id"] ?></li>
    <li class="list-group-item"><?php echo"NAME : " .$row["category_name"] ?></li>
    
  </ul>
  <div class="card-body">
    <a href="category.php" class="card-link">Back</a>
    <!-- <a href="#" class="card-link">Another link</a> -->
  </div>
</div></div>

<?php

}?>
