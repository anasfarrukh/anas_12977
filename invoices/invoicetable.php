<?php
	include('conn.php');
	if(isset($_POST['show'])){
		?>
		<table class = "table table-bordered alert-warning table-hover">
			<thead>
				<th>CUSTOMER ID</th>
				<th>CUSTOMER NAME</th>
				<th>ADDRESS</th>
				<th>CONTACT NO.</th>
				<th>CNIC</th>
				<th>SALESPERSON ID</th>
			</thead>
				<tbody>
					<?php
						$quser=mysqli_query($conn,'SELECT * FROM anas_12977');
						while($urow=mysqli_fetch_array($quser)){
							?>
								<tr>
									<td><?php echo $urow['Customerid']; ?></td>
									<td><?php echo $urow['Name']; ?></td>
									<td><?php echo $urow['Address']; ?></td>
									<td><?php echo $urow['ContactNo']; ?></td>
									<td><?php echo $urow['CNIC']; ?></td>
									<td><?php echo $urow['SalespersonID']; ?></td>
									<td style = "width: 210px"><button class="btn btn-success" data-toggle="modal" data-target="#edit<?php echo $urow['Customerid']; ?>"><span class = "glyphicon glyphicon-pencil"></span> Edit</button> | <button class="btn btn-danger delete" value="<?php echo $urow['Customerid']; ?>"><span class = "glyphicon glyphicon-trash"></span> Delete</button>
									<?php include('edit_modal.php'); ?>
									</td>
								</tr>
							<?php
						}
					
					?>
				</tbody>
			</table>
		<?php
	}

?>
