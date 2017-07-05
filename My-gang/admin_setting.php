<?php 
include ("check_session.php");
include ("connection.php");
?>
<html><head>
<link rel="stylesheet" href="style.css" type="text/css" media="screen" />
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

function echeck(str) {

		var at="@"
		var dot="."
		var lat=str.indexOf(at)
		var lstr=str.length
		var ldot=str.indexOf(dot)
		
		if (str.indexOf(at)==-1 || str.indexOf(at)==0 || str.indexOf(at)==lstr){
		   alert("Invalid E-mail ID")
		   return false
		}

		if (str.indexOf(dot)==-1 || str.indexOf(dot)==0 || str.indexOf(dot)==lstr){
		    alert("Invalid E-mail ID")
		    return false
		}

		 if (str.indexOf(at,(lat+1))!=-1){
		    alert("Invalid E-mail ID")
		    return false
		 }

		 if (str.substring(lat-1,lat)==dot || str.substring(lat+1,lat+2)==dot){
		    alert("Invalid E-mail ID")
		    return false
		 }

		 if (str.indexOf(dot,(lat+2))==-1){
		    alert("Invalid E-mail ID")
		    return false
		 }
		
		 if (str.indexOf(" ")!=-1){
		    alert("Invalid E-mail ID")
		    return false
		 }

 		 return true					
	}

function ValidateUser(){
	var user_name=document.reg_form.user_name
	return user_name
}

function ValidateForm(){
	var emailID=document.reg_form.email_id
	
	if ((emailID.value==null)||(emailID.value=="")){
		alert("Please Enter your Email ID")
		emailID.focus()
		return false
	}
	if (echeck(emailID.value)==false){
		emailID.value=""
		emailID.focus()
		return false
	}
	return true
 }

</script>

<title>Administrator settings</title></head>
<body>
<?php


$user_id=$_SESSION['user_id'];
?>
 <?php

?>
<div id="container">
<div id="page_header">
<div id="company_name">
<h1><span>United Brothers</span></h1>
</div>
</div>

<div id="page_menu">
<ul>
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
<a href="administration.php">Home</a><br />
<br /><hr color="#605f5e"/>
<a href="admin_add_user.php">Add User </a><br />
<br />
<a href="admin_delete_user.php?user_list_page=1">Edit User </a><br />
<br /><hr color="#605f5e"/>
<a href="admin_setting.php">Setting</a><br />
<br />

</div>
</div>
</div>
 </div>
<br>

<div id="main_content">
<div class="content_header">
<h2>Setting</h2>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
</div>
<div class="content_box_right">
<div class="content_box_left">
<div class="content_box">
<div id="main_content_border">


<div id="signupbox_left">
<div id="signupbox_right">
  <div id="signupbox">
      <div class="signupbox_formfield"> 
		    <p><h2>Change Password:</h2></p>
<?php if(isset($_GET["msg"]) && $_GET["msg"]=="pass")
		  {	 
			echo "<h2>Password is successfully changed</h2>";
		   }	 	
			  else
			 { 
			  	echo " ";	
			}		
?><br>
	   	    <form  method="post" action="admin_change_pwd_action.php">
	      <table width="80%">
  <tr>
    <td>Enter your Current password :</td>
    <td><input type="password" name="cpassword" id="cpassword" maxlength="25" class="edit_box" /></td>
  </tr>
  <tr>
    <td>Enter new Password:</td>
    <td><input type="password" name="npassword" id="nrpassword" maxlength="25" class="edit_box"  onkeyup="passwordStrength(this.value)" /></td>
  </tr>
  <tr>
    <td colspan="2"><div id="passwordDescription"> Password not entered</div></td>

  </tr>
  <tr>
    <td colspan="2"><div id="passwordStrength" class="strength0">&nbsp;&nbsp;&nbsp;&nbsp;	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</div></td>
  </tr>
  <tr>
    <td>Enter new Password:</td>
    <td><input type="password" name="rpassword" id="rpasswordr" maxlength="25" class="edit_box"  onkeyup="passwordStrength(this.value)"/></td>
  </tr>
  <tr>
    <td align="center"> <input type="submit" name="submit" value="Change" class="scrapbook_button"></td>
    <td><input type="reset" value="Clear" class="scrapbook_button" /></td>
  </tr>
</table><br>
<br>


</form>&nbsp;</p>
        <p>
&nbsp;&nbsp;<br />
          <br />
        </p>
        <div class="clearthis">&nbsp;</div>
      </div>
  </div>
</div>
</div>




<div class="divider">&nbsp;</div>
<div class="about_me">
<h2>&nbsp;</h2>
</div>
<div id="tips">
<div id="tips_box">

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
</div>
</body></html>