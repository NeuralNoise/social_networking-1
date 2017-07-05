<?php
include("connection.php");
$user_id=$_GET['user_id'];
$friend_id=$_GET['friend_id'];

$query_insert="insert into tbl_friend_info Values('".$friend_id."','".$user_id."','1');";
mysql_query($query_insert);

echo "<script language='javascript' type='text/javascript'> window.location='request.php?user_id=$user_id' </script>";

?>