<?php
session_start();
  $_SESSION['user_log'] = 0;
include ("connection.php");
$user_name = $_POST['user_name'];
$password = $_POST['password'];

if($user_name==""or $user_name==" ")
echo "<script language='javascript' type='text/javascript'> window.location='index.php?msg=fail' </script>";

$query ="select * from tbl_account_info where user_name='".$user_name."' and password='".$password."' and user_status=1";

$result_set = mysql_query($query);
$row_count = mysql_num_rows($result_set);

if($row_count==0)
{
 echo "<script language='javascript' type='text/javascript'> window.location='index.php?msg=fail' </script>";
}
elseif($row_count>0)
 {			
		$_SESSION['user_name'] = $user_name;
		$_SESSION['user_log'] = 1;
	
	echo "<script language='javascript' type='text/javascript'> window.location='user_name2user_id.php'</script>";
	}

?>
