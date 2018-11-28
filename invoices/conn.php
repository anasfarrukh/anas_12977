<?php
$databaseHost = 'localhost';
$databaseName = 'anas farrukh';
$databaseUsername = 'anas';
$databasePassword = '12977';
 
$conn = mysqli_connect($databaseHost, $databaseUsername, $databasePassword, $databaseName);
if (!$conn) {
	die("Connection failed: " . mysqli_connect_error());
}
 
?>
