<?php
include ("connection.php");
$user_name = $_REQUEST['user_name'];
$password = $_REQUEST['password'];

if ($_REQUEST['password'] != $_REQUEST['rpassword'])
 {
die('Your passwords did not match. ');
}

$about_me="Why dont you write about your self";
$hobbies = "Write about your hobbies";
$query= mysql_query("INSERT INTO tbl_account_info (user_name,password,first_name,last_name,email_id,gender,birth_day,birth_month,birth_year,country,city,about_me,hobbies,sec_que,sec_ans)
VALUES ('$_REQUEST[user_name]','$_REQUEST[password]','$_REQUEST[first_name]',
'$_REQUEST[last_name]','$_REQUEST[email_id]','$_REQUEST[gender]',
'$_REQUEST[bday]','$_REQUEST[bmonth]',
'$_REQUEST[byear]','$_REQUEST[country]',
'$_REQUEST[city]','$about_me','$hobbies','$_REQUEST[sec_que]','$_REQUEST[sec_ans]')") 
or die(mysql_error());

mysql_close();

session_start();
$_SESSION['user_log'] = 1;
$_SESSION['admin_log'] = 0;


	
echo "<script language='javascript' type='text/javascript'> window.location='user_name2user_id2index.php?user_name=$user_name' </script>";



?>