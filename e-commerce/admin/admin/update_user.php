<?php include('./includes/header.php'); 
include ('../config/dbcon.php');
?>

<?php


if(isset($_POST['update']))
{   
        $id = $_POST['id'];
        $first_name= $_POST['first_name'];
        $last_name= $_POST['last_name'];
        $email= $_POST['email'];
        $phone= $_POST['phone'];
        $birthday= $_POST['birthday'];
        $password= $_POST['password'];
        $role= $_POST['role'];
        if(empty($_POST['image'])){
            $path='user_default.jpg';
         }
         else { $path =$_POST['image'];
     
         }
      
    
    
    // checking empty fields
      
        //updating the table
 $result = mysqli_query($con, "UPDATE  users SET first_name='$first_name',last_name='$last_name',email='$email',phone='$phone',
 birthday='$birthday',password='$password',image='$path',role='$role' WHERE id=$id");
        

$message=" user info  is updated";
echo ' <div class="alert alert-info" role="alert">'. $message .'  </div>';
    }

?>
<?php


//getting id from url
$id = $_GET['id'];

//selecting data associated with this particular id
$result = mysqli_query($con, "SELECT * FROM users WHERE id=$id");

while($row = mysqli_fetch_array($result))
{
    $first_name = $row['first_name'];
    $last_name=$row["last_name"];
    $email=$row["email"];
    $birthday=$row["birthday"];
    $phone=$row["phone"];
    $password=$row["password"];
    $path=$row["image"];
    $role=$row["role"];
    
    
}
?>

<form class="mx-auto mt-4" style="width: 700px;" method="POST" action="">
  <div class="form-group">

    <h3>Update User</h3>

    <div class="row">
    <div class="col">
    <label  class="form-label">First Name</label>
    <input type="text"  name="first_name"class="form-control" value="<?php echo $first_name;  ?>">
    
    </div>
    <div class="col">
    <label  class="form-label">Last Name</label>
    <input type="text"  name="last_name"class="form-control" value="<?php echo $last_name;  ?>">
    
    </div>
  </div>

  <label  class="col-sm-2 col-form-label">Email</label>
    
      <input type="email" class="form-control" name="email"value="<?php echo $email;  ?>" >
      
    

  <label class="form-label">phone number</label>
  <input type="tel"  name="phone"class="form-control" value="<?php echo $phone  ?>">
    
  </div>
  <label class="form-label">password</label>
  <input type="password"  name="password"class="form-control"value="<?php echo $password;  ?>" >
  
  </div>

  <label class="form-label">Birthday</label>
  <input type="date"  name="birthday"class="form-control" value="<?php echo $birthday; ?>">
  
  </div>
<label class="form-label">user image </label>
<div class="input-group">
<img src="images/<?php echo $path; ?>" width="70" height="70" >
  <input type="file" class="form-control" id="inputGroupFile04"  name="image" aria-label="Upload">
</div>
<fieldset class="form-group">
    <div class="row">
      <legend class="col-form-label col-sm-2 pt-0">user type</legend>
      <div class="col-sm-10">
        <div class="form-check">
          <input class="form-check-input" type="radio" name="role"  value="user" checked >
          <label class="form-check-label" for="gridRadios1">
            user
          </label>
        </div>
        <div class="form-check">
          <input class="form-check-input" type="radio" name="role"  value="admin">
          <label class="form-check-label" for="gridRadios2">
            admin
          </label>
        </div>
      </div>
    </div>
  </fieldset>
  <br>
  <input type="hidden" name="id" value=<?php echo $_GET['id'];?>></td>
  <button  name ="update" type="submit" class="btn btn-primary">update</button>
  <a href="./users.php" class="btn btn-secondary ml-2">Cancel</a>
    </form>

<?php include('./includes/footer.php'); ?>