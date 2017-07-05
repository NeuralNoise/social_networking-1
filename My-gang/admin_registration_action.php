<?php
include ("admin_check_session.php");
include ("connection.php");
$user_name  = $_REQUEST['user_name'];
$password = $_REQUEST['password'];
if ($_REQUEST['password'] != $_REQUEST['rpassword']) {
die('Your passwords did not match. ');
}
$about_me="Why dont you write about your self";
$hobbies = "Write about your hobbies";
$query= mysql_query("INSERT INTO tbl_account_info (user_name,password,first_name,last_name,email_id,gender,birth_day,birth_month,birth_year,country,city,about_me,hobbies)
VALUES ('$_REQUEST[user_name]','$_REQUEST[password]','$_REQUEST[first_name]',
'$_REQUEST[last_name]','$_REQUEST[email_id]','$_REQUEST[gender]',
'$_REQUEST[bday]','$_REQUEST[bmonth]',
'$_REQUEST[byear]','$_REQUEST[country]',
'$_REQUEST[city]','$about_me','$hobbies')") or die(mysql_error());



	
echo "<script language='javascript' type='text/javascript'> window.location='admin_delete_user.php?user_list_page=1' </script>";


?>