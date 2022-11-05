<?php
	include 'connection.php';
?>
<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
	<!--fonts-->
		<link href='http://fonts.googleapis.com/css?family=Lato:100,300,400,700,900,100italic,300italic,400italic,700italic,900italic' rel='stylesheet' type='text/css'>
		<link href='http://fonts.googleapis.com/css?family=Slabo+27px' rel='stylesheet' type='text/css'>
		<link href='http://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700' rel='stylesheet' type='text/css'>
		
	<!--//fonts-->
			<link href="css/bootstrap.css" rel="stylesheet">
			<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
	<!-- for-mobile-apps -->
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<meta name="keywords" content="Favorites Responsive web template, Bootstrap Web Templates, Flat Web Templates, Andriod Compatible web template, 
		Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyErricsson, Motorola web design" />
		<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
	<!-- //for-mobile-apps -->	
	<!-- js -->
		<script type="text/javascript" src="js/jquery.min.js"></script>
	<!-- js -->
	<!-- cart -->
		<script src="js/simpleCart.min.js"> </script>
	<!-- cart -->
	<!-- start-smoth-scrolling -->
		<script type="text/javascript" src="js/move-top.js"></script>
		<script type="text/javascript" src="js/easing.js"></script>
		<script type="text/javascript">
			jQuery(document).ready(function($) {
				$(".scroll").click(function(event){		
					event.preventDefault();
					$('html,body').animate({scrollTop:$(this.hash).offset().top},1000);
				});
			});
		</script>
	<!-- start-smoth-scrolling -->

</head>
<body>
<!-- header -->
	<?php
		include 'User_header.php';
	?>
	<?php
		include 'User_Menu.php';
	?>
<!-- //header -->
<!-- banner -->
<!-- //banner -->
<!-- login-page -->
<div class="login">
	<div class="container">
		<div class="login-grids">
			<div class="col-md-6 log">
					 <h3>LOGIN</h3>
					 <div class="strip"></div>
					 <p>Welcome, please enter the following to continue.</p>					
					  <form method="POST">
						 <h5>User Name:</h5>	
						 <input type="text" name="email">
						 <h5>Password:</h5>
						 <input type="password" name="password">	
						 <input type="submit" value="LOGIN" name="submit">
					 </form>
			</div>
			<?php
				if (isset($_POST['submit'])) 
				{
					$email = $_POST['email'];
					$pass = $_POST['password'];
					$sql = "SELECT * FROM registration WHERE EMAIL_ID ='$email' AND PASSWORD = '$pass' AND ROLE=2";
					$res = mysqli_query($conn,$sql);
					$count = mysqli_num_rows($res);
					$val=mysqli_fetch_array($res);
					$uemail=$val['EMAIL_ID'];
					$ulid=$val['USER_ID'];
					//echo $ulid;
				
					if($count==1)
					{
						$_SESSION['sess_user'] = $uemail;
						$_SESSION['user_id'] = $ulid;
						//echo "Login Successful";
						echo "<script>window.location.href='./';</script>";
					}
		
					else
					{
						echo "Invalid Username or Password";
					}
				}
			?>
			<div class="col-md-6 login-right">
					<h3>NEW REGISTRATION</h3>
					<div class="strip"></div>
					<p>By creating an account with our store, you will be able to move through the checkout process faster, store multiple shipping addresses, view and track your orders in your account and more.</p>
					<a href="register.php" class="hvr-shutter-in-horizontal button">CREATE AN ACCOUNT</a>
			</div>
			<div class="clearfix"></div>
		</div>
	</div>
</div>
<!-- //login-page -->
<!-- footer-top -->
	<?php
		include 'User_footer.php';
	?>
<!-- //footer -->
<!-- smooth scrolling -->
	<script type="text/javascript">
		$(document).ready(function() {
		/*
			var defaults = {
			containerID: 'toTop', // fading element id
			containerHoverID: 'toTopHover', // fading element hover id
			scrollSpeed: 1200,
			easingType: 'linear' 
			};
		*/								
		$().UItoTop({ easingType: 'easeOutQuart' });
		});
	</script>
	<a href="#" id="toTop" style="display: block;"> <span id="toTopHover" style="opacity: 1;"> </span></a>
<!-- //smooth scrolling -->

</body>
</html>
