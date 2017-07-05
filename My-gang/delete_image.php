<?php
include ("connection.php");

$user_id = $_GET["user_id"];
$img_id = $_GET["img_id"];


$auery_img_name="select img_name from tbl_img_info where user_id='".$user_id."' and img_id='".$img_id."';";

$result_img_name=mysql_query($auery_img_name);
while($row = mysql_fetch_array($result_img_name))
{
$img_name=$row['img_name'];
}

$query_delete_img="delete from tbl_img_info where user_id='".$user_id."' and img_id='".$img_id."';";

$result=mysql_query($query_delete_img);

@unlink("gallery/".$user_id ."/".$img_name);
  
echo "<script language='javascript' type='text/javascript'> window.location='gallery_edit.php?user_id=$user_id'</script>";

?>