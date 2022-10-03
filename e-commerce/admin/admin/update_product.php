<?php include('./includes/header.php'); 
include ('../config/dbcon.php');
?>

<?php


if(isset($_POST['update']))
{   
        $id = $_POST['id'];
        $product= $_POST['product_name'];
        $category= $_POST['category'];
        $price= $_POST['price'];
        $color= $_POST['color'];
        $description= $_POST['description'];
        $key= $_POST['product_key'];
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
       
      
    
    
    // checking empty fields
      
        //updating the table
 $result = mysqli_query($con, "UPDATE  products SET product_name='$product',category='$category',price='$price',color='$color',
 description='$description',product_key='$key',category='$category',image='$path',image_01='$path1',image_02='$path2',image_03='$path3' WHERE id=$id");
        

$message=" your product is updated";
echo ' <div class="alert alert-info" role="alert">'. $message .'  </div>';
    }

?>
<?php


//getting id from url
$id = $_GET['id'];

//selecting data associated with this particular id
$result = mysqli_query($con, "SELECT * FROM products WHERE id=$id");

while($row = mysqli_fetch_array($result))
{
    $category = $row['category'];
    $product=$row["product_name"];
    $price=$row["price"];
    $description=$row["description"];
    $color=$row["color"];
    $key=$row["product_key"];
    $path=$row["image"];
    $path1=$row["image_01"];
    $path2=$row["image_02"];
    $path3=$row["image_02"];
    
}
?>

<form class="mx-auto mt-4" style="width: 700px;" method="POST" action="">
  <div class="form-group">

    <h3>Update Product</h3>

    <label  class="form-label">Product Name</label>
    <input type="text"  name="product_name"class="form-control" value="<?php echo $product  ?>">
    
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
  <input type="text"  name="price"class="form-control" value="<?php echo $price ; ?>">
   
  </div>
  <label class="form-label">color</label>
  <input type="text"  name="color"class="form-control" value="<?php echo $color ;?>">
   
  </div>
  <label class="form-label">Product Description</label>
  <div class="input-group">
  <textarea class="form-control" name="description"> <?php echo $description ; ?></textarea>
</div>


<label class="form-label">Key Words</label>
<div class="input-group">
  <textarea class="form-control" name="product_key"><?php echo $description ; ?></textarea>
</div>


<label class="form-label">First image </label>
<div class="input-group">
<img src="images/<?php echo $path; ?>" width="70" height="70" >
  <input type="file" class="form-control" id="inputGroupFile04"  name="image" aria-label="Upload">
  
</div>

<label class="form-label">Second image</label>
<div class="input-group">
<img src="images/<?php echo $path1; ?>" width="70" height="70" >
  <input type="file" class="form-control" id="inputGroupFile04"  name="image_01" aria-label="Upload">
</div>

<label class="form-label">Third image</label>
<div class="input-group">
<img src="images/<?php echo $path2; ?>" width="70" height="70" >
  <input type="file" class="form-control" id="inputGroupFile04"  name="image_02" aria-label="Upload">
</div>

<label class="form-label">Fourth image</label>
<div class="input-group">
<img src="images/<?php echo $path3; ?>" width="70" height="70" >
  <input type="file" class="form-control" id="inputGroupFile04"  name="image_03" aria-label="Upload">
</div>
<input type="hidden" name="id" value=<?php echo $_GET['id'];?>></td>
<br>
  <button  name ="update" type="submit" class="btn btn-primary">Update</button>
  <a href="./products.php" class="btn btn-secondary ml-2">Cancel</a>
</form>
   


<?php include('./includes/footer.php'); ?>

