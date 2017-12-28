<?php
session_start();

if(!isset($_SESSION['user_name'])){
  header("location: index.php");
}
require_once('database.php');

if(isset($_GET['user_id']))
{ 
    $id1=$_GET['user_id'];
    $SystemID=$_SESSION['systmeID'];
	
	$query = 'DELETE FROM users
              WHERE UserID = :id and SystemID=:sysid';
    $statement = $db->prepare($query);
    $statement->bindValue(':id', $id1);
    $statement->bindValue(':sysid',$SystemID);
    $success = $statement->execute();
    $statement->closeCursor();    
    if(success){
    	header("Location: userpage.php");
    } 
    else{
    	header("Location:error.php");
    }
    
   
}