<!DOCType html>
<html>
<head>
	<title>Product </title>
	<link rel="stylesheet" Type="text/css" href="style.css">
</head>
<body>
<?php 
include('server1.php');
include('homepage.php');


	if (isset($_GET['edit'])) {
		$ID = $_GET['edit'];
		$update = true;
		$record = mysqli_query($db, "SELECT * FROM product_12977 WHERE ProductCode='$ProductCode'");

	
			$n = mysqli_fetch_array($record);
			$ProductCode = $n['ProductCode'];
			$Brand = $n['Brand'];
                        $Type = $n['Type'];
                 			$Shade  = $n['Shade']; 
							$Size  = $n['Size']; 
							$SalesPrice  = $n['SalesPrice']; 

		

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



<table>
	
	<thead>
		<tr>

			<h3> PRODUCT_12977 INFORMATION </h3>


			<th style="background-color: black;">ProductCode</th>
			<th style="background-color: black;">Brand</th>
			<th style="background-color: black;">Type</th>
			<th style="background-color: black;">Shade</th>
			<th style="background-color: black;">Size</th>
			<th style="background-color: black;">SalesPrice</th>
			
	<?php $results = mysqli_query($db, "SELECT * FROM product_12977"); 
	if(!$results){
		echo "anas";
	}
	 while ($row = mysqli_fetch_array($results)) { ?>
		<tr>
			<td><?php echo $row['ProductCode']; ?></td>
			<td><?php echo $row['Brand']; ?></td>
			<td><?php echo $row['Type']; ?></td>
			<td><?php echo $row['Shade']; ?></td>
			<td><?php echo $row['Size']; ?></td>
			<td><?php echo $row['SalesPrice']; ?></td>
			<td>
				<a href="product_12977.php?edit=<?php echo $row['ProductCode']; ?>" class="edit_btn" >Edit</a>
			
				<a href="server1.php?del=<?php echo $row['ProductCode']; ?>" class="del_btn">Delete</a>
			</td>
		</tr>
	<?php } ?>
</table>
	


<form method="post" action="server1.php" >

	<input Type="hidden" name="ProductCode" value="<?php echo $ProductCode; ?>">
	<div class="input-group">

		
	
	<div class="input-group">
		<label>ProductCode</label>
		<input Type="text" name="ProductCode" value="<?php echo $ProductCode; ?>">
	</div>	
	<div class="input-group">
		<label>Brand</label>
		<input Type="text" name="Brand" value="<?php echo $Brand; ?>">
	</div>

	<div class="input-group">
		<label>Type</label>
		<input Type="text" name="Type" value="<?php echo $Type; ?>">
	</div>

	<div class="input-group">
		<label>Shade</label>
		<input Type="text" name="Shade" value="<?php echo $Shade; ?>">
	</div>
	<div class="input-group">
		<label>Size</label>
		<input Type="text" name="Size" value="<?php echo $Size; ?>">
	</div>
	<div class="input-group">
		<label>SalesPrice</label>
		<input Type="text" name="SalesPrice" value="<?php echo $SalesPrice; ?>">
	</div>

	
       

	

	<div class="input-group">

		<?php if ($update == true): ?>
			<button class="btn" Type="submit" name="update" style="background: #556B2F;" >Update</button>
		<?php else: ?>
			<button class="btn" Type="submit" name="save" >Save</button>
		<?php endif ?>
	</div>
</form>
</body>
</html>