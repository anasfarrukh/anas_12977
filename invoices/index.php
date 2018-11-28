<?php
	include('conn.php');
	session_start();

 if(!isset($_SESSION['UserID']))
 {
	header("Location: ../login.php");
 }
?>
<html lang = "en">
	<head>
		<link rel = "stylesheet" type = "text/css" href = "css/bootstrap.css" />
		<!--<link rel = "stylesheet" type = "text/css" href = "../style.css" /> -->
		<title>Invoice</title>
	</head>
<body>
	<ul>
  <li><a href="../homepage.php">Home</a></li>
  <li><a href="../index.php">Customers</a></li>
  <li><a href="../sales_12977.php">Sales</a></li>
  <li><a href="../product_12977.php">Products</a></li>
  <li><a href="../users_12977.php">Users</a></li>
  <li><a class = "active" href="./index.php">Invoices</a></li>
  <li style="float:right"><a id = "logout-btn" href="../logout.php">Logout</a></li>
  <li style="float:right"><a>Logged in as <?php echo $_SESSION['UserID'];?></a></li>
	</ul>
	<div style="height:30px;"></div>
	<div class = "row">	
		<div class = "col-md-1">
		</div>
		<div class = "col-md-10 well">
			<div class="row">
                <div class="col-lg-12">
                    <center><h2 style="color:white;">SELECT INVOICE</h2></center>
					<hr>
					<form  id = "invform" class = "form-horizontal">
						<div class = "form-group">
							<label>CUSTOMER ID</label>
							<?php
									$sql = "SELECT Customerid FROM anas_12977";
									$result = mysqli_query($conn, $sql);
									echo "<select type = 'text' id = 'searchid' class = 'form-control'>";
									echo "<option value= ''>SELECT CUSTOMER</option>";
									while ($row = mysqli_fetch_array($result)) {
										echo "<option value='" . $row['Customerid'] ."'>" . $row['Customerid'] ."</option>";
									}
									echo "</select>";
							?>
						</div>
						<div class = "form-group">
							<div id = "searchinv"></div>
						</div>
					</form>
					<button class="btn btn-success" data-toggle="modal" data-target="#createinvoice"><span class = "glyphicon glyphicon-pencil"></span>ADD NEW INVOICE</button>
					<hr>
					
					<div id="userTable"></div>

					<button class="btn btn-success" id = "add1" data-toggle="modal" data-target="#addentry" disabled="true"><span class = "glyphicon glyphicon-pencil" ></span>ADD ITEM</button>


					<div class="modal fade" id="createinvoice" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
						<div class="modal-dialog" role="document">
   						 <div class="modal-content" style="background-color:#5b5b5b; color:white;">
						<div class = "modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<center><h3 style="color:white;">Create Invoice</h3></center>
					</div>
					<div class="modal-body">
					<form  id = "addform" class = "form-horizontal">
						<div class = "form-group">
							<label>INVOICE ID</label>
							<input type  = "text" id = "Invoice_ID" class = "form-control">
						</div>
						<div class = "form-group">
							<label>DATE</label>
							<input type  = "date" id = "Date" class = "form-control">
						</div>
						<div class = "form-group">
							<label>CUSTOMER ID</label>
							<input type  = "text" id = "Customerid" class = "form-control">
						</div>
					    <div class = "form-group">
							<label>CUSTOMER NAME</label>
							<input type  = "text" id = "Name" class = "form-control" readonly>
						</div>
					    <div class = "form-group">
							<label>ADDRESS</label>
							<input type  = "text" id = "Address" class = "form-control" readonly>
						</div>
						<div class = "form-group">
							<label>CONTACT NO.</label>
							<input type  = "text" id = "ContactNo" class = "form-control" readonly>
						</div>
						<div class = "form-group">
							<label>CNIC</label>
							<input type  = "text" id = "CNIC" class = "form-control" readonly>
						</div>
						
					    <div class = "form-group">
							<label>SALESPERSON ID</label>
							<input type  = "text" id = "SalespersonID" class = "form-control" readonly>
						</div>
						

					</form>
					</div>
				<div class="modal-footer">
			<button type="button" class="btn btn-default" data-dismiss="modal"><span class = "glyphicon glyphicon-remove"></span> Cancel</button> | <button type="button" class="btn btn-success" id="addnew"><span class = "glyphicon glyphicon-floppy-disk"></span> Save</button>
		</div>			
</div>
</div>
</div>
</div>
</div>
		<div class="modal fade" id="addentry" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
						<div class="modal-dialog" role="document">
   						 <div class="modal-content" style="background-color:#5b5b5b; color:white;">
						<div class = "modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<center><h3 style="color:white;">Add Entry</h3></center>
					</div>
					<div class="modal-body">
					<form  class = "form-horizontal">
						
						<div class = "form-group">
							<label>ITEM</label>
							<?php
									$sql = "SELECT * FROM product_12977";
									$result = mysqli_query($conn, $sql);
									echo "<select type = 'text' id = 'ProductCode' class = 'form-control' name='type'>";
									echo "<option value= ''>SELECT PRODUCT</option>";
									while ($row = mysqli_fetch_array($result)) {
										echo "<option value='" . $row['ProductCode'] ."'>" . $row['Brand'] ."</option>";
									}
									echo "</select>";
							?>
						</div>
						<div class = "form-group">
							<label>QUANTITY</label>
							<input type  = "number" id = "Quantity" class = "form-control">
						</div>
						<div class = "form-group">
							<label>DISCOUNT</label>
							<input type  = "number" id = "Discount" value = '0' class = "form-control">
						</div>
						<div class = "form-group">
							<label>TOTAL</label>
							<input type  = "number" id = "total" class = "form-control" readonly>
						</div>
						<div class = "form-group">
							<label>TYPE</label>
							<input type  = "text" id = "Type" class = "form-control" readonly>
						</div>
						<div class = "form-group">
							<label>SHADE</label>
							<input type  = "text" id = "Shade" class = "form-control" readonly>
						</div>
						<div class = "form-group">
							<label>SIZE</label>
							<input type  = "text" id = "Size" class = "form-control" readonly>
						</div>
						<div class = "form-group">
							<label>SALES PRICE</label>
							<input type  = "number" id = "SalesPrice" class = "form-control" readonly>
						</div>
						
					</form>
					</div>
				<div class="modal-footer">
			<button type="button" class="btn btn-default" data-dismiss="modal"><span class = "glyphicon glyphicon-remove"></span> Cancel</button> | <button type="button" class="btn btn-success" id="additem"><span class = "glyphicon glyphicon-floppy-disk"></span> Save</button>
		</div>
				</div>
				</div><br>
			
		</div>
	</div>
</body>
<script src = "js/jquery-3.1.1.js"></script>	
<script src = "js/bootstrap.js"></script>

<script type = "text/javascript">
$(document).ready(function(){
		var price = 0;
		$('#searchid').change(function(){
			if ($('#searchid').val() == "")
				$('#searchInvoice_ID').prop('disabled', true);
			else
			{
				$('#searchInvoice_ID').prop('disabled', false);
				showinvid();
			}
		});
		$('#searchinv').change(function(){
			if ($('#searchInvoice_ID').val() == "")
				$('#add1').prop('disabled', true);
			else
			{
				$('#add1').prop('disabled', false);
			}
			show();
		});

$('#Quantity').change(function(){
				var total = parseInt((100-$('#Discount').val())/100 * $('#SalesPrice').val() * $('#Quantity').val()); 
   				$('#total').val(total);
});

$('#Discount').change(function(){
				var total = parseInt((100-$('#Discount').val())/100 * $('#SalesPrice').val() * $('#Quantity').val()); 
   				$('#total').val(total);
});

$('#ProductCode').change(function(){
			$ProductCode = $('#ProductCode').val();
   		
   		$.ajax({
   			type: "POST",
   			url: "search.php",
   			data: {
   				ProductCode: $ProductCode,
   				searchprod: 1,
   			},
   			
   			success: function(data)
   			{
   				var obj = JSON.parse(data);
   				$('#Shade').val(obj.Shade);
   				$('#Type').val(obj.Type);
   				$('#Size').val(obj.Size);
   				$('#SalesPrice').val(obj.SalesPrice);
   				SalesPrice = parseInt(obj.SalesPrice);
   			}
   		});
});

$('#Customerid').change(function(){
			$Customerid = $('#Customerid').val();
   		
   		$.ajax({
   			type: "POST",
   			url: "search.php",
   			data: {
   				Customerid: $Customerid,
   				search: 1,
   			},
   			
   			success: function(data)
   			{
   				var obj = JSON.parse(data);
   				$('#Customerid').val(obj.Customerid);
   				$('#Name').val(obj.Name);
   				$('#Address').val(obj.Address);
   				$('#ContactNo').val(obj.ContactNo);
   				$('#CNIC').val(obj.CNIC);
   				$('#SalespersonID').val(obj.SalespersonID);
				
   			}
   		});
});

$(document).on('click', '#additem', function(){
			if ($('#ProductCode').val()=="" || $('#Quantity').val()=="" || $('#Quantity').val()<=0 || $('#Discount').val()<0|| $('#Discount').val() == ''){
				alert('Please input data first');
			}
			else{
			$('#addentry').modal('hide');
			$('body').removeClass('modal-open');
			$('.modal-backdrop').remove();
			$ProductCode=$('#ProductCode').val();
			$Quantity=$("#Quantity").val();
			$Discount=$("#Discount").val();	
			$Invoice_ID=$("#searchInvoice_ID").val();
			$('#additem').html('Adding..');
			$.ajax({
					type: "POST",
					url: "addnew.php",
					data: {
						ProductCode: $ProductCode,
						Invoice_ID: $Invoice_ID,
						Quantity: $Quantity,
						Discount: $Discount,
						additem: 1,
					},
					success: function(response){
						$obj = response;
						if($obj != "")
        					alert($obj);
						$('#additem').html('Add');
						show();
						
					}
				});
			}
		});


		//ADD NEW
		$(document).on('click', '#addnew', function(){
			if ($('#Customerid').val()=="" || $('#Invoice_ID').val()=="" || isNaN(Date.parse($('#Date').val()))){
				alert('Please input data first');
			}
			else{
			$('#createinvoice').modal('hide');
			$('body').removeClass('modal-open');
			$('.modal-backdrop').remove();
			$Customerid=$('#Customerid').val();
			$Invoice_ID=$("#Invoice_ID").val();
			$Date=$("#Date").val();	
			$('#addnew').html('Adding..');
			$.ajax({
					type: "POST",
					url: "addnew.php",
					data: {
						Customerid: $Customerid,
						Invoice_ID: $Invoice_ID,
						Date: $Date,
						add: 1,
					},
					success: function(response){
						$obj = response;
						if($obj != "")
        					alert($obj);
						$('#addnew').html('Add');
						showinvid();
						
					}
				});
			}
		});
		

		//DELETE
		$(document).on('click', '.delete', function(){
			$id=$(this).val();
			$(this).html('Deleting..');
				$.ajax({
					type: "POST",
					url: "delete.php",
					data: {
						id: $id,
						del: 1,
					},
					success: function(response){
						$obj = response;
						if($obj != "")
						{
        					alert($obj);
        					$(this).html('Delete');
						}
        				showinvid();
        				show();
					}
				});
		});

		$(document).on('click', '.deleteitem', function(){
			$id=$(this).val();
			$(this).html('Deleting..');
				$.ajax({
					type: "POST",
					url: "delete.php",
					data: {
						id: $id,
						delitem: 1,
					},
					success: function(response){
						$obj = response;
						if($obj != "")
						{
        					alert($obj);
        					$(this).html('Delete');
						}
        				show();
					}
				});
		});

		//UPDATE
		$(document).on('click', '.updateuser', function(){
			$uid=$(this).val();
			$('#edit'+$uid).modal('hide');
			$('body').removeClass('modal-open');
			$('.modal-backdrop').remove();
			$uQuantity=$('#uQuantity'+$uid).val();
			$uDiscount=$('#uDiscount'+$uid).val();
			$.ajax({
					type: "POST",
					url: "update.php",
					data: {
						id: $uid,
						Quantity: $uQuantity,
						Discount: $uDiscount,
						edit: 1,
					},
					success: function(){
						show();
					}
				});
		});
	
	});
	
	function showinvid(){
		$searchid = $('#searchid').val();
		$.ajax({
			url: 'searchinvoice.php',
			type: 'POST',
			data:{
				searchid: $searchid,
			},
			success: function(response){
				$('#searchinv').html(response);
			}
		});
	}
	function show(){
		$Customerid=$('#searchid').val();
		$Invoice_ID=$('#searchInvoice_ID').val();
		$.ajax({
			url: 'show_user.php',
			type: 'POST',
			data:{
				Invoice_ID: $Invoice_ID,
				Customerid: $Customerid,
				show: 1,
			},
			success: function(response){
				$('#userTable').html(response);
			}
		});
	}
	
</script>
<style type="text/css">
	body{
	background-color:#5b5b5b;
	color:white;
} 
	#invform{

		padding: 20px 20px;
		border: 2px solid;
	}

ul {
    list-style-type: none;
    margin: 0;
    padding: 0;
    overflow: hidden;
    background-color: black;
}

li {
    float: left;
}

li a {
    display: block;
    color: white !important;
    text-align: center;
    padding: 14px 16px;
    text-decoration: none !important;
}

li a:hover:not(.active) {
    background-color: orange;
}
#logout-btn:hover{
	background-color: maroon;
}

.active {
    background-color: orange;
}
.active:hover {
    background-color: orange;
    border-color: #419641;
}

</style>
</html>
