<?php
session_start();
if(!isset($_SESSION['user_name'])){
  header("location: index.php");
}
else{
      
    $Cid=$_SESSION['systmeID'];
    require_once('database.php');
    $query = 'SELECT * FROM assetsystems WHERE SystemID= :id';
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
      <h1 class="mt-4 mb-3">Asset Management Systems
        <small>Your Work Panel </small>
      </h1>

      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="index.php">Home</a>
        </li>
        <li class="breadcrumb-item active">Admin</li>
      </ol>

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