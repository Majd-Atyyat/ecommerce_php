
<?php include('./includes/header.php'); 
include ('../config/dbcon.php');
?>



<body style="margin:50px;">
<div class="container-fluid  d-flex align-items-center justify-content-center"> <h1>Users</h1></div>

<button class="btn btn-success my-2" ><a href="./add_user.php"class="text-light" >+ Add new user</a></button><br>
<!-- <button class="btn btn- btn-secondary float-end ml-2 my-2" ><a href="index.php"class="text-light">Logout</a></button> -->

<table class="table table-striped table-hover border-danger ">
  <tr>
        <th>id</th>
        <th>Image</th>
        <th>First Name</th>
        <th>Last Name</th>
        <th>Email</th>
        <th>Phone</th>
        <th>Birthday</th>
        <th>Password</th>
        <th>Role</th>
        
        
        <th>action</th>
  </tr>
  <?php

    // delete user
    if (isset($_GET['deleteid'])) {
        $id = $_GET['deleteid'];

        mysqli_query($con, "DELETE FROM users WHERE id=".$id);
        
    }


 //PRINT Table from data base
  $sql = "SELECT * FROM users  ";
  $result = mysqli_query($con, $sql);

  while($row=$result->fetch_assoc()){
$id=$row["id"];
    echo" <tr>
    <td>".$row["id"] ."</td>";?>
   <td>
<img src="<?php echo 'images/'.$row['image']; ?>" width='90' height='90'> 
</td>
    <?php echo" 
    <td>".$row['first_name'] ."</td>
    <td>".$row["last_name"]."</td>
    <td>".$row["email"]."</td>
    <td>".$row["phone"]."</td>
    <td>".$row["birthday"]."</td>
    <td>".$row["password"]."</td>
    <td>".$row["role"]."</td>
    <td>
    <button class='btn btn-warning'><a href='view_user.php?veiwid=".$id."' class='text-light'><i class='bi bi-eye-fill'></i></a></button>
    <button class='btn btn-info'><a href='update_user.php?updateid=".$id."' class='text-light'><i class='bi bi-pen-fill'></i></a></button>"?>
    <button  class='btn btn-danger'><a onclick="return confirm('Do you want to delete this record?')" href=<?php echo"'users.php?deleteid=".$id."' class='text-light remove'><i class='bi bi-trash3-fill'></i></a></button>
    </td>
   </tr>";
  }

 ?>



 
<?php include('./includes/footer.php'); ?>