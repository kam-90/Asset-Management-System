<?php
session_start();
if(!isset($_SESSION['user_name'])){
  header("location: index.php");
}
if (isset($_POST['amsSubmit']))
{
         require_once('database.php');
         $namesys=$_POST['ams'];
         date_default_timezone_set("America/New_York");
         $today = date("Y-m-d H:i:s"); 
         $Id_client=$_SESSION['Id'];
         $query = 'INSERT INTO assetsystems
                 (ClientID, SystemName,SystemDate)
              VALUES
                 ( :ID,:name,:dt)';
                    
              $statement = $db->prepare($query);
              $statement->bindValue(':ID',$Id_client);
              $statement->bindValue(':name',$namesys);
              $statement->bindValue(':dt',$today);
              if($statement->execute())
                    {
                      $statement->closeCursor();
                      header("location: services.php");
                    }
               else{
                echo"not inputting data";
               }     
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

    <!-- Page Content -->
    <div class="container">

      <!-- Page Heading/Breadcrumbs -->
      <h1 class="mt-4 mb-3">Asset Mgmt System
        <small>Create & Customize</small>
      </h1>
     

      <div class="row">
        
        <div class="col-lg-6 mb-6">
          <h3>Hello <?php echo $_SESSION['user_name'] ?>.<br>Steps to Create an efficient Asset tracking system:</h3> 
          <ul>
            <li>Step 1: Enter the System Name.</li>
            <li>Step 2: Enter as many Asset details you want to track.</li>
            <li>Step 3: Assign roles to monitor and track Assets.</li>
          </ul>
            <form id="amsform" name="ams" method="POST" action="ams.php" class="form-horizontal" role="form">
                  <div style="margin-bottom: 25px" class="input-group">
                                        <span class="input-group-addon"><i class="glyphicon glyphicon-user">ENTER AMS NAME</i></span>
                                        <input id="system" type="text" class="form-control" name="ams" required="required" placeholder="Asset Management System">                                        
                    </div>
                    <button type="submit" name="amsSubmit" class="btn btn-success btn-lg btn-block">Create AMS System</button>

                </form>                    
        </div>
        <div class="col-lg-2 mb-2">
              
        </div>
        
      </div>  
      

    </div>
    <!-- /.container -->
     <br><br><br>
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
