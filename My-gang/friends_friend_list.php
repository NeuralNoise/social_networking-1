<?php 
include ("check_session.php");
include ("connection.php");
$user_id=$_SESSION['user_id'];
$friend_id=$_GET['friend_id'];
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><head>
<meta http-equiv="Content-Type" content="text/html;charset=iso-8859-1" />
<meta http-equiv="Content-Style-Type" content="text/css" /><title> Friends of My Friend</title>

<link rel="stylesheet" href="style.css" type="text/css" media="screen" />
<link rel="shortcut icon" href="images/favicon.ico" />

<script>

</script>
</head>



<body>
<div id="container"><!-- Start of Page Header -->
<div id="page_header">
<div id="company_name">
<h1><span>United Brothers</span></h1>
</div>
</div>
<!-- End of Page Header --><!-- Start of Page Menu -->
<div id="page_menu">
<ul>

<li class="home"><h2><a href="user_home.php" title="Home">Home</a></h2></li>
<li class="scrapbook"><h2><a href="friend_scrapbook.php?friend_id=<?php echo $friend_id ?>&scrap_page=1" title="Scrapbook">Scrapbook</a></h2></li>
<li class="gallery"><h2><a href="friend_gallery.php?friend_id=<?php echo $friend_id ?>&img_page=1" title="Gallery">Gallery</a></h2>
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
$prof_img = "profile_img/".$friend_id.".jpg";
if(file_exists($prof_img)){ ?>
<img src="profile_img/<?php echo $friend_id?>.jpg" alt="Profile image" height="100" width="106" />
<?php }
else
{?> 
<img src="images/default_img.jpg" alt="Profile image" height="100" width="106" />
<?php } ?> 
</div>
<h3><?php
//$user_name=$_GET['user_name'];
$query_id="SELECT * FROM tbl_account_info where user_id='".$friend_id."';";
$result_set= mysql_query($query_id);
while($row = mysql_fetch_array($result_set))
  {?>
  <strong><?php echo $row['first_name']." ".$row['last_name'] ;
  ?></strong>
  <?php }?>
 <?php
 ?>

<br /> <?php
//$user_name=$_GET['user_name'];
$query_id="SELECT * FROM tbl_account_info where user_id='".$friend_id."';";
$result_set= mysql_query($query_id);
while($row = mysql_fetch_array($result_set))
  {?>
 <?php echo $row['gender'] ;
  ?>
  <?php }?>
 <?php
 ?>
</h3>
<br><br>
<?php
//$user_name=$_GET['user_name'];
$query_id="SELECT * FROM tbl_account_info where user_id='".$friend_id."';";
$result_set= mysql_query($query_id);
while($row = mysql_fetch_array($result_set))
  {?>
 <?php echo $row['birth_day']." ".$row['birth_month']." ".$row['birth_year'] ;
  ?>
  <?php }?>
 <?php
 ?>
<br><?php
//$user_name=$_GET['user_name'];
$query_id="SELECT * FROM tbl_account_info where user_id='".$friend_id."';";
$result_set= mysql_query($query_id);
while($row = mysql_fetch_array($result_set))
  {?>
 <?php echo $row['country'];
  ?>
  <?php }?>
 <?php
 ?>
 <br><?php
//$user_name=$_GET['user_name'];
$query_id="SELECT * FROM tbl_account_info where user_id='".$friend_id."';";
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
<!-- End of Experts' Voice --> </div>
<!-- End of Left Sidebar --><!-- Start of Main Content -->
<div id="main_content">
<div class="content_header">
<h2><span>Friend List</span></h2>
</div>

<div class="content_box_right">
<div class="content_box_left">
<div class="content_box">
<div id="main_content_border"><!-- Start of Top Masters Listing 1 -->
<?php

$query_id="SELECT * FROM tbl_friend_info where user_id='".$friend_id."';";
$limit=8;
		$friend_count=0;
		$result_set= mysql_query($query_id);
		while($row_scrap_list = mysql_fetch_array($result_set))
		{
			$friend_count +=1;
		}
		$no_of_page =(int)($friend_count / $limit);
		$remain_friend = $friend_count % $limit;
		if( $remain_friend <> 0 || $no_of_page==0)
		$no_of_page += 1;
		
		$loop_counter=0;
		
$result_set= mysql_query($query_id);
	while($row_friend_list = mysql_fetch_array($result_set))
	{
	
		if($loop_counter < ($limit * ($_GET['friendlist_page']-1))) 
		{
		$loop_counter +=1;
		continue;
	}
  	if($loop_counter == ($limit * $_GET['friendlist_page'])) break;
	
	
  		$sql_fetch_name = "SELECT * from tbl_account_info where user_id=".$row_friend_list['friend_id']; 
 		// echo $sql_fetch_name;
		$result_friend_name = mysql_query($sql_fetch_name);
		$row_count = mysql_num_rows($result_friend_name);
		while($row_friend_name = mysql_fetch_array($result_friend_name))
  		{
			//$friend_id=$row_friend_list['friend_id'];
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
		}$loop_counter++;
	}
	?>
	<br />
<br />
<div class="divider"></div>
	<?php if($_GET['friendlist_page'] <> 1)
	{ ?> 
	<a href="friends_friend_list.php?friendlist_page=<?php echo $_GET['friendlist_page']-1;?>">
	<img align="left" alt="Back" title="Back" name="Back" src="images/Back.jpg" height="50" /></a>
	<?php }
	else
	{?> <img align="left" alt="Back" title="Back" name="Back" src="images/Back.jpg" height="50" />
	<?php }
	?> 
	
	<?php if($_GET['friendlist_page'] <> $no_of_page)
	{ ?>
	<a href="friends_friend_list.php?friendlist_page=<?php echo $_GET['friendlist_page']+1;?>">
	<img align="right" alt="Next" title="Next" name="Next" src="images/Next.jpg" height="50"/></a>
	<?php }
	else
	{?> 
	<img align="right" alt="Next" title="Next" name="Next" src="images/Next.jpg" height="50"/>
	<?php } ?>
	


<div id="signupbox_left">
<div id="signupbox_right">
  <div id="signupbox">
    <form  action="Registration_action.php" name="reg_form" method="post" id="reg_form">
      <div class="signupbox_formfield"> 
       <!-- <div class="img_gal">
  <a target="_blank" href="klematis_big.htm">
  <img src="images/klematis_small.jpg" alt="Klematis" width="110" height="90" />
  </a>
  <div class="desc">Add a description of the image here</div>
</div>
<div class="img_gal">
  <a target="_blank" href="klematis2_big.htm">
  <img src="images/klematis2_small.jpg" alt="Klematis" width="110" height="90" />
  </a>
  <div class="desc">Add a description of the image here</div>
</div>
<div class="img_gal">
  <a target="_blank" href="klematis3_big.htm">
  <img src="images/klematis3_small.jpg" alt="Klematis" width="110" height="90" />
  </a>
  <div class="desc">Add a description of the image here</div>
</div>
<div class="img_gal">
  <a target="_blank" href="klematis4_big.htm">
  <img src="images/klematis4_small.jpg" alt="Klematis" width="110" height="90" />
  </a>
  <div class="desc">Add a description of the image here</div>
</div>
<div id="tips">
<div id="tips_box">

</div>
</div>
-->
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

<!-- Start of Login Box -->
<!-- End of Login Box -->
<!-- Start of Tips of the Day -->
<!--<div class="img_gal">
  <a target="_blank" href="klematis_big.htm">
  <img src="images/klematis_small.jpg" alt="Klematis" width="110" height="90" />
  </a>
  <div class="desc">Add a description of the image here</div>
</div>
<div class="img_gal">
  <a target="_blank" href="klematis2_big.htm">
  <img src="images/klematis2_small.jpg" alt="Klematis" width="110" height="90" />
  </a>
  <div class="desc">Add a description of the image here</div>
</div>
<div class="img_gal">
  <a target="_blank" href="klematis3_big.htm">
  <img src="images/klematis3_small.jpg" alt="Klematis" width="110" height="90" />
  </a>
  <div class="desc">Add a description of the image here</div>
</div>
<div class="img_gal">
  <a target="_blank" href="klematis4_big.htm">
  <img src="images/klematis4_small.jpg" alt="Klematis" width="110" height="90" />
  </a>
  <div class="desc">Add a description of the image here</div>
</div>
<div id="tips">
<div id="tips_box">

</div>
</div>-->
<!-- End of Tips of the Day -->
<div class="clearthis">&nbsp;</div>
</div>
</div>
</div>
</div>
</div>
<!-- End of Main Content -->
<div class="clearthis">&nbsp;</div>
<!-- Start of Page Footer -->
<div id="page_footer"> Give your feedback on <a href="mailto:my.gang@rediffmail.com">my.gang@rediffmail.com </div>
</div>
</body></html>