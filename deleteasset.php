<?php
session_start();

if(!isset($_SESSION['user_name'])){
  header("location: index.php");
}
require_once('database.php');

if(isset($_GET['asset_id']) && isset($_GET['system_id']))
{ 
    $id1=$_GET['system_id'];
	$assetID=$_GET['asset_id'];
	$query = 'DELETE FROM assets
              WHERE AssetID = :id and SystemID=:sysid';
    $statement = $db->prepare($query);
    $statement->bindValue(':id', $assetID);
    $statement->bindValue(':sysid',$id1);
    $success = $statement->execute();
    $statement->closeCursor();    
    if(success){
    	header("Location: assets2.php?system_id=".$id1);
    } 
    else{
    	header("Location:error.php");
    }
    
   
}