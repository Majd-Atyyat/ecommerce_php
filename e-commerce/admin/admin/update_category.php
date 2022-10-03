<?php include('./includes/header.php'); 
include ('../config/dbcon.php');
?>

<?php


if(isset($_POST['update']))
{   
    $id = $_POST['id'];
    
    $name=$_POST['name'];
    
    
    // checking empty fields
      
        //updating the table
 $result = mysqli_query($con, "UPDATE  category SET category_name='$name' WHERE id=$id");
        

$message=" your category is updated";
echo ' <div class="alert alert-info" role="alert">'. $message .'  </div>';
    }

?>
<?php


//getting id from url
$id = $_GET['id'];

//selecting data associated with this particular id
$result = mysqli_query($con, "SELECT * FROM category WHERE id=$id");

while($res = mysqli_fetch_array($result))
{
    $name = $res['category_name'];
    
}
?>


<form class="mx-auto mt-10" style="width: 500px;" method="POST" action="">
  <div class="form-group">
    <h3>Add New Category Name</h3>
    
    <input type="text"  name="name"class="form-control" value="<?php echo $name; ?>">
    
  </div>
  <input type="hidden" name="id" value=<?php echo $_GET['id'];?>></td>
  <button  name =" update"type="submit" class="btn btn-primary">Add</button>
  <a href="./category.php" class="btn btn-secondary ml-2">Cancel</a>
</form
    
   


<?php include('./includes/footer.php'); ?>


