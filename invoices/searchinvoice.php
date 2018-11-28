<?php
	include('conn.php');
	$Customerid = $_POST['searchid'];
	$sql = "SELECT * FROM invoice_12977 WHERE Customerid = '$Customerid'";
	$result = mysqli_query($conn, $sql);
	echo "<label>INVOICE ID</label>";
	echo "<select type = 'text' id = 'searchInvoice_ID' class = 'form-control' name='Customerid'>";
	echo "<option value= ''>SELECT INVOICE</option>";
	while ($row = mysqli_fetch_array($result)) {
	echo "<option value='" . $row['Invoice_ID'] ."'>" . $row['Invoice_ID'] ."</option>";
	}
	echo "</select>";
?>


