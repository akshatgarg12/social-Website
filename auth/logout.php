<?php
session_start();
session_unset();
session_destroy();
header("Location:http://192.168.64.2/MyCode/social/index.html");
exit();