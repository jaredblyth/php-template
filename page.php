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
/* This script retrieves entries from the database. */

	include("admin/mysql-connect.php"); // Connect to MySQL
	
	// Create NEXT link variable
	
	$nextlink = $_GET['id'] + 1;

	// Define the query.
		$query = "SELECT title, entry, category, author FROM blog WHERE entry_id={$_GET['id']}";
	
	// Run the query	
		if ($r = mysql_query($query, $dbc)) { 
	
				// Retrieve the information
				$row = mysql_fetch_array($r); 
		
				// Process & print the information
		
				print "

				<h1>";
				
				print "

				{$row['title']}";
				
				print "
				
				</h1>";
				
				print "

				{$row['entry']}";

				
				// Build NEXT link
				
				print "<div class=\"nextdemo\"><a href=\"page.php?id=";
				
				print $nextlink;
				
				print "\" title=\"Next demo\">Next page ></a></div>";
				
				// End of process & print
		
		} else { // Couldn't get the information.
				print '<p style="color: red;">Could not retrieve the entry because:<br />' . mysql_error($dbc) . '.</p><p>The query being run was: ' . $query . '</p>';
				}
	
	mysql_close($dbc); // Close the connection.

?>


<?php include("inc/plugin02.php"); ?>
</div>

<?php include("inc/sidebar-right.php"); ?>
<?php include("inc/footer.php"); ?>
</div>

<?php include("inc/scripts.php"); ?>
</body>
</html>