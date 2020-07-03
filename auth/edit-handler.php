<?php
session_start();
if(isset($_POST['bio-change-submit']) && $_SESSION['id']){
  require('../config/db.php');
  $changed_bio  = mysqli_real_escape_string($conn,$_POST['bio-change-text']);
  $id = mysqli_real_escape_string($conn,$_SESSION['id']);
  // echo $changed_bio;
  $sql = "UPDATE users SET bio = '$changed_bio' WHERE id ='$id'";
  $result=mysqli_query($conn,$sql); 
  if($result){
    header("Location: http://192.168.64.2/MyCode/social/main.php");
    exit();
  }
  else{
    header("Location: http://192.168.64.2/MyCode/social/auth/edit.php");
    exit();
  }
}
else if(isset($_POST['image-change-submit']) && $_SESSION['id']){
  require('../config/db.php');
  $id = mysqli_real_escape_string($conn,$_SESSION['id']);
  $filename = $_FILES['image-change-file']['name'];
  $ext = end(explode('.',$filename));
  if(!in_array($ext,array('jpeg','jpg','png','gif'))){
    header('Location: http://192.168.64.2/MyCode/social/auth/edit.php');
    exit();
  }
  // echo "$ext";
  $tempname = $_FILES['image-change-file']['tmp_name'];
  $folder = "displayPic/";
  $newfilename = mysqli_real_escape_string($conn,$_SESSION['id'].".".$ext);
  move_uploaded_file($tempname, $folder.$newfilename);
 
  $filename = "auth/displayPic/".$newfilename;
  $sql = "UPDATE users SET profile_pic = '$filename' WHERE id ='$id'";
  $result=mysqli_query($conn,$sql); 
  if($result){
    header("Location: http://192.168.64.2/MyCode/social/main.php");
    exit();
  }
  else{
    header("Location: http://192.168.64.2/MyCode/social/auth/edit.php");
    exit();
  }
}