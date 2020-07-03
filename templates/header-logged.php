  </head>
  <body>
      <header>
          <nav class="navbar">
            <a href=<?php if(!empty($id)){
              echo "main.php";
            }
              else{
                echo "index.php";
              }
             ?> class="logo">social</a>
            <ul>
              <li><a href="auth/logout.php">Logout</a></li>
            </ul>
          </nav>
        </header>
        <hr>