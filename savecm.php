<?php
session_start();

if(!isset($_SESSION['user_name'])){
  header("location: index.php");
}

if(isset($_POST['commentBtn']))
  { require_once('database.php'); 
  	$Aid=$_POST['id'];
     $Aname=$_POST['ast_name'];
     $date1 = date('Y-m-d H:i:s');
     $cmt=$_POST['comment'];
     $user=$_SESSION['user_name'];
     
   
      $query = 'INSERT INTO assetcomments
                 (AssetID, Comments,SystemDate,CommentBy)
              VALUES
                 ( :ast,:Comment,:sysdt,:cmtby)';
                    $statement = $db->prepare($query);
                    
                     
                    $statement->bindValue(':ast',$Aid);
                    $statement->bindValue(':Comment',$cmt);
                    $statement->bindValue(':sysdt',$date1);
                    $statement->bindValue(':cmtby',$user);
                   
                    if($statement->execute())
                    {
                        $statement->closeCursor();
                        header('location: comment.php?asset_id='. $Aid.'&asset_name='.$Aname);
                    } 

                    else{
                      header('location: error.php');
                    }
      
    
 }


 ?>