<?php 
include('connect.php');
	// initialize variable
	$UserID = "";
	$Password= "";
        $Active = "";
	$Salesperson = "";
	
	$update = false;

	if (isset($_POST['save'])) {

		$UserID = $_POST['UserID'];
		$Password= $_POST['Password'];
		$Active = $_POST['Active'];
        $Salesperson = $_POST['Salesperson'];




		mysqli_query($db, "INSERT INTO users_12977 VALUES ('$UserID', '$Password', '$Active', '$Salesperson')"); 
                
		$_SESSION['message'] = "SAVED!"; 
		header('location: users_12977.php');
	}

	if (isset($_POST['update'])) {
		$UserID = $_POST['UserID'];
		$Password = $_POST['Password'];
		$Active = $_POST['Active'];
        $Salesperson = $_POST['Salesperson'];
		
		mysqli_query($db, "UPDATE users_12977 SET UserID = '$UserID', Password = '$Password', Active = '$Active', Salesperson = '$Salesperson' WHERE UserID='$UserID'");
		$_SESSION['message'] = "UPDATED"; 
		header('location: users_12977.php');
	}

if (isset($_GET['del'])) {
	$UserID = $_GET['del'];
	mysqli_query($db, "DELETE FROM users_12977 WHERE UserID='$UserID'");
	$_SESSION['message'] = "DELETED!"; 
	header('location: users_12977.php');
}


	$results = mysqli_query($db, "SELECT * FROM users_12977");


?>