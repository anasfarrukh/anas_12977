
<!DOCTYPE html>
<html>
<head>
	<title>Customer</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<?php 
include('server.php');
include('homepage.php');

	if (isset($_GET['edit'])) {
		$Customerid = $_GET['edit'];
		$update = true;
		$record = mysqli_query($db, "SELECT * FROM anas_12977 WHERE Customerid=$Customerid");

		
			$n = mysqli_fetch_array($record);
			$Name = $n['Name'];
                         $Address = $n['Address'];
			$ContactNo = $n['ContactNo'];
                        $CNIC = $n['CNIC'];
                        $Customerid = $n['Customerid'];
			$SalespersonID  = $n['SalespersonID']; 

		

	}
?>
	<?php if (isset($_SESSION['message'])): ?>
		<div class="msg">
			<?php 
				echo $_SESSION['message']; 
				unset($_SESSION['message']);
			?>
		</div>
	<?php endif ?>

<?php $results = mysqli_query($db, "SELECT * FROM anas_12977"); ?>

<table>
	<thead>
		<tr>

			<h3> CUSTOMERS_12977 INFORMATION </h3>


			<th style="background-color: black;">Name</th>
                        <th style="background-color: black;">Address</th>
			<th style="background-color: black;">ContactNo</th>
                        <th style="background-color: black;">CNIC</th>
			<th style="background-color: black;">Customerid</th>
			<th style="background-color: black;">SalespersonID</th>
			
	
	<?php while ($row = mysqli_fetch_array($results)) { ?>
		<tr>
			<td><?php echo $row['Name']; ?></td>
                        <td><?php echo $row['Address']; ?></td>
			<td><?php echo $row['ContactNo']; ?></td>
                        <td><?php echo $row['CNIC']; ?></td>
			<td><?php echo $row['Customerid']; ?></td>
			<td><?php echo $row['SalespersonID']; ?></td>
			<td>
				<a href="index.php?edit=<?php echo $row['Customerid']; ?>" class="edit_btn" >Edit</a>
			
				<a href="server.php?del=<?php echo $row['Customerid']; ?>" class="del_btn">Delete</a>
			</td>
		</tr>
	<?php } ?>
</table>
	


<form method="post" action="server.php" >

	<input type="hidden" name="Customerid" value="<?php echo $Customerid; ?>">
	<div class="input-group">

	<div class="input-group">
		<label>Name</label>
		<input type="text" name="Name" value="<?php echo $Name; ?>">
	</div>	

            <div class="input-group">
		<label>Address</label>
		<input type="text" name="Address" value="<?php echo $Address; ?>">
	</div>
        
	<div class="input-group">
		<label>Contact Number</label>
		<input type="text" name="ContactNo" value="<?php echo $ContactNo; ?>">
	</div>

        <div class="input-group">
		<label>CNIC</label>
		<input type="text" name="CNIC" value="<?php echo $CNIC; ?>">
	</div>
        
	<div class="input-group">
		<label>Customerid</label>
		<input type="text" name="Customerid" value="<?php echo $Customerid; ?>">
	</div>

	

	
        <div class="input-group">
		<label>Salesperson ID</label>
		<input type="text" name="SalespersonID" value="<?php echo $SalespersonID; ?>">
	</div>

	

	<div class="input-group">

		<?php if ($update == true): ?>
			<button class="btn" type="submit" name="update" style="background: #556B2F;" >Update</button>
		<?php else: ?>
			<button class="btn" type="submit" name="save" >Save</button>
		<?php endif ?>
	</div>
</form>
</body>
</html>
<style type=text/css>
body{
	background-color:#5b5b5b;
	color:white;
} 
</style>