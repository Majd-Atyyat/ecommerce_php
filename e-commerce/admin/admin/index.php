<?php include('./includes/header.php'); 
include ('../config/dbcon.php')?>



<?php 

  $sql = "SELECT * FROM products; ";
  $result = mysqli_query($con, $sql);
  $num_of_products = mysqli_num_rows( $result);
//   echo  "Number of products:".$num;

$sql = "SELECT * FROM category; ";
  $result = mysqli_query($con, $sql);
  $num_of_categories = mysqli_num_rows( $result);
//   echo  "Number of categories:".$num;

$sql = "SELECT * FROM orders; ";
  $result = mysqli_query($con, $sql);
  $num_of_orders = mysqli_num_rows( $result);
//   echo  "Number of orders:".$num;

$sql = "SELECT * FROM users; ";
  $result = mysqli_query($con, $sql);
  $num_of_users = mysqli_num_rows( $result);
//   echo  "Number of user:".$num;

?>
<div class="container m-5">
    <div class="row">
        <div class="col-md-12">
            <h2>
                Hello Admin
            </h2>
        </div>
        <div class="container-fluid py-4">


    <div class="row">
      <div class="col-lg-5 col-sm-5">
        <div class="card  mb-2">
  <div class="card-header p-3 pt-2">
    <div class="icon icon-lg icon-shape bg-gradient-dark shadow-dark shadow text-center border-radius-xl mt-n4 position-absolute">
      <i class="material-icons opacity-10">weekend</i>
    </div>
    <div class="text-end pt-1">
      <p class="text-sm mb-0 text-capitalize">Number of products</p>
      <h4 class="mb-0"><?php  echo $num_of_products?></h4>
    </div>
  </div>

  <hr class="dark horizontal my-0">
  <div class="card-footer p-3">
  
  </div>
</div>

        <div class="card  mb-2">
  <div class="card-header p-3 pt-2">
    <div class="icon icon-lg icon-shape bg-gradient-primary shadow-primary shadow text-center border-radius-xl mt-n4 position-absolute">
      <i class="material-icons opacity-10">leaderboard</i>
    </div>
    <div class="text-end pt-1">
      <p class="text-sm mb-0 text-capitalize">Number of orders</p>
      <h4 class="mb-0"><?php  echo $num_of_orders?></h4>
    </div>
  </div>

  <hr class="dark horizontal my-0">
  <div class="card-footer p-3">
    
  </div>
</div>

      </div>
      <div class="col-lg-5 col-sm-5 mt-sm-0 mt-4">
        <div class="card  mb-2">
  <div class="card-header p-3 pt-2 bg-transparent">
    <div class="icon icon-lg icon-shape bg-gradient-success shadow-success text-center border-radius-xl mt-n4 position-absolute">
      <i class="material-icons opacity-10">store</i>
    </div>
    <div class="text-end pt-1">
      <p class="text-sm mb-0 text-capitalize ">Number of categories</p>
      <h4 class="mb-0"><?php  echo $num_of_categories?></h4>
    </div>
  </div>

  <hr class="horizontal my-0 dark">
  <div class="card-footer p-3">
    
  </div>
</div>

        <div class="card ">
  <div class="card-header p-3 pt-2 bg-transparent">
    <div class="icon icon-lg icon-shape bg-gradient-info shadow-info text-center border-radius-xl mt-n4 position-absolute">
      <i class="material-icons opacity-10">person_add</i>
    </div>
    <div class="text-end pt-1">
      <p class="text-sm mb-0 text-capitalize ">Number of users</p>
      <h4 class="mb-0 "><?php  echo $num_of_users?></h4>
    </div>
  </div>

  <hr class="horizontal my-0 dark">
  <div class="card-footer p-3">
    
  </div>
</div>

</div>
<?php include('./includes/footer.php'); ?>

<!-- <?php 
session_start();
if(!isset($_SESSION['admin_name'])){
  header('Location:/registration/login.php');
}
?> -->