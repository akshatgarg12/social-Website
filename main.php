<?php
  session_start();
  require('config/db.php');

  $bio = 'Lorem ipsum, dolor sit<br/> amet consectetur adipisicing elit. <br/>Consequuntur sequi aperiam vel<br/> magnam totam neque eveniet.';
 
  if(!empty($_SESSION['username'])){
    $username = $_SESSION['username'];
  }
 
  if(!empty($_SESSION['id'])){
    $id = mysqli_real_escape_string($conn,$_SESSION['id']);
    $sql = "SELECT bio, profile_pic FROM users WHERE id = '$id'";
    $result=mysqli_query($conn,$sql);
    $data = mysqli_fetch_all($result,MYSQLI_ASSOC);
    $bio = $data[0]['bio'];
    $profile_pic = $data[0]['profile_pic'];
  }
?>
<?php if(!empty($_SESSION['username'])){ ?>
<?php require('config/db.php');
      $sql = "SELECT * FROM posts";
      $result = mysqli_query($conn,$sql);
      $data = mysqli_fetch_all($result,MYSQLI_ASSOC);
?>
<?php require('templates/includes.php');?>
    <link rel="stylesheet" href="style.css">
    <link href="favicon.png" rel="icon">
 <?php require('templates/header-logged.php');?>

        <main>
          <div class="feed">
            <!-- to show user info -->
          <section class="user-profile">
            <div class="user">
            
              <img src=<?php echo strval($profile_pic); ?> alt="user-img">
              <div class="user-info">
                <h2 class="username"><?php echo $username ?? username; ?></h2>
                <h6 class="bio"><?php echo $bio; ?></h6>
                <form action="auth/edit.php" method="POST"><input type="submit" name="edit-bio" value="edit bio">
                  <input type="submit" name="change-dp" value="change dp" ></form>
              </div>
            </div>
          </section>
          <!-- to post something -->
          <section class="post">
              <form action="auth/post.php" method="POST" enctype="multipart/form-data"> 
                  <div class="post-area">
                <textarea name="status" class="status-area" rows="5" cols="30">What's your status today...</textarea>
                <div class="post-btns">
                
                <input type="file" class="img-add-button" value="add a photo" name="img-add">
                    
                    
                    <input type="submit" class="submit-button" value="Share" name="share">
                </div>
              </div>
              </form>
          </section>
          <hr style="width:60%; margin-top:10%; margin-bottom:10%;">
          <section class="content">
          <!-- diplay the posts from diff users. -->
          <?php if(!empty($data)):?>
              <?php for($i=sizeof($data)-1; $i>=0;$i--){ ?>
              <?php
              $post = $data[$i];
              require('config/db.php');
              $img = $post['photo'];
              $time = $post['created_at'];
              $description = $post['description'];
              $uid = mysqli_real_escape_string($conn,$post['user_id']);
              $sql = "SELECT * FROM users WHERE id='$uid'";
              $result = mysqli_query($conn,$sql);
              $poster = mysqli_fetch_all($result,MYSQLI_ASSOC);
              ?>
              <div class="feed">
                <h4 class="uid"><?php echo $poster[0]['username'];?></h4>
                <h6><?php echo $time; ?></h6>
                <h5 class="status"><?php echo $description; ?></h5>
                <img class="photo" src=<?php echo "images/".$img; ?> alt="">
              </div>
              <hr style="width:20%; margin-top:5%; margin-bottom:5%;">
              <?php } ?>
              <h5 style="text-align:center;">Thats it for today!</h5>
            <?php endif; ?>
           </section>
        </div>
        </main>  
    <script src="app.js" async defer></script>
  </body>
</html>
            <?php }else{  echo"Login to access this page"; }
 

