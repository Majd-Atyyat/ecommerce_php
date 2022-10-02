
<?php include('./includes/header.php'); 
include ('../config/dbcon.php');
?>



<body style="margin:50px;">
<div class="container-fluid  d-flex align-items-center justify-content-center"> <h1>Products</h1></div>

<button class="btn btn-success my-2" ><a href="./add_product.php"class="text-light" >+ Add new product</a></button><br>
<!-- <button class="btn btn- btn-secondary float-end ml-2 my-2" ><a href="index.php"class="text-light">Logout</a></button> -->

<table class="table table-striped table-hover border-danger ">
  <tr>
        <th>id</th>
        <th>image 1</th>
        <th>image 2</th>
        <th>image 3</th>
        <th>image 4</th>
        <th>product name</th>
        <th>price</th>
        <th>category</th>
        <th>description</th>
        <th>color</th>
        <th>key words</th>
        
        <th>action</th>
  </tr>
  <?php

    // delete user
    if (isset($_GET['deleteid'])) {
        $id = $_GET['deleteid'];

        mysqli_query($con, "DELETE FROM products WHERE id=".$id);
        
    }


 //PRINT Table from data base
  $sql = "SELECT * FROM products  ";
  $result = mysqli_query($con, $sql);

  while($row=$result->fetch_assoc()){
$id=$row["id"];
    echo" <tr>
    <td>".$row["id"] ."</td>";?>
 
<td>
<img src="<?php echo 'images/'. $row['image_01']; ?>" width='90' height='90'> 
</td>
<td>
<img src="<?php echo 'images/'. $row['image']; ?>" width='90' height='90'> 
</td>
<td>
<img src="<?php echo 'images/'. $row['image_02']; ?>" width='90' height='90'> 
</td>
<td>
<img src="<?php echo 'images/'. $row['image_03']; ?>" width='90' height='90'> 
</td>
    <?php echo" 
    <td>".$row["product_name"] ."</td>
    <td>".$row["price"]."</td>
    <td>".$row["category"]."</td>
    <td>".$row["description"]."</td>
    <td>".$row["color"]."</td>
    <td>".$row["product_key"]."</td>
    <td>
    <button class='btn btn-warning'><a href='view_product.php?veiwid=".$id."' class='text-light'><i class='bi bi-eye-fill'></i></a></button>
    <button class='btn btn-info'><a href='update_product.php?updateid=".$id."' class='text-light'><i class='bi bi-pen-fill'></i></a></button>"?>
    <button  class='btn btn-danger'><a onclick="return confirm('Do you want to delete this record?')" href=<?php echo"'products.php?deleteid=".$id."' class='text-light remove'><i class='bi bi-trash3-fill'></i></a></button>
    </td>
   </tr>";
  }

 ?>



 
<?php include('./includes/footer.php'); ?>