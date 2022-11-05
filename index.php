<?php
	include 'connection.php';
?>
<!DOCTYPE html>
<html>
<head>
	<title>Home</title>
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
<!-- welcome -->
<div class="welcome">
	<div class="container">
		<div class="wel-info">
			<h3>WELCOME</h3>
			<div class="strip-line"></div>
			<p>Coffee is a brewed drink prepared from roasted coffee beans, 
			the seeds of berries from certain Coffea species. From the coffee fruit, 
			the seeds are separated to produce a stable, raw product: unroasted green coffee.</p>
		</div>
		<div class="welcome-grids">
			<div class="col-md-4 welcome-grid-img">
				<img style="width: 350px;height: 320px;" src="images/k11.png" alt=""/>
				<div class="wel-pos" style="width: 350px;height: 110px;">
					<h4>Smooth Coffee</h4>
				</div>
			</div>
			<div class="col-md-4 welcome-grid">
				<div class="welcome-gd second">
					<h4>Coffee </h4>
					<p>The seeds are then roasted, a process which transforms 
					them into a consumable product: roasted coffee, which is ground
					into a powder and typically steeped in hot water before being filtered out, 
					producing a cup of coffee. Coffee is darkly colored, bitter, slightly acidic 
					and has a stimulating effect in humans, primarily due to its caffeine content.   
					</p>
				</div>
			</div>
			<div class="col-md-4 welcome-grid-img">
				<img style="width: 350px;height: 320px;" src="images/k33.jpg" alt=""/>
				<div class="wel-pos" style="width: 350px;height: 110px;">
					<h4>Foam Coffee</h4>
				</div>
			</div>
			<div class="col-md-4 welcome-grid">
				<div class="welcome-gd second">
					<h4>Coffee</h4>
					<p>It is one of the most popular drinks in the world, 
					and can be prepared and presented in a variety of ways 
					(e.g., espresso, French press, caffè latte, or already-brewed canned coffee).
					</p>
				</div>
			</div>
			<div class="col-md-4 welcome-grid-img">
				<img style="width: 350px;height: 270px;" src="images/pic122.jpg" alt=""/>
				<div class="wel-pos" style="width: 350px;height: 110px;">
					<h4>Vanilla Latte</h4>
				</div>
			</div>
			<div class="col-md-4 welcome-grid">
				<div class="welcome-gd second">
					<h4>Coffee </h4>
					<p>It is usually served hot, although chilled or iced coffee is common. 
					Sugar, sugar substitutes, milk or cream are often used to lessen the bitter taste.
					It may be served with coffee cake or another sweet dessert like doughnuts. 
					</p>
				</div>
			</div>
			<div class="clearfix"></div>
		</div>
	</div>
</div>
<!-- //welcome -->
<!-- good -->
<div class="good">
	<div class="container">
		<div class="good-info">
			<h3>FINE BEVERAGES</h3>
			<div class="strip-line"></div>
		</div>
		<div class="good-grids">
			<div class="col-md-5 good-right">
				<img style="height: 400px;" src="images/pic122.jpg" alt=""/>
				<div class="desc" style="height: 135px;">
					<p>BEVERAGES</p>
				</div>
			</div>
			<div class="col-md-7 good-left">
				<h3>GOOD BEVERAGES KEEPS YOU HEALTHY</h3>
				<div class="strip"></div>
				<p>After water, tea and coffee are the two most commonly consumed beverages on the planet. Drunk plain, they are calorie-free beverages brimming with antioxidants, flavonoids, and other biologically active substances that may be good for health. Green tea, especially the strong variety served in Japan, has received attention for its potential role in protecting against heart disease, while coffee may help protect against type 2 diabetes.</p>
			</div>
			<div class="clearfix"></div>
		</div>
	</div>
</div>
<!-- //good -->
<!-- delicious -->

<div class="delicious">
	<div class="container">
		<div class="delicious-info">
			<h3>DELICIOUS DRINKS</h3>
			<div class="strip-line"></div>
		</div>
		<div class="delicious-grids">
			<div class="col-md-3 delicious-grid">
				<h3>NUTELLA CHOCOLATE</h3>
				<img src="images/20220226103944.jpg" alt=""/>
				<p>Nutella,Milk,Cocoa</p>
				<a href="menu.php">MORE</a>
			</div>
			<div class="col-md-3 delicious-grid">
				<h3>ICED TEA</h3>
				<img src="images/20220226100815.jpg" alt=""/>
				<p>Iced tea is a form of cold tea.It can be mixed with flavored syrup with multiple common flavors including lemon, raspberry, lime, passion fruit, peach, orange, strawberry, and cherry.</p>
				<a href="menu.php">MORE</a>
			</div>
			<div class="col-md-3 delicious-grid">
				<h3>HOT CHOCOLATE</h3>
				<img src="images/20220226101840.jpg" alt=""/>
				<p>Hot chocolate, also known as hot cocoa or drinking chocolate, is a heated drink consisting of shaved chocolate, melted chocolate or cocoa powder, heated milk or water, and usually a sweetener like whipped cream or marshmallows.</p>
				<a href="menu.php">MORE</a>
			</div>
			<div class="col-md-3 delicious-grid">
				<h3>MINT FRAPPUCCINO</h3>
				<img src="images/20220226095501.jpg" alt=""/>
				<p>Made with rich chocolate flavor and a hint of coffee, our Mint Frappé recipe is blended with ice and covered with whipped topping and chocolatey drizzle.</p>
				<a href="menu.php">MORE</a>
			</div>
			<div class="clearfix"></div>
		</div>
	</div>
</div>
<!-- //delicious -->
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
