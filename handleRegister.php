<?php 
require_once 'inc/db.php';
if(isset($_POST['submit'])){
$name= $_POST['name'];
$email= $_POST['email'];
$phone= $_POST['phone'];
$password= $_POST['password'];

$hashPassword= password_hash($password,PASSWORD_DEFAULT);



$erorrs=[];
    if(empty($name)&& strlen($name)<6){

        $erorrs[]="the name is empty or very small";
    }if (empty($email)&& !filter_var($email,FILTER_VALIDATE_EMAIL)) {
        $erorrs[]="the email is empty or not email";
    }
    if(empty($phone)&& strlen($phone)<8){
        $erorrs[]= "the phone not valied";
    }if (empty($password)){
        $erorrs[]="the password is empty ";
    }
    if(empty($erorrs)){
$query="INSERT INTO users (`name`,`email`,`phone`,`password`) VALUES ( '$name', '$email','$phone','$hashPassword')";
$result= mysqli_query($connection,$query);
    }if($result){
        $_SESSION['success']="the user is adedd";
                header('location:login.php')
                ;exit();  
    }
    $_SESSION['erorrs']=$erorrs;
    header('location:register.php');

}