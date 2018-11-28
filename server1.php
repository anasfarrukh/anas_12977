<?php 
include('connect.php');
	// initialize variable
	$ProductCode = "";
	$Brand = "";
        $Type = "";
	$Shade = "";
	$Size = "";
	$SalesPrice = "";
	
	$update = false;

	if (isset($_POST['save'])) {

		$ProductCode = $_POST['ProductCode'];
		$Brand = $_POST['Brand'];
		$Type = $_POST['Type'];
        $Shade = $_POST['Shade'];
		$Size = $_POST['Size'];
		$SalesPrice = $_POST['SalesPrice'];




		mysqli_query($db, "INSERT INTO product_12977 VALUES ('$ProductCode', '$Brand', '$Type', '$Shade','$Size','$SalesPrice')"); 
                
		$_SESSION['message'] = "SAVED!"; 
		header('location: product_12977.php');
	}

	if (isset($_POST['update'])) {
		$ProductCode = $_POST['ProductCode'];
		$Brand = $_POST['Brand'];
		$Type = $_POST['Type'];
        $Shade = $_POST['Shade'];
		$Size= $_POST['Size'];
		$SalesPrice = $_POST['SalesPrice'];
		mysqli_query($db, "UPDATE product_12977 SET ProductCode = '$ProductCode', Brand = '$Brand', Type = '$Type', Shade = '$Shade',Size = '$Size',SalesPrice = '$SalesPrice', WHERE ProductCode='$ProductCode'");
		$_SESSION['message'] = "UPDATED"; 
		header('location: product_12977.php');
	}

if (isset($_GET['del'])) {
	$customerid = $_GET['del'];
	mysqli_query($db, "DELETE FROM product_12977 WHERE ProductCode='$ProductCode'");
	$_SESSION['message'] = "DELETED!"; 
	header('location: product_12977.php');
}


	$results = mysqli_query($db, "SELECT * FROM product_12977");


?>