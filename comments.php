<h3>Comments</h3>
<?php 

// Prepare variables to use in displaying relevant comments and in submitting comments below:
$id = $_GET['id'];
$current_page = $_SERVER['REQUEST_URI'];




/* This script retrieves blog comments relating to the page from the database. */

include("admin/mysql-connect.php");

	
// Define the query:
$query = "SELECT comment_first_name, comment, comment_date FROM blog_comments WHERE comment_blog_id='$id' AND comment_approved='Yes'";
	
if ($r = mysql_query($query, $dbc)) { // Run the query.

	// Retrieve and print every record:
	while ($row = mysql_fetch_array($r)) {
		print "<p>

		<b>{$row['comment_first_name']}</b> on {$row['comment_date']}<p>

		{$row['comment']}<p>


		</p><hr />\n";
	}

} else { // Query didn't run.
	print '<p style="color: red;">Could not retrieve the data because:<br />' . mysql_error($dbc) . '.</p><p>The query being run was: ' . $query . '</p>';
} // End of query IF.

mysql_close($dbc); // Close the connection.


?>




<h3>Leave a comment</h3>

<form id="comments" name="comments" method="post" action="comment-sent.php">

<P align="left">
<label>First Name:<br/>
        <input type="text" name="first_name" id="first_name" />
     </label>

<br/><br/>


<label>Last Name:<br/>
        <input type="text" name="last_name" id="last_name" />
     </label>
   
<br/><br/>

<label>Email address<br/>
        <input type="text" name="email" id="email" />
      </label>

<br/><br/>

<label>Your Comment<br />
        <textarea name="comment" id="comment" cols="50" rows="5" ></textarea>
     </label>



<br/><br/>


      <input type="hidden" name="blog_id" value="<?php echo $id; ?>" />
      <input type="hidden" name="comment_approved" value="No"/>
      <input type="hidden" name="current_page" value="<?php echo $current_page; ?>"/>


<input type="submit" name="submit" id="submit" value="Send"  />

</form>

 



