<?php 
session_start();
if(isset($_SESSION['admin_log']))
$ses=$_SESSION['admin_log'];
else
echo "<script language='javascript' type='text/javascript'> window.location='index.php' </script>";

  if($ses==0)
  {
  echo "<script language='javascript' type='text/javascript'> window.location='index.php' </script>";
  session_destroy();
  }

 ?>