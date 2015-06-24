<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>Post a Message</title>
</head>
<body>
<?php # Script 16.4 - post_message.php
// This is an OOP version of the script from Chapter 13.

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

	// Validate the data (omitted)!

	// // Connect to the database:
	// $mysqli = new MySQLi('localhost', 'username', 'password', 'forum');
	// $mysqli->set_charset('utf8');
	
	// Aside: always keep connection info outside of the htdocs directory
	require ('../01-connecting-mysqli/16.01-mysqli-oop-connect.php'); // Connect to the db.
	// select the db to execute queries against
	$mysqli->select_db('forum');

	// Make the query:
	$q = 'INSERT INTO messages (forum_id, parent_id, user_id, subject, body, date_entered) VALUES (?, ?, ?, ?, ?, NOW())';

	// Prepare the statement:
	$stmt = $mysqli->prepare($q);

	// Bind the variables:
	$stmt->bind_param('iiiss', $forum_id, $parent_id, $user_id, $subject, $body);
	
	// Assign the values to variables:
	$forum_id = (int) $_POST['forum_id'];
	$parent_id = (int) $_POST['parent_id'];
	$user_id = 3; // The user_id value would normally come from the session.
	$subject = strip_tags($_POST['subject']);
	$body = strip_tags($_POST['body']);
	
	// Execute the query:
	$stmt->execute();

	// Print a message based upon the result:
	if ($stmt->affected_rows == 1) {
		echo '<p>Your message has been posted.</p>';
	} else {
		echo '<p style="font-weight: bold; color: #C00">Your message could not be posted.</p>';
		echo '<p>' . $stmt->error . '</p>';
	}
	
	// Close the statement:
	$stmt->close();
	unset($stmt);

	// Close the connection:
	$mysqli->close();
	unset($mysqli);

} // End of submission IF.

// Display the form:
?>
<form action="16.04-post-message.php" method="post">

	<fieldset><legend>Post a message:</legend>
	
	<p><b>Subject</b>: <input name="subject" type="text" size="30" maxlength="100" /></p>

	<p><b>Body</b>: <textarea name="body" rows="3" cols="40"></textarea></p>
	
	</fieldset>
	<div align="center"><input type="submit" name="submit" value="Submit" /></div>
	<input type="hidden" name="forum_id" value="1" />
	<input type="hidden" name="parent_id" value="0" />

</form>
</body>
</html>