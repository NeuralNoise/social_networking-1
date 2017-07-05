<?php
include ("connection.php");
$check_user=$_REQUEST['user_name'];

$query_result="SELECT * FROM tbl_account_info where user_name='".$check_user."' and user_status=1;";
$result_set=mysql_query($query_result);

if(mysql_fetch_array($result_set))
  echo "<script language='javascript' type='text/javascript'> window.location='admin_add_user.php?msg=fail&user_name=".$check_user." ' </script>";
else
  echo "<script language='javascript' type='text/javascript'> window.location='admin_add_user.php?msg=suc&user_name=".$check_user." '</script>";
?>