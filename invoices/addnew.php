<?php
	include('conn.php');
	if(isset($_POST['add'])){
		$Invoice_ID=$_POST['Invoice_ID'];
		$Date=$_POST['Date'];
		$Customerid=$_POST['Customerid'];
						
		if(!mysqli_query($conn,"insert into invoice_12977 values ('$Invoice_ID', '$Date','$Customerid')"))
			echo 'Failed to add. Make sure INVOICE ID is unique';
	}
	else if(isset($_POST['additem'])){
		$Invoice_ID=$_POST['Invoice_ID'];
		$ProductCode=$_POST['ProductCode'];
		$Quantity=$_POST['Quantity'];
		$Discount=$_POST['Discount'];
		if(!mysqli_query($conn,"insert into salesorder_12977(Invoice_ID,ProductCode,Quantity,Discount) values ('$Invoice_ID', '$ProductCode','$Quantity','$Discount')"))
			echo "Failed to add.";
	}
?>
