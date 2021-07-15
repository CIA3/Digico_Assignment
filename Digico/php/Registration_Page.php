<html>
<head><title>Registrtion Pge</title>


	<link rel = "stylesheet"  href = "../css/Reg_Style.css">
	 
	  <script src = "../js/reg_form.js"></script>

</head>
</html>


<?php
	session_start();
	include("config.php");
	$error = "";
	

	$fetchQuery = mysqli_query($conn, "select * from Packages") or die ("Could not fetch. " .mysqli_error($conn));
	
	if(isset ($_POST['bt1'])){
	

		$fName = $_POST['fName'];
		$lName = $_POST['lName'];
		$uName = $_POST['uName'];
		$address = $_POST['address'];
		$nic = $_POST['nic'];
		$email = $_POST['email'];
		$number = $_POST['number'];
		$pwd = $_POST['pwd'];
		$num = $_POST['number'];
		$tot = $_POST['total'];

		
		$p1 = $_POST['pq1'];
		$p2 = $_POST['pq2'];
		$p3 = $_POST['pq3'];
		
		$pid1 = $_POST['pid1'];
		$pid2 = $_POST['pid2'];
		$pid3 = $_POST['pid3'];
		
		
		$j = 0;
		$p = 0;
		$sql = "SELECT User_Name, Email FROM Customer";
		$result = $conn->query($sql);

		if ($result->num_rows > 0) 
		{
		  // output data of each row
		  while($row = $result->fetch_assoc()) 
		  {
			if($row["User_Name"] === $uName && $row["Email"]=== $email)
			{
				$j = 1;
				$p = 1;
			}
			
			else if($row["User_Name"] === $uName)
			{
				$j = 1;

			}
			
			else if($row["Email"]=== $email)
			{
				$p = 1;
			}

		  }
		} 
		
				
		if($j == 0 && $p == 0)
		{
			if($p1 > 0){
				$sql1 = "INSERT INTO orders (Customer_UserName, Package_Id, Quantity	)
				VALUES ('$uName', '$pid1', '$p1')";
				
				if ($conn->query($sql1) == TRUE){
					
				}
			}
			
			if($p2 > 0){
				$sql1 = "INSERT INTO orders (Customer_UserName, Package_Id, Quantity	)
				VALUES ('$uName', '$pid2', '$p2')";
				
				if ($conn->query($sql1) == TRUE){
				
				}
			}
			
			if($p3 > 0){
				$sql1 = "INSERT INTO orders (Customer_UserName, Package_Id, Quantity	)
				VALUES ('$uName', '$pid3', '$p3')";
				
				if ($conn->query($sql1) == TRUE){
					
				}
			}
			
			
				$sql = "INSERT INTO Customer (First_Name, Last_Name, Email, User_Name, Address, NIC, Password, Contact_No)
				VALUES ('$fName', '$lName', '$email', '$uName', '$address', '$nic', '$pwd', '$num')";
				
				if ($conn->query($sql) === TRUE){
						
					$_SESSION["user"] = $uName;
					
					require_once('PHPMailer/PHPMailerAutoload.php');
					
					$mail =new PHPMailer();
					$mail->isSMTP();
					$mail->SMTPAuth = true;
					$mail->SMTPSecure ='ssl';
					$mail->Host = 'smtp.gmail.com';
					$mail->Port = '465';
					$mail->isHTML();
					$mail->Username = 'digico3223@gmail.com';
					$mail->Password = '12digico123';
					$mail->SetFrom('no_reply');
					$mail->Subject = 'Digico orders';
					$mail->Body = "Here are your orders $fName<br> Package ID = $pid1,    Quantity = $p1<br> Package ID = $pid2,   Quantity = $p2<br>Package ID = $pid3 \t Quantity = $p3<br>Total payment = $tot";
					$mail->AddAddress("$email");
					
					$mail->Send();
				
					echo "<script type='text/javascript'>window.location.href = 'DashBoard.php';</script>";
					
					
				}
		}
		
		else if($j == 1 && $p == 1){
			$error = 'User name and email already exist';
		}
		
		else if($p == 1){
			$error = 'Email already exist';
		}
		else if($j == 1) {
			$error = "User name already exist";
		}
		else{
			$error = "";

		}
		


}
	

			

?>
<html>

<body>
		<div >
			<form action = "Registration_Page.php" method = "post" onsubmit = "return checkPassword()">
			<div class = "myDiv1">
				<center><h1>Register with us here</h1></center>
				<h4 style = "color : red;"><?php echo $error ?></h4>
				
				<table>
					<tr>
						<td>	
							<label>First name</label> 
							<input type = "text" class = "text" name = "fName" id = "fName" required>
						</td>
						
						<td>	
							<label>Nic Number</label>	
							<input type = "text" class = "text" name = "nic" id = "nic" pattern = "([0-9]{9})+V" required>
						</td>
					</tr>
					<tr>
						<td>	
							<label>Last name</label> 
							<input type = "text" class = "text" name = "lName" id = "lName" required>
						</td>
						
						<td>	
							<label>Email address</label>	
							<input type = "email" class = "text" name = "email" id = "email" pattern = "[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" required>
						</td>
					</tr>
					<tr>
						<td>	
							<label>User name</label> 
							<input type = "text" class = "text" name = "uName" id = "uName" pattern = "[a-zA-Z0-9._+-$@$!%*#?&]{6,}" required>
						</td>
						
						<td>	
							<label>Password</label>	
							<input type = "password" class = "text" name = "pwd" id = "pwd"  placeholder = "8 characters long with at least 1 capital letter and special charactor" pattern = "(?=.*[a-z])(?=.*[$@$!%*#?&])(?=.*[A-Z]).{8,}" required>
						</td>
					</tr>
					<tr>
						<td>	
							<label>Address</label> 
							<input type = "text" class = "text" name = "address" id = "address" required>
						</td>
						
						<td>	
							<label>Re-enter your password</label>	
							<input type = "password" class = "text" name = "rpwd" id = "rpwd" required>
						</td>
					</tr>
					<tr>
						<td>	
							<label>Contact number</label> 
							<input type = "text" class = "text"name = "number" id = "number"  pattern = "(071)([0-9]{7})" required>
	
						</td>
					</tr>			
				</table>
				
				<hr>
				<h3>Package details</h3>
				<?php
					$c = 1;
					while($row = mysqli_fetch_array($fetchQuery)){
						
				?>	
						
						<input type = "checkbox"   id = "check<?php echo $c; ?>" onclick = "enableDisable<?php echo $c; ?>(this)" >
						<input type = "hidden" value = "<?php echo $row['Package_ID'] ?>" id = "pid<?php echo $c ?>" name = "pid<?php echo $c ?>" >
						<label><?php echo $row['Package_Name']; ?></label>
						<input type = "text" value = "<?php echo $row['Package_Price']; ?>" style = "margin-left:40px;" id = "price<?php echo $c; ?>" disabled = "disabled">
						
						<label style = "margin-left:40px;" \ >QTY</label>
						
						<input type = "text" value = "0" name = "pQuantity<?php echo $c; ?>" onkeyup = "calculate<?php echo $c; ?>(this.value), getTot()" id = "pQuantity<?php echo $c; ?>" disabled = "disabled">
						<input type = "hidden" value = "0" name = "pq<?php echo $c; ?>" id = "pq<?php echo $c; ?>" >
						
						<label style = "margin-left:40px;">Sub Total</label>
						<input type = "text" name = "pSubTotal<?php echo $c; ?>" value = "0" id = "pSubTotal<?php echo $c; ?>" value = "0" disabled = "disabled" ><br><br>
						
				<?php
				$c = $c + 1 ;
				
					}
					
				?>
					
				<label>Total</label>
				<input type = "text" style= "margin-left : 200px;" id = "tot" name = "tot" disabled = "disabled">
				<input type = "hidden" style= "margin-left : 200px;" id = "total" name = "total">
				
				<p>By clicking this checkbox you will agree to the <a href = "">Terms and Conditions. </p></a><input align = "center" type = "checkbox" id = "cb" required onclick = "enableButton(this);" style = "width:20px; height:20px;">
				<input type = "SUBMIT" class = "btn" value = "Submit" id = "bt1" name = "bt1" disabled = "disabled">
				<a href = "Login_Page.php"><input type = "button" class = "btn" value = "Back" name = "bt2" 
								id = "b2" ></a>
			</div>
			</form>
		</div>
</body>
</html>