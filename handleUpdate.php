<?php 
require_once 'inc/db.php' ;
if(isset($_POST['submit'] ) && $_GET['id']){

    $erorrs=[];
    $title=$_POST['title'];
    $body=$_POST['body'];
    $id=$_GET['id'];
    if(empty($title)){
        $erorrs[]="the title is empty";
    }
    
    if(empty($body)){
        $erorrs[]="the body is empty";
    }
    $query = " SELECT * FROM POSTS WHERE id=$id";
    $result= mysqli_query($connection,$query);
    $oldimage=mysqli_fetch_assoc($result)['image'];
    
    if (isset($_FILES['image'])&&$_FILES['image']['name']){
        $img=$_FILES['image'];
    // echo "<PRE>";
    // print_r($img);
    $img_name=$img['name'];
    $img_tmp_name=$img['tmp_name'];
        $img_erorr=$img['error'];
        $img_size=$img['size']/1024;
        $ext= pathinfo($img_name,PATHINFO_EXTENSION);
        $new_name=uniqid().".".$ext;
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
        }}else{
            $new_name=$oldimage;
        }
    if(empty($erorrs)){
        $query= "Update  `posts` Set  `title`='$title',`body`='$body',`image`='$new_name'  WHERE  id=$id";
        $result=mysqli_query($connection,$query);
        print_r($result);
        if($result){
            $_SESSION['success']="the post is edited";
            move_uploaded_file($img_tmp_name,"assets/images/postImage/".$new_name);
            unlink("assets/images/postImage/".$oldimage);
            header('location:index.php');exit();
        }
    }
    $_SESSION['erorrs']=$erorrs;
    header('location:index.php');
}?>