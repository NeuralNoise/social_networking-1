<?php
include("connection.php");
$user_id=$_GET['user_id'];
$friend_id=$_GET['friend_id'];

$query_update = "insert into tbl_friend_info Values('".$friend_id."','".$user_id."','0');";
mysql_query($query_update);
echo "<script language='javascript' type='text/javascript'> window.location='user_friend_home.php?user_id=$user_id&friend_id=$friend_id' </script>";

?>