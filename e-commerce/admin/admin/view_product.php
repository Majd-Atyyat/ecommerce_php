<?php include('./includes/header.php'); 
include ('../config/dbcon.php');
?>


<?php 



$id = $_GET['veiwid'];
  $sql = "SELECT * FROM products where id=$id ";
  $result = mysqli_query($con, $sql);

if($row=$result->fetch_assoc()){
$id=$row["id"];
?>

<!-- <a href="employeesInfo.php"><input id="submitBtn" class="signForm btn  btn-success" type="submit" value="Back " name="submit"/></a><br /> -->
<div class="container-fluid ms-5 d-flex align-items-center justify-content-center"><div class="card " style="width: 40rem;">
<div class="d-flex p-2 bd-highlight justify-content-between" >
<img text-center  src="<?php echo './images/'.$row['image']; ?>" width='100' height='100'> 
<img text-center  src="<?php echo './images/'.$row['image_01']; ?>" width='100' height='100'> 
<img text-center  src="<?php echo './images/'.$row['image_02']; ?>" width='100' height='100'> 
<img text-center  src="<?php echo './images/'.$row['image_03']; ?>" width='100' height='100'></div>
 
  <div class="card-body">
    <h5 class="card-title">Product Details</h5>
    <!-- <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p> -->
  </div>
  <ul class="list-group list-group-flush">
    <li class="list-group-item"><?php echo"ID: " .$row["id"] ?></li>
    <li class="list-group-item"><?php echo"Name : " .$row["product_name"] ?></li>
    <li class="list-group-item"><?php echo"Price : " .$row["price"] ?></li>
    <li class="list-group-item"><?php echo"Category : " .$row["category"] ?></li>
    <li class="list-group-item"><?php echo"Color : " .$row["color"] ?></li>
    <li class="list-group-item"><?php echo"Description : " .$row["description"] ?></li>
    <li class="list-group-item"><?php echo"Key word : " .$row["product_key"] ?></li>
  </ul>
  <div class="card-body">
    <a href="products.php" class="card-link">Back</a>
    <!-- <a href="#" class="card-link">Another link</a> -->
  </div>
</div></div>

<?php

}?>


