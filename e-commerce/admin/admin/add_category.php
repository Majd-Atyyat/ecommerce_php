
<?php include('./includes/header.php'); 
include ('../config/dbcon.php');
?>
<?php 
$category='';
$message='';
$errors=array('category'=>'');
if(isset($_POST['submit'])){
  
    //cheack name 
    if(empty($_POST['category'])){
        $errors['category'] =" this field is required ";
    }
    else{
        $category= $_POST['category'];
        
        if(!preg_match("/^[a-zA-Z\s]+$/",$category)){
            $errors['category']= 'Category must be lettere and spaces only ';
        }
    }
    if(array_filter($errors)){
          echo'error';
    }
    else{
       $category= mysqli_real_escape_string($con,$_POST['category']);
       $sql="INSERT INTO category(category_Name) VALUES ('$category')";

       if(mysqli_query($con,$sql)){
        //succes
       $message=" your category is added";
       echo ' <div class="alert alert-info" role="alert">'. $message .'  </div>';
    
       }
       else{
        echo 'query error :  '.mysqli_error;
       }

        
    }
} //end of check
    ?>
   
<form class="mx-auto mt-10" style="width: 500px;" method="POST" action="add_category.php">
  <div class="form-group">
    <h3>Add New Category Name</h3>
    
    <input type="text"  name="category"class="form-control" value="<?php echo $category; ?>">
    <small  class="form-text text-danger"><?php echo $errors['category'];?></small>
  </div>

  <button  name =" submit"type="submit" class="btn btn-primary">Add</button>
  <a href="./category.php" class="btn btn-secondary ml-2">Cancel</a>
</form

<?php include('./includes/footer.php'); ?>

