<?php include 'config.php'; 
session_start();
if (@$_SESSION['username']!="") {
	echo "<script>location.href='home.php'</script>";
}

if (isset($_POST['Sign_In'])) {
	$email =  mysqli_real_escape_string($con,$_POST['email']);
	$password =  mysqli_real_escape_string($con,$_POST['password']);

	$query = "SELECT * FROM `admin` WHERE email='$email'  AND password='$password'";
	$result  = mysqli_query($con,$query);
	$count = mysqli_num_rows($result);
	if ($count==1) {
		$fetch = mysqli_fetch_array($result);
		$_SESSION['username'] = $fetch['username'];
		echo "<script>alert('login success');location.href='home.php'</script>";
	}
	else{
		echo "<script>alert('invalid username or password')</script>";
	}

}


?>

<!DOCTYPE HTML>
<html>
<head>
	<title>Login</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

	<!-- Bootstrap Core CSS -->
	<link href="css/bootstrap.css" rel='stylesheet' type='text/css' />

	<!-- Custom CSS -->
	<link href="css/style.css" rel='stylesheet' type='text/css' />

	<!-- font-awesome icons CSS-->
	<link href="css/font-awesome.css" rel="stylesheet"> 
	<!-- //font-awesome icons CSS-->

	<!-- side nav css file -->
	<link href='css/SidebarNav.min.css' media='all' rel='stylesheet' type='text/css'/>
	<!-- side nav css file -->

	<!-- js-->
	<script src="js/jquery-1.11.1.min.js"></script>
	<script src="js/modernizr.custom.js"></script>

	<!--webfonts-->
	<link href="//fonts.googleapis.com/css?family=PT+Sans:400,400i,700,700i&amp;subset=cyrillic,cyrillic-ext,latin-ext" rel="stylesheet">
	<!--//webfonts-->

	<!-- Metis Menu -->
	<script src="js/metisMenu.min.js"></script>
	<script src="js/custom.js"></script>
	<link href="css/custom.css" rel="stylesheet">
	<!--//Metis Menu -->

</head> 
<body>
	<!-- main content start-->
	<div id="page-wrapper">
		<div class="main-page login-page ">
			<h2 class="title1">Login</h2>
			<div class="widget-shadow">
				<div class="login-body">
					<form method="post">
						<input type="email" class="user" name="email" placeholder="Enter Your Email" required>
						<input type="password" name="password" class="lock" placeholder="Password" required>
						<div class="forgot-grid">
							<!-- <label class="checkbox"><input type="checkbox" name="checkbox" checked=""><i></i>Remember me</label> -->
							<div class="forgot">
								<a href="#">forgot password?</a>
							</div>
							<div class="clearfix"> </div>
						</div>
						<input type="submit" name="Sign_In" value="Sign In">
					</form>
				</div>
			</div>

		</div>
	</div>
</body>
</html>