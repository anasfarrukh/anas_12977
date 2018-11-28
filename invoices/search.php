<?php
	include('conn.php');
	if(isset($_POST['searchprod'])){
		$ProductCode=$_POST['ProductCode'];
		$query = mysqli_query($conn, "SELECT * FROM product_12977 WHERE ProductCode = '$ProductCode'");
		$row = mysqli_fetch_array($query);
		echo json_encode($row);
	}
	else if(isset($_POST['search'])){
		$Customerid=$_POST['Customerid'];
		$query = mysqli_query($conn, "SELECT * FROM anas_12977 WHERE Customerid = '$Customerid'");
		$row = mysqli_fetch_array($query);
		echo json_encode($row);
	}
?>

