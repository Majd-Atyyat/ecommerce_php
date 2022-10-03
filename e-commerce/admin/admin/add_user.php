
<?php include('./includes/header.php'); 
include ('../config/dbcon.php');
?>
<?php 
$first_name=$last_name=$email=$birthday=$phone='';
$errors=array('first_name'=>'','last_name'=>'','email'=>'','password'=>'','birthday'=>'','confirm_password'=>'','phone'=>'');

if(isset($_POST['submit'])){
    if(empty($_POST['first_name'])){
        $errors['first_name']=' Name is required <br> ';
    }
    else{
        $first_name=$_POST['first_name'];
        if(!preg_match('/^[a-zA-Z\s]+$/',$first_name)){
            $errors['first_name']= 'Name must be letters and spaces only';
        }
    }
        // check last name 
        if(empty($_POST['last_name'])){
            $errors['last_name']='  Name is required <br> ';
        }
        else{
            $last_name=$_POST['last_name'];
            if(!preg_match('/^[a-zA-Z\s]+$/',$last_name)){
                $errors['last_name']= 'Name must be letters and spaces only';
            }
        }
    
    // check birthday
    if(empty($_POST['birthday'])){
        $errors['birthday'] ='   age is required <br> ';
    }
    else{
        $birthday=$_POST['birthday'];
        $strSystemMaxDate = (date('Y') - 16).'/'.date('m/d');
        if(strtotime($birthday) > strtotime($strSystemMaxDate))
        {
            $errors['birthday'] = ("Minimum age is 16 years.");
            $blnValidated = false;
        }
    }
    
    // check email
    if(empty($_POST['email'])){
        $errors['email']='  Email is required <br> ';
    }
    else{
        $email=$_POST['email'];
        if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
            $errors['email']= "email must be valid email adress";
    
        }
    }
    // check password
    if(empty($_POST['password'])){
        $errors['password']= 'Password should be at least 8 characters <br> ';
    }
    else{
        $password=$_POST['password'];
        if(!preg_match('@[0-9]@', $password)){
            $errors['password']= 'Password should be at least 8 characters';
        }
    }
     // check phone
     if(empty($_POST['phone'])){
        $errors['phone']= 'Phone is requiered';
    }
   
    
     if(array_filter($errors)){
        echo'errors in the form';
    
     }
     else{
        $first_name= mysqli_real_escape_string($con,$_POST['first_name']);
        $last_name= mysqli_real_escape_string($con,$_POST['last_name']);
        $email= mysqli_real_escape_string($con,$_POST['email']);
        $phone= mysqli_real_escape_string($con,$_POST['phone']);
        $birthday= mysqli_real_escape_string($con,$_POST['birthday']);
        $password= mysqli_real_escape_string($con,$_POST['password']);
        $role= mysqli_real_escape_string($con,$_POST['role']);
        
        if(empty($_POST['image'])){
            $path='user_default.jpg';
         }
         else { $path =$_POST['image'];
     
         }
        
          if(array_filter($errors)){
             $message='errors in the form';
            
             echo ' <div class="alert alert-info" role="alert">'. $message .'  </div>';
         
          }
        
        $sql=" INSERT INTO users (first_name,last_name,email,phone,birthday,password,image,role) 
        VALUES('$first_name','$last_name','$email','$phone','$birthday','$password','$path','$role')";

        
       if(mysqli_query($con,$sql)){
        //succes
       $message=" user is added";
       echo ' <div class="alert alert-info" role="alert">'. $message .'  </div>';
    
       }
       else{
        echo 'query error :  '.mysqli_error;
       }

        
    }
     }


?>
<form class="mx-auto mt-4" style="width: 700px;" method="POST" action="add_user.php">
  <div class="form-group">

    <h3>Add New Product</h3>

    <div class="row">
    <div class="col">
    <label  class="form-label">First Name</label>
    <input type="text"  name="first_name"class="form-control" value="<?php echo $first_name  ?>">
    <small  class="form-text text-danger"><?php echo $errors['first_name'];?></small>
    </div>
    <div class="col">
    <label  class="form-label">Last Name</label>
    <input type="text"  name="last_name"class="form-control" value="<?php echo $last_name  ?>">
    <small  class="form-text text-danger"><?php echo $errors['last_name'];?></small>
    </div>
  </div>

  <label  class="col-sm-2 col-form-label">Email</label>
    
      <input type="email" class="form-control" name="email" >
      <small  class="form-text text-danger"><?php echo $errors['email'];?></small>
    

  <label class="form-label">phone number</label>
  <input type="tel"  name="phone"class="form-control" value="<?php echo $phone  ?>">
    <small  class="form-text text-danger"><?php echo $errors['phone'];?></small>
  </div>
  <label class="form-label">password</label>
  <input type="password"  name="password"class="form-control">
    <small  class="form-text text-danger"><?php echo $errors['password'];?></small>
  </div>

  <label class="form-label">Birthday</label>
  <input type="date"  name="birthday"class="form-control" value="<?php $birthday ?>">
    <small  class="form-text text-danger"><?php echo $errors['birthday'];?></small>
  </div>
<label class="form-label">user image </label>
<div class="input-group">
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
  <button  name =" submit"type="submit" class="btn btn-primary">Add</button>
  <a href="./users.php" class="btn btn-secondary ml-2">Cancel</a>
    </form>

<?php include('./includes/footer.php'); ?>