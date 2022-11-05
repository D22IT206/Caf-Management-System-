<?php
	include 'connection.php';
?>
<!DOCTYPE HTML>
<head>
<title>Login Page</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Novus Admin Panel Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
SmartPhone Compatible web template, free WebDesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- Bootstrap Core CSS -->
<link href="css/bootstrap.css" rel='stylesheet' type='text/css' />
<!-- Custom CSS -->
<link href="css/style.css" rel='stylesheet' type='text/css' />
<!-- font CSS -->
<!-- font-awesome icons -->
<link href="css/font-awesome.css" rel="stylesheet"> 
<!-- //font-awesome icons -->
 <!-- js-->
<script src="js/jquery-1.11.1.min.js"></script>
<script src="js/modernizr.custom.js"></script>
<!--webfonts-->
<link href='//fonts.googleapis.com/css?family=Roboto+Condensed:400,300,300italic,400italic,700,700italic' rel='stylesheet' type='text/css'>
<!--//webfonts--> 
<!--animate-->
<link href="css/animate.css" rel="stylesheet" type="text/css" media="all">
<script src="js/wow.min.js"></script>
<!--//end-animate-->
<!-- Metis Menu -->
<script src="js/metisMenu.min.js"></script>
<script src="js/custom.js"></script>
<link href="css/custom.css" rel="stylesheet">
<!--//Metis Menu -->
</head> 
<body>
		<!-- //header-ends -->
		<!-- main content start-->
		<div id="page-wrapper" style="padding: 4em 2em 2.5em;">
			<div class="main-page login-page ">
				<h3 class="title1">Login Page</h3>
				<div class="widget-shadow">
					<div class="login-top">
						<h4>Welcome back Admin!! </h4>
					</div>
					<div class="login-body">
						<form method = "POST" enctype="multipart/form-data">
							<input type="text" class="user" name="email" placeholder="Enter your admin id" required="">
							<input type="password" name="password" class="lock" placeholder="Password">
							<input type="submit" name="submit" value="Log In">
						</form>
					</div>
				</div>
			</div>
		</div>
		
	</div>
	<?php
		if(isset($_POST['submit']))
		{
			$email = $_POST['email'];
			$pass = $_POST['password'];
			$sql = "SELECT email_id,password FROM registration WHERE email_id ='$email' AND password = '$pass' AND role=1";
			$res = mysqli_query($conn,$sql);
			$count = mysqli_num_rows($res);
			
				
					if($count==1)
					{
					    session_start();
						$_SESSION['sess_admin'] = $email;
						header("Location:dashboard.php");
					}
		
					else
					{
						echo "Invalid Username or Password";
					}
				}
				
		
	?>
	<!-- Classie -->
		<script src="js/classie.js"></script>
	<!--scrolling js-->
	<script src="js/jquery.nicescroll.js"></script>
	<script src="js/scripts.js"></script>
	<!--//scrolling js-->
	<!-- Bootstrap Core JavaScript -->
   <script src="js/bootstrap.js"> </script>
</body>
</html>