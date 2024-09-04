<?php
require_once 'inc/db.php';
if(isset($_POST['submit'])&& $_GET['id']){
    $id = $_GET['id'];
    $query="SELECT * FROM users WHERE id ='$id'";
    $result=mysqli_query($connection,$query);
    $user=mysqli_fetch_assoc($result);
    $users= 
if()
}

