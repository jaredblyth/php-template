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
/* This is the logout page. It destroys the cookie. */

// Destroy the cookie, but only if it already exists:
if (isset($_COOKIE['Diggity'])) {
	setcookie('Diggity', FALSE, time()-300);
}

// Destroy the cookie, but only if it already exists:
if (isset($_COOKIE['Email'])) {
	setcookie('Email', FALSE, time()-300);
}

// Destroy the cookie, but only if it already exists:
if (isset($_COOKIE['Firstname'])) {
	setcookie('Firstname', FALSE, time()-300);
}

// Print a message:
echo '<p><h2><p align="center"><font color="red">You are now logged out.</font></p></h2><p>';

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