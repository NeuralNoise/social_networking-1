<?php
session_start();
include("check_session.php");
include("connection.php");
$cpassword=$_REQUEST['cpassword'];
$npassword=$_REQUEST['npassword'];
$rpassword=$_REQUEST['rpassword'];

$user_id= $_SESSION['user_id'];

$query_id="SELECT * FROM tbl_account_info where user_id='".$user_id."';";
$result_set= mysql_query($query_id);
$row = mysql_fetch_array($result_set);
$user_name=$row['user_name'];
$password=$row['password'];
echo $user_id;
echo "  ". $password;
echo "  ".$user_name;
if($cpassword==$password and $npassword==$rpassword)
{
$query_update="update tbl_account_info set password='".$npassword."'where user_id='".$user_id."';";
$result=mysql_query($query_update);
echo $query_update;
echo "<script language='javascript' type='text/javascript'> window.location='setting.php?msg=pass'</script>";
}
else
{
echo "<script language='javascript' type='text/javascript'> window.location='setting.php'</script>";
}

?>