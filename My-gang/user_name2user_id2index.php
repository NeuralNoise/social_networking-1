<?php
session_start();
include ("connection.php");
$user_name=$_SESSION['user_name'];
$query_id="SELECT * FROM tbl_account_info where user_name='".$user_name."';";

$result_set= mysql_query($query_id);

while($row = mysql_fetch_array($result_set))
  {?>
  <?php $user_id= $row['user_id'] ;
  if($row['admin_status'] == 1)
  {
  	$is_admin=true;
}

$_SESSION['user_id']=$user_id;
 	?>
  	<?php }?>
 <?php
$date = date('d-M-y');
$dateTime = new DateTime($date);
$formatted_date=date_format( $dateTime, 'Y-m-d' );


$dir="gallery/$user_id";
if(!is_dir($dir))
{
	mkdir("gallery/$user_id");
  	
}
	
	echo "<script language='javascript' type='text/javascript'> window.location='index.php?msg=reg'</script>";

?>