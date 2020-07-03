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
          <h5 style="color:red;"><?php if(!empty($_GET['errors'])){
            echo $_GET['errors'];
          }?></h5>
          
          <form action="auth/loginAuth.php" method="post">
            <h2 class="form-heading">Login!</h2>
            <input type="text" name="uid" placeholder="Enter your email or username...">
            <input type="password" name="password" placeholder="Enter your password...">
            <input class="submit-button" type="submit" name="login-submit" value="Sign-in">
          </form>  

          </main>
      
      
      
    </body>
  </html>