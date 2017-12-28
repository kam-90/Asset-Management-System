<?php
session_start();
include('encryptPassword.php');
require_once('database.php');
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

    <!-- Custom styles for this template -->
    <link href="css/modern-business.css" rel="stylesheet">

  </head>

  <body>

    <!-- Navigation -->
    <?php
    include("header.php");
    ?>

<?php
if (isset($_POST['submit']))
{        
         $_email=$_POST['email'];
         $_pass=$_POST['password'];
         $profile=$_POST['profile'];

if($profile=="Client"){ 
         $hash=secure($_pass);// added this 
         $Id=0;
         $user_name=null;
         $email=null;
         $cryptPassword=null;
         $result = $db->prepare("SELECT * FROM clientaccount WHERE Email= :email");
         $result->bindParam(':email', $_email);
        
         $result->execute();
      
      if($row = $result->fetch()) 
      {
        
                    $Id=$row['ClientID'];
                    $user_name= $row['FirstName'];
                    $email=$row['Email'];
                    $cryptPassword=$row['Password1'];

          if ( hash_equals($cryptPassword, crypt($_pass, $cryptPassword)) ) 
            {
                //echo" same password decrypted";
                session_start();
                $_SESSION['Id']=$Id;
                $_SESSION['user_name']=$user_name;  
                $_SESSION['email']=$email;
                $_SESSION['role']=$profile;
                header("location: index.php");
            }

            else{?>
              <br>
              <h4 style="color: red; margin-left:200px">Incorrect Password. Please Try again.</h3>

             <?php }
           
      }



    else{?>
         <br>
         <h4 style="color: red;margin-left:200px">Incorrect Email. Please Try again.</h3>
      <?php
        }
      
      $result->closeCursor();
   }

   
      // admin profile login check:


       elseif($profile=="Admin"){ 
         
         $result = $db->prepare("SELECT * FROM admin WHERE AdminEmail= :email and AdminPassword=:pass");
         $result->bindParam(':email', $_email);
         $result->bindParam(':pass',  $_pass); 
        
         $result->execute();
      
      if($row = $result->fetch()) 
      {
        
                    $Id=$row['AdminID'];
                    $user_name= $row['AdminName'];
                    $email=$row['AdminEmail'];
                    $SysID=$row['SystemID'];
                //echo" same password decrypted";
                session_start();
                $_SESSION['Id']=$Id;
                $_SESSION['user_name']=$user_name;  
                $_SESSION['email']=$email;
                $_SESSION['role']=$profile;
                $_SESSION['systmeID']=$SysID;
                header("location: index.php");
            

            
           
      }



    else{?>
         <br>
         <h4 style="color: red;margin-left:200px">Incorrect Email or password. Please Try again.</h3>
      <?php
        }
      
      $result->closeCursor();
   }
   

   // user profile login check:


       elseif($profile=="User"){ 
         
         $result = $db->prepare("SELECT * FROM users WHERE UserEmail= :email and UserPassword=:pass");
         $result->bindParam(':email', $_email);
         $result->bindParam(':pass',  $_pass); 
        
         $result->execute();
      
      if($row = $result->fetch()) 
      {
        
                    $Id=$row['UserID'];
                    $user_name= $row['UserName'];
                    $email=$row['UserEmail'];
                    $User_permission=$row['UserPermission'];
                    $SysID=$row['SystemID'];
                //echo" same password decrypted";
                session_start();
                $_SESSION['Id']=$Id;
                $_SESSION['user_name']=$user_name;  
                $_SESSION['email']=$email;
                $_SESSION['role']=$profile;
                $_SESSION['User_permission']=$User_permission;
                $_SESSION['systmeID']=$SysID;
                header("location: index.php");
            

            
           
      }



    else{?>
         <br>
         <h4 style="color: red;margin-left:200px">Incorrect Email or password. Please Try again.</h3>
      <?php
        }
      
      $result->closeCursor();
   }










   else{
       header("location: error.php");
   }
      
    //echo "data reaching.".$_SESSION['Id'].'--'.$_SESSION['email'];// Form has been submitted
   
}


?>


      <div class="container">    
        <div id="loginbox" style="margin-top:50px;" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">                    
            <div class="panel panel-info" >
                <?php
                if(isset($_SESSION['Signed'])){?>
                <h3 class="panel-title">Thanks For Signing Up with AVT. Please Login to Use Our Services.</h3>  
                <?php
                } 
                unset($_SESSION['Signed']);
                ?>
                    <div class="panel-heading">
                        <div class="panel-title">Sign In</div>
                        <div style="float:right; font-size: 80%; position: relative; top:-10px"><a href="forgot.php">Forgot password?</a></div>
                    </div>     

                    <div style="padding-top:30px" class="panel-body" >

                        <div style="display:none" id="login-alert" class="alert alert-danger col-sm-12"></div>
                            
                        <form id="loginform" name="login" method="POST" action="login.php" class="form-horizontal" role="form">
                                    
                            <div style="margin-bottom: 25px" class="input-group">
                                        <span class="input-group-addon"><i class="glyphicon glyphicon-user">Email</i></span>
                                        <input id="login-username" type="text" class="form-control" name="email" required="required" placeholder="Email">                                        
                                    </div>
                                
                            <div style="margin-bottom: 25px" class="input-group">
                                        <span class="input-group-addon"><i class="glyphicon glyphicon-lock">Password</i></span>
                                        <input id="login-password" required="required" type="password" class="form-control" name="password" placeholder="password">
                                    </div>
                                    
                              <div style="margin-bottom: 25px" class="input-group">
                                 <span class="input-group-addon"><i class="glyphicon glyphicon-lock">Select Profile</i></span>
                                   <select id="permission" class="form-control" name="profile">
                                                  <option selected="Select">Client</option>
                                                  <option>Admin</option>
                                                  <option >User</option>
                                        </select>  
                              </div>  
                                <br>
                            <div class="input-group">
                                      <div class="checkbox">
                                        <label>
                                          <input id="login-remember" type="checkbox" name="remember" value="1"> Remember me
                                        </label>
                                      </div>
                                    </div>


                                <div style="margin-top:10px" class="form-group">
                                    <!-- Button -->

                                    <div class="col-sm-12 controls">
                                      
                                      <button id="btn-login" type="submit" name="submit" class="btn btn-success">Login</button>
                                      <a id="btn-fblogin" href="#" class="btn btn-primary">Login with Facebook</a>

                                    </div>
                                </div>


                                <div class="form-group">
                                    <div class="col-md-12 control">
                                        <div style="border-top: 1px solid#888; padding-top:15px; font-size:85%" >
                                            Don't have an account! 
                                        <a href="signup.php">
                                            Sign Up Here
                                        </a>
                                        </div>
                                    </div>
                                </div>    
                            </form>     



                        </div>                     
                    </div>  
        </div>
 </div>
</body>
</html>
    
    