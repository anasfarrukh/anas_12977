<?php
$db = mysqli_connect('localhost','anas','12977','anas farrukh');
   include('session.php');
   
?>
<!DOCTYPE html>
<html>
<head>
	<title>Welcome</title>
</head>
</html>
<div class="topnav" style="background-color:#000000; color:white;">
<link rel="stylesheet" type="text/css" href="style1.css">
<a href="homepage.php">Welcome Page</a>
<a href="index.php">Customer Table</a>
<a href="product_12977.php">Product Table</a>
<a href="sales_12977.php">SalesPerson Table</a>
<a href="users_12977.php">User Table</a>
<a href="invoices/index.php">Invoice Table</a>
<a style="float:right;" href="logout.php">Logout</a>
</div>
<style type=text/css>
body{
	background-color:#5b5b5b;
	color:white;
} 
</style>
