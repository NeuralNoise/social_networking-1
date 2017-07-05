<?php
$sender_id=$_GET['sender_id'];
$receiver_id = $_GET['receiver_id'];
$msg = $_REQUEST['scrapText'];
$date = date('d-M-y');
$dateTime = new DateTime($date);
$formatted_date=date_format( $dateTime, 'Y-m-d' );

include ("connection.php");
$query="INSERT INTO tbl_scrapbook_info (receiver_id,sender_id,receive_date_time,msg) values('$receiver_id','$sender_id','$formatted_date','$msg')";
$result_set= mysql_query($query) or die(mysql_error());
$page=$_REQUEST['scrap_page'];
if($sender_id==$receiver_id)
{
	echo "<script language='javascript' type='text/javascript'> window.location='scrapbook.php?user_id=$sender_id&scrap_page=$page'</script>";

}
else
{
	echo "<script language='javascript' type='text/javascript'> window.location='friend_scrapbook.php?user_id=$sender_id&friend_id=$receiver_id&scrap_page=$page'</script>";
}
?>
