 <?php
session_start();
if(!isset($_SESSION['user_name'])){
  header("location: index.php");
}
require_once('database.php');

if(isset($_GET['asset_id'])&&isset($_GET['asset_name']))
 { 
          $id=$_GET['asset_id'];

          $name=$_GET['asset_name'];
          $query = 'SELECT * FROM assetcomments where AssetID= :assID
                           ORDER BY SystemDate';

    $statement2 = $db->prepare($query);
    $statement2->bindParam(':assID', $id);
    $statement2->execute();
    $Allcomments = $statement2->fetchAll();
    $statement2->closeCursor();
          
    

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
    <script language="javascript" src="js/jquery.js"> </script>
    <script language="javascript">
    $(document).ready(function() {

    });
</script>
  </head>

  <body>
    <?php
    include("header.php");
    ?>

    <!-- Page Content -->
  <div class="container">

      <!-- Page Heading/Breadcrumbs -->
      <h1 class="mt-4 mb-3">Asset Management System<br>
        
        <small style="color: #7575a3">Post Comments About Asset.</small>
      </h1>
         
      <div class="row">
         
        <div class="col-lg-4 mb-4">
            <h3 style="color: #ff0066">Asset Name: <?php echo ucfirst($name); ?></h3>
         
        </div>
         <div class="col-lg-4 mb-4">
          
        </div>
         <div class="col-lg-4 mb-4">
           
        </div>  

      </div>  

      

      <?php
          if($Allcomments)
          {

          ?>  
       <?php foreach ($Allcomments as $ac) : ?><br>
      <div class="row">

         <div class="col-lg-12" style="">
                <h5><?php echo ucfirst($ac['Comments']); ?></h5>
                <b class="float-left" style="color: #2e5cb8">Commented by: <?php echo ucfirst($ac['CommentBy']); ?> </b><br>
                <b class="float-left" style="color: #2e5cb8">Date: <?php echo $ac['SystemDate']; ?> </b>
         </div>

      </div>  
      <hr>
      <?php endforeach; ?>

      <?php } 

      else{?>
            
         <h6 style="color: #7575a3">No comments created for this Asset.</h6>
       <?php } ?>

      <br>
<form method="Post" action="savecm.php" name="commentForm">
    <input type="hidden" name="id" value="<?php echo $id ?>" >
    <input type="hidden" name="ast_name" value="<?php echo $name ?>" >
      <div class="row">
 
             <div class="col-lg-12 cmt1" >
                 <label for="detail">Add Comments:</label>
                 <textarea class="form-control" style="overflow: hidden;resize: none" required="required" maxlength="200" id="comment" name="comment"></textarea>
               </div>  
             

         </div>  
         
         <div class="row" style="margin-top: 3px;">

             <div class="col-lg-12 cmt1" >
              <button type="submit" id="assetSubmit" name="commentBtn" class="btn btn-success btn-lg">Comment</button>
              </div>
              
            </div>  
</form>      

      

    </div> 
    <br> 
</body>

</html>

<?php
 }   ?>