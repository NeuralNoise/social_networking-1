<?php
include("connection.php");
$user_id=$_GET['user_id'];
$friend_id=$_GET['friend_id'];

$query_delete_scrap="delete from tbl_friend_info where user_id='".$user_id."' and friend_id='".$friend_id."';";
mysql_query($query_delete_scrap);
echo "<script language='javascript' type='text/javascript'> window.location='request.php?user_id=$user_id' </script>";s
?>