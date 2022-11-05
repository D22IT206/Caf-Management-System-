<?php
	include 'connection.php';
?>

<!DOCTYPE html>
<html>
<head>
	<title>Menu</title>
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
<!-- //header -->
<!-- banner -->
<!-- menu-page -->
<div class="menu">
	<div class="container">
		<div class="menu-info">
			<h3>CHECK OUT OUR MENU HERE</h3>
			<div class="strip-line"></div>
		<div class="our-menu-grids">
		<?php 
			$sql1 = "SELECT * FROM menu_cat";
			$result1 = mysqli_query($conn,$sql1);
			while($value1=mysqli_fetch_array($result1)){
				$catid=$value1['CAT_ID'];
				$catname=$value1['CAT_NAME'];
		?>	
			<div class="order-top">
			<h3><?php echo $catname ?></h3>
		
			<?php
							$sql = "SELECT * FROM menu WHERE cat_id = '$catid'";
							$result = mysqli_query($conn,$sql);
							while($value=mysqli_fetch_array($result)){
			?>
			<div class="order-top">
			<li class="im-g"><a href="#"><img style="width: 150px;height: 180px;" src="images/<?php echo $value['PHOTO']; ?>" class="img-responsive" alt="" WIDTH="150" HEIGHT="150"></a></li>
					<li class="data">
						<h4> <?php echo $value['ITEM_NAME']; ?></h4>
						<h4> <?php echo $value['PRICE']; ?></h4>
						<p><?php echo $value['INGREDIENTS']; ?></p></li>
					<li class="bt-nn" style="float: unset;text-align: center;">
					<?php  
						if (isset($_SESSION['user_id'])) {
					?>
							<a class="hvr-shutter-in-horizontal button" style="width: 150px;" href="addtocart.php?id=<?php echo $value['ITEM_ID']; ?>">Add To Cart</a>
					<?php
						}
						else{
					?>
						<a class="hvr-shutter-in-horizontal button" style="width: 150px;" onclick="return alert('You need to login first!!');">Add To Cart</a>	
					<?php
						}
					?>
					</li>
				<div class="clearfix"></div>
			</div>
				<?php
				}
			?>
			</div>
		<?php } ?>
		</div>
	</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
<?php
	include 'User_footer.php';
?>
</body>
</html>
