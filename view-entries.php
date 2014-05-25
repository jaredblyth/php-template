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

	// Define the query.
		$query = "SELECT entry_id, title FROM blog";
	
	// Run the query	
		if ($r = mysql_query($query, $dbc)) { 

		
				// Process & print each record
				while ($row = mysql_fetch_array($r)) {
					print "<a href=\"page.php?id={$row['entry_id']}\"><h3>{$row['title']}</h3></a><hr />";
				}

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