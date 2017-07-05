<?php 
include ("admin_check_session.php");
?>
<?php
session_start();
include("connection.php");
$cpassword=$_REQUEST['cpassword'];
$npassword=$_REQUEST['npassword'];
$rpassword=$_REQUEST['rpassword'];

$user_id= $_SESSION['user_id'];

$query_id="SELECT * FROM tbl_account_info where admin_status=1";
$result_set= mysql_query($query_id);
$row = mysql_fetch_array($result_set);
$user_name=$row['user_name'];
$password=$row['password'];

echo "  ". $password;
echo "  ".$user_name;
if($cpassword==$password and $npassword==$rpassword)
{
$query_update="update tbl_account_info set password='".$npassword."'where admin_status=1";
$result=mysql_query($query_update);

echo "<script language='javascript' type='text/javascript'> window.location='admin_setting.php?msg=pass'</script>";
}
else
{
echo "<script language='javascript' type='text/javascript'> window.location='setting.php'</script>";
}

?>