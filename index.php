<?php
 session_start();
?>
<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Asset Tracking App</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/modern-business.css" rel="stylesheet">

  </head>

  <body>

    <!-- Navigation -->
   <?php
    include("header.php");
   ?>

    <header>
      <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
          <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
          <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
          <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner" role="listbox">
          <!-- Slide One - Set the background image for this slide in the line below -->
          <div class="carousel-item active" style="background-image: url('images/4.png')">
           <!-- <div class="carousel-caption d-none d-md-block">
              <h3>First Slide</h3>
              <p>This is a description for the first slide.</p>
            </div>-->
          </div>
          <!-- Slide Two - Set the background image for this slide in the line below -->
          <div class="carousel-item" style="background-image: url('images/2.png')">
            
          </div>
          <!-- Slide Three - Set the background image for this slide in the line below -->
          <div class="carousel-item" style="background-image: url('images/3.png')">
            
          </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
        </a>
      </div>
    </header>

    <!-- Page Content -->
    <div class="container">

      <h1 class="my-4">Welcome to AidVanTech</h1>

      <!-- Marketing Icons Section -->
      <div class="row">
        <div class="col-lg-4 mb-4">
          <div class="card h-100">
            <h4 class="card-header">About US</h4>
            <div class="card-body">
              <p class="card-text">Our Company comprises of professional & experienced team which is dedicated towards providing you secure and efficient IT services. </p>
              <img src="images/logo.png">
            </div>
            <div class="card-footer">
              <a href="about.php" class="btn btn-success">Learn More</a>
            </div>
          </div>
        </div>
        <div class="col-lg-4 mb-4">
          <div class="card h-100">
            <h4 class="card-header">Become a Member</h4>
            <div class="card-body">
              <p class="card-text">Sign Up for our free service to get the best by managing your assets at easy and no cost for the inital 30 days. Your experience will be valuable for us.</p>
              <img src="images/icon2.png">
            </div>
            <div class="card-footer">
              <a href="signup.php" class="btn btn-info"><span class="glyphicon glyphicon-user blue" ></span>Sign Up</a>
            </div>
          </div>
        </div>
        <div class="col-lg-4 mb-4">
          <div class="card h-100">
            <h4 class="card-header">Contact US</h4>
            <div class="card-body">
              <p class="card-text">Our help desk service is available to assist you 24 by 7. We are there to answer your queries anytime. Simply contact us by email-phone or web. </p>
              <img src="images/c1.png">
            </div>
            <div class="card-footer">
              <a href="contact.php" class="btn btn-danger">Learn More</a>
            </div>
          </div>
        </div>
      </div>
      <!-- /.row -->

    

      <!-- Features Section -->
      <div class="row">
        <div class="col-lg-6">
          <h2>AVT Business Features</h2>
          
          <ul>
            <li>
              <strong>Benefits To End user & Companies</strong>
            </li>
            <li>Software as a Service</li>
            <li>Dashboard For Asset Management</li>
            <li>Helpdesk Support 24/7</li>
            <li>Authorized and Secure Access</li>
          </ul>
          <p>AVT is not about making a support management system for a niche industry such as the HVAC industry, instead our aim is to make a system that empowers these companies to make their very own asset management system.</p>
        </div>
        <div class="col-lg-6">
          <img class="img-fluid rounded" src="images/customers/bs.png" alt="">
        </div>
      </div>
      <!-- /.row -->

      <hr>

      <!-- Call to Action Section -->
      <div class="row mb-4">
        <div class="col-md-8">
          <p>Contact our HelpDesk 24/7 at 111-456-0999 or Subscribe with Us.</p>
        </div>
        <div class="col-md-4">
          <a class="btn btn-lg btn-secondary btn-block" href="#">Call to Action</a>
        </div>
      </div>

    </div>
    <!-- /.container -->

    <!-- Footer -->
    <footer class="py-5 bg-dark">
      <div class="container">
        <p class="m-0 text-center text-white">Copyright &copy; AVT 2017</p>
      </div>
      <!-- /.container -->
    </footer>

    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  </body>

</html>
