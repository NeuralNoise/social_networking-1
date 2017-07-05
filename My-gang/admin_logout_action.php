<?php

session_start();

$_SESSION['admin_log'] = 0;
$_SESSION['user_log'] = 0;
if(isset($_SESSION['admin_log']))
{
$_SESSION['admin_log'] = 0;
$_SESSION['user_log'] = 0;
}
else
{
session_destroy();
}
 echo "<script language='javascript' type='text/javascript'> window.location='index.php' </script>";
session_destroy();
?>