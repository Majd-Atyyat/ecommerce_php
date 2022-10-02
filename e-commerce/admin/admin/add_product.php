
<?php include('./includes/header.php'); 
include ('../config/dbcon.php');
?>
<?php 
$product= $category= $price=$description=$errors=$color=$key='';
$errors=array('product_name'=>'','category'=>'','price'=>'','description'=>'','product_key'=>'','color'=>'','price'=>'');

if(isset($_POST['submit'])){
    if(empty($_POST['product_name'])){
        $errors['product_name'] =" Product is required ";
    }
    else { 
        $product= ($_POST['product_name']);
        if(!preg_match("/^[a-zA-Z\s]+$/",$product)){
            $errors['product_name']= 'Product must be lettere and spaces only ';
        }

    }
    
   
    if(empty($_POST['price'])){
        $errors['price'] =" Price is required ";
    }
  
    if(empty($_POST['description'])){
        $errors['description'] =" Description  is required ";
    }
    else { $description=$_POST['description'];

    }
    if(empty($_POST['product_key'])){
        $errors['product_key'] =" This field is required ";
    }
    else { $key=$_POST['product_key'];

    }


    if(empty($_POST['color'])){
        $errors['color'] ="Color is required ";
    }


     if(array_filter($errors)){
        echo'errors in the form';
    
     }
     else{
        $product= mysqli_real_escape_string($con,$_POST['product_name']);
        $category= mysqli_real_escape_string($con,$_POST['category']);
        $price= mysqli_real_escape_string($con,$_POST['price']);
        $color= mysqli_real_escape_string($con,$_POST['color']);
        $description= mysqli_real_escape_string($con,$_POST['description']);
        $key= mysqli_real_escape_string($con,$_POST['product_key']);
        if(empty($_POST['image'])){
            $path='default.jpg';
         }
         else { $path =$_POST['image'];
     
         }
         if(empty($_POST['image_01'])){
             $path1='default.jpg';
          }
          else { $path1 =$_POST['image_01'];
      
          }
          if(empty($_POST['image_02'])){
             $path2='default.jpg';
          }
          else { $path2 =$_POST['image_02'];
      
          }
          if(empty($_POST['image_03'])){
             $path3='default.jpg';
          }
          else { $path3 =$_POST['image_03'];
      
          }
          if(array_filter($errors)){
             echo'errors in the form';
         
          }
        
        $sql=" INSERT INTO products (product_name,price,category,description,color,product_key,image,image_01,image_02,image_03) 
        VALUES('$product','$price','$category','$description','$color','$key','$path','$path1','$path2','$path3')";

        
       if(mysqli_query($con,$sql)){
        //succes
       $message=" your product is added";
       echo ' <div class="alert alert-info" role="alert">'. $message .'  </div>';
    
       }
       else{
        echo 'query error :  '.mysqli_error;
       }

        
    }
     }


?>
<form class="mx-auto mt-4" style="width: 700px;" method="POST" action="add_product.php">
  <div class="form-group">

    <h3>Add New Product</h3>

    <label  class="form-label">Product Name</label>
    <input type="text"  name="product_name"class="form-control" value="<?php echo $product  ?>">
    <small  class="form-text text-danger"><?php echo $errors['product_name'];?></small>
  </div>

  <select class="form-select bg-white border border-secondary" name="category">
  <option selected>select category</option>
  <?php

$get_cat = "select * from category ";

$run_cat = mysqli_query($con,$get_cat);

while ($row_cat=mysqli_fetch_array($run_cat)) {

$cat_id = $row_cat['id'];

$cat_title = $row_cat['category_name'];

echo "<option value='$cat_title'>$cat_title</option>";

}

?>
</select> 
    


  <label class="form-label">price</label>
  <input type="text"  name="price"class="form-control" value="<?php echo $price  ?>">
    <small  class="form-text text-danger"><?php echo $errors['price'];?></small>
  </div>
  <label class="form-label">color</label>
  <input type="text"  name="color"class="form-control" value="<?php $color ?>">
    <small  class="form-text text-danger"><?php echo $errors['color'];?></small>
  </div>
  <label class="form-label">Product Description</label>
  <div class="input-group">
  <textarea class="form-control" name="description"></textarea>
</div>
<small  class="form-text text-danger"><?php echo $errors['description'];?></small>

<label class="form-label">Key Words</label>
<div class="input-group">
  <textarea class="form-control" name="product_key"></textarea>
</div>
<small  class="form-text text-danger"><?php echo $errors['product_key'];?></small>

<label class="form-label">First image </label>
<div class="input-group">
  <input type="file" class="form-control" id="inputGroupFile04"  name="image" aria-label="Upload">
</div>

<label class="form-label">Second image</label>
<div class="input-group">
  <input type="file" class="form-control" id="inputGroupFile04"  name="image_01" aria-label="Upload">
</div>

<label class="form-label">Third image</label>
<div class="input-group">
  <input type="file" class="form-control" id="inputGroupFile04"  name="image_02" aria-label="Upload">
</div>

<label class="form-label">Fourth image</label>
<div class="input-group">
  <input type="file" class="form-control" id="inputGroupFile04"  name="image_03" aria-label="Upload">
</div>
<br>
  <button  name =" submit"type="submit" class="btn btn-primary">Add</button>
  <a href="./products.php" class="btn btn-secondary ml-2">Cancel</a>
</form

<?php include('./includes/footer.php'); ?>

