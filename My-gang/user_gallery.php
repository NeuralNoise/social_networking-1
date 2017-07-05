<?php 
include ("check_session.php");
$img_page = $_GET['img_page'] ;

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><head>
<meta http-equiv="Content-Type" content="text/html;charset=iso-8859-1" />
<meta http-equiv="Content-Style-Type" content="text/css" /><title>My-gang : Home page</title>

<link rel="stylesheet" href="style.css" type="text/css" media="screen" />
<link rel="shortcut icon" href="images/favicon.ico" />

<script type="text/javascript" src="jquery.magnifier.js">
</script>
<script type="text/javascript" src="jquery.js"></script>

<script type="text/javascript" src="jquery_002.js"></script>
</head>
<?php 
include ("connection.php");
$user_id=$_SESSION['user_id'];
?>


<body>
<div id="container">
<div id="page_header">
<div id="company_name">
<h1><span>United Brothers</span></h1>
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

<div id="left_sidebar">
<div class="content_header">
<h2></h2>
</div>
<div class="content_box_right">
<div class="content_box_left">
<div class="content_box">
<div class="thumbnail">
<?php 
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
 <br /> 
  <?php

$query_id="SELECT * FROM tbl_account_info where user_id='".$user_id."';";
$result_set= mysql_query($query_id);
while($row = mysql_fetch_array($result_set))
  {?>
  <?php echo $row['gender'] ;
  ?>
  <?php }?>
</h3>
<div class="edit_profile">
 <a href="user_edit.php?user_id=<?php echo $user_id; ?> ">Edit...</a></div><br><br>
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
<br>
</div>

<div id="main_content">

<?php if(isset($_REQUEST["upload_msg"]))
	{
		if($_REQUEST["upload_msg"]="invalid")
		{ ?>
		<div class="content_header">
		<blink><h2><span>Invalid image file</span></h2></blink>
		</div>
		
	<?php }
	else  
	{?>
		<div class="content_header">
		<blink><h2><span>File already exists</span></h2></blink>
		</div>
	<?php }
	}
	else
	{?>
		<div class="content_header">
		<h2><span>Gallery</span></h2>
		</div>
	<?php } ?>


<div class="content_box_right">
<div class="content_box_left">
<div class="content_box">
<div id="main_content_border">
&nbsp;&nbsp;
<form action="image_upload.php?img_page=<?php echo  $_GET['img_page'];?>" method="post"
enctype="multipart/form-data">
<label for="file">Filename:</label>
<input type="file" name="file" id="file" />
<br />
<input type="submit" name="submit" value="Submit" />
</form>
<div class="a_edit">
<a href="gallery_edit.php?user_id=<?php echo $user_id;?>">Edit...</a></div>
<br />
<br />
<?php 
$img_count =0;
$query_id="SELECT * FROM tbl_img_info where user_id='".$user_id."' ORDER by img_id DESC;";
$result_set= mysql_query($query_id);
while($row = mysql_fetch_array($result_set))
{
	$img_count += 1;
}
$img = 8;
$no_of_page =(int)($img_count / $img);
$remain_img = $img_count % $img;
if( $remain_img <> 0 || $no_of_page==0)
$no_of_page += 1;


$temp = 1;?>
 

<br />
<br />
<?php
$loop_counter = 0;
$temp_count = 0;
$result= mysql_query($query_id);
while($row = mysql_fetch_array($result))
  {
  	if($loop_counter < ($img * ($img_page-1))) 
	{
		$loop_counter +=1;
		continue;
	}
  	if($loop_counter == ($img * $img_page)) break;
	
  	$img_id=$row['img_id'];
	$img_name=$row['img_name'];

	 
	 ?>
	
  	 <div class="img_gal">
	 
	<img class="magnify" src="gallery/<?php echo $user_id;?>/<?php echo $img_name; ?>" alt="Image" height="100" width="106" />

	 
			<div class="desc"><?php 
			$desc=$row['img_desc'];
			echo "$desc";
			?> </div></div>
  <?php $loop_counter += 1;$temp_count += 1;
  }?>
<div class="divider"></div>

<?php 

if($img_page <> 1)
	{ ?> 
	<a href="user_gallery.php?img_page=<?php echo $img_page - 1;?>">
	<img align="left" alt="Back" title="Back" name="Back" src="images/Back.jpg" height="50" /></a>
	<?php }
	else
	{?> <img align="left" alt="Back" title="Back" name="Back" src="images/Back.jpg" height="50" />
	<?php }
	?> 
	
	<?php if($img_page <> $no_of_page)
	{ ?>
	<a href="user_gallery.php?img_page=<?php echo $img_page+1;?>">
	<img align="right" alt="Next" title="Next" name="Next" src="images/Next.jpg" height="50"/></a>
	<?php }
	else
	{?> 
	<img align="right" alt="Next" title="Next" name="Next" src="images/Next.jpg" height="50"/>
	<?php } ?>
	


<div id="signupbox_left">
<div id="signupbox_right">
  <div id="signupbox">
          <div class="signupbox_formfield"> 
		  
       
&nbsp;&nbsp;<br />
          <br />
        </p>
        <div class="clearthis">&nbsp;</div>
      </div>
    
  </div>
</div>
</div>



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