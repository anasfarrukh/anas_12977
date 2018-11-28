<!DOCTYPE html>
<html>
<head>
	<title>Users </title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<?php 
include('server4.php');
include('homepage.php');

	if (isset($_GET['edit'])) {
		$ID = $_GET['edit'];
		$update = true;
		$record = mysqli_query($db, "SELECT * FROM users_12977 WHERE UserID='$UserID'");

	
			$n = mysqli_fetch_array($record);
			$UserID = $n['UserID'];
			$Password = $n['Password'];
                        $Active = $n['Active'];
                 			$Salesperson  = $n['Salesperson']; 

		

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

			<h3> users_12977 INFORMATION </h3>


			<th style="background-color: black;">UserID</th>
			<th style="background-color: black;">Password</th>
			<th style="background-color: black;">Active</th>
			<th style="background-color: black;">Salesperson</th>
			
	<?php $results = mysqli_query($db, "SELECT * FROM users_12977"); 
	if(!$results){
		echo "maaz";
	}
	 while ($row = mysqli_fetch_array($results)) { ?>
		<tr>
			<td><?php echo $row['UserID']; ?></td>
			<td><?php echo $row['Password']; ?></td>
			<td><?php echo $row['Active']; ?></td>
			<td><?php echo $row['Salesperson']; ?></td>
			<td>
				<a href="users_12977.php?edit=<?php echo $row['UserID']; ?>" class="edit_btn" >Edit</a>
			
				<a href="server4.php?del=<?php echo $row['UserID']; ?>" class="del_btn">Delete</a>
			</td>
		</tr>
	<?php } ?>
</table>
	


<form method="post" action="server4.php" >

	<input type="hidden" name="UserID" value="<?php echo $UserID; ?>">
	<div class="input-group">

		
	
	<div class="input-group">
		<label>UserID</label>
		<input type="text" name="UserID" value="<?php echo $UserID; ?>">
	</div>	
	<div class="input-group">
		<label>Password</label>
		<input type="text" name="Password" value="<?php echo $Password ?>">
	</div>

	<div class="input-group">
		<label>Active</label>
		<input type="text" name="Active" value="<?php echo $Active; ?>">
	</div>

	<div class="input-group">
		<label>Salesperson</label>
		<input type="text" name="Salesperson" value="<?php echo $Salesperson; ?>">
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