<?php
include("connection.php");
$user_id=$_GET['user_id'];
$friend_id=$_GET['friend_id'];

$query_update = "update tbl_friend_info set friend_status='1' where user_id='".$user_id."' and friend_id = '".$friend_id."';";
mysql_query($query_update) or die("<script language='javascript' type='text/javascript'> window.location='request.php?user_id=$user_id' </script>");

echo "<script language='javascript' type='text/javascript'> window.location='request_accept2.php?user_id=$user_id&friend_id=$friend_id' </script>";

?>