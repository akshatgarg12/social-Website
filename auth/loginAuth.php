<?php


if(isset($_POST['login-submit'])){
  $uid = htmlspecialchars($_POST['uid']);
  $password = htmlspecialchars($_POST['password']);
  // check if uid exists or not

  $sql = "SELECT * FROM users WHERE username='$uid' or email = '$uid'";
  require "../config/db.php";
  $result = mysqli_query($conn,$sql);
  $userData = mysqli_fetch_all($result,MYSQLI_ASSOC);
  print_r($userData);
  if(!empty($userData)){
    $pass= $userData[0]['password'];
    
    if($pass == $password){
      echo "success";
      session_start();
      $_SESSION['id'] = $userData[0]['id'];
      $_SESSION['username'] = $userData[0]['username'];
      $_SESSION['bio'] = $userData[0]['bio'];
      $_SESSION['profile_pic'] = $userData[0]['profile_pic'];
      header("Location: http://192.168.64.2/MyCode/social/main.php?errors=none&login=success");
      exit();
    }
    else{
      echo "fail";
      header("Location: http://192.168.64.2/MyCode/social/login.php?errors=incorrectpassword&login=failed");
      exit();
    }
  }
  else{
    echo "incorrect username";
    header("Location: http://192.168.64.2/MyCode/social/login.php?errors=incorrectusername&login=failed");
    exit();
  }
}
else{
  echo "Permission denied";
}