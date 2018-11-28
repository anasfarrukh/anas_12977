<?php 
include('connect.php');
	// initialize variable
	$Name = "";
        $Address = "";
	$ContactNo = "";
        $CNIC = "";
	$Customerid = "";
	$SalespersonID = "";
	$id = 0;
	$update = false;

	if (isset($_POST['save'])) {

		$Name = $_POST['Name'];
                $Address = $_POST['Address'];
		$ContactNo = $_POST['ContactNo'];
                $CNIC = $_POST['CNIC'];
                $Customerid = $_POST['Customerid'];
		$SalespersonID = $_POST['SalespersonID'];




		mysqli_query($db, "INSERT INTO anas_12977
			VALUES ('$Name', '$Address', '$ContactNo', '$CNIC', '$Customerid',  
			'$SalespersonID')"); 
                
		$_SESSION['message'] = "SAVED!"; 
		header('location: index.php');
	}

	if (isset($_POST['update'])) {
               // echo '12312412';
		$Name = $_POST['Name'];
                $Address = $_POST['Address'];
		$ContactNo = $_POST['ContactNo'];
                $CNIC = $_POST['CNIC'];
		$Customerid = $_POST['Customerid'];
		$SalespersonID = $_POST['SalespersonID'];

		mysqli_query($db, "UPDATE anas_12977 SET Name = '$Name', Address = '$Address', ContactNo = '$ContactNo', CNIC = '$CNIC', SalespersonID = '$SalespersonID' WHERE Customerid=$Customerid");
		$_SESSION['message'] = "UPDATED"; 
		header('location: index.php');
	}

if (isset($_GET['del'])) {
	$Customerid = $_GET['del'];
	mysqli_query($db, "DELETE FROM anas_12977 WHERE Customerid=$Customerid");
	$_SESSION['message'] = "DELETED!"; 
	header('location: index.php');
}


	$results = mysqli_query($db, "SELECT * FROM anas_12977");


?>