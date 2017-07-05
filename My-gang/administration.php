<?php 
include ("admin_check_session.php");
$_SESSION['admin_log']=1;

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><head>
<meta http-equiv="Content-Type" content="text/html;charset=iso-8859-1" />
<meta http-equiv="Content-Style-Type" content="text/css" /><title>My-gang : Home page</title>

<link rel="stylesheet" href="style1.css" type="text/css" media="screen" />
<link rel="shortcut icon" href="images/favicon.ico" />
<script>
function passwordStrength(password)
{
	var desc = new Array();
	desc[0] = "&nbsp;&nbsp;&nbsp;&nbsp;Very Weak";
	desc[1] = "&nbsp;&nbsp;&nbsp;&nbsp;Weak";
	desc[2] = "&nbsp;&nbsp;&nbsp;&nbsp;Better";
	desc[3] = "&nbsp;&nbsp;&nbsp;&nbsp;Medium";
	desc[4] = "&nbsp;&nbsp;&nbsp;&nbsp;Strong";
	desc[5] = "&nbsp;&nbsp;&nbsp;&nbsp;Strongest";

	var score   = 0;

	//if password bigger than 6 give 1 point
	if (password.length > 6) score++;

	//if password has both lower and uppercase characters give 1 point	
	if ( ( password.match(/[a-z]/) ) && ( password.match(/[A-Z]/) ) ) score++;

	//if password has at least one number give 1 point
	if (password.match(/\d+/)) score++;

	//if password has at least one special caracther give 1 point
	if ( password.match(/.[!,@,#,$,%,^,&,*,?,_,~,-,(,)]/) )	score++;

	//if password bigger than 12 give another 1 point
	if (password.length > 12) score++;

	 document.getElementById("passwordDescription").innerHTML = desc[score];
	 document.getElementById("passwordStrength").className = "strength" + score;
}


</script>
</head>



<body>
<div id="container">
<div id="page_header">
<div id="company_name">
<h1><span>My-gang</span></h1>
</div>
</div>

<div id="page_menu">
<ul>
<li class="home"><span>Home</span></li>
<li class="aboutus"><span>About
Us</span></li>
<li class="gallery"><span>Gallery</span></li>
<li class="portfolio"><span>Portfolio</span></li>
<li class="procedure"><span>Procedure</span></li>
<li class="contact"><span>Contact</span></li>
</ul>
</div>

<div id="left_sidebar">
<div class="content_header">
<h2></h2>
</div>
<div class="content_box_right">
<div class="content_box_left">
<div class="content_box">
<a href="admin_logout_action.php">Logout</a><br /><br /><hr color="#605f5e"/>
<br />
<a href="admin_add_user.php">Add User </a><br /><br />
<a href="admin_delete_user.php?user_list_page=1">Edit User </a><br />
<br /><hr color="#605f5e"/>
<br />
<a href="admin_setting.php">Setting</a><br /><br />


  </div>
</div>
</div>
</div>

<div id="main_content">
<div class="content_header">
<h2><span>Welcome to admin</span></h2>
</div>
<div class="content_box_right">
<div class="content_box_left">
<div class="content_box">
<div id="main_content_border">


<div id="signupbox_left">
<div id="signupbox_right">
  <div id="signupbox">
  <h2>
Total no of users:
  <?php 
include ("connection.php");
$query_id="SELECT * FROM tbl_account_info where admin_status=0 and user_status=1";
$result_set= mysql_query($query_id);
$counter=0;
while($row = mysql_fetch_array($result_set))
{
  	$counter+=1;
}
echo " ".$counter;
?>
  </h2>
  <h2><br />
    Total no of login(per day):
    <?php
$date = date('d-M-y');
$dateTime = new DateTime($date);
$formatted_date=date_format( $dateTime, 'Y-m-d' );
$query_id="SELECT * FROM tbl_account_info where admin_status=0 and last_login='".$formatted_date."';";
$result_set= mysql_query($query_id);
$counter=0;
while($row = mysql_fetch_array($result_set))
{
  	$counter+=1;
}
echo " ".$counter;
?>
  </h2>
  </div>
  </div>

</div>
</div>


  

<div id="tips"></div>

<div class="clearthis">&nbsp;</div>
</div>
</div>
</div>
</div>
</div>

<div class="clearthis">&nbsp;</div>

<div id="page_footer"> Give your feedback on <a href="mailto:my.gang@rediffmail.com">my.gang@rediffmail.com </div>
</div>
</body></html>