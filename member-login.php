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
/* This page lets people log into the site. */

// Set two variables with default values:
$loggedin = false;
$error = false;



// Check if the form has been submitted:
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

include("admin/mysql-connect.php");



	// Handle the form:
	if (!empty($_POST['email']) && !empty($_POST['password'])) {


	// Define the query.
	$query = "SELECT member_id, first_name, member_email, member_password FROM members WHERE member_email='{$_POST['email']}'";
	if ($r = mysql_query($query, $dbc)) { // Run the query.
	
		$row = mysql_fetch_array($r); // Retrieve the information.



$useremail = $row['member_email'];
$userpassword = $row['member_password'];
$userid = $row['member_id'];
$userfirstname = $row['first_name'];

	}
		if ( (strtolower($_POST['email']) == $useremail) && ($_POST['password'] == $userpassword) ) { // Correct!
	
			// Create the login cookie:
			setcookie('Diggity', 'Jones', time()+3600);

			// Create the personalisation cookies:
			setcookie('Email', $useremail, time()+3600);
			setcookie('Firstname', $userfirstname, time()+3600);
			
			// Indicate they are logged in:
			$loggedin = true;
		
		} else { // Incorrect!

			$error = '<p align="center">The submitted email address and password do not match those on file!</p>';

		}

	} else { // Forgot a field.

		$error = '<p align="center">Please make sure you enter both an email address and a password!</p>';

	}
	mysql_close($dbc); // Close the connection.
}



// Print an error if one exists:
if ($error) {
	print '<p class="error">' . $error . '</p>';
}

// Indicate the user is logged in and then redirect to members page, or show the form:
if ($loggedin) {
	
	print '<p align="center">You are now logged in!</p>';


	header('Location: members.php'); 


	
} else {

	print '<p><div align="center"><h2>Member Login</h2>
	<form action="member-login.php" method="post">
	<p><label>Email <input type="text" name="email" /></label></p>
	<p><label>Password <input type="password" name="password" /></label></p>
	<p><input type="submit" name="submit" value="Log In!" /></p>
	</form><br/><a href="member-register.php" "title="Register so that you can access our members area and take advantage of our special features."><b>Register</a> as a member</b><p><p></div>';

} 


?>


<?php include("inc/plugin02.php"); ?>
</div>

<?php include("inc/sidebar-right.php"); ?>
<?php include("inc/footer.php"); ?>
</div>

<?php include("inc/scripts.php"); ?>
</body>
</html>
<?php ob_end_flush(); ?>