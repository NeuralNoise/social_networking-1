
<?php 
$to = $_REQUEST['to'];
$msg = $_REQUEST['message'];
mail($to,"My-gang",$msg," ");

$page = $_REQUEST['contact_page'];
echo "<script language='javascript' type='text/javascript'> window.location='contact.php?contact_list_page=1'</script>";
?>