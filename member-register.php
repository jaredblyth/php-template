<?php ob_start(); ?>

<!DOCTYPE html>
<html>
<head>

<?php include("inc/meta.php"); ?>

<Title>
<?php include("inc/page-index.php"); ?>
</Title>

<?php include("inc/stylesheet.php"); ?>

<?php include("inc/head.php"); ?>
</head>

<body>

<?php include("inc/background-image.php"); ?>

<div id="container">
<?php include("inc/header.php"); ?>
<?php include("inc/widemenu.php"); ?>
<?php include("inc/sidebar-left.php"); ?>


<div id="content">
<?php include("inc/plugin01.php"); ?>

<?php // 
/* This page lets people register for the site. */

// Set the page title and include the header file:
define('TITLE', 'Register');


// Print some introductory text:
print '<h2>Registration Form</h2>
	<p><font color="red">Register so that you can access our members area and take advantage of our special features.</font></p>';
	
// Add the CSS:
print '<style type="text/css" media="screen">
	.error { color: red; }
</style>';

// Check if the form has been submitted:
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

	$problem = FALSE; // No problems so far.
	
	// Check for each value...
	if (empty($_POST['first_name'])) {
		$problem = TRUE;
		print '<p class="error">Please enter your first name!</p>';
	}
	
	if (empty($_POST['last_name'])) {
		$problem = TRUE;
		print '<p class="error">Please enter your last name!</p>';
	}
	
	if (empty($_POST['email']) || (substr_count($_POST['email'], '@') != 1) ) {
		$problem = TRUE;
		print '<p class="error">Please enter your email address!</p>';
	}

	if (empty($_POST['password1'])) {
		$problem = TRUE;
		print '<p class="error">Please enter a password!</p>';
	}
	
	if ($_POST['password1'] != $_POST['password2']) {
		$problem = TRUE;
		print '<p class="error">Your password did not match your confirmed password!</p>';
	} 

	if (empty($_POST['member_age'])) {
		$problem = TRUE;
		print '<p class="error">Please enter your age group!</p>';
	}

	if (empty($_POST['member_sex'])) {
		$problem = TRUE;
		print '<p class="error">Please enter your gender!</p>';
	}
	
	if (empty($_POST['member_location'])) {
		$problem = TRUE;
		print '<p class="error">Please enter your location!</p>';
	}

	if (empty($_POST['terms'])) {
		$problem = TRUE;
		print '<p class="error">You must accept the terms.</p>';
	}


	if (!$problem) { // If there weren't any problems...




include("admin/mysql-connect.php");




// Define the query:
		$query = "INSERT INTO members (member_id, first_name, last_name, member_email, member_password, date_registered, member_age, member_sex, member_location) VALUES (0, '{$_POST['first_name']}', '{$_POST['last_name']}', '{$_POST['email']}', '{$_POST['password1']}', NOW(), '{$_POST['member_age']}', '{$_POST['member_sex']}', '{$_POST['member_location']}')";
		
		// Execute the query:
		if (@mysql_query($query, $dbc)) {


			// Create the cookie:
			setcookie('Diggity', 'Jones', time()+3600);

			// Create the personalisation cookies:
			setcookie('Email', $_POST['email'], time()+3600);
			setcookie('Firstname', $_POST['first_name'], time()+3600);


			print '<p align="center"><font color="red"><h2>You have been registered as a member!</h2> <h2><a href="members.php">Click here</a> to view the members area</h2></font></p><p>';


		} else {
			print '<p style="color: red;">Could not register member because:<br />' . mysql_error($dbc) . '.</p><p>The query being run was: ' . $query . '</p>';
		}









	mysql_close($dbc); // Close the connection.


	
	

		// Send the email:
		$body = "Dear {$_POST['first_name']}, Thank you for registering as a member! Your username is '{$_POST['email']}'.";
		mail($_POST['email'], 'Membership Confirmation', $body, 'From: Admin@example.com');


		// Send the email to administrator:
		$body2 = "{$_POST['email']} has become a member!";
		mail('admin@example.com', 'New Member', $body2, 'From: Admin@example.com');









		// Clear the posted values:
		$_POST = array();
	
	} else { // Forgot a field.
	
		print '<p class="error">Please try again!</p>';
		
	}

} // End of handle form IF.

// Create the form:
?>
<form action="member-register.php" method="post">

	<p>First Name: <input type="text" name="first_name" size="20" value="<?php if (isset($_POST['first_name'])) { print htmlspecialchars($_POST['first_name']); } ?>" /></p>

	<p>Last Name: <input type="text" name="last_name" size="20" value="<?php if (isset($_POST['last_name'])) { print htmlspecialchars($_POST['last_name']); } ?>" /></p>

	<p>Email Address: <input type="text" name="email" size="20" value="<?php if (isset($_POST['email'])) { print htmlspecialchars($_POST['email']); } ?>" /></p>

	<p>Password: <input type="password" name="password1" size="20" value="<?php if (isset($_POST['password1'])) { print htmlspecialchars($_POST['password1']); } ?>" /></p>
	
	<p>Confirm Password: <input type="password" name="password2" size="20" value="<?php if (isset($_POST['password2'])) { print htmlspecialchars($_POST['password2']); } ?>" /></p>

	
<p>Age:

<label>
<select name="member_age" value="<?php if (isset($_POST['member_age'])) { print htmlspecialchars($_POST['member_age']); } ?>">
<option value=""></option>
<option value="Under 18">Under 18</option>
<option value="18-30">18-30</option>
<option value="30-40">30-40</option>
<option value="40-50">40-50</option>
<option value="50-60">50-60</option>
<option value="60-70">60-70</option>
<option value="Over 70">Over 70</option>
</select>
</label>
</p>


	


	<p>Sex:

<label>
<select name="member_sex" value="<?php if (isset($_POST['member_sex'])) { print htmlspecialchars($_POST['member_sex']); } ?>">
<option value=""></option>
<option value="Male">Male</option>
<option value="Female">Female</option>
</select>

</label>

</p>



	<p>Location: 

<label>
<select name="member_location" value="<?php if (isset($_POST['member_location'])) { print htmlspecialchars($_POST['member_location']); } ?>">
<option value=""></option>
<option value="Afghanistan">Afghanistan</option>
<option value="Albania">Albania</option>
<option value="Algeria">Algeria</option>
<option value="Andorra">Andorra</option>
<option value="Angola">Angola</option>
<option value="Antigua & Deps">Antigua & Deps</option>
<option value="Argentina">Argentina</option>
<option value="Armenia">Armenia</option>
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
<option value="Bhutan">Bhutan</option>
<option value="Bolivia">Bolivia</option>
<option value="Bosnia Herzegovina">Bosnia Herzegovina</option>
<option value="Botswana">Botswana</option>
<option value="Brazil">Brazil</option>
<option value="Brunei">Brunei</option>
<option value="Bulgaria">Bulgaria</option>
<option value="Burkina">Burkina</option>
<option value="Burundi">Burundi</option>
<option value="Cambodia">Cambodia</option>
<option value="Cameroon">Cameroon</option>
<option value="Canada">Canada</option>
<option value="Cape Verde">Cape Verde</option>
<option value="Central African Rep">Central African Rep</option>
<option value="Chad">Chad</option>
<option value="Chile">Chile</option>
<option value="China">China</option>
<option value="Colombia">Colombia</option>
<option value="Comoros">Comoros</option>
<option value="Congo">Congo</option>
<option value="Congo {Democratic Rep}">Congo {Democratic Rep}</option>
<option value="Costa Rica">Costa Rica</option>
<option value="Croatia">Croatia</option>
<option value="Cuba">Cuba</option>
<option value="Cyprus">Cyprus</option>
<option value="Czech Republic">Czech Republic</option>
<option value="Denmark">Denmark</option>
<option value="Djibouti">Djibouti</option>
<option value="Dominica">Dominica</option>
<option value="Dominican Republic">Dominican Republic</option>
<option value="East Timor">East Timor</option>
<option value="Ecuador">Ecuador</option>
<option value="Egypt">Egypt</option>
<option value="El Salvador">El Salvador</option>
<option value="Equatorial Guinea">Equatorial Guinea</option>
<option value="Eritrea">Eritrea</option>
<option value="Estonia">Estonia</option>
<option value="Ethiopia">Ethiopia</option>
<option value="Fiji">Fiji</option>
<option value="Finland">Finland</option>
<option value="France">France</option>
<option value="Gabon">Gabon</option>
<option value="Gambia">Gambia</option>
<option value="Georgia">Georgia</option>
<option value="Germany">Germany</option>
<option value="Ghana">Ghana</option>
<option value="Greece">Greece</option>
<option value="Grenada">Grenada</option>
<option value="Guatemala">Guatemala</option>
<option value="Guinea">Guinea</option>
<option value="Guinea-Bissau">Guinea-Bissau</option>
<option value="Guyana">Guyana</option>
<option value="Haiti">Haiti</option>
<option value="Honduras">Honduras</option>
<option value="Hungary">Hungary</option>
<option value="Iceland">Iceland</option>
<option value="India">India</option>
<option value="Indonesia">Indonesia</option>
<option value="Iran">Iran</option>
<option value="Iraq">Iraq</option>
<option value="Ireland {Republic}">Ireland {Republic}</option>
<option value="Israel">Israel</option>
<option value="Italy">Italy</option>
<option value="Ivory Coast">Ivory Coast</option>
<option value="Jamaica">Jamaica</option>
<option value="Japan">Japan</option>
<option value="Jordan">Jordan</option>
<option value="Kazakhstan">Kazakhstan</option>
<option value="Kenya">Kenya</option>
<option value="Kiribati">Kiribati</option>
<option value="Korea North">Korea North</option>
<option value="Korea South">Korea South</option>
<option value="Kosovo">Kosovo</option>
<option value="Kuwait">Kuwait</option>
<option value="Kyrgyzstan">Kyrgyzstan</option>
<option value="Laos">Laos</option>
<option value="Latvia">Latvia</option>
<option value="Lebanon">Lebanon</option>
<option value="Lesotho">Lesotho</option>
<option value="Liberia">Liberia</option>
<option value="Libya">Libya</option>
<option value="Liechtenstein">Liechtenstein</option>
<option value="Lithuania">Lithuania</option>
<option value="Luxembourg">Luxembourg</option>
<option value="Macedonia">Macedonia</option>
<option value="Madagascar">Madagascar</option>
<option value="Malawi">Malawi</option>
<option value="Malaysia">Malaysia</option>
<option value="Maldives">Maldives</option>
<option value="Mali">Mali</option>
<option value="Malta">Malta</option>
<option value="Marshall Islands">Marshall Islands</option>
<option value="Mauritania">Mauritania</option>
<option value="Mauritius">Mauritius</option>
<option value="Mexico">Mexico</option>
<option value="Micronesia">Micronesia</option>
<option value="Moldova">Moldova</option>
<option value="Monaco">Monaco</option>
<option value="Mongolia">Mongolia</option>
<option value="Montenegro">Montenegro</option>
<option value="Morocco">Morocco</option>
<option value="Mozambique">Mozambique</option>
<option value="Myanmar, {Burma}">Myanmar, {Burma}</option>
<option value="Namibia">Namibia</option>
<option value="Nauru">Nauru</option>
<option value="Nepal">Nepal</option>
<option value="Netherlands">Netherlands</option>
<option value="New Zealand">New Zealand</option>
<option value="Nicaragua">Nicaragua</option>
<option value="Niger">Niger</option>
<option value="Nigeria">Nigeria</option>
<option value="Norway">Norway</option>
<option value="Oman">Oman</option>
<option value="Pakistan">Pakistan</option>
<option value="Palau">Palau</option>
<option value="Panama">Panama</option>
<option value="Papua New Guinea">Papua New Guinea</option>
<option value="Paraguay">Paraguay</option>
<option value="Peru">Peru</option>
<option value="Philippines">Philippines</option>
<option value="Poland">Poland</option>
<option value="Portugal">Portugal</option>
<option value="Qatar">Qatar</option>
<option value="Romania">Romania</option>
<option value="Russian Federation">Russian Federation</option>
<option value="Rwanda">Rwanda</option>
<option value="St Kitts & Nevis">St Kitts & Nevis</option>
<option value="St Lucia">St Lucia</option>
<option value="Saint Vincent & the Grenadines">Saint Vincent & the Grenadines</option>
<option value="Samoa">Samoa</option>
<option value="San Marino">San Marino</option>
<option value="Sao Tome & Principe">Sao Tome & Principe</option>
<option value="Saudi Arabia">Saudi Arabia</option>
<option value="Senegal">Senegal</option>
<option value="Serbia">Serbia</option>
<option value="Seychelles">Seychelles</option>
<option value="Sierra Leone">Sierra Leone</option>
<option value="Singapore">Singapore</option>
<option value="Slovakia">Slovakia</option>
<option value="Slovenia">Slovenia</option>
<option value="Solomon Islands">Solomon Islands</option>
<option value="Somalia">Somalia</option>
<option value="South Africa">South Africa</option>
<option value="South Sudan">South Sudan</option>
<option value="Spain">Spain</option>
<option value="Sri Lanka">Sri Lanka</option>
<option value="Sudan">Sudan</option>
<option value="Suriname">Suriname</option>
<option value="Swaziland">Swaziland</option>
<option value="Sweden">Sweden</option>
<option value="Switzerland">Switzerland</option>
<option value="Syria">Syria</option>
<option value="Taiwan">Taiwan</option>
<option value="Tajikistan">Tajikistan</option>
<option value="Tanzania">Tanzania</option>
<option value="Thailand">Thailand</option>
<option value="Togo">Togo</option>
<option value="Tonga">Tonga</option>
<option value="Trinidad & Tobago">Trinidad & Tobago</option>
<option value="Tunisia">Tunisia</option>
<option value="Turkey">Turkey</option>
<option value="Turkmenistan">Turkmenistan</option>
<option value="Tuvalu">Tuvalu</option>
<option value="Uganda">Uganda</option>
<option value="Ukraine">Ukraine</option>
<option value="United Arab Emirates">United Arab Emirates</option>
<option value="United Kingdom">United Kingdom</option>
<option value="United States">United States</option>
<option value="Uruguay">Uruguay</option>
<option value="Uzbekistan">Uzbekistan</option>
<option value="Vanuatu">Vanuatu</option>
<option value="Vatican City">Vatican City</option>
<option value="Venezuela">Venezuela</option>
<option value="Vietnam">Vietnam</option>
<option value="Yemen">Yemen</option>
<option value="Zambia">Zambia</option>
<option value="Zimbabwe">Zimbabwe</option>
</select></label></p>

<p><input type="checkbox" name="terms" value="Yes" /> I agree to the terms & conditions!</p>

	<p><input type="submit" name="submit" value="Register!" /></p>

</form>

<?php include("inc/plugin02.php"); ?>
</div>



<?php include("inc/footer.php"); ?>
</div>

<?php include("inc/scripts.php"); ?>
</body>
</html>
<?php ob_end_flush(); ?>