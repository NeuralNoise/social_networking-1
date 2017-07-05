<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><head>
<meta http-equiv="Content-Type" content="text/html;charset=iso-8859-1" />
<meta http-equiv="Content-Style-Type" content="text/css" /><title>My-gang : Home page</title>

<link rel="stylesheet" href="style.css" type="text/css" media="screen" />
<link rel="shortcut icon" href="images/favicon.ico" />

<script>

</script>
</head>



<body>
<?php 

include ("connection.php"); 
include ("check_session.php"); 

if(isset($_GET['user_id']))
{
$user_id=$_GET['user_id'];
$_SESSION['user_id']=$user_id;
}
$user_id=$_SESSION['user_id'];
$query_id="SELECT * FROM tbl_account_info where user_id='".$user_id."';";
$result_set= mysql_query($query_id);
$row = mysql_fetch_array($result_set);
$first_name=$row['first_name'];
$last_name=$row['last_name'];
$user_name=$row['user_name'];
$email_id=$row['email_id'];
$gender=$row['gender'];
$birth_day=$row['birth_day'];
$birth_month=$row['birth_month'];
$birth_year=$row['birth_year'];
$country =$row['country'];
$relationship_status =$row['relationship_status'];
$high_school=$row['high_school'];
$city=$row['city'];

$college=$row['college'];
$company=$row['company'];
$about_me=$row['about_me'];
$hobbies=$row['hobbies'];
$contact_no=$row['contact_no'];
$alt_contact_no=$row['alt_contact_no'];
$alt_email_id=$row['alt_email_id'];



?>
<div id="container">
<div id="page_header">
<div id="company_name">

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
 <a href="user_edit.php">Edit...</a></div>
<br><br>
<?php

$query_id="SELECT * FROM tbl_account_info where user_id='".$user_id."';";
$result_set= mysql_query($query_id);
while($row = mysql_fetch_array($result_set))
  {?>
 <?php echo $row['birth_day']." ".$row['birth_month']." ".$row['birth_year'] ;
  ?>
  <?php }?>
<br>
<?php

$query_id="SELECT * FROM tbl_account_info where user_id='".$user_id."';";
$result_set= mysql_query($query_id);
while($row = mysql_fetch_array($result_set))
  {?>
 <?php echo $row['relationship_status'];
  ?>
  <?php }?>
<br><?php

$query_id="SELECT * FROM tbl_account_info where user_id='".$user_id."';";
$result_set= mysql_query($query_id);
while($row = mysql_fetch_array($result_set))
  {?>
 <?php echo $row['country'];
  ?>
  <?php }?>
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
<div class="content_header">
<h2><span>Edit Profile</span></h2>
</div>
<div class="content_box_right">
<div class="content_box_left">
<div class="content_box">
<div id="main_content_border">


<div id="signupbox_left">
<div id="signupbox_right">
  <div id="signupbox">
    
      <div class="signupbox_formfield">
        
		<table width="100%" border="0">
  <tr>
    <td width="25%"><font face="Tahoma, Arial, sans-serif" color="#fafafa" size="2">Change profile image:</font></td>
    <td colspan="3"><form action="prof_img_upload.php?user_id=<?php echo $user_id ?>" method="post"
enctype="multipart/form-data">

<input type="file" name="file" id="file" class="edit_box" tabindex="1"/><br /><br />
<input type="submit" name="submit" value="Submit" class="scrapbook_button" tabindex="2" />
</form></td>
  </tr>
  <tr>
    <td colspan="4"></td>
    </tr>
  <tr>
    <td colspan="4">&nbsp;</td>
  </tr>
  <tr>
    <td>
	  <form action="user_update.php?user_id=<?php echo $user_id; ?>" method="post" enctype="multipart/form-data">
	<font face="Tahoma, Arial, sans-serif" color="#fafafa" size="2">Name:</font></td>
    <td><input name="first_name" type="text" id="first_name" value="<?php echo $first_name;?>" class="edit_box" maxlength="30" tabindex="3">  </td>
	<td>
	 
	 <font face="Tahoma, Arial, sans-serif" color="#fafafa" size="2"><center>Last Name:</center></font></td>
    <td ><input name="last_name" type="text" class="edit_box" id="last_name" value="<?php echo $last_name;?>" maxlength="30" tabindex="4"></td>
  
  <tr>
    <td><font face="Tahoma, Arial, sans-serif" color="#fafafa" size="2">Gender:</font></td>
    <td colspan="3"><select class="edit_select" name="gender" id="gender" tabindex="5"  >
          <option value="Male" >Male</option>
          <option value="Female">Female</option>
        </select></td>
  </tr>
  <tr>
    <td><font face="Tahoma, Arial, sans-serif" color="#fafafa" size="2">Birthday:</font></td>
    <td width="25%"><input name="bday" type="text" id="bday" value="<?php echo $birth_day;?>"  maxlength="2"  class="edit_box1" tabindex="6"/></td>
    <td width="25%"><select class="edit_select" name="bmonth" id="bmonth" tabindex="7" >
          
          <option <?php if($birth_month=="January")echo "selected='selected'";?> value="January">January</option>
          <option <?php if($birth_month=="February")echo "selected='selected'";?> value="February">February</option>
          <option <?php if($birth_month=="March")echo "selected='selected'";?> value="March">March</option>
          <option  <?php if($birth_month=="April")echo "selected='selected'";?> value="April">April</option>
          <option <?php if($birth_month=="May")echo "selected='selected'";?> value="May">May</option>
          <option <?php if($birth_month=="June")echo "selected='selected'";?> value="June">June</option>
          <option <?php if($birth_month=="July")echo "selected='selected'";?>value="July">July</option>
          <option <?php if($birth_month=="August")echo "selected='selected'";?> value="August">August</option>
          <option <?php if($birth_month=="September")echo "selected='selected'";?> value="September">September</option>
          <option <?php if($birth_month=="October")echo "selected='selected'";?> value="October">October</option>
          <option <?php if($birth_month=="November")echo "selected='selected'";?> value="November">November</option>
          <option <?php if($birth_month=="December")echo "selected='selected'";?> value="December">December</option>
        </select></td>
    <td width="25%"><input name="byear" type="text" id="byear" value="<?php echo $birth_year;?>" maxlength="4" class="edit_box1" tabindex="8"/></td>
  </tr>
   <tr>
     <td><font face="Tahoma, Arial, sans-serif" color="#fafafa" size="2">Country:</font></td>
     <td colspan="3"> <select class="edit_select" name="country" id="country" tabindex="9">
            <option <?php if($country=="Afghanistan")echo "selected='selected'";?> value="Afghanistan">Afghanistan</option>
            <option <?php if($country=="Aland Islands")echo "selected='selected'";?> value="Aland Islands">Aland Islands</option>
            <option <?php if($country=="Albania")echo "selected='selected'";?> value="Albania">Albania</option>
            <option <?php if($country=="Algeria")echo "selected='selected'";?> value="Algeria">Algeria</option>
            <option <?php if($country=="American Samoa")echo "selected='selected'";?> value="American Samoa">American Samoa</option>
            <option <?php if($country=="Andorra")echo "selected='selected'";?> value="Andorra">Andorra</option>
            <option <?php if($country=="Angola")echo "selected='selected'";?> value="Angola">Angola</option>
            <option <?php if($country=="Anguilla")echo "selected='selected'";?> value="Anguilla">Anguilla</option>
            <option <?php if($country=="Antarctica")echo "selected='selected'";?> value="Antarctica">Antarctica</option>
            <option <?php if($country=="Antigua and Barbuda")echo "selected='selected'";?> value="Antigua and Barbuda">Antigua and Barbuda</option>
            <option <?php if($country=="Argentina")echo "selected='selected'";?> value="Argentina">Argentina</option>
            <option <?php if($country=="Armenia")echo "selected='selected'";?> value="Armenia">Armenia</option>
            <option <?php if($country=="Aruba")echo "selected='selected'";?> value="Aruba">Aruba</option>
            <option <?php if($country=="Australia")echo "selected='selected'";?> value="Australia">Australia</option>
            <option <?php if($country=="Austria")echo "selected='selected'";?> value="Austria">Austria</option>
            <option <?php if($country=="Azerbaijan")echo "selected='selected'";?> value="Azerbaijan">Azerbaijan</option>
            <option <?php if($country=="Bahamas")echo "selected='selected'";?> value="Bahamas">Bahamas</option>
            <option <?php if($country=="Bahrain")echo "selected='selected'";?> value="Bahrain">Bahrain</option>
            <option <?php if($country=="Bangladesh")echo "selected='selected'";?> value="Bangladesh">Bangladesh</option>
            <option <?php if($country=="Barbados")echo "selected='selected'";?> value="Barbados">Barbados</option>
            <option <?php if($country=="Belarus")echo "selected='selected'";?> value="Belarus">Belarus</option>
            <option <?php if($country=="Belgium")echo "selected='selected'";?> value="Belgium">Belgium</option>
            <option <?php if($country=="Belize")echo "selected='selected'";?> value="Belize">Belize</option>
            <option <?php if($country=="Benin")echo "selected='selected'";?> value="Benin">Benin</option>
            <option <?php if($country=="Bermuda")echo "selected='selected'";?> value="Bermuda">Bermuda</option>
            <option <?php if($country=="Bhutan")echo "selected='selected'";?> value="Bhutan">Bhutan</option>
            <option <?php if($country=="Bolivia")echo "selected='selected'";?> value="Bolivia">Bolivia</option>
            <option <?php if($country=="Bosnia and Herzegovina")echo "selected='selected'";?> value="Bosnia and Herzegovina">Bosnia and Herzegovina</option>
            <option <?php if($country=="Botswana")echo "selected='selected'";?> value="Botswana">Botswana</option>
            <option <?php if($country=="Bouvet Island")echo "selected='selected'";?> value="Bouvet Island">Bouvet Island</option>
            <option <?php if($country=="Brazil")echo "selected='selected'";?> value="Brazil">Brazil</option>
            <option <?php if($country=="British Indian Ocean Territory")echo "selected='selected'";?> value="British Indian Ocean Territory">British Indian Ocean Territory</option>
            <option <?php if($country=="British Virgin Islands")echo "selected='selected'";?> value="British Virgin Islands">British Virgin Islands</option>
            <option <?php if($country=="Brunei")echo "selected='selected'";?> value="Brunei">Brunei</option>
            <option <?php if($country=="Bulgaria")echo "selected='selected'";?> value="Bulgaria">Bulgaria</option>
            <option <?php if($country=="Burkina Faso")echo "selected='selected'";?> value="Burkina Faso">Burkina Faso</option>
            <option <?php if($country=="Burundi")echo "selected='selected'";?> value="Burundi">Burundi</option>
            <option <?php if($country=="Cambodia")echo "selected='selected'";?> value="Cambodia">Cambodia</option>
            <option <?php if($country=="Cameroon")echo "selected='selected'";?> value="Cameroon">Cameroon</option>
            <option <?php if($country=="Canada")echo "selected='selected'";?> value="Canada">Canada</option>
            <option <?php if($country=="Cape Verde")echo "selected='selected'";?>value="Cape Verde">Cape Verde</option>
            <option <?php if($country=="Cayman Islands")echo "selected='selected'";?> value="Cayman Islands">Cayman Islands</option>
            <option <?php if($country=="Central African Republic")echo "selected='selected'";?> value="Central African Republic">Central African Republic</option>
            <option <?php if($country=="Chad")echo "selected='selected'";?> value="Chad">Chad</option>
            <option <?php if($country=="Chile")echo "selected='selected'";?> value="Chile">Chile</option>
            <option <?php if($country=="China")echo "selected='selected'";?> value="China">China</option>
            <option <?php if($country=="Christmas Island")echo "selected='selected'";?> value="Christmas Island">Christmas Island</option>
            <option <?php if($country=="Cocos (Keeling) Island")echo "selected='selected'";?> value="Cocos (Keeling) Island">Cocos (Keeling) Islands</option>
            <option <?php if($country=="Colombia")echo "selected='selected'";?> value="Colombia">Colombia</option>
            <option <?php if($country=="Union of the Comoros")echo "selected='selected'";?> value="Union of the Comoros">Union of the Comoros</option>
            <option <?php if($country=="Congo")echo "selected='selected'";?> value="Congo">Congo</option>
            <option <?php if($country=="Cook Island")echo "selected='selected'";?> value="Cook Island">Cook Islands</option>
            <option <?php if($country=="Costa Rica")echo "selected='selected'";?> value="Costa Rica">Costa Rica</option>
            <option <?php if($country=="Croatia")echo "selected='selected'";?> value="Croatia">Croatia</option>
            <option <?php if($country=="Cuba")echo "selected='selected'";?> value="Cuba">Cuba</option>
            <option <?php if($country=="Cyprus")echo "selected='selected'";?> value="Cyprus">Cyprus</option>
            <option <?php if($country=="Czech Republic")echo "selected='selected'";?> value="Czech Republic">Czech Republic</option>
            <option <?php if($country=="Democratic Republic of Congo")echo "selected='selected'";?> value="Democratic Republic of Congo">Democratic Republic of Congo</option>
            <option <?php if($country=="Denmark")echo "selected='selected'";?> value="Denmark">Denmark</option>
            <option <?php if($country=="Disputed Territory")echo "selected='selected'";?> value="Disputed Territory">Disputed Territory</option>
            <option <?php if($country=="Djibouti")echo "selected='selected'";?> value="Djibouti">Djibouti</option>
            <option <?php if($country=="Dominica")echo "selected='selected'";?> value="Dominica">Dominica</option>
            <option <?php if($country=="Dominican Republic")echo "selected='selected'";?> value="Dominican Republic">Dominican Republic</option>
            <option <?php if($country=="East Timor")echo "selected='selected'";?> value="East Timor">East Timor</option>
            <option <?php if($country=="Ecuador")echo "selected='selected'";?> value="Ecuador">Ecuador</option>
            <option <?php if($country=="Egypt")echo "selected='selected'";?> value="Egypt">Egypt</option>
            <option <?php if($country=="El Salvador")echo "selected='selected'";?> value="El Salvador">El Salvador</option>
            <option <?php if($country=="Equatorial Guinea")echo "selected='selected'";?> value="Equatorial Guinea">Equatorial Guinea</option>
            <option <?php if($country=="Eritrea")echo "selected='selected'";?> value="Eritrea">Eritrea</option>
            <option <?php if($country=="Estonia")echo "selected='selected'";?> value="Estonia">Estonia</option>
            <option <?php if($country=="Ethiopia")echo "selected='selected'";?> value="Ethiopia">Ethiopia</option>
            <option <?php if($country=="Falkland Islands")echo "selected='selected'";?> value="Falkland Islands">Falkland Islands</option>
            <option <?php if($country=="Faroe Islands")echo "selected='selected'";?> value="Faroe Islands">Faroe Islands</option>
            <option <?php if($country=="Federated States of Micronesia")echo "selected='selected'";?> value="Federated States of Micronesia">Federated States of Micronesia</option>
            <option <?php if($country=="Fiji")echo "selected='selected'";?> value="Fiji">Fiji</option>
            <option <?php if($country=="Finland")echo "selected='selected'";?> value="Finland">Finland</option>
            <option <?php if($country=="France")echo "selected='selected'";?> value="France">France</option>
            <option <?php if($country=="French Guyana")echo "selected='selected'";?> value="French Guyana">French Guyana</option>
            <option <?php if($country=="French Polynesia")echo "selected='selected'";?> value="French Polynesia">French Polynesia</option>
            <option <?php if($country=="French Southern Territories")echo "selected='selected'";?> value="French Southern Territories">French Southern Territories</option>
            <option <?php if($country=="Gabon")echo "selected='selected'";?> value="Gabon">Gabon</option>
            <option <?php if($country=="Gambia")echo "selected='selected'";?> value="Gambia">Gambia</option>
            <option <?php if($country=="Georgia")echo "selected='selected'";?> value="Georgia">Georgia</option>
            <option <?php if($country=="Germany")echo "selected='selected'";?> value="Germany">Germany</option>
            <option <?php if($country=="Ghana")echo "selected='selected'";?> value="Ghana">Ghana</option>
            <option <?php if($country=="Gibraltar")echo "selected='selected'";?> value="Gibraltar">Gibraltar</option>
            <option <?php if($country=="Greece")echo "selected='selected'";?> value="Greece">Greece</option>
            <option <?php if($country=="Greenland")echo "selected='selected'";?> value="Greenland">Greenland</option>
            <option <?php if($country=="Grenada")echo "selected='selected'";?> value="Grenada">Grenada</option>
            <option <?php if($country=="Guadeloupe")echo "selected='selected'";?> value="Guadeloupe">Guadeloupe</option>
            <option <?php if($country=="Guam")echo "selected='selected'";?> value="Guam">Guam</option>
            <option <?php if($country=="Guatemala")echo "selected='selected'";?> value="Guatemala">Guatemala</option>
            <option <?php if($country=="Guinea")echo "selected='selected'";?> value="Guinea">Guinea</option>
            <option <?php if($country=="Guinea-Bissau")echo "selected='selected'";?> value="Guinea-Bissau">Guinea-Bissau</option>
            <option <?php if($country=="Guyana")echo "selected='selected'";?> value="Guyana">Guyana</option>
            <option <?php if($country=="Haiti")echo "selected='selected'";?> value="Haiti">Haiti</option>
            <option <?php if($country=="Heard Island and McDonald Islands")echo "selected='selected'";?> value="Heard Island and McDonald Islands">Heard Island and McDonald Islands</option>
            <option <?php if($country=="Honduras")echo "selected='selected'";?> value="Honduras">Honduras</option>
            <option <?php if($country=="Hong Kong")echo "selected='selected'";?> value="Hong Kong">Hong Kong</option>
            <option <?php if($country=="Hungary")echo "selected='selected'";?> value="Hungary">Hungary</option>
            <option <?php if($country=="Iceland")echo "selected='selected'";?> value="Iceland">Iceland</option>
            <option <?php if($country=="India")echo "selected='selected'";?> value="India">India</option>
            <option <?php if($country=="Indonesia")echo "selected='selected'";?> value="Indonesia">Indonesia</option>
            <option <?php if($country=="Iran")echo "selected='selected'";?> value="Iran">Iran</option>
            <option <?php if($country=="Iraq")echo "selected='selected'";?> value="Iraq">Iraq</option>
            <option <?php if($country=="Iraq-Saudi Arabia Neutral Zone")echo "selected='selected'";?> value="Iraq-Saudi Arabia Neutral Zone">Iraq-Saudi Arabia Neutral Zone</option>
            <option <?php if($country=="Ireland")echo "selected='selected'";?> value="Ireland">Ireland</option>
            <option <?php if($country=="Israel")echo "selected='selected'";?> value="Israel">Israel</option>
            <option <?php if($country=="Italy")echo "selected='selected'";?> value="Italy">Italy</option>
            <option <?php if($country=="Ivory Coast")echo "selected='selected'";?> value="Ivory Coast">Ivory Coast</option>
            <option <?php if($country=="Jamaica")echo "selected='selected'";?> value="Jamaica">Jamaica</option>
            <option <?php if($country=="Japan")echo "selected='selected'";?> value="Japan">Japan</option>
            <option <?php if($country=="Jordan")echo "selected='selected'";?> value="Jordan">Jordan</option>
            <option <?php if($country=="Kazakhstan")echo "selected='selected'";?> value="Kazakhstan">Kazakhstan</option>
            <option <?php if($country=="Kenya")echo "selected='selected'";?> value="Kenya">Kenya</option>
            <option <?php if($country=="Kiribati")echo "selected='selected'";?> value="Kiribati">Kiribati</option>
            <option <?php if($country=="Kuwait")echo "selected='selected'";?> value="Kuwait">Kuwait</option>
            <option <?php if($country=="Kyrgyz Republic")echo "selected='selected'";?> value="Kyrgyz Republic">Kyrgyz Republic</option>
            <option <?php if($country=="Laos")echo "selected='selected'";?> value="Laos">Laos</option>
            <option <?php if($country=="Latvia")echo "selected='selected'";?> value="Latvia">Latvia</option>
            <option <?php if($country=="Lebanon")echo "selected='selected'";?> value="Lebanon">Lebanon</option>
            <option <?php if($country=="Lesotho")echo "selected='selected'";?> value="Lesotho">Lesotho</option>
            <option <?php if($country=="Liberia")echo "selected='selected'";?> value="Liberia">Liberia</option>
            <option <?php if($country=="Libya")echo "selected='selected'";?> value="Libya">Libya</option>
            <option <?php if($country=="Liechtenstein")echo "selected='selected'";?> value="Liechtenstein">Liechtenstein</option>
            <option <?php if($country=="Lithuania")echo "selected='selected'";?> value="Lithuania">Lithuania</option>
            <option <?php if($country=="Luxembourg")echo "selected='selected'";?> value="Luxembourg">Luxembourg</option>
            <option <?php if($country=="Macau")echo "selected='selected'";?> value="Macau">Macau</option>
            <option <?php if($country=="Macedonia")echo "selected='selected'";?> value="Macedonia">Macedonia</option>
            <option <?php if($country=="Madagascar")echo "selected='selected'";?>value="Madagascar">Madagascar</option>
            <option <?php if($country=="Malawi")echo "selected='selected'";?> value="Malawi">Malawi</option>
            <option <?php if($country=="Malaysia")echo "selected='selected'";?> value="Malaysia">Malaysia</option>
            <option <?php if($country=="Maldives")echo "selected='selected'";?> value="Maldives">Maldives</option>
            <option <?php if($country=="Mali")echo "selected='selected'";?> value="Mali">Mali</option>
            <option <?php if($country=="Malta")echo "selected='selected'";?> value="Malta">Malta</option>
            <option <?php if($country=="Marshall Islands")echo "selected='selected'";?> value="Marshall Islands">Marshall Islands</option>
            <option <?php if($country=="Martinique")echo "selected='selected'";?> value="Martinique">Martinique</option>
            <option <?php if($country=="Mauritania")echo "selected='selected'";?> value="Mauritania">Mauritania</option>
            <option <?php if($country=="Mauritius")echo "selected='selected'";?> value="Mauritius">Mauritius</option>
            <option <?php if($country=="Mayotte")echo "selected='selected'";?> value="Mayotte">Mayotte</option>
            <option <?php if($country=="Mexico")echo "selected='selected'";?> value="Mexico">Mexico</option>
            <option <?php if($country=="Moldova")echo "selected='selected'";?> value="Moldova">Moldova</option>
            <option <?php if($country=="Monaco")echo "selected='selected'";?> value="Monaco">Monaco</option>
            <option <?php if($country=="Mongolia")echo "selected='selected'";?> value="Mongolia">Mongolia</option>
            <option <?php if($country=="Montserrat")echo "selected='selected'";?> value="Montserrat">Montserrat</option>
            <option <?php if($country=="Morocco")echo "selected='selected'";?> value="Morocco">Morocco</option>
            <option <?php if($country=="Mozambique")echo "selected='selected'";?> value="Mozambique">Mozambique</option>
            <option <?php if($country=="Myanmar")echo "selected='selected'";?> value="Myanmar">Myanmar</option>
            <option <?php if($country=="Namibia")echo "selected='selected'";?> value="Namibia">Namibia</option>
            <option <?php if($country=="Nauru")echo "selected='selected'";?> value="Nauru">Nauru</option>
            <option <?php if($country=="Nepal")echo "selected='selected'";?> value="Nepal">Nepal</option>
            <option <?php if($country=="Netherlands")echo "selected='selected'";?> value="Netherlands">Netherlands</option>
            <option <?php if($country=="Netherlands Antilles")echo "selected='selected'";?> value="Netherlands Antilles">Netherlands Antilles</option>
            <option <?php if($country=="New Caledonia")echo "selected='selected'";?> value="New Caledonia">New Caledonia</option>
            <option <?php if($country=="New Zealand")echo "selected='selected'";?> value="New Zealand">New Zealand</option>
            <option <?php if($country=="Nicaragua")echo "selected='selected'";?> value="Nicaragua">Nicaragua</option>
            <option <?php if($country=="Niger")echo "selected='selected'";?> value="Niger">Niger</option>
            <option <?php if($country=="Nigeria")echo "selected='selected'";?> value="Nigeria">Nigeria</option>
            <option <?php if($country=="Niue")echo "selected='selected'";?> value="Niue">Niue</option>
            <option <?php if($country=="Norfolk Island")echo "selected='selected'";?> value="Norfolk Island">Norfolk Island</option>
            <option <?php if($country=="North Korea")echo "selected='selected'";?> value="North Korea">North Korea</option>
            <option  <?php if($country=="Northern Mariana Islands")echo "selected='selected'";?> value="Northern Mariana Islands" >Northern Mariana Islands</option>
            <option <?php if($country=="Norway")echo "selected='selected'";?> value="Norway">Norway</option>
            <option <?php if($country=="Oman")echo "selected='selected'";?> value="Oman">Oman</option>
            <option <?php if($country=="Pakistan")echo "selected='selected'";?> value="Pakistan">Pakistan</option>
            <option <?php if($country=="Palau")echo "selected='selected'";?> value="Palau">Palau</option>
            <option <?php if($country=="Occupied Palestinian Territories")echo "selected='selected'";?> value="Occupied Palestinian Territories">Occupied Palestinian Territories</option>
            <option <?php if($country=="Panama")echo "selected='selected'";?> value="Panama">Panama</option>
            <option <?php if($country=="Papua New Guinea")echo "selected='selected'";?> value="Papua New Guinea">Papua New Guinea</option>
            <option <?php if($country=="Paraguay")echo "selected='selected'";?> value="Paraguay">Paraguay</option>
            <option <?php if($country=="Peru")echo "selected='selected'";?> value="Peru">Peru</option>
            <option <?php if($country=="Philippines")echo "selected='selected'";?> value="Philippines">Philippines</option>
            <option <?php if($country=="Pitcairn Islands")echo "selected='selected'";?> value="Pitcairn Islands">Pitcairn Islands</option>
            <option <?php if($country=="Poland")echo "selected='selected'";?> value="Poland">Poland</option>
            <option <?php if($country=="Portugal")echo "selected='selected'";?> value="Portugal">Portugal</option>
            <option <?php if($country=="Puerto Rico")echo "selected='selected'";?> value="Puerto Rico">Puerto Rico</option>
            <option <?php if($country=="Qatar")echo "selected='selected'";?> value="Qatar">Qatar</option>
            <option <?php if($country=="Reunion")echo "selected='selected'";?> value="Reunion">Reunion</option>
            <option <?php if($country=="Romania")echo "selected='selected'";?> value="Romania">Romania</option>
            <option <?php if($country=="Russia")echo "selected='selected'";?> value="Russia">Russia</option>
            <option <?php if($country=="Rwanda")echo "selected='selected'";?> value="Rwanda">Rwanda</option>
            <option <?php if($country=="Saint Helena and Dependencies")echo "selected='selected'";?> value="Saint Helena and Dependencies">Saint Helena and Dependencies</option>
            <option <?php if($country=="Saint Kitts & Nevis")echo "selected='selected'";?> value="Saint Kitts & Nevis">Saint Kitts & Nevis</option>
            <option <?php if($country=="Saint Lucia")echo "selected='selected'";?> value="Saint Lucia">Saint Lucia</option>
            <option <?php if($country=="Saint Pierre and Miquelon")echo "selected='selected'";?> value="Saint Pierre and Miquelon">Saint Pierre and Miquelon</option>
            <option <?php if($country=="Saint Vincent and the Grenadines")echo "selected='selected'";?> value="Saint Vincent and the Grenadines">Saint Vincent and the Grenadines</option>
            <option <?php if($country=="Samoa")echo "selected='selected'";?> value="Samoa">Samoa</option>
			            <option <?php if($country=="Sujiviru")echo "selected='selected'";?> value="Sujiviru">Sujiviru</option>
            <option <?php if($country=="San Marino")echo "selected='selected'";?> value="San Marino">San Marino</option>
            <option <?php if($country=="Sao Tome and Principe")echo "selected='selected'";?> value="Sao Tome and Principe">Sao Tome and Principe</option>
            <option <?php if($country=="Saudi Arabia")echo "selected='selected'";?> value="Saudi Arabia">Saudi Arabia</option>
            <option <?php if($country=="Senegal")echo "selected='selected'";?> value="Senegal">Senegal</option>
            <option <?php if($country=="Seychelles")echo "selected='selected'";?> value="Seychelles">Seychelles</option>
            <option <?php if($country=="Sierra Leone")echo "selected='selected'";?> value="Sierra Leone">Sierra Leone</option>
            <option <?php if($country=="Singapore")echo "selected='selected'";?> value="Singapore">Singapore</option>
            <option <?php if($country=="Slovakia")echo "selected='selected'";?> value="Slovakia">Slovakia</option>
            <option <?php if($country=="Slovenia")echo "selected='selected'";?> value="Slovenia">Slovenia</option>
            <option <?php if($country=="Solomon Islands")echo "selected='selected'";?> value="Solomon Islands">Solomon Islands</option>
            <option <?php if($country=="Somalia")echo "selected='selected'";?> value="Somalia">Somalia</option>
            <option <?php if($country=="South Africa")echo "selected='selected'";?> value="South Africa">South Africa</option>
            <option <?php if($country=="South Georgia and the South Sandwich Islands")echo "selected='selected'";?> value="South Georgia and the South Sandwich Islands">South Georgia and the South Sandwich Islands</option>
            <option <?php if($country=="South Korea")echo "selected='selected'";?> value="South Korea">South Korea</option>
            <option <?php if($country=="Spain")echo "selected='selected'";?> value="Spain">Spain</option>
            <option <?php if($country=="Spratly Islands")echo "selected='selected'";?> value="Spratly Islands">Spratly Islands</option>
            <option <?php if($country=="Sri Lanka")echo "selected='selected'";?> value="Sri Lanka">Sri Lanka</option>
            <option <?php if($country=="Sudan")echo "selected='selected'";?> value="Sudan">Sudan</option>
            <option <?php if($country=="Suriname")echo "selected='selected'";?> value="Suriname">Suriname</option>
            <option <?php if($country=="Svalbard and Jan Mayen Islands")echo "selected='selected'";?> value="Svalbard and Jan Mayen Islands">Svalbard and Jan Mayen Islands</option>
            <option <?php if($country=="Swaziland")echo "selected='selected'";?> value="Swaziland">Swaziland</option>
            <option <?php if($country=="Sweden")echo "selected='selected'";?> value="Sweden">Sweden</option>
            <option <?php if($country=="Switzerland")echo "selected='selected'";?> value="Switzerland">Switzerland</option>
            <option <?php if($country=="Syria")echo "selected='selected'";?> value="Syria">Syria</option>
            <option <?php if($country=="Taiwan")echo "selected='selected'";?> value="Taiwan">Taiwan</option>
            <option <?php if($country=="Tajikistan")echo "selected='selected'";?> value="Tajikistan">Tajikistan</option>
            <option <?php if($country=="Tanzania")echo "selected='selected'";?> value="Tanzania">Tanzania</option>
            <option <?php if($country=="Thailand")echo "selected='selected'";?> value="Thailand">Thailand</option>
            <option <?php if($country=="Togo")echo "selected='selected'";?> value="Togo">Togo</option>
            <option <?php if($country=="Tokelau")echo "selected='selected'";?> value="Tokelau">Tokelau</option>
            <option <?php if($country=="Tonga")echo "selected='selected'";?> value="Tonga">Tonga</option>
            <option <?php if($country=="Trinidad and Tobago")echo "selected='selected'";?> value="Trinidad and Tobago">Trinidad and Tobago</option>
            <option <?php if($country=="Tunisia")echo "selected='selected'";?> value="Tunisia">Tunisia</option>
            <option <?php if($country=="Turkey")echo "selected='selected'";?> value="Turkey">Turkey</option>
            <option <?php if($country=="Turkmenistan")echo "selected='selected'";?> value="Turkmenistan">Turkmenistan</option>
            <option <?php if($country=="Turks and Caicos Islands")echo "selected='selected'";?> value="Turks and Caicos Islands">Turks and Caicos Islands</option>
            <option <?php if($country=="Tuvalu")echo "selected='selected'";?> value="Tuvalu">Tuvalu</option>
            <option <?php if($country=="Uganda")echo "selected='selected'";?> value="Uganda">Uganda</option>
            <option <?php if($country=="Ukraine")echo "selected='selected'";?> value="Ukraine">Ukraine</option>
            <option <?php if($country=="United Arab Emirates")echo "selected='selected'";?> value="United Arab Emirates">United Arab Emirates</option>
            <option <?php if($country=="United Kingdom")echo "selected='selected'";?> value="United Kingdom">United Kingdom</option>
            <option <?php if($country=="United Nations Neutral Zone")echo "selected='selected'";?> value="United Nations Neutral Zone">United Nations Neutral Zone</option>
            <option <?php if($country=="United States")echo "selected='selected'";?> value="United States">United States</option>
            <option <?php if($country=="United States Minor Outlying Islands")echo "selected='selected'";?> value="United States Minor Outlying Islands">United States Minor Outlying Islands</option>
            <option <?php if($country=="Uruguay")echo "selected='selected'";?> value="Uruguay">Uruguay</option>
            <option <?php if($country=="US Virgin Islands")echo "selected='selected'";?> value="US Virgin Islands">US Virgin Islands</option>
            <option <?php if($country=="Uzbekistan")echo "selected='selected'";?> value="Uzbekistan">Uzbekistan</option>
            <option <?php if($country=="Vanuatu")echo "selected='selected'";?> value="Vanuatu">Vanuatu</option>
            <option <?php if($country=="Vatican City")echo "selected='selected'";?> value="Vatican City">Vatican City</option>
            <option <?php if($country=="Venezuela")echo "selected='selected'";?> value="Venezuela">Venezuela</option>
            <option <?php if($country=="Vietnam")echo "selected='selected'";?> value="Vietnam">Vietnam</option>
            <option <?php if($country=="Wallis and Futuna Islands")echo "selected='selected'";?> value="Wallis and Futuna Islands">Wallis and Futuna Islands</option>
            <option <?php if($country=="Western Sahara")echo "selected='selected'";?> value="Western Sahara">Western Sahara</option>
            <option <?php if($country=="Yemen")echo "selected='selected'";?> value="Yemen">Yemen</option>
            <option <?php if($country=="Zambia")echo "selected='selected'";?> value="Zambia">Zambia</option>
            <option <?php if($country=="Zimbabwe")echo "selected='selected'";?> value="Zimbabwe">Zimbabwe</option>
            <option <?php if($country=="Serbia")echo "selected='selected'";?> value="Serbia">Serbia</option>
            <option <?php if($country=="Montenegro")echo "selected='selected'";?> value="Montenegro">Montenegro</option>
          </select></td>
   </tr>
   <tr>
    <td><font face="Tahoma, Arial, sans-serif" color="#fafafa" size="2">City:</font></td>
    <td colspan="3"><input type="text" name="city" id="city" maxlength="40" class="edit_box" value="<?php echo $city;?>" tabindex="10"/></td>
  </tr>
   <tr>
     <td colspan="4">&nbsp;</td>
   </tr>
  <tr>
    <td><font face="Tahoma, Arial, sans-serif" color="#fafafa" size="2">About me:</font> </td>
    <td colspan="3"><textarea cols="36"  rows="4" id="aboutMe" name="aboutMe" class="edit_style" tabindex="11"><?php echo $about_me;?></textarea></td>
  </tr>
  <tr>
    <td><font face="Tahoma, Arial, sans-serif" color="#fafafa" size="2">Relationship status:</font> </td>
    <td colspan="3"><select class="edit_select" name="relationship_status" id="relationship_status" tabindex="12">
<option value="No answer" <?php if($relationship_status=="No answer")echo "selected='selected'";?>>no answer</option>
<option  value="Single" <?php if($relationship_status=="Single")echo "selected='selected'";?>>single</option>
<option value="Married" <?php if($relationship_status=="Married")echo "selected='selected'";?> >married</option>
</select></td>
  </tr>
  <tr>
    <td><font face="Tahoma, Arial, sans-serif" color="#fafafa" size="2">High school:</font> </td>
    <td colspan="3"><input type="text" name="high_school" id="city" maxlength="40" class="edit_box"   value="<?php echo $high_school;?>" tabindex="13"/></td>
  </tr>
  <tr>
    <td><font face="Tahoma, Arial, sans-serif" color="#fafafa" size="2">College/University:</font></td>
    <td ><input name="college" type="text" class="edit_box" id="college" maxlength="40" value="<?php echo $college ;?>" tabindex="14"/></td><td><font face="Tahoma, Arial, sans-serif" color="#fafafa" size="2">Company/Organization:</font></td><td><input name="company" type="text" class="edit_box" id="company" maxlength="40" value="<?php echo $company; ?>" tabindex="15"/></td>
  </tr><tr>
    <td><font face="Tahoma, Arial, sans-serif" color="#fafafa" size="2">Hobbies:</font></td><td colspan="3"><input name="hobbies" type="text" class="edit_box" id="hobbies" maxlength="100" value="<?php echo $hobbies;?>" tabindex="16"/>
	</td>
    
  </tr><tr>
    <td><font face="Tahoma, Arial, sans-serif" color="#fafafa" size="2">Contact No:</font> </td>
    <td><input type="text" name="contact_no" id="contact_no" maxlength="15"  class="edit_box"  value="<?php echo $contact_no;?>" tabindex="17"/></td>
    <td><font face="Tahoma, Arial, sans-serif" color="#fafafa" size="2">Alternate contact no:</font> </td>
    <td><input type="text" name="alt_contact_no" id="alt_contact_no" maxlength="15" class="edit_box"  value="<?php echo $alt_contact_no;?>" tabindex="18"/></td>
  </tr>
  <tr>
    <td><font face="Tahoma, Arial, sans-serif" color="#fafafa" size="2">Alternate email id: </font></td>
    <td colspan="3"><input type="text" name="alt_email" id="alt_email" maxlength="40" class="edit_box" value="<?php echo $alt_email_id;?>" tabindex="19"></td>
  </tr>
  <tr>


    <td colspan="4" align="center">	<br />
<br />
<input type="submit" name="submit2" id="submit" value="Update"  class="scrapbook_button" tabindex="20"/></td>
  </tr>
</table>
		
	</form>	
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
			<a href="friend_list.php?user_id=<?php echo $user_id;?>&friendlist_page=1">View all...</a></div>
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