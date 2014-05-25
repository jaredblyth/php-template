<?php // 
/* This page defines custom functions. */

// This function checks if the user is registered as a member.
// This function takes two optional values.
// This function returns a Boolean value.
function is_administrator($name = 'Diggity', $value = 'Jones') {
	
	// Check for the cookie and check its value:
	if (isset($_COOKIE[$name]) && ($_COOKIE[$name] == $value)) {
		return true;
	} else {
		return false;
	}

} // End of is_administrator() function.

?>



<?php
// Restrict access to members only:
if (!is_administrator()) {
	print '<h2>Member Area</h2><p class="error" align="center"><p><div align="center"><h4>You must login to access our special features.</h4>
	<form action="member-login.php" method="post">
	<p><label>Email <input type="text" name="email" /></label></p>
	<p><label>Password <input type="password" name="password" /></label></p>
	<p><input type="submit" name="submit" value="Log In!" /></p>
	</form><br/><a href="member-register.php" "title="Register so that you can access our members area and take advantage of our special features."><b>Register</a> as a member</b><p><p></div><p>';
	exit();
}
?>