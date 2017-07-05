<?php 
include ("check_session.php");
?>
<html><head>
<link rel="stylesheet" href="style.css" type="text/css" media="screen" />
<link rel="shortcut icon" href="images/favicon.ico" />

<script>

</script>
</head>
<body>
<?php
include "connection.php";
$user_id=$_GET['user_id'];
$friend_id=$_GET['friend_id'];
?>
 
<div id="container">
<div id="page_header">
<div id="company_name">
<h1><span>My-gang</span></h1>
</div>
</div>

<div id="page_menu">
<ul>

<li class="home"><h2><a href="user_home.php" title="Home">Home</a></h2></li>
<li class="scrapbook"><h2><a href="friend_scrapbook.php?friend_id=<?php echo $friend_id ?>&scrap_page=1" title="Scrapbook">Scrapbook</a></h2></li>
<li class="gallery"><h2><a href="friend_gallery.php?friend_id=<?php echo $friend_id ?>&img_page=1" title="Gallery">Gallery</a></h2>

<li class="contact"><h2><a href="contact.php?contact_list_page=1" title="Contact">Contact</a></li>
<li class='setting'><h2>
<?php if(isset($_SESSION['admin_log']))
{?> <a href="administration.php" title="AdminHome">AdminHome</a> <?php }
else {?> <a href="setting.php" title="Setting">Setting</a> <?php } ?>
</li>
<li class="logout"><h2><a href="logout_action.php" title="Logout">Logout</a></li>
</ul>
</div>

<div id="left_sidebar">
<div class="content_header">
<h2></h2>
</div>
<div class="content_box_right">
<div class="content_box_left">
<div class="content_box">

<div class="thumbnail">
<?php 
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

$query_id="SELECT * FROM tbl_account_info where user_id='".$friend_id."';";
$result_set= mysql_query($query_id);
while($row = mysql_fetch_array($result_set))
  {?>
 <?php echo $row['gender'] ;
  ?>
  <?php }?>
</h3>
<br><br>
<?php

$query_id="SELECT * FROM tbl_account_info where user_id='".$friend_id."';";
$result_set= mysql_query($query_id);
while($row = mysql_fetch_array($result_set))
  {?>
 <?php echo $row['birth_day']." ".$row['birth_month']." ".$row['birth_year'] ;
  ?>
  <?php }?>
<br>
<?php

$query_id="SELECT * FROM tbl_account_info where user_id='".$friend_id."';";
$result_set= mysql_query($query_id);
while($row = mysql_fetch_array($result_set))
  {?>
 <?php echo $row['relationship_status'];
  ?>
  <?php }?>
<br><?php

$query_id="SELECT * FROM tbl_account_info where user_id='".$friend_id."';";
$result_set= mysql_query($query_id);
while($row = mysql_fetch_array($result_set))
  {?>
 <?php echo $row['country'];
  ?>
  <?php }?>
 <br><?php

$query_id="SELECT * FROM tbl_account_info where user_id='".$friend_id."';";
$result_set= mysql_query($query_id);
while($row = mysql_fetch_array($result_set))
  {?>
 <?php echo $row['city'];
  ?>
  <?php }?>


<br>
<br>
<hr color="#605F5E">


<?php
$query = "select * from tbl_friend_info where user_id='".$user_id."' and friend_id='".$friend_id."' and friend_status='1';";

$query_result = mysql_query($query);
if($row_friend_list = mysql_fetch_array($query_result))
{	?>
		<a href="friend_remove.php?user_id=<?php echo $user_id;?>&friend_id=<?php echo $friend_id;?>">	
	<?php echo "Remove Friend"; ?></a>
	<?php echo"<br />";
}
else
{
	$query = "select * from tbl_friend_info where user_id='".$user_id."' and friend_id='".$friend_id."' and friend_status='0';";
	$query_result = mysql_query($query);
	if($row_friend_list = mysql_fetch_array($query_result))
	{?>
		<a href="friend_accept.php?user_id=<?php echo $user_id;?>&friend_id=<?php echo $friend_id;?>">	
		<?php echo "Accept Friend";?> </a>
		<a href="friend_reject.php?user_id=<?php echo $user_id;?>&friend_id=<?php echo $friend_id;?>">	
		<?php echo"<br>Reject Friend<br>"; ?> </a><?php
	}
	else
	{
		$query = "select * from tbl_friend_info where user_id='".$friend_id."' and friend_id='".$user_id."' and friend_status='0';";
		$query_result = mysql_query($query);
		if($row_friend_list = mysql_fetch_array($query_result))
		{?>
		<a href="friend_remove_request.php?user_id=<?php echo $user_id;?>&friend_id=<?php echo $friend_id;?>">	
		<?php echo "Remove friend request";?> </a>
		<?php echo "<br>";
		}
		
		else
		{	?>
			<a href="friend_add_request.php?user_id=<?php echo $user_id;?>&friend_id=<?php echo $friend_id;?>">
			<?php echo "Add as a friend";?> </a>
			<?php echo "<br>";	
		}
	}
}

?>




<br><div class="divider"></div>
<form action="search_result.php?result_page=1" method="post">
<input type="text" name="search" id="search" class="search_box" value="Search friend..." maxlength="25" onFocus="this.value=(this.value==this.defaultValue)?'':this.value;"/>
<input type="submit" value=""  class="search_button" ></form>

<div class="divider"></div>
</div>
</div>
</div>
<br>
 </div>

<div id="main_content">
<div class="content_header">
<h2>&nbsp;</h2>
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
    <form  action="Registration_action.php" name="reg_form" method="post" id="reg_form">
      <div class="signupbox_formfield"> 
        <p><?php

$query_id="SELECT * FROM tbl_account_info where user_id='".$friend_id."';";
$result_set= mysql_query($query_id);
while($row = mysql_fetch_array($result_set))
  {?><div class="about_me">
 <?php echo "<h2>".$row['first_name']." sayes... "."</h1>";
 $about_me=$row['about_me'];
 
  ?></div>
  <div class="about_me_adjust">
  <?php $temp_about_me = "Why dont you write about your self";
  if(strcmp($about_me,$temp_about_me) == 0){ $about_me="no answer by your friend";
  }
  echo $about_me; ?>
  </div>
  <?php }?>
 <?php
 ?></p>
 <br>
<br>
<br>
<br>
<br><br>
<br>

<?php

		$query_hobby="SELECT * FROM tbl_account_info where user_id='".$friend_id."';";
		$result_set= mysql_query($query_hobby);
		while($row = mysql_fetch_array($result_set))
		  {?><div class="about_me">
		  
		 <?php echo "<h2>".$row['first_name']."'s Hobbies</h2>";
		 ?></div>
		  <div class="about_me_adjust">
		  <?php $hobbies = $row['hobbies'];
		  $temp_hobbies = "Write about your hobbies";
  if(strcmp($hobbies,$temp_hobbies) == 0){ $hobbies="no answer by your friend";
  }
  echo $hobbies; ?>
		  </div>
		  <?php }?>
		 <?php
		 ?></p> <br>

        <p>&nbsp;</p>
        <p><div class="a_view_all"><a href="user_friend_info.php?user_id=<?php echo $user_id?>&friend_id=<?php echo $friend_id?>">  More info...</a></div></p>
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




<div class="divider">&nbsp;</div>

<div class="about_me">
<h2>Friend List</h2></div>
<?php

$query_id="SELECT * FROM tbl_friend_info where user_id='".$friend_id."' and friend_status=1;";

$counter=0;
$condition=false;

$result_set= mysql_query($query_id);
while($row_friend_list = mysql_fetch_array($result_set))
  {
  $sql_fetch_name = "SELECT * from tbl_account_info where user_id=".$row_friend_list['friend_id']; 

	$result_friend_name = mysql_query($sql_fetch_name);
		while($row_friend_name = mysql_fetch_array($result_friend_name))
  		{
			$friend_id=$row_friend_list['friend_id'];
			$counter +=1;
			if($counter>=5)
			{
			?>
			<div class="a_view_all">
			<a href="friends_friend_list.php?user_id=<?php echo $user_id?>&friend_id=<?php echo $friend_id?>">View all...</a></div>
			<?php 
				break;
				$condition=true;
			}
			
			if($friend_id==$user_id)
			{
			?><div class="img_gal">
			<a href="user_home.php?user_id=<?php echo $user_id?>">
			<?php 
$prof_img = "profile_img/".$friend_id.".jpg";
if(file_exists($prof_img)){ ?>
<img src="profile_img/<?php echo $friend_id?>.jpg" alt="Profile image" height="100" width="106" />
<?php }
else
{?> 
<img src="images/default_img.jpg" alt="Profile image" height="100" width="106" />
<?php } ?></a>
		 		<div class="desc">
		 		<?php 
				echo "<br> <a href='user_home.php?user_id=$user_id'>". $row_friend_name['first_name'] ." ". $row_friend_name['last_name']."</a>"; ?>
				</div></div>
				<?php
				}
				else
				{
				?>
				<div class="img_gal">
				<a href="user_friend_home.php?user_id=<?php echo $user_id?>&friend_id=<?php echo $friend_id?>">
				<?php 
$prof_img = "profile_img/".$friend_id.".jpg";
if(file_exists($prof_img)){ ?>
<img src="profile_img/<?php echo $friend_id?>.jpg" alt="Profile image" height="100" width="106" />
<?php }
else
{?> 
<img src="images/default_img.jpg" alt="Profile image" height="100" width="106" />
<?php } ?></a>
				<div class="desc">
				<?php
				echo "<br> <a href='user_friend_home.php?user_id=$user_id&friend_id=$friend_id'>". $row_friend_name['first_name'] ." ". $row_friend_name['last_name']."</a>";
				?>
				</div></div>
				<?php 
				}
  		}
		if($condition)
		{
		break;
		}
	}
		?>


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