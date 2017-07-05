<?php
session_start();
if(isset($_SESSION['admin_log'])){
$admin_status=$_SESSION['admin_log'];
if($admin_status==1)
 echo "<script language='javascript' type='text/javascript'> window.location='administration.php' </script>";}

$_SESSION['user_log'] = 0;
$_SESSION['admin_log'] = 0;

session_destroy();
echo "<script language='javascript' type='text/javascript'> window.location='index.php' </script>";

?>