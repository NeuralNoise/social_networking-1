<?php
include ("connection.php");
$receiver_id = $_GET['receiver_id'];
$message_id = $_GET['message_id'];


$query_delete_scrap="delete from tbl_scrapbook_info where receiver_id='".$receiver_id."' and message_id='".$message_id."';";
$result= mysql_query($query_delete_scrap);
$a = $_GET['scrap_page'];
echo "<script language='javascript' type='text/javascript'> window.location='scrapbook.php?scrap_page=$a'</script>";

?>