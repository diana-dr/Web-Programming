<?php
	session_start();
    require_once 'db.php';

    $username = $_POST['username'];
    $password = $_POST['password'];

	$result = mysqli_query($conn, "select * from users where username = '$username' and password = '$password'") or die('Failed to query database');

	$row = mysqli_fetch_array($result);
		
	$_SESSION['user'] = $username;

	if ($username == "admin") {
		header("Location: admin.php");
			exit(); 
		} else {
			header("Location: client.php");
			exit();
		}
?> 
