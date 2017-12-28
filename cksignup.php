<?php
include('encryptPassword.php');
 session_start();
 if(isset($_SESSION['user_name'])){
   header("location: index.php");
} 

require_once('database.php');
if (isset($_POST['submit']))
{
 
         $name=$_POST['f1-first-name'];
         $last=$_POST['f1-last-name'];
         $job=$_POST['f1-job-role'];
         $cmp=$_POST['f1-cmp-name'];
         $cmpaddress=$_POST['f1-cmp-address'];
         $country=$_POST['f1-country'];
         $email=$_POST['f1-email'];
         $pass=$_POST['f1-password'];
         $pass2=$_POST['f1-repeat-password'];
      

      $result = $db->prepare("SELECT * FROM clientaccount WHERE Email= :email");
      $result->bindParam(':email', $email);
      $result->execute();
      $alpha=$result->fetch();

      $result->closeCursor();
      if (!empty($alpha)) { //include("header.php"); 
          header("location: error.php");
      ?>
           
      <?php
       } 
      else {
       
         try{
              $hash=secure($pass);
              
              $query = 'INSERT INTO clientaccount
                 (FirstName, LastName,JobRole,CmpName,CmpAddress,CmpCountry,Email,Password1)
              VALUES
                 ( :name,:last,:job,:cmp,:address,:country,:email,:password)';
                    $statement = $db->prepare($query);
                    
                    
                    $statement->bindValue(':name',$name);
                    $statement->bindValue(':last',$last);
                    $statement->bindValue(':job',$job);
                    $statement->bindValue(':cmp',$cmp);
                    $statement->bindValue(':address',$cmpaddress);
                    $statement->bindValue(':country',$country);
                    $statement->bindValue(':email', $email);
                    $statement->bindValue(':password',$hash);
                    
                    if($statement->execute())
                    {
                      $statement->closeCursor();
                      $_SESSION['Signed']="True";
                      header("location: login.php");
                    }
                    else
                    {
                      $statement->closeCursor();
                      header("location: error.php");
                    }
                    
             //include("header.php");         
             //include("loginbox.php");
             echo "<h3><Thankyou For Registering</h3>";
           }

       catch(PDOException $e)
       {
          echo $e->getMessage();
       }

     }

      
 }

 else{
  header("location: error.php");
 }


?>