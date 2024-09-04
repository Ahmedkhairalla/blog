<?php
require_once 'inc/db.php' ;
if(isset($_POST['submit'])){

    $erorrs=[];
    $title=$_POST['title'];
    $body=$_POST['body'];
    if(empty($title)){
        $erorrs[]="the title is empty";
    }
    
    if(empty($body)){
        $erorrs[]="the body is empty";
    }
    $img=$_FILES['image'];
    // echo "<PRE>";
    // print_r($img);
    $img_name=$img['name'];
    $img_tmp_name=$img['tmp_name'];
        $img_erorr=$img['error'];
        $img_size=$img['size']/1024;
        $ext= pathinfo($img_name,PATHINFO_EXTENSION);
        $new_nmae=uniqid().".".$ext;
        if (empty($img)){
            $erorrs[]="you should uplod img";
        }
            elseif($img_erorr>0)
            {
                $erorrs[]="you should uplod img";
            }
       else if(!in_array($ext,['png','jpg']))     
        {
            $erorrs[]="must uplod png or gpg only ";
        }
        if(empty($erorrs)){
            $querry= "INSERT  INTO posts (title,body,image,user_id) VALUES('$title','$body','$img_name','1')";
            $result=mysqli_query($connection,$querry);
            if($result){
                $_SESSION['success']="the post is adedd";
                move_uploaded_file($img_tmp_name,"assets/images/postImage/".$img_name);
                header('location:index.php');exit();
            }
        }
}
$_SESSION['erorrs']=$erorrs;
header('location:addpost.php');
?>