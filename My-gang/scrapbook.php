<?php 
include ("check_session.php");
$user_id=$_SESSION['user_id'];
$scrap_page=$_GET['scrap_page'];
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><head>
<meta http-equiv="Content-Type" content="text/html;charset=iso-8859-1" />
<meta http-equiv="Content-Style-Type" content="text/css" /><title>My Scrapbook</title>

<link rel="stylesheet" href="style.css" type="text/css" media="screen" />
<link rel="shortcut icon" href="images/favicon.ico" />

<script>

</script>
</head>
<?php 
include ("connection.php");
?>


<body>
<div id="container">
<div id="page_header">
<div id="company_name">
<h1><span>my</span></h1>
</div>
</div>
<div id="page_menu">
<ul>

<li class="home"><h2><a href="user_home.php" title="Home">Home</a></h2>
</li>
<li class="scrapbook"><h2><a href="scrapbook.php?scrap_page=1" title="Scrapbook">Scrapbook</a></h2>
</li>
<li class="gallery"><h2><a href="user_gallery.php?img_page=1" title="Gallery">Gallery</a></h2>
<li class="contact"><h2><a href="contact.php?contact_list_page=1" title="Contact">Contact</a></li>

<li class='setting'><h2>
<?php if(isset($_SESSION['admin_log']))
{?> <a href="administration.php" title="AdminHome">Admin home</a> <?php }
else {?> <a href="setting.php" title="Setting">Setting</a> <?php } ?>
</li>
<li class="logout"><h2><a href="logout_action.php" title="Logout">Logout</a></li>
</ul>
</div>
<!-- End of Page Menu --><!-- Start of Left Sidebar -->
<div id="left_sidebar"><!-- Start of Experts' Voice -->
<div class="content_header">
<h2></h2>
</div>
<div class="content_box_right">
<div class="content_box_left">
<div class="content_box">

<div class="thumbnail"><?php 
$prof_img = "profile_img/".$user_id.".jpg";
if(file_exists($prof_img)){ ?>
<img src="profile_img/<?php echo $user_id?>.jpg" alt="Profile image" height="100" width="106" />
<?php }
else
{?> 
<img src="images/default_img.jpg" alt="Profile image" height="100" width="106" />
<?php } ?> 
</div>
<h3><?php
$query_id="SELECT * FROM tbl_account_info where user_id='".$user_id."';";
$result_set= mysql_query($query_id);
while($row = mysql_fetch_array($result_set))
  {?>
  <strong><?php echo $row['first_name']." ".$row['last_name'] ;
  ?></strong>
  <?php }?>
 <?php
 ?>
 <br /> 

<?php
$query_id="SELECT * FROM tbl_account_info where user_id='".$user_id."';";
$result_set= mysql_query($query_id);
while($row = mysql_fetch_array($result_set))
  {?>
  <?php echo $row['gender'] ;
  ?>
  <?php }?>
   <?php
 ?>
</h3>
<div class="edit_profile">
 <a href="#">Edit...</a></div><br><br>
<?php
$query_id="SELECT * FROM tbl_account_info where user_id='".$user_id."';";
$result_set= mysql_query($query_id);
while($row = mysql_fetch_array($result_set))
  {?>
 <?php echo $row['birth_day']." ".$row['birth_month']." ".$row['birth_year'] ;
  ?>
  <?php }?>
 <?php
 ?>
<br>
<?php
$query_id="SELECT * FROM tbl_account_info where user_id='".$user_id."';";
$result_set= mysql_query($query_id);
while($row = mysql_fetch_array($result_set))
  {?>
 <?php echo $row['relationship_status'];
  ?>
  <?php }?>
 <?php
 ?>
<br>
<?php
$query_id="SELECT * FROM tbl_account_info where user_id='".$user_id."';";
$result_set= mysql_query($query_id);
while($row = mysql_fetch_array($result_set))
  {?>
 <?php echo $row['country'];
  ?>
  <?php }?>
 <?php
 ?>
 <br><?php
$query_id="SELECT * FROM tbl_account_info where user_id='".$user_id."';";
$result_set= mysql_query($query_id);
while($row = mysql_fetch_array($result_set))
  {?>
 <?php echo $row['city'];
  ?>
  <?php }?>
 <?php
 ?>
<br>
<br>
<hr color="#605F5E">
<br>
<form action="search_result.php?result_page=1" method="post">
<input type="text" name="search" id="search" class="search_box" value="Search friend..." maxlength="25" onFocus="this.value=(this.value==this.defaultValue)?'':this.value;"/>
<input type="submit" value=""  class="search_button" ></form>
<br>
</div>
</div>
</div>
</div>
<div id="main_content">
<div class="content_header">
<h2><span>Scrapbook</span></h2>
</div>
<div class="content_box_right">
<div class="content_box_left">
<div class="content_box">
<div id="main_content_border">
<div id="signupbox_left">
<div id="signupbox_right">
  <div id="signupbox">
    <form  action="scrapbook_action.php?sender_id=<?php echo $user_id;?>&receiver_id=<?php $user_id;?>&scrap_page=<?php echo $_GET['scrap_page'];?>" name="reg_form" method="post" id="reg_form">
      <div class="signupbox_formfield">
        <p>
          <label></label>
		   <label></label>
        </p>
   		
        <p>
		
		
		
		
		<?php
		$query_id="SELECT * FROM tbl_scrapbook_info where receiver_id='".$user_id."' order by message_id DESC;";

		$limit=6;
		$scrap_count=0;
		$result_set= mysql_query($query_id);
		while($row_scrap_list = mysql_fetch_array($result_set))
		{
			$scrap_count +=1;
		}
		$no_of_page =(int)($scrap_count / $limit);
		$remain_scrap = $scrap_count % $limit;
		if( $remain_scrap <> 0 || $no_of_page==0)
		$no_of_page += 1;

		?><?php
?><?php
		echo"<br><br>";
		$loop_counter=0;
		
		

		
		
		
		
		$result_set= mysql_query($query_id);
		while($row_scrap_list = mysql_fetch_array($result_set))
		{
		if($loop_counter < ($limit * ($scrap_page-1))) 
	{
		$loop_counter +=1;
		continue;
	}
  	if($loop_counter == ($limit * $scrap_page)) break;
		
		
		
		?><div class="scrap"><?PHP
  		$sql_fetch_name = "SELECT * from tbl_account_info where user_id=".$row_scrap_list['sender_id']; 
		$result_friend_name = mysql_query($sql_fetch_name);
		$row_count = mysql_num_rows($result_friend_name);
		while($row_friend_name = mysql_fetch_array($result_friend_name))
  		{
			echo "<br>";
			
			
 			$sender_id=$row_scrap_list['sender_id'];
			?>
			<div class="img_gal"><a href="user_friend_home.php?user_id=<?php echo $user_id?>&friend_id=<?php echo $sender_id?>">
			<?php 
$prof_img = "profile_img/".$sender_id.".jpg";
if(file_exists($prof_img)){ ?>
<img src="profile_img/<?php echo $sender_id?>.jpg" alt="Profile image" height="100" width="106" />
<?php }
else
{?> 
<img src="images/default_img.jpg" alt="Profile image" height="100" width="106" />
<?php } ?></a>
			<div class="desc"><?php 
			echo "<br><a href='user_friend_home.php?user_id=$user_id&friend_id=$sender_id'>". $row_friend_name['first_name'] ." ". $row_friend_name['last_name']."</a>";?> </div></div>
			<div class="scrap_m"><?php
			echo $row_scrap_list['msg'];
			?>
</div>
			<div class="scrap_r">
			<?php echo $row_scrap_list['receive_date_time']; ?>
			<a href="scrapbook_delete.php?receiver_id=<?php echo $user_id ;?>&message_id=<?php echo $row_scrap_list["message_id"];?>&scrap_page= <?php echo $scrap_page;?>" title="Delete scrap">
				<img src='images/remove.gif' alt='remove'></a>
				<a href="scrapbook_replay.php?user_id=<?php echo $user_id;?>&message_id=<?php echo $row_scrap_list["message_id"];?>">
				<a href="friend_scrapbook.php?friend_id=<?php echo $sender_id ?>&scrap_page=1" title="Reply"><img src='images/reply.png' alt='reply'></a>
			</div></div>
<div class="divider"></div><?php
		}$loop_counter += 1;
	}
	
	
	?>
	<?php if($scrap_page <> 1)
	{ ?> 
	<a href="scrapbook.php?scrap_page=<?php echo $scrap_page - 1;?>">
	<img align="left" alt="Back" title="Back" name="Back" src="images/Back.jpg" height="50" /></a>
	<?php }
	else
	{?> <img align="left" alt="Back" title="Back" name="Back" src="images/Back.jpg" height="50" />
	<?php }
	?> 
	
	<?php if($scrap_page <> $no_of_page)
	{ ?>
	<a href="scrapbook.php?scrap_page=<?php echo $scrap_page+1;?>">
	<img align="right" alt="Next" title="Next" name="Next" src="images/Next.jpg" height="50"/></a>
	<?php }
	else
	{?> 
	<img align="right" alt="Next" title="Next" name="Next" src="images/Next.jpg" height="50"/>
	<?php } ?>
	
	
	</p>
        <p><br />
&nbsp;&nbsp;<br />
          <br />
        </p>
        <div class="clearthis">&nbsp;</div>
      </div>
    </form>
  </div>
</div>
</div>


<!-- End of Top Masters Listing 1 -->

<?php 
$friend_count=0;
$request_count=0;
$query_id="SELECT * FROM tbl_friend_info where user_id='".$user_id."' and friend_status='1';";
$result_set= mysql_query($query_id);
while($row_friend_list = mysql_fetch_array($result_set))
	{
	$friend_count +=1;
	}
	
$query_id="SELECT * FROM tbl_friend_info where user_id='".$user_id."' and friend_status='0';";
$result_set= mysql_query($query_id);
while($row_friend_list = mysql_fetch_array($result_set))
	{
	$request_count +=1;
	}

?>

<div class="divider">&nbsp;</div>
<div class="about_me">
<h2>Friend List(<?php echo $friend_count; ?>)</h2></div>
<div class="request_pending">
<?php 
if($request_count==0)
{?>
<?php echo $request_count; ?> request pending...</div>
<?php 
}
else
{?>
<a href="request.php?user_id=<?php echo $user_id?>">
<?php echo $request_count; ?> request pending...</a></div>
<?php 
}?>
<?php
$query_id="SELECT * FROM tbl_friend_info where user_id='".$user_id."' and friend_status='1';";
$counter =0;
$result_set= mysql_query($query_id);
$condition = false;
	while($row_friend_list = mysql_fetch_array($result_set))
	{
  		$sql_fetch_name = "SELECT * from tbl_account_info where user_id=".$row_friend_list['friend_id']; 
		$result_friend_name = mysql_query($sql_fetch_name);
		$row_count = mysql_num_rows($result_friend_name);
		while($row_friend_name = mysql_fetch_array($result_friend_name))
  		{
			$friend_id=$row_friend_list['friend_id'];
			$counter +=1;
			if($counter>=5)
			{
			?>
			<div class="a_view_all">
			<a href="friend_list.php?user_id=<?php echo $user_id?>">View all...</a></div>
			<?php 
				$condition=true;
				break;
			}
 			?>
			<div class="img_gal"><a href="user_friend_home.php?user_id=<?php echo $user_id?>&friend_id=<?php echo $friend_id?>">
			<?php 
$prof_img = "profile_img/".$friend_id.".jpg";
if(file_exists($prof_img)){ ?>
<img src="profile_img/<?php echo $friend_id?>.jpg" alt="Profile image" height="100" width="106" />
<?php }
else
{?> 
<img src="images/default_img.jpg" alt="Profile image" height="100" width="106" />
<?php } ?></a>
			<div class="desc"><?php 
			echo "<a href='user_friend_home.php?user_id=$user_id&friend_id=$friend_id'>". $row_friend_name['first_name'] ." ". $row_friend_name['last_name']."</a>&nbsp;";?> </div></div>
  			<?php
		}
		if($condition)
		{
		break;
		}
	}
	?>
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