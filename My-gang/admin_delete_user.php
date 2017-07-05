<?php 
include ("admin_check_session.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><head>
<meta http-equiv="Content-Type" content="text/html;charset=iso-8859-1" />
<meta http-equiv="Content-Style-Type" content="text/css" /><title>Edit User</title>

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
  
  
  
  
  <br />
  <br />
  <br />
  <?php 
  $result = mysql_query("SELECT * FROM tbl_account_info where admin_status=0 and user_status=1");

echo "<table id='users' border='2' align='center'>"; 
if(isset($_GET["msg"]) && $_GET["msg"]=="deleted")
		  {	 
			echo "<tr><td  colspan='6'><center>User is deleted</center></td></tr>";
			
		   }
echo "<tr>";		   	 		
echo "<th>User Id</th>
<th>User Name</th>
<th>First Name</th>
<th>Last Name</th>
<th>Last Login</th>
<th>Perform Action</th>
</tr>";

$limit=15;
		$contact_count=0;
  $result_set = mysql_query("SELECT * FROM tbl_account_info where admin_status=0 and user_status=1");
		while($row_scrap_list = mysql_fetch_array($result_set))
		{
			$contact_count +=1;
		}
		$no_of_page =(int)($contact_count / $limit);
		$remain_contact = $contact_count % $limit;
		if( $remain_contact <> 0 || $no_of_page==0)
		$no_of_page += 1;
		
		$loop_counter=0;

while($row_contact_list = mysql_fetch_array($result))
  {
  
  if($loop_counter < ($limit * ($_GET['user_list_page']-1))) 
		{
		$loop_counter +=1;
		continue;
	}
  	if($loop_counter == ($limit * $_GET['user_list_page'])) break;
  
  $temp_user_id = $row_contact_list['user_id'];
	  		
	  				echo "<tr>";
 					 echo "<td>" . $temp_user_id . "</td>";
  					 echo "<td>" . $row_contact_list['user_name'] . "</td>";
					  echo "<td>" . $row_contact_list['first_name'] . "</td>";
  					  echo "<td>" . $row_contact_list['last_name'] . "</td>";
					  echo "<td>" . $row_contact_list['last_login'] . "</td>";
					  echo "<td>" ;?>
					  <?php $_SESSION['views']=1;
					  	?>
					  <center><a href='user_home.php?user_id=<?php echo $temp_user_id; ?>'>
					  <img src='images/view.gif' alt='View Question' width="20" height="20" border=0 title="View User"> </a>
	 
	 <a href='user_edit.php?user_id=<?php echo $temp_user_id; ?>'><img src='images/notepad.gif' alt='Edit Question' width="20" title="Edit User" height="20" border=0> </a>
	 
	 <a href='delete_account_action.php?user_id=<?php echo $temp_user_id; ?>&user_list_page=<?php echo $_GET['user_list_page']; ?>'><img src='images/delete.gif' alt='Delete Question' width="20" title="Delete User" height="20" border=0></a></center>
					  
					  <?php  echo "</td>" ;
					  echo "</tr>";
					  
					  $loop_counter++;
					  
		  		
	}	 ?>
 
<?php 
 echo "</table>";?>
  
  <div class="divider"></div>
<?php if($_GET['user_list_page'] <> 1)
	{ ?> 
	<a href="admin_delete_user.php?user_list_page=<?php echo $_GET['user_list_page']-1;?>">
	<img align="left" alt="Back" title="Back" name="Back" src="images/Back.jpg" height="50" /></a>
	<?php }
	else
	{?> <img align="left" alt="Back" title="Back" name="Back" src="images/Back.jpg" height="50" />
	<?php }
	?> 
	
	<?php if($_GET['user_list_page'] <> $no_of_page)
	{ ?>
	<a href="admin_delete_user.php?user_list_page=<?php echo $_GET['user_list_page']+1;?>">
	<img align="right" alt="Next" title="Next" name="Next" src="images/Next.jpg" height="50"/></a>
	<?php }
	else
	{?> 
	<img align="right" alt="Next" title="Next" name="Next" src="images/Next.jpg" height="50"/>
	<?php } ?>
  
  
  </div>
  

</div>
</div>



  



<div id="tips">
<div id="tips_box">
<h2>&nbsp;</h2>
<ul><li>&nbsp;</li>
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

<div id="page_footer"> Give your feedback on <a href="mailto:my.gang@rediffmail.com">my.gang@rediffmail.com </div>
</div>
</body></html>