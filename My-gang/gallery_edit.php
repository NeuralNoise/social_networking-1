<?php 
include ("check_session.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><head>
<meta http-equiv="Content-Type" content="text/html;charset=iso-8859-1" />
<meta http-equiv="Content-Style-Type" content="text/css" /><title>Editing My Gallery</title>

<link rel="stylesheet" href="style.css" type="text/css" media="screen" />
<link rel="shortcut icon" href="images/favicon.ico" />

<script>

</script>
</head>
<?php 
include ("connection.php");
$user_id=$_SESSION['user_id'];

?>


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
//$user_name=$_GET['user_name'];
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
//$user_name=$_GET['user_name'];
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
//$user_name=$_GET['user_name'];
$query_id="SELECT * FROM tbl_account_info where user_id='".$user_id."';";
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
//$user_name=$_GET['user_name'];
$query_id="SELECT * FROM tbl_account_info where user_id='".$user_id."';";
$result_set= mysql_query($query_id);
while($row = mysql_fetch_array($result_set))
  {?>
 <?php echo $row['city'];
  ?>
  <?php }?>
 <?php
 ?>
<!--<div class="link-more">
<a href="http://www.freewebsitetemplates.com/">...Read More</a>
</div>-->
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
<!-- End of Experts' Voice --> </div>
<!-- End of Left Sidebar --><!-- Start of Main Content -->
<div id="main_content">
<div class="content_header">
<h2><span>Edit Gallery</span></h2>
</div>

<div class="content_box_right">
<div class="content_box_left">
<div class="content_box">
<div id="main_content_border"><!-- Start of Top Masters Listing 1 -->
&nbsp;&nbsp;
<br />
<br />
<form action="image_upload.php?img_page=1" method="post"
enctype="multipart/form-data">
<label for="file">Filename:</label>
<input type="file" name="file" id="file" />
<br />
<input type="submit" name="submit" value="Submit" />
</form>

<?php
include ("connection.php");
$user_id=$_GET['user_id'];
$query_id="SELECT * FROM tbl_img_info where user_id='".$user_id."';";
//echo $query_id;
//$counter =0;
$result_set= mysql_query($query_id);
while($row = mysql_fetch_array($result_set))
	{
  		$img_id=$row['img_id'];
		//echo $img_id;
		$img_name=$row['img_name'];
		//echo $img_name;
	?>
		 <div class="scrap">
		 <div class="img_gal">
		 <img src="gallery/<?php echo $user_id;?>/<?php echo $img_name; ?>" alt="Image" height="100" width="106" />
		 <div class="desc"><?php 
			$desc=$row['img_desc'];
			echo "<br>$desc";
			?> </div></div>
			<div class="scrap_m"><br /><br /><br />
			<form action="update_image_desc.php?user_id=<?php echo $user_id;?>&img_id=<?php echo $img_id;?>" method="post">
			<textarea name="img_desc" class="image_desc" id="img_desc" style="color: rgb(136, 136, 136);" onkeyup="_checkScrapSize();" onFocus="this.value=(this.value==this.defaultValue)?'':this.value;">Enter image description Here.......</textarea> 
			<p><label>
		  	
          <input name="submit" type="submit" class="scrapbook_button" id="Submit" tabindex="2" value="Update" /></form>&nbsp;&nbsp;&nbsp;
          </label>
		 <label>
		  <a href="delete_image.php?user_id=<?php echo $user_id;?>&img_id=<?php echo $img_id;?>">
          <input name="submit" type="button" class="scrapbook_button" id="Submit" tabindex="2" value="Delete Image" /></a>&nbsp;&nbsp;&nbsp;
          </label></div>
			<div class="divider">&nbsp;</div></div>
		<?php 
	}
	?>
		

<div id="signupbox_left">
<div id="signupbox_right">
  <div id="signupbox">
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