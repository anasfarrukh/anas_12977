<?php
	include('conn.php');
	if(isset($_POST['edit'])){
		$id=$_POST['id'];
		$Quantity=$_POST['Quantity'];
		$Discount=$_POST['Discount'];
		mysqli_query($conn,"UPDATE salesorder_12977 SET Quantity='$Quantity', Discount='$Discount' WHERE id ='$id'");
	}
?>
