<?php 
$conn=mysqli_connect('localhost','root','','ecommerce');
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
   // check password confirmation
if(empty($_POST['confirm_password'])){
    $errors['confirm_password']= 'Please confirm your password <br> ';
}
else{
    if ($_POST["password"] <> $_POST["confirm_password"]) {
        $errors['confirm_password']= 'Confirm password doesn\'t match New password  <br> ';
     }
     
}
    
     if(array_filter($errors)){
       
    
     }
     else{
        $first_name= mysqli_real_escape_string($conn,$_POST['first_name']);
        $last_name= mysqli_real_escape_string($conn,$_POST['last_name']);
        $email= mysqli_real_escape_string($conn,$_POST['email']);
        $phone= mysqli_real_escape_string($conn,$_POST['phone']);
        $birthday= mysqli_real_escape_string($conn,$_POST['birthday']);
        $password= mysqli_real_escape_string($conn,$_POST['password']);
        $confirm_password=mysqli_real_escape_string($conn,$_POST['confirm_password']);
        
        if(empty($_POST['image'])){
            $path='default.jpg';
         }
         else { $path =$_POST['image'];
     
         }
        
          if(array_filter($errors)){
             
            
             echo ' <div class="alert alert-info" role="alert">'. $message .'  </div>';
         
          }
        
        $sql=" INSERT INTO users (first_name,last_name,email,phone,birthday,password,image,role) 
        VALUES('$first_name','$last_name','$email','$phone','$birthday','$password','$path','user')";

        
       if(mysqli_query($conn,$sql)){
        //succes
       $message=" you are signed up now added";
       echo ' <div class="alert alert-info" role="alert">'. $message .'  </div>';
       header('Location:./login.php');
    
       }
       else{
        echo 'query error :  '.mysqli_error;
       }

        
    }
     }


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sign Up</title>

    <!-- Font Icon -->
    <link rel="stylesheet" href="fonts/material-icon/css/material-design-iconic-font.min.css">

    <!-- Main css -->
    <link rel="stylesheet" href="assets/css/style.css">
    <!-- bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>

    <div class="main">

        <!-- Sign up form -->
        <section class="signup">
            <div class="container">
                <div class="signup-content">
                    <div class="signup-form">
                        <h2 class="form-title">Sign up</h2>
                        <form method="POST"  class="register-form" id="register-form">
                        <div class="row">
    <div class="col">
      <input type="text" class="form-control"  name= 'first_name'placeholder="First name">
      <small class="form-text text-danger"><?php echo $errors['first_name']?></small>
    </div>
    <div class="col">
      <input type="text" class="form-control" name='last_name' placeholder="Last name">
      <small class="form-text text-danger"><?php echo $errors['last_name']?></small>
    </div>
  </div>
                            <div class="form-group mt-3">
                            
                            <input type="email" class="form-control" name='email' placeholder="Enter email">
                             <small class="form-text text-danger"><?php echo $errors['email']?></small>
                            </div>

                            <div class="form-group mt-1">
                            <input type="password" class="form-control" name='password'placeholder="Password">
                            <small class="form-text text-danger"><?php echo $errors['password']?></small>
                             </div>

                             <div class="form-group mt-1">
                             <input type="password" class="form-control" name='confirm_password' placeholder="Repeat your password">
                             <small class="form-text text-danger"><?php echo $errors['confirm_password']?></small>
                             </div>
                            
                             <div class="form-group mt-1">
                            <input type="tel" class="form-control" name='phone' placeholder="Enter phone">
                            <small class="form-text text-danger"><?php echo $errors['email']?></small>
                            </div>

                            <div class="form-group mt-1">
                            <input type="date" class="form-control" id="exampleInputEmail1" name='birthday'  placeholder="Enter your birthday">
                            <small class="form-text text-danger"><?php echo $errors['birthday']?></small>
                            </div>
                    
                            <div class="mb-3">
 <h6 class="text-dark"> upload your image</h6>
  <input class="form-control" type="file" name='image' id="formFile">
</div>

                            <div class="form-group form-button">
                                <input type="submit" name="submit" id="signup" class="form-submit" value="Register"/>
                            </div>
                        </form>
                    </div>
                    <div class="signup-image">
                        <figure><img src="assets/images/signup-image.jpg" alt="sing up image"></figure>
                        <a href="./login.php" class="signup-image-link">I am already member</a>
                    </div>
                </div>
            </div>
        </section>
        
            
        </body>
        </html>