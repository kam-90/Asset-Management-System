<?php
session_start();
if(!isset($_SESSION['user_name'])){
  header("location: index.php");
}
else{
      
    $Cid=$_SESSION['systmeID'];
    require_once('database.php');
    $query = 'SELECT * FROM users WHERE SystemID= :id';
    $statement2 = $db->prepare($query);
    $statement2->bindParam(':id', $Cid);
    $statement2->execute();
    $users1= $statement2->fetchAll();
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

    <div class="container">

      <!-- Page Heading/Breadcrumbs -->
      <h1 class="mt-4 mb-3">Asset Management System
        <small>Manage all system user</small>
      </h1>
         
       <br><br>

      <div class="row assetDetails">
         
      
         <div>
         <?php
          if($users1)
          {

          ?>
         <table class="table table-striped table-inverse  table-bordered" style="color: black;table-layout: fixed; width:1500px; margin-left:-190px;">
        <thead>
        <tr>
          <th>ID</th>
          <th>User Name</th>
          <th>User Email</th>
          <th>User Permission Level</th>
          <th>Delete</th>
          
        </tr>
      </thead>
      <tbody>
        <?php foreach ($users1 as $all) : ?>
        <tr>
          <td><?php echo $all['UserID']; ?></td>
                <td><?php echo $all['UserName']; ?></td>
                <td><?php echo $all['UserEmail']; ?></td>
                <td><?php echo $all['UserPermission']; ?></td>

                <td><a href="deluser.php?user_id=<?php echo $all['UserID']; ?>"><img src="images/del.png" style="width: 30px; height: 40px;" onclick="return confirm('Are you sure to delete the Asset Record !'); " class="responsive delImage"></a>
                </td>
                
        </tr>
        <?php endforeach; ?>
      </tbody>
      </table>  

      <?php 
        }

          else{
            ?>

                <h3>No more users created for this system.</h3>
          <?php
             }
      ?>
          
        </div>
          

      </div>

     </div>
     
     </body>
     </html> 