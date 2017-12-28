<?php
session_start();

if(!isset($_SESSION['user_name'])){
  header("location: index.php");
}
require_once('database.php');

if(isset($_GET['system_id']) && isset($_GET['asset_id']))
{ 
	
	$id1=$_GET['system_id'];
	$assetID=$_GET['asset_id'];

    $query = 'SELECT * FROM assets where SystemID= :sysID and AssetID=:assetID
                           Limit 1';

    $statement2 = $db->prepare($query);
    $statement2->bindParam(':sysID', $id1);
    $statement2->bindParam(':assetID',$assetID);
    $statement2->execute();
    for($i=0; $row = $statement2->fetch(); $i++){
		$name=$row['AssetName'];
		$ven=$row['Vendor'];
		$mod=$row['Model'];
		$st=$row['AssetStatus'];
		$dtp=$row['DatePurchased'];
		$ct=$row['Cost'];
		$loca=$row['AssetLocation'];
		$quant=$row['Quantity'];
		$war=$row['WarrantyStatus'];
		$mt=$row['NextMaintDate'];
		$cm=$row['Comments'];
		
		
     }  
    $statement2->closeCursor();

    


}
if(isset($_POST['assetUpdate']))
  { 
        
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
      $asset_id=$_POST['val2'];


      $result = $db->prepare("Update assets SET AssetName=:name, Vendor=:ven,Model=:model,AssetStatus=:status,DatePurchased=:dtp,Cost=:ct,AssetLocation =:loca,Quantity=:quant,WarrantyStatus=:war,NextMaintDate=:mt,Comments=:cm WHERE SystemID=:sysid and AssetID=:asset_id");
	        $result->bindParam(':asset_id',$asset_id);
	        $result->bindParam(':sysid',$sysid);
	        $result->bindParam(':name',$name);
	        $result->bindParam(':ven',$ven);
	        $result->bindParam(':model',$mod);
	        $result->bindParam(':status',$st);
	        $result->bindParam(':dtp',$dtp);
	        $result->bindParam(':ct',$ct);
	        $result->bindParam(':loca',$loca);
	        $result->bindParam(':quant',$quant);
	        $result->bindParam(':war',$war);
            $result->bindParam(':mt',$mt);
	        $result->bindParam(':cm',$cm);
	        
            $result->execute();
            header("Location: assets2.php?system_id=".$sysid);


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

    <head></head>

    <body>
    	<?php
    include("header.php");
    ?>
    	<div class="container">

      <!-- Page Heading/Breadcrumbs -->
      <h1 class="mt-4 mb-3">Asset Mgmt Systems
        <small style="color: red;">Update Your Asset Information</small>
      </h1>


      <div class="row assetform">
         
        
         <div class="col-lg-10 mb-9">
           <h3 style="color: red;">Please Update Asset details.</h3>
           <form id="assetInsert" name="asset" method="POST" action="Editasset.php" class="form-horizontal" role="form">

              <input type="hidden" name="val" value="<?php echo $id1 ?>" >
              <input type="hidden" name="val2" value="<?php echo $assetID ?>" >

           	  <div class="row">
               <div class="col-lg-5">
               	
                  <label for="Asset">Asset Name:</label>
                  <input type="text" required="required" class="form-control" id="assetname" placeholder="Enter Asset Name" value="<?php echo $name ?>" name="assetname">
               </div>

               <div class="col-lg-5">
               	<label for="vendor">Vendor</label>
      			<input type="text" required="required" class="form-control" id="vendor" placeholder="Enter Vendor of this Asset" name="vendor" value="<?php echo $ven ?>">
               	
               </div>

           	  </div>
              <br>
           	   <div class="row">
               <div class="col-lg-5">
               	
                  <label for="model">Asset Model:</label>
                  <input type="text" required="required" class="form-control" id="assetmodel" placeholder="Enter Asset Model" value="<?php echo $mod ?>" name="model">
               </div>

               <div class="col-lg-5">
               	<label for="Status">Status</label>
      			<input type="text" required="required" class="form-control" id="status" placeholder="Enter Staus of this Asset" value="<?php echo $st ?>" name="status">
               	
               </div>
               
           	  </div>	
   
               <br>
           	   <div class="row">
               <div class="col-lg-4">
               	
                  <label for="loc">Deployed Location:</label>
                  <input type="text" required="required" class="form-control" id="assetloc" placeholder="Boston, USA" name="loc" value="<?php echo $loca ?>">
               </div>

               <div class="col-lg-4">
               	<label for="cost">Asset Cost</label>
      			<input type="text" required="required" class="form-control" id="Cost" placeholder="$1000,000" name="cost" value="<?php echo $ct ?>">
               	
               </div>
               <div class="col-lg-4">
               	<label for="quan">Quantity</label>
      			<input type="text" required="required" class="form-control" id="quantity" placeholder="Enter Asset Quantity" name="quantity" value="<?php echo $quant ?>">
               	
               </div>
               
           	  </div>	
  
               <br>
           	   <div class="row">
               <div class="col-lg-5">
               	
                  <label for="dt">Asset Acquired Date:</label>
                  <input type="Date" required="required" class="form-control" id="assetdate" placeholder="Select date from Calendar" value="<?php echo $dtp ?>" name="assetdate">
               </div>

               <div class="col-lg-7">
               	<label for="warranty">Asset Warranty</label>
      			<select id="warranty" value="<?php echo $war ?>" name="warranty" class="form-control">
                                    <option>In Warranty</option>
                                    <option>Out of Warranty</option>
                                    <option>Our Maintenance</option>
                  </select>
               	
               </div>
               
           	  </div>	                   
                                  
                  <br>             
               <div class="row">
               <div class="col-lg-5">
               	
                  <label for="model">Next Maintenance Date:</label>
                  <input type="Date" required="required" class="form-control" id="nextdate" placeholder="Select date from Calendar" name="maint" value="<?php echo $mt ?>">
               </div>
               <div class="col-lg-7">
                 <label for="detail">Add Asset Details:</label>
                 <textarea  class="form-control" maxlength="45" rows="3" cols="7" id="comment" name="comment"><?php echo $cm ?></textarea>
               </div>  

           	  </div>	                      
                <br>
               
 
                    
                    <button type="submit" id="assetSubmit" name="assetUpdate" class="btn btn-success btn-lg btn-block">Update Asset Information</button>

                </form> 
                <br>
                <br>       
          
        </div>
         

      </div>


  </div>


    </body>

