<?php
$user_id=$_REQUEST['user_id'];
include ("connection.php");
$img_id=$_REQUEST['img_id'];

$img_desc=$_REQUEST['img_desc'];
$query_update="update tbl_img_info set img_desc='$img_desc' where user_id='$user_id' and img_id='$img_id'";

$result=mysql_query($query_update);
echo "<script language='javascript' type='text/javascript'> window.location='gallery_edit.php?user_id=$user_id&img_id=$img_id'</script>";

?>