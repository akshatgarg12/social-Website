<?php
$errors = array("username"=>'',"email"=>'',"password"=>'',"terms"=>'');
if(isset($_POST['register-submit'])){
  require '../config/db.php';
  $username  = htmlspecialchars($_POST['username']);
  $email  = htmlspecialchars($_POST['email']);
  $password  =htmlspecialchars($_POST['password']);
  $terms  = htmlspecialchars($_POST['terms']);
  // username validations
  // $username = mysqli_real_escape_string($username);
  $sql = "SELECT * FROM users WHERE username='$username'";
  $result = mysqli_query($conn, $sql);
  if(empty($username)){
    $errors['username']="username can't be empty";
    header("Location: http://192.168.64.2/MyCode/social/register.php?errors=".$errors['username']);
    exit();
  }
  else if(!preg_match("/^[A-Za-z][A-Za-z0-9]{5,31}$/",$username)){
    $errors['username']="username invalid";
    header("Location: http://192.168.64.2/MyCode/social/register.php?errors=".$errors['username']);
    exit();
  }
  else if(mysqli_num_rows($result)){
    $errors['username']="username already taken";
    header("Location: http://192.168.64.2/MyCode/social/register.php?errors=".$errors['username']);
    exit();
  }
  // email valid
  // $email = mysqli_real_escape_string($email);
  $sql = "SELECT * FROM users WHERE email='$email'";
  $result = mysqli_query($conn, $sql);
  if(empty($email)){
    $errors['email']="email can't be empty";
    header("Location: http://192.168.64.2/MyCode/social/register.php?errors=".$errors['email']);
    exit();
  }
  else if(mysqli_num_rows($result)){
    $errors['email']="email already taken";
    header("Location: http://192.168.64.2/MyCode/social/register.php?errors=".$errors['email']);
    exit();
  }
  // password
  if(empty($password)){
    $errors['password']="password can't be empty";
    header("Location: http://192.168.64.2/MyCode/social/register.php?errors=".$errors['password']);
    exit();
  }
  else if(strlen($password)<8){
    $errors['password']="password must have min of 8 charachters";
    header("Location:http://192.168.64.2/MyCode/social/register.php?errors=".$errors['password']);
    exit();
  }
  // checkbox
  if(!isset($_POST['terms'])){
    $errors['terms']="accept the terms and conditions";
    header("Location: http://192.168.64.2/MyCode/social/register.php?errors=".$errors['terms']);
    exit();
  }
  // final validation before entering the data
  if(!array_filter($errors)){
    $sql = "INSERT INTO users(username,email,password) VALUES('$username','$email','$password')";
    $result = mysqli_query($conn,$sql);
    if($result){
      header("Location: http://192.168.64.2/MyCode/social/register.php?errors=&register=success");
    }
    else{
      header("Location: http://192.168.64.2/MyCode/social/register.php?errors=none&register=failed");
    }
  }
  else{
    header("Location:http://192.168.64.2/MyCode/social/register.php?username=".$errors['username']."&email=".$errors['email']."&password=".$errors['password']."&terms=".$errors['terms']);
  }
}
else{
  echo "Permission denied.";
}