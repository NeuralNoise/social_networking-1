<?php
include ("connection.php");
$check_user=$_GET['user_name'];
 
$query_result="SELECT * FROM tbl_account_info where user_name='".$check_user."';";


$result_set=mysql_query($query_result);
$row=mysql_fetch_array($result_set);
$user_id=$row['user_id'];

$query_result_search="SELECT * FROM tbl_friend_info where friend_id='".$user_id."';";
$result_set_search=mysql_query($query_result_search);
if(mysql_fetch_array($result_set_search))
  echo "user is present";
else
echo "user is not present";
?>