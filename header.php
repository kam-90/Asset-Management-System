 <nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-dark fixed-top">
      <div class="container">
        <a class="navbar-brand" href="index.php">AVT</a>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item">
              <a class="nav-link" href="about.php">About</a>
            </li>

            <li class="nav-item">
              <a class="nav-link" href="contact.php">Contact</a>
            </li>

            <?php
           if (!isset($_SESSION['user_name'])) { ?>
            <li class="nav-item"><a href="signup.php" class="nav-link">Sign Up</a></li>

            <li class="nav-item"><a href="login.php" class="nav-link"> Login</a></li>
           <?php
            } 
            else{

              ?>
              <?php if($_SESSION['role']=="Client") { ?>
             <li class="nav-item">
              <a class="nav-link" href="ams.php">Create AMS</a>
            </li>
             <?php 
              } ?> 
             
             <?php if($_SESSION['role']=="Admin") { ?>
                      <li class="nav-item">
                      <a class="nav-link" href="adminpage.php">Admin</a>
                    </li> 

                 <?php } ?>

            <?php if($_SESSION['role']=="Admin") { ?>
                      <li class="nav-item">
                      <a class="nav-link" href="userpage.php">Users</a>
                    </li> 

                 <?php } ?>
             <?php if($_SESSION['role']=="Client") { ?>
             <li class="nav-item">
              <a class="nav-link" href="services.php">Services</a>
            </li>  
            <?php 
              } ?> 

              <?php if($_SESSION['role']=="User") { ?>
                      <li class="nav-item">
                      <a class="nav-link" href="adminpage.php">Assets</a>
                    </li> 

                 <?php } ?>

            <li class="nav-item">

             <a href="index.php" class="nav-link">
            <?php echo $_SESSION['user_name'] ?></a>
            </li>

            <li class="nav-item"><a class="nav-link" href="logout.php" >LogOut</a></li>
               

           <?php }
           ?>

          </ul>
        </div>
      </div>
    </nav>