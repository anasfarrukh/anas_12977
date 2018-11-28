<?php
	include('conn.php');
	if(isset($_POST['show'])){
		?>
		
		<table class = "table table-bordered alert-warning table-hover">
			<thead>
				<th>INVOICE ID</th>
				<th>DATE(YYYY-MM-DD)</th>
				<th>CUSTOMER ID</th>
				<th>CUSTOMER NAME</th>
				<th>ADDRESS</th>
				<th>CONTACT NO</th>
				<th>CNIC</th>
				<th>SALESPERSON ID</th>
				<th>ACTIONS</th>
			</thead>
				<tbody>
					<?php
					$Customerid = $_POST['Customerid'];
					$Invoice_ID = $_POST['Invoice_ID'];
					if($Customerid != "" || $Invoice_ID != "" || $Invoice_ID != 'NOT ASSIGNED'){
					$qinv = mysqli_query($conn, "SELECT * FROM invoice_12977 WHERE Invoice_ID = '$Invoice_ID'");
					$invrow = mysqli_fetch_array($qinv);
					if($invrow != NULL){
						$quser=mysqli_query($conn,"SELECT * FROM anas_12977 WHERE Customerid = '$Customerid'");
						$urow=mysqli_fetch_array($quser);
							?>
								<tr>
									<td><?php echo $invrow['Invoice_ID'];?> </td>
									<td><?php echo $invrow['Date'];?> </td>
									<td><?php echo $invrow['Customerid'];?> </td>
									<td><?php echo $urow['Name']; ?></td>
									<td><?php echo $urow['Address']; ?></td>
									<td><?php echo $urow['ContactNo']; ?></td>
									<td><?php echo $urow['CNIC']; ?></td>
									<td><?php echo $urow['SalespersonID']; ?></td>
									<td > <button class="btn btn-danger delete" value="<?php echo $invrow['Invoice_ID']; ?>"><span class = "glyphicon glyphicon-trash"></span> Delete</button>
									
									</td>
								</tr>
							<?php } }?>
				</tbody>
			</table>
			<center><h2 style="color:white;">INVOICE</h2></center>
			<hr>

					<table class = "table table-bordered alert-warning table-hover">
			<thead>
				<th>ID</th>
				<th>INVOICE ID</th>
				<th>PRODUCT</th>
				<th>PRICE</th>
				<th>QUANTITY</th>
				<th>DISCOUNT(%)</th>
				<th>TOTAL</th>
			</thead>
				<tbody>
					<?php
						$quser=mysqli_query($conn,"SELECT I.ID, I.Invoice_ID, P.Brand, P.SalesPrice, I.Quantity, I.Discount, cast((100-I.Discount)/100*(I.Quantity*P.SalesPrice) as int) AS TOTAL FROM salesorder_12977 I, product_12977 P WHERE I.Invoice_ID = '$Invoice_ID' AND I.ProductCode = P.ProductCode");
						
						while($urow=mysqli_fetch_array($quser)){
							?>
								<tr>
									<td><?php echo $urow['ID']; ?></td>
									<td><?php echo $urow['Invoice_ID']; ?></td>
									<td><?php echo $urow['Brand']; ?></td>
									<td><?php echo $urow['SalesPrice']; ?></td>
									<td><?php echo $urow['Quantity']; ?></td>
									<td><?php echo $urow['Discount']; ?></td>
									<td><?php echo $urow['TOTAL']; ?></td>
									
									<td style = "width: 210px"><button class="btn btn-success" data-toggle="modal" data-target="#edit<?php echo $urow['ID']; ?>"><span class = "glyphicon glyphicon-pencil"></span> Edit</button> | <button class="btn btn-danger deleteitem" value="<?php echo $urow['ID']; ?>"><span class = "glyphicon glyphicon-trash"></span> Delete</button>
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
