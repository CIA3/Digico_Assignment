<html>
<head><title>Login page</title>

<link rel = "stylesheet"  href = "../css/login_styles.css">
<script>
		function myFunction() {
			var x = document.getElementById("password");
				if (x.type === "password") {
					x.type = "text";
					} else {
				x.type = "password";
				}
			}
</script>


<?php
	session_start();
	$error = '';
	include("config.php");
	
	
	
	if(isset($_POST['bt1'])){
		
		$uName = $_POST['uName'];
		$password = $_POST['password'];
	
		$sql = "SELECT * FROM Customer";
		$result = $conn->query($sql);

		if ($result->num_rows > 0)
		{
			while($row = $result->fetch_assoc())
			{
				if($row["User_Name"] == $uName && $row["Password"] == $password)
				{
						$_SESSION["user"] = $uName;
					 
					 header("location: DashBoard.php");
				}
				
				else
				{
					$error = 'Invalid username or password';

				}
			}
		
		} 
	}
 

?>
</head>

<body>
		<center style  = "margin-bottom : 250px;">
			<table style="border:0px;">

				<tr>
					<td>

						<div class = "myDiv1" >

							<form name = "form"  action = "Login_Page.php" method = "POST">

								<h3 style = "text-align:center; color:black; font-size:32px; font-family: helvetica, sans-serif; "><strong>Login</strong></h3><br>
								<h4 style = "text-align:center; color:black;margin-top:-40px; ">Welcome! Login or Create a account</h4>
							<div>
	
								<input placeholder = "Username" type = "text" name = "uName" id = "uName"  class = "txt" required style = "margin-top:50px;width:400px; height:30px; font-size:18px;"><br><br>
							</div>
							<br>
							<div>
								<input placeholder = "Password" type = "password" name = "password" id = "password" class = "txt" required style = "margin-top:-30px;font-size:18px; width:400px; height:30px;">
								<br><h4 style = "color : red;"><?php  echo $error; ?></h4>
							<input type="checkbox" onclick="myFunction()">Show Password<br>
							</div>
						
							<div>
								<input type = "submit" name = "bt1"
								  value = "Login" id = "bt1"  class = "btn"><br>
								
							</div>	
							<div>
								<a href = "Registration_Page.php"><input type = "button" class = "btn" value = "Sign Up" name = "bt2" id = "b2"></a>
								
							</div>
							</form>

						</div>

					</td>
				</tr>


		</table>
	</center>
	
</body>
</html>