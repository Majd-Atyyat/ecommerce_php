
<?php include('./includes/header.php'); 
include ('../config/dbcon.php');
?>



<body style="margin:50px;">
<div class="container-fluid  d-flex align-items-center justify-content-center"> <h1>Orders</h1></div>


<table class="table table-striped table-hover border-danger ">
  <tr>
        <th>id</th>
        <th>User Name</th>
        <th>Product</th>
        <th> Quantity</th>
        <th>Price</th>
        
  </tr>
  <?php

 //PRINT Table from data base
  $sql = "SELECT * FROM orders  ";
  $result = mysqli_query($con, $sql);

  while($row=$result->fetch_assoc()){
$id=$row["id"];
    echo" <tr>
    <td>".$row["id"] ."</td>";?>
 
    <?php echo" 
    <td>".$row["username"] ."</td>
    <td>".$row["product_name"]."</td>
    <td>".$row["qty"]."</td>
    <td>".$row["price"]."</td>
   
   </tr>";
  }

 ?>



 
<?php include('./includes/footer.php'); ?>