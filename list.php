<?php 
include('server4.php');
include('homepage.php');

	if (isset($_GET['edit'])) {
		$ID = $_GET['edit'];
		$update = true;
		$record = mysqli_query($db, "SELECT * FROM user_13166 WHERE userid='$userid'");

	
			$n = mysqli_fetch_array($record);
			$userid = $n['userid'];
			$password = $n['password'];
                        $active = $n['active'];
                 			$salesid  = $n['salesid']; 

		

	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>CRUD PHP MySQL 13166 </title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
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

			<h3> USER_13166 INFORMATION </h3>


			<th>userid</th>
			<th>password</th>
			<th>active</th>
			<th>salesid</th>
			
	<?php
	$salesid = $_POST['$salesid'];
	$results = mysqli_query($db, "SELECT * FROM user_13166 WHERE salesid='$salesid'"); 
	if(!$results){
		echo "maaz";
	}
	 while ($row = mysqli_fetch_array($results)) { ?>
		<tr>
			<td><?php echo $row['userid']; ?></td>
			<td><?php echo $row['password']; ?></td>
			<td><?php echo $row['active']; ?></td>
			<td><?php echo $row['salesid']; ?></td>
			<td>
				<a href="user13166.php?edit=<?php echo $row['userid']; ?>" class="edit_btn" >Edit</a>
			
				<a href="server4.php?del=<?php echo $row['userid']; ?>" class="del_btn">Delete</a>
			</td>
		</tr>
	<?php } ?>
</table>
	


<form method="post" action="server4.php" >

	<input type="hidden" name="userid" value="<?php echo $userid; ?>">
	<div class="input-group">

		
	
	<div class="input-group">
		<label>userid</label>
		<input type="text" name="userid" value="<?php echo $userid; ?>">
	</div>	
	<div class="input-group">
		<label>password</label>
		<input type="text" name="password" value="<?php echo $password ?>">
	</div>

	<div class="input-group">
		<label>active</label>
		<input type="text" name="active" value="<?php echo $active; ?>">
	</div>

	<div class="input-group">
		<label>salesid</label>
		<input type="text" name="salesid" value="<?php echo $salesid; ?>">
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