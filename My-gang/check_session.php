<?php 
session_start();
if(isset($_SESSION['user_log']))
{
$ses=$_SESSION['user_log'];
}
else
echo "<script language='javascript' type='text/javascript'> window.location='index.php' </script>";

  if($ses==0)
  {
  echo "<script language='javascript' type='text/javascript'> window.location='index.php' </script>";
  session_destroy();
  }

 ?>