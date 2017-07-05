<?php 
include ("check_session.php");
?><?php
$user_id=$_SESSION['user_id'];
$a = $_GET['img_page'];



if ((($_FILES["file"]["type"] == "image/gif")
|| ($_FILES["file"]["type"] == "image/jpeg")
|| ($_FILES["file"]["type"] == "image/pjpeg")))
  {
  if ($_FILES["file"]["error"] > 0)
    {
     $msg="invalid";
    }
  else
    {
    if (file_exists("gallery/".$user_id ."/". $_FILES["file"]["name"]))
      {
     $msg="exists";
      }
    else
      {
     
	  move_uploaded_file($_FILES["file"]["tmp_name"],
      "gallery/".$user_id ."/". $_FILES["file"]["name"]);

	  include ("connection.php");
		  $sql_insert = "insert into tbl_img_info (user_id,img_name) values($user_id,'".$_FILES["file"]["name"]."');";

		$result = mysql_query($sql_insert);
	


      }
    }
  }
else
  {
  $msg="invalid";
  }
     if(isset($msg))
	 echo "<script language='javascript' type='text/javascript'> window.location='user_gallery.php?img_page=$a&upload_msg=$msg' </script>";
	 else
	 echo "<script language='javascript' type='text/javascript'> window.location='user_gallery.php?img_page=$a' </script>";
	 
	 
?> 
