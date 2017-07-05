<?php
$user_id=$_GET['user_id'];
$_SESSION['user_id']=$user_id;

include ("connection.php");

$first_name=$_REQUEST['first_name'];
$last_name=$_REQUEST['last_name'];
$gender=$_REQUEST['gender'];
$bday=$_REQUEST['bday'];
$bmonth=$_REQUEST['bmonth'];
$byear=$_REQUEST['byear'];
$country=$_REQUEST['country'];
$city=$_REQUEST['city'];
$about_me=$_REQUEST['aboutMe'];
$relationship_status=$_REQUEST['relationship_status'];
$high_school=$_REQUEST['high_school'];
$college=$_REQUEST['college'];
$company=$_REQUEST['company'];
$contact_no=$_REQUEST['contact_no'];
$alt_contact_no=$_REQUEST['alt_contact_no'];
$alt_email_id=$_REQUEST['alt_email'];
$hobbies=$_REQUEST['hobbies'];

$query_update="update tbl_account_info set first_name='$first_name',last_name='$last_name',gender='$gender',birth_day='$bday',birth_month='$bmonth',birth_year='$byear',country='$country',city='$city',relationship_status='$relationship_status',high_school='$high_school',college='$college',company='$company',about_me='$about_me',hobbies='$hobbies',contact_no='$contact_no',alt_contact_no='$alt_contact_no',alt_email_id='$alt_email_id' where user_id='$user_id'";

$result=mysql_query($query_update);


echo "<script language='javascript' type='text/javascript'> window.location='user_home.php' </script>";

?>