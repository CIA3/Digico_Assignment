<html>
<head><title>DashBoard</title>

<link rel = "stylesheet"  href = "../css/dashboards.css">

</head>
<?php
	session_start();
	include("config.php");
	
	$tot = 0;
	$userName= $_SESSION['user'];
	$fetchQuery = mysqli_query($conn, "select * from orders where Customer_UserName = '$userName' ") or die ("Could not fetch. " .mysqli_error($conn));
	

?>
<body>
	<div class = "card">
	<center>
		<h3>Welcome <?php echo $userName; ?></h3>
		<h3>Here are your orders</h3>
	</center>
	<?php	
			while($row = mysqli_fetch_array($fetchQuery)){
				
				$packageID = $row['Package_ID'];
				$qty = $row['Quantity'];
				$package = mysqli_query($conn, "select*from Packages where Package_ID = '$packageID'") or die("Value not found". mysqli_error($conn));
				if(mysqli_num_rows($package) > 0){
							while($row = mysqli_fetch_array($package)){
				$tot = $tot + $qty * $row['Package_Price'];

			?>
			<div class="responsive">
			  <div class="gallery">
				<a target="_blank" href="img_forest.jpg">
				  <img src="<?php echo $row['image'] ?>" alt="Forest" width="600" height="400">
				</a>
				<div class="desc">
						<p>Package name = <?php echo $row['Package_Name'] ?> </p>
						<p>Package price = <?php echo $row['Package_Price'] ?> </p>
						<p>Ordered quantity = <?php echo $qty ?></p>
				</div>
			  </div>
			</div>
	<?php
					}
				}
				
			}
			
	?>	
	
	</div>
	<p>Your total payment = <?php echo $tot ?></p>
	<a href = "Login_Page.php"><input type = "button" class = "btn" value = "Logout" name = "bt2" id = "b2"></a>
</body>
</html>

