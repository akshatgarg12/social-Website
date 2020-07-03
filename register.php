
<!DOCTYPE html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Social</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://fonts.googleapis.com/css2?family=Bungee&family=Noto+Sans+JP:wght@400;700&family=Pacifico&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
    <link href="favicon.png" rel="icon">
  </head>
  <body>
      <header>
          <nav class="navbar">
              <a href="index.html" class="logo">social</a>
              <ul>
                <li><a href="login.php">Login</a></li>
                <li><a href="register.php">Register</a></li>
              </ul>
            </nav>
        </header>
        <hr>
        <main>
          <h6 style="color:red;"><?php
          if(!empty($_GET['errors'])){
            echo $_GET['errors']."<br/>";
          }
          ?>
          </h6>
          <h6 style="color:green;"><?php
          if(!empty($_GET['register'])){
            echo $_GET['register']."<br/>";
          }
          ?>
          </h6>
          <form action="auth/registerAuth.php" method="post">
            <h2 class="form-heading">Register!</h2>
            <input type="text" name="username" placeholder="Enter a username...">
            <input type="email" name="email" placeholder="Enter your email...">
            <input type="password" name="password" placeholder="Enter your password...">
            <div class="checkbox"><input type="checkbox" name="terms" ><h6>Accept the terms and conditions</h6></div>
            <input class="submit-button" type="submit" name="register-submit" value="Become a member!">
           
          </form>  

          </main>
      
      
      
    
    </body>
  </html>