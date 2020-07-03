<?php

  if(isset($_POST['share'])){
    require('../config/db.php');
    $allowedExts = array("gif", "jpeg", "jpg", "png");
    $temp = explode(".", $_FILES["img-add"]["name"]);
    $extension = end($temp);
    echo $extension;
    $imgname = $_FILES['img-add']['name'];
    $tempname = $_FILES["img-add"]["tmp_name"]; 
    echo $imgname,$tempname;   
    $description = htmlspecialchars($_POST['status']);
    $description= mysqli_real_escape_string($conn,$description);
    $folder = "../images/";
    $temp = explode(".", $imgname);
    $newfilename = round(microtime(true)) . '.' . end($temp);
    // move_uploaded_file($_FILES["file"]["tmp_name"], "../img/imageDirectory/" . $newfilename);
    
    session_start();
    $user_id = $_SESSION['id'];
    if(in_array($extension,$allowedExts)){
    $sql = "INSERT INTO posts(description,photo,user_id) VALUES('$description','$newfilename','$user_id')";
    if(mysqli_query($conn, $sql)){
    if (move_uploaded_file($tempname, $folder.$newfilename))  { 
      $msg = "Image uploaded successfully"; 
      header("Location:http://192.168.64.2/MyCode/social/main.php?upload=success");
      exit();
  }else{ 
      $msg = "Failed to upload image"; 
      header("Location:http://192.168.64.2/MyCode/social/main.php?upload=failed");
      exit();
} 
    }
    else{
      $msg = "sql upload fail". mysqli_error($conn);
    }
  echo $msg;
  }

  else{
    header("Location:http://192.168.64.2/MyCode/social/main.php?err=wrongext");
    exit();
  }
}
?>