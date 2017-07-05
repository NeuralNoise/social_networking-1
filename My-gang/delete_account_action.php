<?php 
include("connection.php");
include("check_session.php");
$user_id=$_GET['user_id'];

$query_delete="update tbl_account_info set user_status=0 where user_id='".$user_id."';";
mysql_query($query_delete);

$query_delete="delete from tbl_friend_info where user_id='".$user_id."' or friend_id='".$user_id."';";
mysql_query($query_delete);

$query_delete="delete from tbl_scrapbook_info where sender_id='".$user_id."' or receiver_id='".$user_id."';";
mysql_query($query_delete);

$query_delete="delete from tbl_friend_info where user_id='".$user_id."' or friend_id='".$user_id."';";
mysql_query($query_delete);

$query_delete="select * from tbl_img_info where user_id='".$user_id."';";
$result_set=mysql_query($query_delete);
while($row=mysql_fetch_array($result_set))
{
unlink("gallery/".$user_id."/".$row['img_name']);
}
rmdir("gallery/$user_id");
$query_delete="delete from tbl_img_info where user_id='".$user_id."';";
mysql_query($query_delete);


unlink("profile_img/" .$user_id.".jpg");
  
 $user_id_admin =$_SESSION['user_id'];
 $query = "select admin_status from tbl_account_info where user_id='$user_id_admin'";
 $result_set=mysql_query($query);
$row=mysql_fetch_array($result_set);
$admin_status=$row['admin_status'];
$admin_log=$_SESSION['admin_log'];
if($admin_log==1)
{
$a = $_GET['user_list_page'];
echo "<script language='javascript' type='text/javascript'> window.location='admin_delete_user.php?msg=deleted&user_list_page=$a' </script>";
}
else
{
  include("logout_action.php");
echo "<script language='javascript' type='text/javascript'> window.location='logout_action.php' </script>";
  }
?>
