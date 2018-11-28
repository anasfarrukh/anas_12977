<?php
	include('conn.php');
	if(isset($_POST['del'])){
		$id=$_POST['id'];
		mysqli_query($conn,"delete from salesorder_12977 where Invoice_ID='$id'");
		mysqli_query($conn,"delete from invoice_12977 where Invoice_ID='$id'");
	}
	else if(isset($_POST['delitem'])){
		$id=$_POST['id'];
		mysqli_query($conn,"delete from salesorder_12977 where ID='$id'");
	}
?>
