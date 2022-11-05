<?php
	include 'connection.php';
?>
<!DOCTYPE HTML>
<html>
<head>
<title>Add Admin</title>
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
	<script>
		 new WOW().init();
	</script>
<!--//end-animate-->
<!-- Metis Menu -->
<script src="js/metisMenu.min.js"></script>
<script src="js/custom.js"></script>
<link href="css/custom.css" rel="stylesheet">
<!--//Metis Menu -->
</head> 
<body class="cbp-spmenu-push">
	<div class="main-content">
		<!--left-fixed -navigation-->
		
					<!-- //sidebar-collapse -->
				</nav>
			</div>
		</div>
		<!--left-fixed -navigation-->
		<!-- header-starts -->
		<?php
		include 'menu.php';
	?>
	<?php
		include 'header.php';
	?>
		<!-- //header-ends -->
		<!-- main content start-->
		<div id="page-wrapper">
			<div class="main-page">
				<div class="forms">
					<div class="form-grids row widget-shadow" data-example-id="basic-forms"> 
						
					<div class="row">
						<h3 class="title1">Add Admin</h3>
						<div class="form-three widget-shadow">
							<form class="form-horizontal" method="POST">
								<div class="form-group">
									<label for="focusedinput" class="col-sm-2 control-label">Admin Name</label>
									<div class="col-sm-8">
										<input type="text" class="form-control1" id="name" name="name" placeholder="Full Name" pattern="(?=.*[a-z])(?=.*[A-Z]).{,100}" required="">
									</div>
									
								</div>
								<div class="form-group">
									<label for="disabledinput" class="col-sm-2 control-label">Admin Email</label>
									<div class="col-sm-8">
										<input type="text" class="form-control1" id="email" name="email" placeholder="Email Address" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain @ symbol and .com" required="">
									</div>
								</div>
								<div class="form-group">
									<label for="inputPassword" class="col-sm-2 control-label">Password</label>
									<div class="col-sm-8">
										<input type="password" class="form-control1" id="inputPassword" name="pass" placeholder="Password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" required="">
									</div>
								</div>
								
								<div class="form-group">
									<label for="inputPassword" class="col-sm-2 control-label">Re-Password</label>
									<div class="col-sm-8">
										<input type="password" class="form-control1" id="inputPassword" name="rpass" placeholder="Re-Password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" required="">
									</div>
								</div>
								
								<div class="form-group">
									<label for="focusedinput" class="col-sm-2 control-label">Phone Number</label>
									<div class="col-sm-8">
										<input type="tel" class="form-control1" id="number" name="number" placeholder="Enter Phone Number" required="" pattern="^\d{10}$" > 
									</div>
									
								</div>
							
									<button type="submit" name="submit" class="btn btn-default">Submit</button>
							</form>
						</div>
					</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<?php
			if(isset($_POST['submit']))
			{
			$name=$_POST['name'];
			$email=$_POST['email'];
			$phone=$_POST['number'];
			$pass=$_POST['pass'];
			$rpass=$_POST['rpass'];
			
			if($pass==$rpass)
			{
				$query = "INSERT INTO registration(NAME, EMAIL_ID, PHONE_NO, PASSWORD, ROLE, STATUS) VALUES
			('$name','$email','$phone','$pass',1,1)";
			$sql = mysqli_query($conn,$query);
				
				if($sql)
				{
					echo "<script>alert('Admin Added Successfully!!');
									window.location.href='add_admin.php'</script>";
				}
				else
				{
					echo 'something went wrong';
				}
			}
			else
			{
				echo 'both have to be same';
			}
			
			
			}
		?>
		<!--footer-->
		<div class="footer">

		</div>
        <!--//footer-->
	</div>
	<!-- Classie -->
		<script src="js/classie.js"></script>
		<script>
			var menuLeft = document.getElementById( 'cbp-spmenu-s1' ),
				showLeftPush = document.getElementById( 'showLeftPush' ),
				body = document.body;
				
			showLeftPush.onclick = function() {
				classie.toggle( this, 'active' );
				classie.toggle( body, 'cbp-spmenu-push-toright' );
				classie.toggle( menuLeft, 'cbp-spmenu-open' );
				disableOther( 'showLeftPush' );
			};
			
			function disableOther( button ) {
				if( button !== 'showLeftPush' ) {
					classie.toggle( showLeftPush, 'disabled' );
				}
			}
		</script>
	<!--scrolling js-->
	<script src="js/jquery.nicescroll.js"></script>
	<script src="js/scripts.js"></script>
	<!--//scrolling js-->
	<!-- Bootstrap Core JavaScript -->
   <script src="js/bootstrap.js"> </script>
</body>
</html>