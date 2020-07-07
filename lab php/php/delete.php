<?php

	require_once 'db.php';

	$id = $_POST['delete'];
	$database = 'guestbook';

	$sql = "DELETE FROM guestbook WHERE id='$id'";

	if (!mysqli_query($conn, $sql))
		echo 'Could not delete entry!';
	else
		echo 'Entry deleted succesfully!';

	header("refresh:2; url = admin.php");
?>