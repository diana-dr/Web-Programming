<?php 
	session_start();
	require_once 'db.php';
	
	$id = $_GET['update'];

	if (isset($_POST['button'])) {

		$author = $_SESSION['user'];
		$title = $_POST['title'];
		$comment = $_POST['comment'];
		$date = date("y-m-d h:i:s");
//        $database = 'guestbook';
		
		$sql = "UPDATE guestbook
				SET author='$author', title='$title', comment='$comment', date='$date'
				WHERE id='$id'";

		if (!mysqli_query($conn, $sql))
			echo 'Could not update entry!';
		else
			echo 'Entry modified!';

		header("refresh:2; url = admin.php");
	}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Update entry</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="../style.css">
  	<link href="https://fonts.googleapis.com/css?family=Ubuntu" rel="stylesheet">
  	 <script src="../javascript.js"></script>
</head>
<body>
	<div class="main">
		<p class="sign" align="center">Update entry</p>
		<form action="#" method="POST" class="form1">
				<input type="text" id="field" name="title" placeholder="Title">
				<input type="text" id="field" name="comment" placeholder="Comment">
				<input type="submit" class="submit" name="button">
		</form>
	</div>
</body>
</html>
