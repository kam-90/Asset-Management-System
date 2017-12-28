<?php
session_start();
if(!isset($_SESSION['user_name'])){
  header("location: index.php");
}
else{
      
    $Cid=$_SESSION['Id'];
    require_once('database.php');
    $query = 'SELECT * FROM assetsystems WHERE ClientID= :id';
    $statement2 = $db->prepare($query);
    $statement2->bindParam(':id', $Cid);
    $statement2->execute();
    $systems = $statement2->fetchAll();
    $statement2->closeCursor();

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
      <h1 class="mt-4 mb-3">Asset Mgmt Systems
        <small>Track Assets by adding them to your System</small>
      </h1>

      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="index.php">Home</a>
        </li>
        <li class="breadcrumb-item active">Services</li>
      </ol>

      <!-- Image Header -->
    
       <div class="row">
         
        <div class="col-lg-4 mb-4">
         <a href="ams.php"><button type="button" id="create" class="btn btn-danger btn-lg">Create Asset Mgmt System</button></a>
        </div>
         <div class="col-lg-4 mb-4">
          <a href="admin.php"><button type="button" id="create" class="btn btn-success btn-lg">Assign System Administrators</button></a>
        </div>
         <div class="col-lg-4 mb-4">
           <a href="user.php"><button type="button" id="create" class="btn btn-warning btn-lg">Assign Users to Your Systems</button></a>
        </div>  

      </div>  
      <!-- Marketing Icons Section -->
      <div class="row">
        <?php foreach ($systems as $sys) : ?>
        <div class="col-lg-4 mb-4">
          <div class="card h-100">
            <h4 class="card-header"><?php echo $sys['SystemName'] ?></h4>
            <div class="card-body">
              <p class="card-text"><?php echo $sys['SystemName'] ?> Created on 
                <?php echo $sys['SystemDate'] ?>by <?php echo $_SESSION['user_name']; ?> </p>
            </div>
            <div class="card-footer">
              <a href="assets2.php?system_id=<?php echo $sys['SystemID']; ?>" class="btn btn-info">View Assets</a>
            </div>
          </div>
        </div>
       <?php endforeach; ?>
        
      </div>
      <!-- /.row -->

    </div>
    <!-- /.container -->

    <!-- Footer -->
   

    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  </body>

</html>
