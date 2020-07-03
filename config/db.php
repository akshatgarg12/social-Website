<?php
  $conn = mysqli_connect("localhost", "akshat", "test1234" ,"social");
  if(!$conn){
    echo "connection problem" . mysqli_errn($conn);
  }
  else{
    // echo "connection successful.";
  }
?>