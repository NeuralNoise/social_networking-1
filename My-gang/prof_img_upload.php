<?php 
include ("check_session.php");

?>

<?php
$user_id=$_GET['user_id'];
if ((($_FILES["file"]["type"] == "image/gif")
|| ($_FILES["file"]["type"] == "image/jpeg")
|| ($_FILES["file"]["type"] == "image/pjpeg")))
  {
  if ($_FILES["file"]["error"] > 0)
    {
    echo "Return Code: " . $_FILES["file"]["error"] . "<br />";
    }
  else
    {
   
      move_uploaded_file($_FILES["file"]["tmp_name"],
      "profile_img/" . $_FILES["file"]["name"]);
	  $profile_img_name =copy("profile_img/" .$_FILES["file"]["name"],"profile_img/" .$user_id.".jpg");
	  unlink("profile_img/" .$_FILES["file"]["name"]);
	  include ("connection.php");
     
	 echo "<script language='javascript' type='text/javascript'> window.location='user_edit.php' </script>";

    }
  }
else
  {
  echo "Invalid file";
  }
?> 