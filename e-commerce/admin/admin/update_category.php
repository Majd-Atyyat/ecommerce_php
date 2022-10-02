<?php include('./includes/header.php'); 
include ('../config/dbcon.php');
?>
<?php 



    if (isset($_POST['update'])) {

        $category = $_POST['category_name'];

         $user_id = $_POST['user_id'];
       

     

        $sql = "UPDATE `category` SET `category_name`='$category' WHERE `id`='$user_id'"; 

        $result = $con->query($sql); 

        if ($result == TRUE) {

            $message=" your category is updatetd";
            echo ' <div class="alert alert-info" role="alert">'. $message .'  </div>';

        }else{

            echo "Error:" . $sql . "<br>" . $con->error;

        }

    } 

if (isset($_GET['veiwid'])) {

    $user_id = $_GET['veiwid']; 

    $sql = "SELECT * FROM `category` WHERE `id`='$user_id'";

    $result = $con->query($sql); 

    if ($result->num_rows > 0) {        

        while ($row = $result->fetch_assoc()) {

            $category = $row['category_name'];

            $user_id = $row['id'];
          
   

        } 

    ?>
<form class="mx-auto mt-4" style="width: 700px;" method="POST" action="update_category.php">
  <div class="form-group">

    <h3>Update category</h3>

    <label class="form-label">Category Name</label>
  <input type="text"  name="category"class="form-control" value="<?php echo $category  ?>">
   
  </div>
  
  <input type="hidden" name="user_id" value="<?php echo $id; ?>">

  

  
  <button  name =" update"type="submit" class="btn btn-primary">update</button>
  <a href="./category.php" class="btn btn-secondary ml-2">Cancel</a>
</form
        <?php include('./includes/footer.php'); ?>
       

    <?php

    } else{ 

        header('Location: update_category.php');

    } 

}

?> 

