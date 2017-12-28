<?php
session_start();
//echo'data session-'.$_SESSION['Id'];
unset($_SESSION['Id']);
unset($_SESSION['user_name']);
unset($_SESSION['email']);
unset($_SESSION['email']);
unset($_SESSION['role']);
unset($_SESSION['systmeID']);
unset($_SESSION['User_permission']);
session_destroy();

header("location: index.php");

?>
