<?php

$dbhost = "localhost";
$dbname = "guestbook";
$dbuser = "root";
$dbpass = "";


global $conn;

$conn = new mysqli();
$conn->connect($dbhost, $dbuser, $dbpass, $dbname);
$conn->set_charset("utf8");

if ($conn->connect_errno) {
    printf("Connect failed: %s\n", $conn->connect_error);
    exit();
}
?>
