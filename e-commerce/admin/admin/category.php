
<?php include('./includes/header.php'); 
include ('../config/dbcon.php');
?>



<body style="margin:50px;">
 <h1>Category</h1>
 <br>
<br>
<br>
<button class="btn btn-success my-2" ><a href="./add_category.php"class="text-light" >+ Add new Category</a></button><br>


<table class="table table-striped table-hover border-danger w-70  ">
  <tr>
        <th>id</th>
        <th>Category</th>
        
        <th>action</th>
  </tr>
  <?php

    // delete user
    if (isset($_GET['deleteid'])) {
        $id = $_GET['deleteid'];

        mysqli_query($con, "DELETE FROM Category WHERE id=".$id);
        
    }


 //PRINT Table from data base
  $sql = "SELECT * FROM Category  ";
  $result = mysqli_query($con, $sql);

  while($row=$result->fetch_assoc()){
$id=$row["id"];
    echo" <tr>
    <td>".$row["id"] ."</td>";?>
   

    <?php echo" 
    <td>".$row["category_name"] ."</td>
   
    <td>
    <button class='btn btn-warning'><a href='view_cate.php?veiwid=".$id."' class='text-light'><i class='bi bi-eye-fill'></i></a></button>
    <button class='btn btn-info'><a href='update_category.php?updateid=".$id."' class='text-light'><i class='bi bi-pen-fill'></i></a></button>"?>
    <button  class='btn btn-danger'><a onclick="return confirm('Do you want to delete this record?')" href=<?php echo"'category.php?deleteid=".$id."' class='text-light remove'><i class='bi bi-trash3-fill'></i></a></button>
    </td>
   </tr>";
  }

 ?>



 
<?php include('./includes/footer.php'); ?>