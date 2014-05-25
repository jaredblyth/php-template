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


<?php

include("admin/mysql-connect.php");

		// Process the comment form and prepare for inserting into blog_comments database:
		$first_name = mysql_real_escape_string(trim(strip_tags($_POST['first_name'])), $dbc);
		$last_name = mysql_real_escape_string(trim(strip_tags($_POST['last_name'])), $dbc);
		$email = mysql_real_escape_string(trim(strip_tags($_POST['email'])), $dbc);
		$comment = mysql_real_escape_string(trim(strip_tags($_POST['comment'])), $dbc);
		$blog_id = mysql_real_escape_string(trim(strip_tags($_POST['blog_id'])), $dbc);
		$comment_approved = mysql_real_escape_string(trim(strip_tags($_POST['comment_approved'])), $dbc);
		$previous_page = $_POST['current_page'];



		// Define the query:
		$query = "INSERT INTO blog_comments (comment_id, comment_first_name, comment_last_name, comment_email, comment, comment_date, comment_blog_id, comment_approved) VALUES (0, '$first_name', '$last_name', '$email', '$comment', NOW(), '$blog_id', '$comment_approved')";
		
		// Execute the query:
		if (@mysql_query($query, $dbc)) {
			print "<p align='center'><font color='red'>Thank-you for your comment</font></p></br><a href='$previous_page'>Return to previous page</a>";
		} else {
			print '<p style="color: red;">Could not add the comment because:<br />' . mysql_error($dbc) . '.</p><p>The query being run was: ' . $query . '</p>';
		}




	mysql_close($dbc); // Close the connection.



		// Send an email to blog administrator advising of new comment:
		mail('admin@example.com', 'A new comment awaits your approval', $comment, 'From: admin@example.com');


?>


<?php include("inc/plugin02.php"); ?>
</div>

<?php include("inc/sidebar-right.php"); ?>
<?php include("inc/footer.php"); ?>
</div>

<?php include("inc/scripts.php"); ?>
</body>
</html>