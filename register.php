<?php
	include 'connection.php';
?>
<!DOCTYPE html>
<html>
<head>
	<title> Register</title>
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
<!-- //header -->
<!-- banner -->
<!-- //banner -->
<!-- registration-form -->
<div class="registration-form">
	<div class="container">
		<h3>Registration</h3>
		<div class="strip"></div>
			<div class="registration-grids">
				<div class="reg-form">
					<div class="reg">
						<p>Welcome, please enter the following details to continue.</p>
						<p>Already Have an Account? <a href="login.php">click here</a></p>
					    <form method="POST">
							<ul>
								<li class="text-info">Name: </li>
								<li><input type="text" name="Fname" placeholder="Enter your First Name" required=""  pattern="(?=.*[a-z])(?=.*[A-Z]).{,100}"></li>
							</ul>				 
							<ul>
								<li class="text-info">Email: </li>
								<li><input type="text" name="email" placeholder="Enter your email" required="" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain @ symbol and .com"></li>
							</ul>
							<ul>
								<li class="text-info">Password: </li>
								<li><input type="password" name="pass" placeholder="Enter your password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" required=""></li>
							</ul>
					 		<ul>
								<li class="text-info">Re-enter Password:</li>
								<li><input type="password" name="repass" placeholder="Re-enter your password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" required=""></li>
							</ul>
							<ul>
								<li class="text-info">Mobile Number:</li>
								<li><input type="text" name="phone" placeholder="Enter Phone Number" pattern="^\d{10}$" required=""></li>
							</ul>						
								<input type="submit" value="REGISTER NOW" name="register">
									<p class="click">By clicking this button, you are agree to my  <a href="#">Policy Terms and Conditions.</a></p> 
						</form>
					</div>
					<?php
						if(isset($_POST['register']))
						{
							$name = $_POST['Fname'];
							$email = $_POST['email'];
							$phone = $_POST['phone'];
							$pass = $_POST['pass'];
							$rpass = $_POST['repass'];
							if ($pass==$rpass) 
							{
								$query = "INSERT INTO registration(NAME,EMAIL_ID,PHONE_NO,PASSWORD,ROLE,STATUS) VALUES ('$name','$email','$phone','$pass',2,1)";
								$sql = mysqli_query($conn,$query);
								if($sql)
								{
									echo '<h3>Registered Successfully</h3>';
								}
								else
								{
									echo '<h3>something went wrong<h3>';
								}
							}
							else
							{
								echo '<h3>both password have to be same<h3>';
							}	
						}
					?>
				</div>
				<div class="reg-right">
					<h3>Already Registration</h3>
					<div class="strip"></div>
						<p>Have you already created an account with us? If yes than please click below to login with your credentials!</p>
						<a href="login.php" class="hvr-shutter-in-horizontal button">LOGIN</a>
					<div class="strip"></div>
				</div>
			<div class="clearfix"></div>
		</div>
	</div>
</div>
<!-- registration-form -->

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
