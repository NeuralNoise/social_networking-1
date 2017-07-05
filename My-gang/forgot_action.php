<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><head>
<meta http-equiv="Content-Type" content="text/html;charset=iso-8859-1" />
<meta http-equiv="Content-Style-Type" content="text/css" /><title>Forgot Password</title>

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
<h1><span>United Brothers</span></h1>
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
<a href="index.php">Home</a><br />
<br /><hr color="#605f5e"/>
<a href="#"><br>
About us </a><br />
</div>
</div>
</div>
</div>

<div id="main_content">
<div class="content_header">
<h2><span>Forgot Password </span></h2>
</div>
<div class="content_box_right">
<div class="content_box_left">
<div class="content_box">
<div id="main_content_border">


<div id="signupbox_left">
<div id="signupbox_right">
<div id="signupbox">

<?php
include ("connection.php");
$emailid = $_POST['emailid'];
$sec_que_id="";
$query_id="SELECT * FROM tbl_account_info where email_id='".$emailid."';";
$result_set= mysql_query($query_id);
while($row = mysql_fetch_array($result_set))
  {
  $sec_que_id = $row['sec_que'] ;
  }
  if($sec_que_id == "" || $sec_que_id == " ")
  {
  	echo "<script language='javascript' type='text/javascript'> window.location='forgot.htm'</script>";
  }
  $sec_question ="";
  switch($sec_que_id)
  {
  	case 1: $sec_question = "What town were you born in?";break;
	case 2: $sec_question = "What town was your father born in?";break;
	case 3: $sec_question = "What is the name of the hospital in which you were born?";break;
	case 4: $sec_question = "What is the first name of your best childhood friend?";break;
	case 5: $sec_question = "What was the name of your primary school?";break;
	case 6: $sec_question = "What town was your mother born in?";break;
	case 7: $sec_question = "What is the name of the first company / organization you worked for?";break;
	}
  ?>




<form action="forgot_action2.php">

<div class="signupbox_formfield"> 
  <p><br>
  &nbsp;&nbsp;&nbsp; Answer the following question: </p>
  <p><br>
 <table width="100%" border="0">
  <tr>
    <td width="25%"><font face="Tahoma, Arial, sans-serif" color="#fafafa" size="2">Question:</font></td>
    <td> <b><font face="Tahoma, Arial, sans-serif" color="#fafafa" size="2"> 
	<?php
	echo $sec_question;
	?>
	 </font></b></td></tr><tr></tr><tr></tr><tr>
	<td><font face="Tahoma, Arial, sans-serif" color="#fafafa" size="2">Answer: </font></td>
	<td><input type="text" name="sec_ans" id="sec_ans" maxlength="25" tabindex="13"/></td></tr>
	
	</table>
            <br>
          <br>
          <br>
  &nbsp;&nbsp;&nbsp;&nbsp;
    <input type="submit" name="submit" value="Submit">
    <br>
    <br />
    
    
    
    
    
    
    
      </p>
  <div class="clearthis">&nbsp;</div>
</div>

</form>

</div>

</div>
</div>




<div class="divider">&nbsp;</div>

<div id="loginbox_left">
<div id="loginbox_right">
<div id="loginbox">
<h2>Sign In </h2>
<form action="login_action.php">
<div class="loginbox_formfield"> <strong>Username:</strong>
<input type="text" />
<div class="clearthis">&nbsp;</div>
</div>
<div class="loginbox_formfield"> <strong>Password:</strong>
<input type="password" />
<div class="clearthis">&nbsp;</div>
</div>
<div class="loginbox_formfield"> <input value="Submit" class="button" type="submit" />
</div>
</form>
<div id="loginbox_register"> <a href="register.html"></a></div>
</div>
</div>
</div>

<div id="tips">
<div id="tips_box">
<h2>&nbsp;</h2>
<ul>
<li></li>
<li>&nbsp;</li>
<li>&nbsp;</li>
<li>&nbsp;</li>
</ul>
</div>
</div>

<div class="clearthis">&nbsp;</div>
</div>
</div>
</div>
</div>
</div>

<div class="clearthis">&nbsp;</div>

<div id="page_footer"> Give your feedback on <a href="mailto:mygang.sesp@gmail.com">mygang.sesp@gmail.com </div>
</div>
</body></html>