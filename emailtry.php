<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
session_start();
if(!isset($_SESSION['user_name'])){
  header("location: index.php");
}

    $Cid=$_SESSION['Id'];
    
    require_once('database.php');
    $query = 'SELECT * FROM assetsystems WHERE ClientID= :id';
    $statement2 = $db->prepare($query);
    $statement2->bindParam(':id', $Cid);
    $statement2->execute();
    $systems = $statement2->fetchAll();
    $statement2->closeCursor();


if(isset($_POST['submit']))
{



  $email=$_POST['email'];
  $ams=$_POST['select'];
  $link="http://localhost/cs633/services.php";

  $mail = new PHPMailer(true);                              // Passing `true` enables exceptions
try {
    //Server settings
    $mail->SMTPDebug = 2;                                 // Enable verbose debug output
    $mail->isSMTP();                                      // Set mailer to use SMTP
    $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
    $mail->SMTPAuth = true;                               // Enable SMTP authentication
    $mail->Username = 'kamransaeed9031@gmail.com';                 // SMTP username
    $mail->Password = '03005240464k';                           // SMTP password
    $mail->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl` also accepted
    $mail->Port = 465;                                    // TCP port to connect to

    //Recipients
    $mail->setFrom('kamransaeed9031@gmail.com', 'Kam');
    $mail->addAddress($email, $ams.'Client');     // Add a recipient
                 // Name is optional
    $mail->addReplyTo('info@example.com', 'Information');
    $mail->addCC('cc@example.com');
    $mail->addBCC('bcc@example.com');

    //Attachments
    //$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
    //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

    //Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = 'AVS';
    $mail->Body    = 'WELCOME TO'.$ams;
    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients. Click Here to create Password'.$link;

    $mail->send();
    echo 'Message has been sent';
} 
catch (Exception $e) {
    echo 'Message could not be sent.';
    echo 'Mailer Error: ' . $mail->ErrorInfo;
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

  </head>

  <body>

    <!-- Navigation -->
    <?php
    include("header.php");
    ?>

     <div class="container">    
        <div id="loginbox" style="margin-top:50px;" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">                    
            <div class="panel panel-info" >
            <div class="panel-heading">
                        <div class="panel-title"><h3>Create System Admin</h3></div>
                        
             </div> 	
             <div style="padding-top:30px" class="panel-body" >

                        <div style="display:none" id="login-alert" class="alert alert-danger col-sm-12"></div>
                            
                        <form id="adminform" name="admin" method="POST" action="admin.php" class="form-horizontal" role="form">
                            
                            <div style="margin-bottom: 25px" class="input-group">
                                        <span class="input-group-addon"><i class="glyphicon glyphicon-user">Enter Admin Name</i></span>
                                        <input id="login-username" type="text" class="form-control" name="name" required="required" placeholder="James brown">                                        
                                    </div>

                            <div style="margin-bottom: 25px" class="input-group">
                                        <span class="input-group-addon"><i class="glyphicon glyphicon-user">Enter Admin Email</i></span>
                                        <input id="login-email" type="text" class="form-control" name="email" required="required" placeholder="alpha@gmail.com">                                        
                                    </div>

                            <div style="margin-bottom: 25px" class="input-group">
                                        <span class="input-group-addon"><i class="glyphicon glyphicon-user">Enter Admin Password</i></span>
                                        <input id="login-pass" type="password" min="5" max="10" class="form-control" name="pass" required="required" placeholder="Enter Password">                                        
                                    </div>
                                
                            <div style="margin-bottom: 25px" class="input-group">
                                        <span class="input-group-addon"><i class="glyphicon glyphicon-lock">Select AMS System </i></span>
                               <select id="warranty" class="form-control" name="select">
                               	 <?php foreach ($systems as $sys) : ?>
                                    <option value="<?php echo $sys['SystemID'] ?>"><?php echo $sys['SystemName'] ?></option>
                                    <?php endforeach; ?>
                              </select>
                                    </div>
                                    

                                
                            

                                <div style="margin-top:10px" class="form-group">
                                    <!-- Button -->

                                    <div class="col-sm-12 controls">
                                      
                                      <button id="btn-login" type="submit" name="submit" class="btn btn-success">Create Admin</button>
                                     

                                    </div>
                                </div>


                                <div class="form-group">
                                    <div class="col-md-12 control">
                                        <div style="border-top: 1px solid#888; padding-top:15px; font-size:85%" >
                                            An email would be sent to Admin of this system to generate Password.
                                        
                                        </div>
                                    </div>
                                </div>    
                            </form>     



                        </div>                     
                    </div>  

                </div>

            </div>

        </body>
        </html>