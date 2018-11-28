<?php
   include("connect.php");
   session_start();
   
   if($_SERVER["REQUEST_METHOD"] == "POST") {
      // UserID and Password sent from form 
      
      $UserID = mysqli_real_escape_string($db,$_POST['UserID']);
      $Password = mysqli_real_escape_string($db,$_POST['Password']); 
      
      $sql = "SELECT UserID FROM users_12977 WHERE UserID = '$UserID' and Password = '$Password'";
      $result = mysqli_query($db,$sql);
      $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
    //  $active = $row['active'];
      
      $count = mysqli_num_rows($result);
      
      // If result matched $myUserID and $myPassword, table row must be 1 row
		
      if($count == 1) {
         $_SESSION['UserID'] = $UserID;
         
         header("location: homepage.php");
      }else {
         $error = "Your Login Name or Password is invalid";
      }
   }
?>
<html>
<head>
	<title>User Login</title>
	
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" >
 
<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" >
 
<link rel="stylesheet" href="styles.css" >
 
<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
 
<div class="container">
      <form class="form-signin" method="POST">
      <?php if(isset($fmsg)){ ?><div class="alert alert-danger" role="alert"> <?php echo $fmsg; ?> </div><?php } ?>
        <h2 class="form-signin-heading">Sign In</h2>
        <div class="input-group">
	  <span class="input-group-addon" id="basic-addon1">Username</span>
	  <input type="text" name="UserID" class="form-control" placeholder="UserID" required>
	</div>
        <label for="inputPassword" class="sr-only">Password</label>
        <input type="Password" name="Password" id="inputPassword" class="form-control" placeholder="Password" required>
        <button class="btn btn-lg btn-primary btn-block" type="submit">Login</button>
        
      </form>
</div>
 
</body>
 
</html>
