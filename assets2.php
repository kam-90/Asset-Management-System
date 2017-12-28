

<?php
session_start();

if(!isset($_SESSION['user_name'])){
  header("location: index.php");
}
require_once('database.php');
$id1=null;

if(isset($_GET['system_id']))
{ 
  
  $id1=$_GET['system_id'];
  

    $query = 'SELECT * FROM assets where SystemID= :sysID
                           ORDER BY AssetID';

    $statement2 = $db->prepare($query);
    $statement2->bindParam(':sysID', $id1);
    $statement2->execute();
    $Allassets = $statement2->fetchAll();
    $statement2->closeCursor();

  
  //echo $id;

}

if(isset($_POST['assetSubmit']))
  {  
     
   echo "string";
      //$sysid=$_POST['sysid'];
      $name=$_POST['assetname'];
      $ven=$_POST['vendor'];
      $mod=$_POST['model'];
      $st=$_POST['status'];
      $loca=$_POST['loc'];
      $ct=$_POST['cost'];
      $quant=$_POST['quantity'];
      $dtp=$_POST['assetdate'];
      $war=$_POST['warranty'];
      $mt=$_POST['maint'];
      $cm=$_POST['comment'];
      $sysid=$_POST['val'];

      

       
      $query = 'INSERT INTO assets
                 (AssetName, Vendor,Model,AssetStatus,DatePurchased,Cost,AssetLocation,Quantity,WarrantyStatus,NextMaintDate,Comments,SystemID)
              VALUES
                 ( :name,:vendor,:model,:status,:dt,:cost,:loc,:quan,:wst,:dtm,:com,:sysID)';
                    $statement = $db->prepare($query);
                    
                     
                    $statement->bindValue(':name',$name);
                    $statement->bindValue(':vendor',$ven);
                    $statement->bindValue(':model',$mod);
                    $statement->bindValue(':status',$st);
                    $statement->bindValue(':dt',$dtp);
                    $statement->bindValue(':cost',$ct);
                    $statement->bindValue(':loc', $loca);
                    $statement->bindValue(':quan',$quant);
                    $statement->bindValue(':wst',$war);
                    $statement->bindValue(':dtm',$mt);
                    $statement->bindValue(':com',$cm);
                    $statement->bindValue(':sysID',$sysid);
                    if($statement->execute())
                    {
                        $statement->closeCursor();
                        header('location: assets2.php?system_id='.$sysid);
                    } 

                    else{
                      header('location: error.php');
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
    <script language="javascript" src="js/jquery.js"> </script>
    <script language="javascript">
    $(document).ready(function() {

    	
      $("#Quantity").click(function(){
          $(this).attr("disabled","disabled");
          $(".quan").removeAttr( "hidden" );
          
       });
      /* $("#assetSubmit").click(function(){
          $(".assetform").hide();
          $(".assetDetails").show();
          $("#create").show();
       });*/
       $(".vendor").click(function(){
          $(this).attr("disabled","disabled");
          $(".ven").removeAttr( "hidden" );
           
          
       });
       $("#status1").click(function(){
          $(this).attr("disabled","disabled");
          $(".status").removeAttr( "hidden" );
           
          
       });
       $("#loc1").click(function(){
          $(this).attr("disabled","disabled");
          $(".loc").removeAttr( "hidden" );
           
          
       });

        $("#warr").click(function(){
          $(this).attr("disabled","disabled");
          $(".war").removeAttr( "hidden" );
          
          
       });

        $("#date").click(function(){
          $(this).attr("disabled","disabled");
          $(".date").removeAttr( "hidden" );
           
          
       });

        $("#cost").click(function(){
          $(this).attr("disabled","disabled");
          $(".ct").removeAttr( "hidden" );
           
          
       });
         $("#next2").click(function(){
          $(this).attr("disabled","disabled");
          $(".maint1").removeAttr( "hidden" );
          
       });
          $("#cmt").click(function(){
          $(this).attr("disabled","disabled");
          $(".cmt1").removeAttr( "hidden" );
          
       });

       $(".assetform").hide();
       $(".recommend").hide();
       $("#create").click(function(){
          $(".assetform").show();
          $(".assetDetails").hide();
          $(".recommend").show();
          $(this).hide();
       });
   
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
      <h1 class="mt-4 mb-3">Asset Management System
        <small>Create Update & Monitor your assets</small>
      </h1>
         
      <div class="row">
         
        <div class="col-lg-4 mb-4">
          <?php  

         //  if($_SESSION['role']=="User" && $_SESSION['User_permission']!="All")
           //  {  

             // ?>
         <button type="button" id="create" class="btn btn-danger btn-lg">Create Asset</button>


            
         </div>
         <div class="col-lg-4 mb-4">
          
        </div>
         <div class="col-lg-4 mb-4">
           
        </div>  

      </div>  

      <div class="row assetDetails">
         
      
         <div>
         <?php
          if($Allassets)
          {

          ?>
         <table class="table table-striped table-inverse  table-bordered" style="color: black;table-layout: fixed; width:1500px; margin-left:-190px;">
        <thead>
        <tr>
          <th>ID</th>
          <th>Asset Name</th>
          <th>Vendor</th>
          <th>Model</th>
          <th>Status</th>
          <th>Location</th>
          <th>Cost</th>
          <th>Quantity</th>
          <th>Date</th>
          <th>Warranty</th>
          <th>Description</th>
          <th>Comments</th>
          <th>Update</th>
          <th>Delete</th>
          
        </tr>
      </thead>
      <tbody>
        <?php foreach ($Allassets as $all) : ?>
        <tr>
          <td><?php echo $all['AssetID']; ?></td>
                <td><?php echo $all['AssetName']; ?></td>
                <td><?php echo $all['Vendor']; ?></td>
                <td><?php echo $all['Model']; ?></td>
                <td><?php echo $all['AssetStatus']; ?></td>
                <td><?php echo $all['AssetLocation']; ?></td>
                <td><?php echo $all['Cost']; ?></td>
                <td><?php echo $all['Quantity']; ?></td>
                <td><?php echo $all['DatePurchased']; ?></td>
                <td><?php echo $all['WarrantyStatus']; ?></td>
                <td><?php echo $all['Comments']; ?></td>
                <td><a href="comment.php?asset_id=<?php echo $all['AssetID']; ?>&asset_name=<?php echo $all['AssetName']; ?>">View</a></td>
                <?php  

              if($_SESSION['role']=="Admin" || $_SESSION['role']=="Client")
              {  

               ?>
                <td><a href="Editasset.php?asset_id=<?php echo $all['AssetID']; ?>&system_id=<?php echo $id1; ?>">Edit</a></td>
                <td><a href="deleteasset.php?asset_id=<?php echo $all['AssetID']; ?>&system_id=<?php echo $id1; ?>"><img src="images/del.png" style="width: 30px; height: 40px;" onclick="return confirm('Are you sure to delete the Asset Record !'); " class="responsive delImage"></a></td>

                <?php

              }?>


              <?php 
              if($_SESSION['role']=="User" &&  $_SESSION['User_permission']=="All")
                {?>

                <td><a href="Editasset.php?asset_id=<?php echo $all['AssetID']; ?>&system_id=<?php echo $id1; ?>">Edit</a></td>
                <td><a href="deleteasset.php?asset_id=<?php echo $all['AssetID']; ?>&system_id=<?php echo $id1; ?>"><img src="images/del.png" style="width: 30px; height: 40px;" onclick="return confirm('Are you sure to delete the Asset Record !'); " class="responsive delImage"></a></td>


              <?php } ?>
              
               <?php 
              if($_SESSION['role']=="User" &&  $_SESSION['User_permission']=="Read")
                {?>

                <td>Not Available</td>
                <td>Not Available</td>


              <?php } ?>
             <?php

              if($_SESSION['role']=="User" &&  $_SESSION['User_permission']=="Read and Edit")
                { 
                echo "here in session"; ?>
                <td><a href="Editasset.php?asset_id=<?php echo $all['AssetID']; ?>&system_id=<?php echo $id1; ?>">Edit</a></td>
                <td>Not Permitted</td>


              <?php } ?>


        </tr>
        <?php endforeach; ?>
      </tbody>
      </table>  

      <?php 
        }

          else{
            ?>

                <h3>You have currently not created any Assets for your system.</h3>
          <?php
             }
      ?>
          
        </div>
          

      </div>

   
      <div class="row assetform">
         
        
         <div class="col-lg-10 mb-9">
           <h3 style="color: red;">Please Fill in Asset details.</h3>
          <form id="assetInsert" name="asset" method="POST" action="assets2.php" class="form-horizontal" role="form">
              <input type="hidden" name="val" value="<?php echo $id1 ?>" >
           	  <div class="row">
               <div class="col-lg-5">
               	
                  <label for="Asset">Asset Name:</label>
                  <input type="text" required="required" class="form-control" id="assetname" placeholder="Enter Asset Name" name="assetname">
               </div>

               <div class="col-lg-7 ven" hidden="hidden">
               	<label for="vendor" >Vendor</label>
      			    <input type="text"  class="form-control" id="vendor" placeholder="Enter Vendor of this Asset" name="vendor" value="Not defined">
                
               	
               </div>

           	  </div>
              <br>
           	   <div class="row">
               <div class="col-lg-5">
               	
                  <label for="model">Asset Model:</label>
                  <input type="text" required="required" class="form-control" id="assetmodel" placeholder="Enter Asset Model" name="model">
               </div>

               <div class="col-lg-5 status" hidden="hidden">
               	<label for="Status">Status</label>
      			<input type="text"  class="form-control" id="status" placeholder="Enter Staus of this Asset" name="status" value="Not defined">
               	
               </div>
               
           	  </div>	
   
               <br>
           	   <div class="row">
               <div class="col-lg-4 loc" hidden="hidden">
               	
                  <label for="loc">Deployed Location:</label>
                  <input type="text"  class="form-control" id="assetloc" placeholder="Boston, USA" name="loc" value="Not defined">
               </div>

               <div class="col-lg-4 ct" hidden="hidden">
               	<label for="cost">Asset Cost</label>
      			<input type="text"  class="form-control" id="Cost" placeholder="$1000,000" name="cost" value="Not defined">
               	
               </div>
               <div class="col-lg-4 quan" hidden="hidden">
               	<label for="quan">Quantity</label>
      			<input type="text"  class="form-control" id="quantity" placeholder="Enter Asset Quantity" name="quantity" value="0">
               	
               </div>
               
           	  </div>	
  
               <br>
           	   <div class="row">
               <div class="col-lg-5 date" hidden="hidden">
               	
                  <label for="dt">Asset Acquired Date:</label>
                  <input type="Date"  class="form-control" id="assetdate" placeholder="Select date from Calendar" name="assetdate" value="2017-06-20">
               </div>

               <div class="col-lg-7 war" hidden="hidden">
               	<label for="warranty">Asset Warranty</label>
      			<select id="warranty" name="warranty" class="form-control" value="Not Known">
                                    <option>In Warranty</option>
                                    <option>Out of Warranty</option>
                                    <option>Our Maintenance</option>
                                    <option selected="Select">Not Known</option>
                  </select>
               	
               </div>
               
           	  </div>	                   
                                  
                  <br>             
               <div class="row">
               <div class="col-lg-5 maint1" hidden="hidden">
               	
                  <label for="model">Next Maintenance Date:</label>
                  <input type="Date"  class="form-control" id="nextdate" placeholder="Select date from Calendar" name="maint" value="2017-06-20">
               </div>
               <div class="col-lg-7 cmt1" hidden="hidden">
                 <label for="detail">Add Asset Details:</label>
                 <textarea class="form-control" maxlength="45" rows="3" cols="7" id="comment" name="comment"></textarea>
               </div>  

           	  </div>	                      
                <br>
               
 
                    
                    <button type="submit" id="assetSubmit" name="assetSubmit" class="btn btn-success btn-lg">Create Asset</button>

                </form>        
          
        </div>
         

      </div>
      <br>
       <div class="col-lg-12 recommend">
        <h4>Our Recommendations</h4>
         <button type="button" id="create" class="btn btn-danger btn-lg vendor">Create Vendor</button>
         <button type="button" id="status1" class="btn btn-danger btn-lg">Create Status</button>
         <button type="button" id="loc1" class="btn btn-danger btn-lg">Create Location</button>
         <button type="button" id="warr" class="btn btn-danger btn-lg">Create Warranty</button>
         <button type="button" id="next2" class="btn btn-danger btn-lg">Next Maintenance Date</button><br><br>
         <button type="button" id="date" class="btn btn-danger btn-lg">Asset Acquired Date:</button>
         <button type="button" id="Quantity" class="btn btn-danger btn-lg">Quantity</button>
         <button type="button" id="cost" class="btn btn-danger btn-lg">Cost</button>
         <button type="button" id="cmt" class="btn btn-danger btn-lg">Add Description</button>
      </div>



  </div>


</body>

</html>



