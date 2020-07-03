<?php
// if edit-bio button is clicked.
session_start();
if(isset($_POST['edit-bio']) && $_SESSION['id']): ?>
 <?php require('../templates/includes.php');?>
 <?php 
          require('../config/db.php');
          $id = mysqli_real_escape_string($conn,$_SESSION['id']);
          $sql = "SELECT bio FROM users WHERE id='$id'";
          $result = mysqli_query($conn,$sql);
          $bio = mysqli_fetch_all($result,MYSQLI_ASSOC);
          // print_r($bio);
        ?>
    <link rel="stylesheet" href="../style.css">
    </head>
  <body>
      <header>
          <nav class="navbar">
            <a href=<?php
              echo "../main.php";
             ?> class="logo">social</a>
            <ul>
              <li><a href="logout.php">Logout</a></li>
            </ul>
          </nav>
        </header>
        <hr>
        <!-- form for changing the bio -->
        <h2 style="text-align:center; color:#ff0000;">Edit your bio here!</h2>
        <form action="edit-handler.php" method="post">
        <textarea name="bio-change-text" class="status-area" style="margin:auto;" rows="5" cols="30"><?php echo $bio[0]['bio']; ?></textarea>
        <input type="submit" class="submit-button" style="margin-top:2%;"name="bio-change-submit" value="submit"> 
        </form>
<?php elseif(isset($_POST['change-dp']) && $_SESSION['id']): ?>
<?php require('../templates/includes.php');?>
<link rel="stylesheet" href="../style.css">
    </head>
  <body>
      <header>
          <nav class="navbar">
            <a href=<?php
              echo "../main.php";
             ?> class="logo">social</a>
            <ul>
              <li><a href="logout.php">Logout</a></li>
            </ul>
          </nav>
        </header>
        <hr>
        <!-- form to change dp -->
        <form action="edit-handler.php" method="post" enctype="multipart/form-data" style="text-align:center;">
        <input type="file" class="img-add-button" value="add a photo" name="image-change-file" style="margin:auto;">
        <input type="submit" class="submit-button" name="image-change-submit" value="submit" > 
        </form>

        <?php else: ?>
  <h1><?php echo "Login to access this page"; ?></h1>
<?php endif; ?>

