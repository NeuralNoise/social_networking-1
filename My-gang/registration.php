
<html><head>
<meta http-equiv="Content-Type" content="text/html;charset=iso-8859-1" />
<meta http-equiv="Content-Style-Type" content="text/css" /><title>Joining My-gang</title>

<link rel="stylesheet" href="style1.css" type="text/css" media="screen" />
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

function ValidateForm(){

	var emailID=document.reg_form.email_id
	var username=document.avail_form.user_name
	var fname=document.reg_form.first_name
	var lname=document.reg_form.last_name
	var year=document.reg_form.byear
	var city=document.reg_form.city
	var pwd=document.reg_form.password
	var rpwd=document.reg_form.rpassword
	var secans=document.reg_form.sec_ans
	var bday=document.reg_form.bday

	if ((username.value==null)||(username.value=="")){
		alert("Please Enter your User-Name!")
		user_name.focus()
		return false
	}
	
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

	if ((fname.value==null)||(fname.value=="")){
		alert("Please Enter your First Name!")
		first_name.focus()
		return false
	}
	
	if ((lname.value==null)||(lname.value=="")){
		alert("Please Enter your Last Name!")
		last_name.focus()
		return false
	}
		if (((document.reg_form.bday).value==null)||((document.reg_form.bday).value=="")){
		alert("Please Enter Birth-Date!")
		bday.focus()
		return false
	}
	
	
		if ((year.value==null)||(year.value=="")){
		alert("Please Enter your year!")
		byear.focus()
		return false
	}
	if ((city.value==null)||(city.value=="")){
		alert("Please Enter your City Name!")
		city.focus()
		return false
	}
	

	if ((pwd.value==null)||(pwd.value=="")){
		alert("Please Enter your Password!")
		password.focus()
		return false
	}
	
	
	if ((rpwd.value==null)||(rpwd.value=="")){
		alert("Please Enter Re-Enter Your Password!")
		rpassword.focus()
		return false
	}
	if (((document.reg_form.sec_ans).value==null)||((document.reg_form.sec_ans).value=="")){
		alert("Please Enter Security Answer!")
		sec_ans.focus()
		return false
	}
	
	if(pwd.value==rpwd.value)
	{		
	return true
	}
	else
	{
	alert("Passwords Does Not Match!")
	password.focus()
	return false
	}
	
	
 }

</script>
</head>



<body>
<div id="container">
<div id="page_header">
<div id="company_name">
<h1><span>My-gang</span></h1>
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
<a href="index.php">Home</a><br />
<br /><hr color="#605f5e"/>
<a href="#"><br>
About us </a><br />
</div>
</div>
</div>
 </div>

<div id="main_content">
<div class="content_header">
<h2><span>Join our Gang </span></h2>
</div>
<div class="content_box_right">
<div class="content_box_left">
<div class="content_box">
<div id="main_content_border">


<div id="signupbox_left">
<div id="signupbox_right">
  <div id="signupbox">
    
      <div class="signupbox_formfield"> <br />
        <br>
<br><font face="Tahoma, Arial, sans-serif" color="#fafafa" size="9"><b>
<table width="100%" border="0">
  <tr>
    <td width="25%"><font face="Tahoma, Arial, sans-serif" color="#fafafa" size="2">User Name:</font></td>
    <td colspan="3"> 
	<form name="avail_form" action="check_user_avail.php" method="post">
<?php
if(isset($_GET['user_name']))
$check_user_name=$_GET['user_name'];
?>
<input type="text" id="user_name" name="user_name" value="<?php 
if(isset($_GET['user_name']))
{
$check_user_name=$_GET['user_name'];  
echo $check_user_name;
}
else echo"User Name...";?>"  onSelect=" " onfocus="this.value=(this.value==this.defaultValue)?'':this.value;" tabindex="1" />
              &nbsp;&nbsp;&nbsp;&nbsp;
              <input type="submit" name="check_availability" value="Check availability" tabindex="2"/>
            </form></td>
  </tr>
  <tr>
    <td colspan="4">
	<?php if(isset($_GET["msg"]) && $_GET["msg"]=="fail")
	 {	 
		echo "User name is already exist please choose another user name";
		$check_user_name="User name..";
	 }	 	
			  else if(isset($_GET["msg"]) && $_GET["msg"]=="suc")
			 { 
			 $check_user_name=$_GET['user_name'];

				
			  	echo "User name is available";
			 }
			 else
			 {	echo " ";
			}		
?></td>
  </tr>
  <tr>
  
    <td>
	<form  action="registration_action.php?user_name=<?php echo $check_user_name;?>" name="reg_form" method="post" id="reg_form" onSubmit="return ValidateForm()">
	<font face="Tahoma, Arial, sans-serif" color="#fafafa" size="2">My name:</font></td>
    <td width="25%"><input type="text" id="first_name" name="first_name" value="First name" onselect=" " onfocus="this.value=(this.value==this.defaultValue)?'':this.value;" tabindex="3" /></td>
    <td colspan="2"><input type="text" id="last_name" name="last_name" value="Last name" onselect=" " onfocus="this.value=(this.value==this.defaultValue)?'':this.value;" tabindex="4"/></td>
 
  <tr>
    <td><font face="Tahoma, Arial, sans-serif" color="#fafafa" size="2">Gender:</font></td>
    <td colspan="3"><select name="gender" id="gender" tabindex="5" >
          <option value="Male" selected="selected">Male</option>
          <option value="Female">Female</option>
        </select></td>
  </tr>
  <tr>
    <td> <font face="Tahoma, Arial, sans-serif" color="#fafafa" size="2">Birthday: </font></td>
    <td><input name="bday" type="text" id="bday" value="Day" size="5" maxlength="2" onfocus="this.value=(this.value==this.defaultValue)?'':this.value;" tabindex="6" /></td>
    <td width="25%"><select name="bmonth" id="bmonth" class="" 

tabindex="7">
          <option value="" selected="selected"> Month </option>
          <option value="January">January</option>
          <option value="February">February</option>
          <option value="March">March</option>
          <option value="April">April</option>
          <option value="May">May</option>
          <option value="June">June</option>
          <option value="July">July</option>
          <option value="August">August</option>
          <option value="September">September</option>
          <option value="October">October</option>
          <option value="November">November</option>
          <option value="December">December</option>
        </select></td>
    <td width="25%"><input name="byear" type="text" id="byear" value="Year" size="5" maxlength="4" onfocus="this.value=(this.value==this.defaultValue)?'':this.value;" tabindex="8" /></td>
  </tr>
  <tr>
    <td><font face="Tahoma, Arial, sans-serif" color="#fafafa" size="2">Country:</font></td>
    <td> <select name="country" id="country" tabindex="9">
            <option value="Afghanistan">Afghanistan</option>
            <option value="Aland Islands">Aland Islands</option>
            <option value="Albania">Albania</option>
            <option value="Algeria">Algeria</option>
            <option value="American Samoa">American Samoa</option>
            <option value="Andorra">Andorra</option>
            <option value="Angola">Angola</option>
            <option value="Anguilla">Anguilla</option>
            <option value="Antarctica">Antarctica</option>
            <option value="Antigua and Barbuda">Antigua and Barbuda</option>
            <option value="Argentina">Argentina</option>
            <option value="Armenia">Armenia</option>
            <option value="Aruba">Aruba</option>
            <option value="Australia">Australia</option>
            <option value="Austria">Austria</option>
            <option value="Azerbaijan">Azerbaijan</option>
            <option value="Bahamas">Bahamas</option>
            <option value="Bahrain">Bahrain</option>
            <option value="Bangladesh">Bangladesh</option>
            <option value="Barbados">Barbados</option>
            <option value="Belarus">Belarus</option>
            <option value="Belgium">Belgium</option>
            <option value="Belize">Belize</option>
            <option value="Benin">Benin</option>
            <option value="Bermuda">Bermuda</option>
            <option value="Bhutan">Bhutan</option>
            <option value="Bolivia">Bolivia</option>
            <option value="Bosnia and Herzegovina">Bosnia and Herzegovina</option>
            <option value="Botswana">Botswana</option>
            <option value="Bouvet Island">Bouvet Island</option>
            <option value="Brazil">Brazil</option>
            <option value="British Indian Ocean Territory">British Indian Ocean Territory</option>
            <option value="British Virgin Islands">British Virgin Islands</option>
            <option value="Brunei">Brunei</option>
            <option value="Bulgaria">Bulgaria</option>
            <option value="Burkina Faso">Burkina Faso</option>
            <option value="Burundi">Burundi</option>
            <option value="Cambodia">Cambodia</option>
            <option value="Cameroon">Cameroon</option>
            <option value="Canada">Canada</option>
            <option value="Cape Verde">Cape Verde</option>
            <option value="Cayman Islands">Cayman Islands</option>
            <option value="Central African Republic">Central African Republic</option>
            <option value="Chad">Chad</option>
            <option value="Chile">Chile</option>
            <option value="China">China</option>
            <option value="Christmas Island">Christmas Island</option>
            <option value="Cocos (Keeling) Island">Cocos (Keeling) Islands</option>
            <option value="Colombia">Colombia</option>
            <option value="Union of the Comoros">Union of the Comoros</option>
            <option value="Congo">Congo</option>
            <option value="Cook Island">Cook Islands</option>
            <option value="Costa Rica">Costa Rica</option>
            <option value="Croatia">Croatia</option>
            <option value="Cuba">Cuba</option>
            <option value="Cyprus">Cyprus</option>
            <option value="Czech Republic">Czech Republic</option>
            <option value="Democratic Republic of Congo">Democratic Republic of Congo</option>
            <option value="Denmark">Denmark</option>
            <option value="Disputed Territory">Disputed Territory</option>
            <option value="Djibouti">Djibouti</option>
            <option value="Dominica">Dominica</option>
            <option value="Dominican Republi">Dominican Republic</option>
            <option value="East Timor">East Timor</option>
            <option value="Ecuador">Ecuador</option>
            <option value="Egypt">Egypt</option>
            <option value="El Salvador">El Salvador</option>
            <option value="Equatorial Guinea">Equatorial Guinea</option>
            <option value="Eritrea">Eritrea</option>
            <option value="Estonia">Estonia</option>
            <option value="Ethiopia">Ethiopia</option>
            <option value="Falkland Islands">Falkland Islands</option>
            <option value="Faroe Islands">Faroe Islands</option>
            <option value="Federated States of Micronesia">Federated States of Micronesia</option>
            <option value="Fiji">Fiji</option>
            <option value="Finland">Finland</option>
            <option value="France">France</option>
            <option value="French Guyana">French Guyana</option>
            <option value="French Polynesia">French Polynesia</option>
            <option value="French Southern Territories">French Southern Territories</option>
            <option value="Gabon">Gabon</option>
            <option value="Gambia">Gambia</option>
            <option value="Georgia">Georgia</option>
            <option value="Germany">Germany</option>
            <option value="Ghana">Ghana</option>
            <option value="Gibraltar">Gibraltar</option>
            <option value="Greece">Greece</option>
            <option value="Greenland">Greenland</option>
            <option value="Grenada">Grenada</option>
            <option value="Guadeloupe">Guadeloupe</option>
            <option value="Guam">Guam</option>
            <option value="Guatemala">Guatemala</option>
            <option value="Guinea">Guinea</option>
            <option value="Guinea-Bissau">Guinea-Bissau</option>
            <option value="Guyana">Guyana</option>
            <option value="Haiti">Haiti</option>
            <option value="Heard Island and McDonald Islands">Heard Island and McDonald Islands</option>
            <option value="Honduras">Honduras</option>
            <option value="Hong Kong">Hong Kong</option>
            <option value="Hungary">Hungary</option>
            <option value="Iceland">Iceland</option>
            <option selected="" value="India">India</option>
            <option value="Indonesia">Indonesia</option>
            <option value="Iran">Iran</option>
            <option value="Iraq">Iraq</option>
            <option value="Iraq-Saudi Arabia Neutral Zone">Iraq-Saudi Arabia Neutral Zone</option>
            <option value="Ireland">Ireland</option>
            <option value="Israel">Israel</option>
            <option value="Italy">Italy</option>
            <option value="Ivory Coast">Ivory Coast</option>
            <option value="Jamaica">Jamaica</option>
            <option value="Japan">Japan</option>
            <option value="Jordan">Jordan</option>
            <option value="Kazakhstan">Kazakhstan</option>
            <option value="Kenya">Kenya</option>
            <option value="Kiribati">Kiribati</option>
            <option value="Kuwait">Kuwait</option>
            <option value="Kyrgyz Republic">Kyrgyz Republic</option>
            <option value="Laos">Laos</option>
            <option value="Latvia">Latvia</option>
            <option value="Lebanon">Lebanon</option>
            <option value="Lesotho">Lesotho</option>
            <option value="Liberia">Liberia</option>
            <option value="Libya">Libya</option>
            <option value="Liechtenstein">Liechtenstein</option>
            <option value="Lithuania">Lithuania</option>
            <option value="Luxembourg">Luxembourg</option>
            <option value="Macau">Macau</option>
            <option value="Macedonia">Macedonia</option>
            <option value="Madagascar">Madagascar</option>
            <option value="Malawi">Malawi</option>
            <option value="Malaysia">Malaysia</option>
            <option value="Maldives">Maldives</option>
            <option value="Mali">Mali</option>
            <option value="Malta">Malta</option>
            <option value="Marshall Islands">Marshall Islands</option>
            <option value="Martinique">Martinique</option>
            <option value="Mauritania">Mauritania</option>
            <option value="Mauritius">Mauritius</option>
            <option value="Mayotte">Mayotte</option>
            <option value="Mexico">Mexico</option>
            <option value="Moldova">Moldova</option>
            <option value="Monaco">Monaco</option>
            <option value="Mongolia">Mongolia</option>
            <option value="Montserrat">Montserrat</option>
            <option value="Morocco">Morocco</option>
            <option value="Mozambique">Mozambique</option>
            <option value="Myanmar">Myanmar</option>
            <option value="Namibia">Namibia</option>
            <option value="Nauru">Nauru</option>
            <option value="Nepal">Nepal</option>
            <option value="Netherlands">Netherlands</option>
            <option value="Netherlands Antilles">Netherlands Antilles</option>
            <option value="New Caledonia">New Caledonia</option>
            <option value="New Zealand">New Zealand</option>
            <option value="Nicaragua">Nicaragua</option>
            <option value="Niger">Niger</option>
            <option value="Nigeria">Nigeria</option>
            <option value="Niue">Niue</option>
            <option value="Norfolk Island">Norfolk Island</option>
            <option value="North Korea">North Korea</option>
            <option value="Northern Mariana Islands<">Northern Mariana Islands</option>
            <option value="Norway">Norway</option>
            <option value="Oman">Oman</option>
            <option value="Pakistan">Pakistan</option>
            <option value="Palau">Palau</option>
            <option value="Occupied Palestinian Territories">Occupied Palestinian Territories</option>
            <option value="Panama">Panama</option>
            <option value="Papua New Guinea">Papua New Guinea</option>
            <option value="Paraguay">Paraguay</option>
            <option value="Peru">Peru</option>
            <option value="Philippines">Philippines</option>
            <option value="Pitcairn Islands">Pitcairn Islands</option>
            <option value="Poland">Poland</option>
            <option value="Portugal">Portugal</option>
            <option value="Puerto Rico">Puerto Rico</option>
            <option value="Qatar">Qatar</option>
            <option value="Reunion">Reunion</option>
            <option value="Romania">Romania</option>
            <option value="Russia">Russia</option>
            <option value="Rwanda">Rwanda</option>
            <option value="Saint Helena and Dependencies">Saint Helena and Dependencies</option>
            <option value="Saint Kitts & Nevis">Saint Kitts & Nevis</option>
            <option value="Saint Lucia">Saint Lucia</option>
            <option value="Saint Pierre and Miquelon">Saint Pierre and Miquelon</option>
            <option value="Saint Vincent and the Grenadines">Saint Vincent and the Grenadines</option>
            <option value="Samoa">Samoa</option>
            <option value="Sujiviru">Sujiviru</option>
            <option value="San Marino">San Marino</option>
            <option value="Sao Tome and Principe">Sao Tome and Principe</option>
            <option value="Saudi Arabia">Saudi Arabia</option>
            <option value="Senegal">Senegal</option>
            <option value="Seychelles">Seychelles</option>
            <option value="Sierra Leone">Sierra Leone</option>
            <option value="Singapore">Singapore</option>
            <option value="Slovakia">Slovakia</option>
            <option value="Slovenia">Slovenia</option>
            <option value="Solomon Islands">Solomon Islands</option>
            <option value="Somalia">Somalia</option>
            <option value="South Africa">South Africa</option>
            <option value="South Georgia and the South Sandwich Islands">South Georgia and the South Sandwich Islands</option>
            <option value="South Korea">South Korea</option>
            <option value="Spain">Spain</option>
            <option value="Spratly Islands">Spratly Islands</option>
            <option value="Sri Lanka">Sri Lanka</option>
            <option value="Sudan">Sudan</option>
            <option value="Suriname">Suriname</option>
            <option value="Svalbard and Jan Mayen Islands">Svalbard and Jan Mayen Islands</option>
            <option value="Swaziland">Swaziland</option>
            <option value="Sweden">Sweden</option>
            <option value="Switzerland">Switzerland</option>
            <option value="Syria">Syria</option>
            <option value="Taiwan">Taiwan</option>
            <option value="Tajikistan">Tajikistan</option>
            <option value="Tanzania">Tanzania</option>
            <option value="Thailand">Thailand</option>
            <option value="Togo">Togo</option>
            <option value="Tokelau">Tokelau</option>
            <option value="Tonga">Tonga</option>
            <option value="Trinidad and Tobago">Trinidad and Tobago</option>
            <option value="Tunisia">Tunisia</option>
            <option value="Turkey">Turkey</option>
            <option value="Turkmenistan">Turkmenistan</option>
            <option value="Turks and Caicos Islands">Turks and Caicos Islands</option>
            <option value="Tuvalu">Tuvalu</option>
            <option value="Uganda">Uganda</option>
            <option value="Ukraine">Ukraine</option>
            <option value="United Arab Emirates">United Arab Emirates</option>
            <option value="United Kingdom">United Kingdom</option>
            <option value="United Nations Neutral Zone">United Nations Neutral Zone</option>
            <option value="United States">United States</option>
            <option value="United States Minor Outlying Islands">United States Minor Outlying Islands</option>
            <option value="Uruguay">Uruguay</option>
            <option value="US Virgin Islands">US Virgin Islands</option>
            <option value="Uzbekistan">Uzbekistan</option>
            <option value="Vanuatu">Vanuatu</option>
            <option value="Vatican City">Vatican City</option>
            <option value="Venezuela">Venezuela</option>
            <option value="Vietnam">Vietnam</option>
            <option value="Wallis and Futuna Islands">Wallis and Futuna Islands</option>
            <option value="Western Sahara">Western Sahara</option>
            <option value="Yemen">Yemen</option>
            <option value="Zambia">Zambia</option>
            <option value="Zimbabwe">Zimbabwe</option>
            <option value="Serbia">Serbia</option>
            <option value="Montenegro">Montenegro</option>
          </select></td>
    <td><font face="Tahoma, Arial, sans-serif" color="#fafafa" size="2">City:</font></td>
    <td><input type="text" name="city" id="city" maxlength="25" onfocus="this.value=(this.value==this.defaultValue)?'':this.value;" tabindex="10" /></td>
  </tr>
  <tr>
    <td><font face="Tahoma, Arial, sans-serif" color="#fafafa" size="2">Enter your Email ID:</font></td>
    <td colspan="3"><input type="text" name="email_id" id="email_id" maxlength="25" tabindex="11" /></td>
  </tr>
  <tr>
    <td><font face="Tahoma, Arial, sans-serif" color="#fafafa" size="2">Password:</font></td>
    <td colspan="3"><input type="password" name="password" id="password" maxlength="25"  onkeyup="passwordStrength(this.value)" tabindex="12"  /></td>
  </tr>
  <tr>
    <td colspan="4"><div id="passwordDescription"> Password not entered</div></td>
  </tr>
  <tr>
    <td colspan="4"><div id="passwordStrength" class="strength0"></div></td>
  </tr>
  <tr>
    <td><font face="Tahoma, Arial, sans-serif" color="#fafafa" size="2">Retype password:</font></td>
    <td colspan="3"> <input type="password" name="rpassword" id="rpassword" maxlength="25" tabindex="13"/></td>
  </tr>
  
   <tr>
    <td colspan="4">&nbsp;</td>
  </tr>
  <tr> 
  <td><font face="Tahoma, Arial, sans-serif" color="#fafafa" size="2">Security question:</font></td>
    <td colspan="3"> 
	<select name="sec_que" id="sec_que" tabindex="14" >
          <option value="0" selected="selected">- Select One -</option>
		  <option  value="1">What town were you born in?</option>
          <option value="2">What town was your father born in?</option>       
		<option value="3">What is the name of the hospital in which you were born?</option>        
		<option value="4">What is the first name of your best childhood friend?</option>        
		<option value="5">What was the name of your primary school?</option>
        <option value="6">What town was your mother born in?</option>       
		 <option value="7">What is the name of the first company / organization you worked for?</option>       
        </select>
	</td>
  </tr>
  <tr> 
  <td><font face="Tahoma, Arial, sans-serif" color="#fafafa" size="2">Answer:</font></td>
    <td colspan="3"> <input type="text" name="sec_ans" id="sec_ans" maxlength="25" tabindex="15"/></td>
  </tr>
  <tr>
    <td colspan="4">&nbsp;</td>
  </tr>
  <tr>
    <td><input type="submit" name="submit" value="Create an account" tabindex="16"/></td>
    <td colspan="3"><input type="reset" name="reset" value="Clear fields" tabindex="17"  /></td>
  </tr>
</table>
          </b></font><div class="clearthis">&nbsp;</div>
      </div>
    </form>
  </div>
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