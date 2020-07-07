<?php
	session_start();
	require_once 'db.php';

	$author = $_SESSION['user'];
	$title = $_POST['title'];
	$comment = $_POST['comment'];
	$date = date("y-m-d h:i:s");
	$database = 'guestbook';

	$sql = "INSERT INTO guestbook (author, title, comment, date) VALUES 
			('$author', '$title', '$comment', '$date')";

	if (!mysqli_query($conn, $sql))
		echo 'Could not insert new entry!';
	else
		echo 'New entry inserted!';


    header("refresh:2; url = client.php");
?>
