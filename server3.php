<?php 
include('connect.php');
	// initialize variable
	$Salesperson = "";
	$Name= "";
        $ContactNo = "";
	$CustomerList = "";
	
	$update = false;

	if (isset($_POST['save'])) {

		$Salesperson = $_POST['Salesperson'];
		$Name= $_POST['Name'];
		$ContactNo = $_POST['ContactNo'];
        $CustomerList = $_POST['CustomerList'];




		mysqli_query($db, "INSERT INTO sales_12977 VALUES ('$Salesperson', '$Name', '$ContactNo', '$CustomerList')"); 
                
		$_SESSION['message'] = "SAVED!"; 
		header('location: sales_12977.php');
	}

	if (isset($_POST['update'])) {
		$Salesperson = $_POST['Salesperson'];
		$Name = $_POST['Name'];
		$ContactNo = $_POST['ContactNo'];
        $CustomerList = $_POST['CustomerList'];
		
		mysqli_query($db, "UPDATE sales_12977 SET Salesperson = '$Salesperson', Name = '$Name', ContactNo = '$ContactNo', CustomerList = '$CustomerList' WHERE Salesperson='$Salesperson'");
		$_SESSION['message'] = "UPDATED"; 
		header('location: sales_12977.php');
	}

if (isset($_GET['del'])) {
	$customerid = $_GET['del'];
	mysqli_query($db, "DELETE FROM sales_12977 WHERE Salesperson='$Salesperson'");
	$_SESSION['message'] = "DELETED!"; 
	header('location: sales_12977.php');
}


	$results = mysqli_query($db, "SELECT * FROM sales_12977");


?>