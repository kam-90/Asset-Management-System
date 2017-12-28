<?php
include('encryptPassword.php');
 session_start();
 if(isset($_SESSION['user_name'])){
   header("location: index.php");
} 
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
      
        <link rel="stylesheet" href="assets/font-awesome/css/font-awesome.min.css">
        <link rel="stylesheet" href="assets/css/form-elements.css">
        <link rel="stylesheet" href="assets/css/style.css">
    <!-- Custom styles for this template -->
    <link href="css/modern-business.css" rel="stylesheet">

  </head>

  <body>

    <!-- Navigation -->
    <?php
    include("header.php");
   ?>
 <div class="container">

      

    
      <div class="row">
        <div class="col-lg-2 mb-3">  </div>

        <div class="col-lg-8 mb-6"> <h1 class="my-2">Welcome to AVT Solutions</h1></div>
         
        <div class="col-lg-2 mb-3">  </div>

       </div> 

       <div class="row">
                    <div class="col-sm-7 col-sm-offset-1 col-md-4 col-md-offset-1 col-lg-3 col-lg-offset-3">
                    </div>    
                    <div class="col-sm-10 col-sm-offset-1 col-md-8 col-md-offset-2 col-lg-6 col-lg-offset-3 form-box">    
                        <form role="form" name="SignUp" action="cksignup.php" method="POST" class="f1">

                            <h3>Register For AVT Services</h3>
                            <p>Fill in the form to get instant access</p>
                            <div class="f1-steps">
                                <div class="f1-progress">
                                    <div class="f1-progress-line" data-now-value="16.66" data-number-of-steps="3" style="width: 16.66%;"></div>
                                </div>
                                <div class="f1-step active">
                                    <div class="f1-step-icon"><i class="fa fa-user"></i></div>
                                    <p>about</p>
                                </div>
                                 <div class="f1-step">
                                    <div class="f1-step-icon"><i class="fa fa-twitter"></i></div>
                                    <p>company</p>
                                </div>
                                <div class="f1-step">
                                    <div class="f1-step-icon"><i class="fa fa-key"></i></div>
                                    <p>account</p>
                                </div>
                               
                            </div>
                            
                            <fieldset>
                                <h4>Tell us who you are:</h4>
                                <div class="form-group">
                                    <label class="sr-only" for="f1-first-name">First name</label>
                                    <input type="text" name="f1-first-name" placeholder="First name..." required="required" class="f1-first-name form-control" id="f1-first-name">
                                </div>
                                <div class="form-group">
                                    <label class="sr-only" for="f1-last-name">Last name</label>
                                    <input type="text" required="required" name="f1-last-name" placeholder="Last name..." class="f1-last-name form-control" id="f1-last-name">
                                </div>
                                <div class="form-group">
                                    <label class="sr-only" for="f1-job-role">Job Role</label>
                                    <input type="text" required="required" name="f1-job-role" placeholder="Job Role..." class="f1-job-role form-control" id="f1-job-role">
                                </div>
                                <div class="f1-buttons">
                                    <button type="button" class="btn btn-next">Next</button>
                                </div>
                            </fieldset>
                            <fieldset id="cmp">
                                <h4>Company Profile Info:</h4>
                                <div class="form-group">
                                    <label class="sr-only" for="f1-facebook">Company Name</label>
                                    <input type="text" name="f1-cmp-name" placeholder="Company Name" class="f1-cmp-name form-control" id="f1-facebook">
                                </div>
                                <div class="form-group">
                                    <label class="sr-only" for="f1-twitter">Company Address</label>
                                    <input type="text" name="f1-cmp-address" placeholder="Company Address" class="f1-cmp-address form-control" id="f1-twitter">
                                </div>
                                <div class="form-group">
                                    <label class="sr-only" for="f1-country">Located Country</label>
                                    <input type="text" name="f1-country" placeholder="Located Country" class="f1-country form-control" id="f1-google-plus">
                                </div>
                                
                                <div class="f1-buttons">
                                    <button type="button" class="btn btn-previous">Previous</button>
                                    <button type="button" class="btn btn-next">Next</button>
                                </div>
                            </fieldset>
                            <fieldset id="part1">
                                <h4>Set up your account:</h4>
                                <div class="form-group">
                                    <label class="sr-only" for="f1-email">Email</label>
                                    <input type="text" name="f1-email" required="required" placeholder="Email..." class="f1-email form-control" id="f1-email">
                                </div>
                                <div class="form-group">
                                    <label class="sr-only" for="f1-password">Password</label>
                                    <input type="password" name="f1-password" placeholder="Password..." class="f1-password form-control" id="f1-password" required="required">
                                </div>
                                <div class="form-group">
                                    <label class="sr-only" for="f1-repeat-password">Repeat password</label>
                                    <input type="password" required="required" name="f1-repeat-password" placeholder="Repeat password..." 
                                                        class="f1-repeat-password form-control" id="f1-repeat-password">
                                </div>
                                <div class="f1-buttons">
                                    <button type="button" class="btn btn-previous">Previous</button>
                                    <button type="submit" name="submit" class="btn btn-submit">Submit</button>
                                </div>
                            </fieldset>

                            
                        
                        </form>
                    </div>
                </div>

                </div>
                
        <script src="assets/js/jquery-1.11.1.min.js"></script>
        <script src="assets/js/jquery.backstretch.min.js"></script>
        <script src="assets/js/scripts.js"></script>
        

                </body>
                </html> 
