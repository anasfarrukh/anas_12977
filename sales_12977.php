<!DOCTYPE html>
<html>
<head>
	<title>Salesperson </title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<?php 
include('server3.php');
include('homepage.php');

	if (isset($_GET['edit'])) {
		$ID = $_GET['edit'];
		$update = true;
		$record = mysqli_query($db, "SELECT * FROM sales_12977 WHERE Salesperson='$Salesperson'");

	
			$n = mysqli_fetch_array($record);
			$Salesperson = $n['Salesperson'];
			$Name = $n['Name'];
                        $ContactNo = $n['ContactNo'];
                 			$CustomerList  = $n['CustomerList']; 

		

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

			<h3> Sales_12977 INFORMATION </h3>


			<th style="background-color: black;">Salesperson</th>
			<th style="background-color: black;">Name</th>
			<th style="background-color: black;">ContactNo</th>
			<th style="background-color: black;">CustomerList</th>
			
	<?php $results = mysqli_query($db, "SELECT * FROM sales_12977"); 
	if(!$results){
		echo "maaz";
	}
	 while ($row = mysqli_fetch_array($results)) { ?>
		<tr>
			<td><?php echo $row['Salesperson']; ?></td>
			<td><?php echo $row['Name']; ?></td>
			<td><?php echo $row['ContactNo']; ?></td>
			
			<td>
			<button id="custlist" value =<?php $row['Salesperson']; ?> > List</button>
			<script>$(#custlist).click(function(){
				location.href = "list.php?Salesperson="+$(this).attr('value');
			})
				</script>
</td>
			<td>
				<a href="sales_12977.php?edit=<?php echo $row['Salesperson']; ?>" class="edit_btn" >Edit</a>
			
				<a href="server3.php?del=<?php echo $row['Salesperson']; ?>" class="del_btn">Delete</a>
			</td>
		</tr>
	<?php } ?>
</table>
	


<form method="post" action="server3.php" >

	<input type="hidden" Name="Salesperson" value="<?php echo $Salesperson; ?>">
	<div class="input-group">

		
	
	<div class="input-group">
		<label>Salesperson</label>
		<input type="text" Name="Salesperson" value="<?php echo $Salesperson; ?>">
	</div>	
	<div class="input-group">
		<label>Name</label>
		<input type="text" Name="Name" value="<?php echo $Name ?>">
	</div>

	<div class="input-group">
		<label>ContactNo</label>
		<input type="text" Name="ContactNo" value="<?php echo $ContactNo; ?>">
	</div>

	<div class="input-group">
		<label>CustomerList</label>
		<input type="text" Name="CustomerList" value="<?php echo $CustomerList; ?>">
	</div>

	
       

	

	<div class="input-group">

		<?php if ($update == true): ?>
			<button class="btn" type="submit" Name="update" style="background: #556B2F;" >Update</button>
		<?php else: ?>
			<button class="btn" type="submit" Name="save" >Save</button>
		<?php endif ?>
	</div>
</form>
</body>
</html>