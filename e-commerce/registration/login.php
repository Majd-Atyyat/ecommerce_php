<?php 
include './config.php'; ?>


<?php
$errors=array('password'=>'');
session_start();
if(isset($_POST['submit'])){
   
        $email= mysqli_real_escape_string($conn,$_POST['email']);
       
        $password= mysqli_real_escape_string($conn,$_POST['password']);
      

        $select =" SELECT * FROM users  WHERE email ='$email' && password ='$password'";
        $result =mysqli_query($conn ,$select);

        if(mysqli_num_rows($result) >0){

          $row= mysqli_fetch_array($result);
          if($row['role'] =='admin'){
            $_SESSION['admin_name'] =$row ['first_name'];
            header('Location:../admin/admin/index.php');

          }elseif($row['role'] =='user'){
            $_SESSION['user_name'] =$row ['first_name'];
            header('Location:./userpage.php');
        }
}else{
    $errors['password']='incorrect email or password';
}};
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Signin</title>

    <!-- Font Icon -->
    <link rel="stylesheet" href="fonts/material-icon/css/material-design-iconic-font.min.css">

    <!-- Main css -->
    <link rel="stylesheet" href="/registiration/assets/css/style.css">
    <!-- bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>

<section class="sign-in">
            <div class="container mt-5">
                <div class="signin-content">
                    <div class="signin-image">
                        <figure><img src="./assets/images/signin-image.jpg" alt="sing up image"></figure>
                        <a href="./register.php" class="signup-image-link">Create an account</a>
                    </div>

                    <div class="signin-form">
                        <h2 class="form-title">Sign in</h2>
                        <form method="POST" class="register-form" id="login-form">
                            <div class="form-group">
                                <label ><i class="zmdi zmdi-account material-icons-name"></i></label>
                                <input type="email" name="email" id="your_name" placeholder="Your email"/>
                            </div>
                            <div class="form-group">
                                <label for="your_pass"><i class="zmdi zmdi-lock"></i></label>
                                <input type="password" name="password" id="your_pass" placeholder="Password"/>
                                <small class="form-text text-danger"><?php echo $errors['password']?></small>
                            </div>
                            
                            <div class="form-group form-button">
                                <input type="submit" name="submit" id="signin" class="form-submit" value="Log in"/>
                            </div>
                        </form>
                       
                    </div>
                </div>
            </div>
        </section>