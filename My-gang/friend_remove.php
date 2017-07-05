<?php
include("connection.php");
$user_id=$_GET['user_id'];
$friend_id=$_GET['friend_id'];

$query_update = "delete from tbl_friend_info where user_id='".$user_id."' and friend_id='".$friend_id."';";
mysql_query($query_update);
$query_update = "delete from tbl_friend_info where user_id='".$friend_id."' and friend_id='".$user_id."';";
mysql_query($query_update);
echo "<script language='javascript' type='text/javascript'> window.location='user_friend_home.php?user_id=$user_id&friend_id=$friend_id' </script>";

?>