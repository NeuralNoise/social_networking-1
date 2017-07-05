<?php


if(strpos($_SERVER["HTTP_USER_AGENT"],"Firefox")){
session_start();
if(isset($_SESSION['log']))
{
$_SESSION['log']=0;
$_SESSION['admin_log']=0;
}
else
session_destroy();
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
<h1><span>United Brothers</span></h1>
</div>
</div>

<div id="page_menu">

</div>

<div id="left_sidebar">
<div class="content_header">
<h2>About us</h2>
</div>
<div class="content_box_right">
<div class="content_box_left">
<div class="content_box">
<ul>
<li>This is the place where you can be in touch with your friends wherever you go... <br />
</li> <li></li><br />
<br />
<li>Creaters:</li><br />
<li>Gajendragdkar Swanand: 9421067810</li><br />
<li>Gaikwad Rohit: 9860555929</li><br />
<li>Gaikwad Suraj: 9823488493</li><br />
<li>Gandhi Viral: 9420803828</li><br />

</ul>


</div>
</div>
</div>
</div>
<div id="left_sidebar">
  <div class="content_box_right"></div>
</div>

<div id="main_content">
<div class="content_header">
<h2>
</h2>
</div>
<div class="content_box_right">
<div class="content_box_left">
<div class="content_box">
<div id="main_content_border">

<br />
<br />
<br />

<br /><center>

<?php if(isset($_GET["msg"]) && $_GET["msg"]=="reg")
		  {	 
			echo "<h2>Congratulation!! Now you are joined to my-gang</h2></blink><br>";
			echo "<h2>Please login to continue..</h2>";
		   }	 	
			  else
			 { $img_path="images/header_image.png";
			  	echo "<img src='images/header_image.png'/></center><br />";	
			}		
?>

<br />
<br />
<br />

<div id="signupbox_left">
<div id="signupbox_right">
</div>
</div>




<div class="divider">&nbsp;</div>


<?php if(isset($_GET["msg"]) && $_GET["msg"]=="fail")
		  {	 
			echo "<blink><h2>Please enter valid username & password</h2></blink>";
		   }	 	
			  else
			 { 
			  	echo " ";	
			}		
?>
<div id="loginbox_left">

<div id="loginbox_right">

<div id="loginbox" >

<h2>Sign In </h2>

<form action="login_action.php" method="post">
<div class="loginbox_formfield">
 <strong>Username:</strong>
<input type="text" name="user_name" id="user_name" />
<div class="clearthis">&nbsp;</div>
</div>
<div class="loginbox_formfield"> <strong>Password:</strong>
<input type="password" name="password" id="password" />
<div class="clearthis">&nbsp;</div>
</div>
<div class="loginbox_formfield"> <input value="Login" class="button" type="submit" />
</div>
</form>
<div id="loginbox_register"> <a href="register.html"></a></div>
</div>
</div>
</div>

<div id="tips">
<div id="tips_box">
<h2>Join to our Gang &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <a href="registration.php?user_name=">Click here</a></h2>

<h2>Forgot Password? &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <a href="forgot.htm">Click here</a></h2><h2>&nbsp;</h2>
<h2><a href="http://TheMygangToolbar.OurToolbar.com/exe">Download our free toolbar</a><br></h2>
<br />
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

<div id="page_footer"> Give your feedback on <a href="mailto:my.gang@rediffmail.com">my.gang@rediffmail.com </div>
</div><?php } 
else
{
echo "Please Use The Latest version of Firefox<br>";
echo "<a href='http://www.mozilla.org' target='_blank'>Download Here</a>";} ?>
</body></html>