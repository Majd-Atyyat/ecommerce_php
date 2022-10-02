<?php
$host="localhost";
$username="root";
$password="";
$database="ecommerce";

// creat conn
$con=mysqli_connect($host,$username,$password,$database);
// cheack conn 

// if(!$con){
//     die('connection failed'.mysqli_connect_error());
// }
// else{
//     echo"connected";
// }
// ?>