<?php
	include 'connection.php';
?>

<!DOCTYPE html>
<html>
<head>
	<title>Reach Us</title>
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
<?php
	include 'User_Menu.php';
?>
<!-- //banner -->
<!-- contact-page -->
<div class="contact">
	<div class="container">
		<div class="contact-form">
			<div class="contact-info">
				<h3>REACH US</h3>
				<div class="strip-line"></div>
			</div>
			<form method="POST">
				<div class="contact-left">
					<input type="text" placeholder="Name" name="uname" required>
					<input type="text" placeholder="E-mail" name="uemail" required>
					<input type="text" placeholder="Number" name="unum" maxlength="10" required>
				</div>
				<div class="contact-right">
					<textarea placeholder="Message" name="umess" required></textarea>
				</div>
				<div class="clearfix"></div>
				<input type="submit" value="SUBMIT" name="submit">
							
			</form>
		</div>
	</div>
</div>
<?php
			if(isset($_POST['submit']))
			{
				$name = $_POST['uname'];
				$email = $_POST['uemail'];
				$number = $_POST['unum'];
				$message = $_POST['umess'];

				$query="INSERT INTO contact_us (name,email,number,message) VALUES ('$name','$email','$number','$message')";
				$sql=mysqli_query($conn,$query);
				if($sql)
					{
						echo "<h3 align='center'>Submitted Successfully!!</h3><br/>";
					}
				else
					{
						echo "<h3 align='center'>Something Went Wrong...</h3><br/>";
					}
			}
			?>
<!-- //contact-page -->
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
