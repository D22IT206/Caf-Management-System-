<?php
include 'connection.php';
error_reporting(0);
session_start();
if(!isset($_SESSION['user_id']))
{
    echo "<script>window.location.href='login.php';</script>";
}
else{
	if(isset($_GET['type'])){
		if($_GET['type']=='increase')
		{
			if(isset($_GET['cartid']) && isset($_GET['itemid']))
			{
				$cartid = $_GET['cartid'];
				$itemid = $_GET['itemid'];
				$q1 = "UPDATE cart_table SET QUANTITY = QUANTITY + 1 WHERE CART_ID='$cartid'";
				$res1 = mysqli_query($conn, $q1);
				if($res1){
					echo '<script LANGUAGE="JavaScript">
							window.location.href = "checkout.php";
							</script>';
				}
			}
		}
		else if($_GET['type']=='decrease')
		{
			if(isset($_GET['cartid']) && isset($_GET['itemid']))
			{
				$cartid = $_GET['cartid'];
				$itemid = $_GET['itemid'];
				$q1 = "UPDATE cart_table SET QUANTITY = QUANTITY - 1 WHERE CART_ID='$cartid'";
				$res1 = mysqli_query($conn, $q1);
				if($res1){
					echo '<script LANGUAGE="JavaScript">
							window.location.href = "checkout.php";
							</script>';
				}
			}
	 	}
	}
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Checkout</title>
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
<!-- checkout -->
<div class="cart-items">
	<div class="container">
			 <h1>MY SHOPPING BAG</h1>
			 <div class="strip-line"></div>
		<div class="cart-gd">
				<?php 
					$ulid = $_SESSION['user_id'];
					$q1 = "SELECT * FROM cart_table WHERE USER_ID='$ulid' AND STATUS=0 AND ORDER_ID is NULL";
		  			$res = mysqli_query($conn, $q1);
		  			$cnt = mysqli_num_rows($res);
		  			if($cnt>0){
		  		?>
				<h3 style="font-weight: bold;">Your shopping cart contains:
					<span><?php echo $cnt; ?> Items</span>
				</h3><br/>
				<div class="table-responsive">
					<table class="timetable_sub" width="100%">
						<thead>
							<tr>
								<th>Sr No.</th>
								<th>Item</th>
								<th>Quality</th>
								<th>Item Name</th>
								<th>Price</th>
								<th>Remove</th>
							</tr>
						</thead>
						<tbody>
						<?php 
						$count = 0;
		  				$total_amount = 0;
		  				while($row1 = mysqli_fetch_array($res)){
		  					$iid = $row1['ITEM_ID'];
			  				$cartid = $row1['CART_ID'];
			  				$cartquan = $row1['QUANTITY'];
			  				$q2 = "SELECT * FROM menu WHERE ITEM_ID='$iid'";
			  				$res2 = mysqli_query($conn, $q2);
			  				$row2 = mysqli_fetch_array($res2);
							$proname = $row2['ITEM_NAME'];
							$proimg = $row2['PHOTO'];
							$proprice = $row2['PRICE'];
							$amount = $cartquan * $proprice;
							$total_amount+=$amount;
						?>
							<tr class="rem1">
								<form action="placeorder.php" method="post">
								<td class="invert"><?php echo ++$count; ?></td>
								<td class="invert-image">
									<a href="single.php?pid=<?php echo $proid;?>">
										<img style="width: 100px;height: 100px;" src="images/<?php echo $proimg; ?>" alt=" " class="img-responsive">
									</a>
								</td>
								<td class="invert">
									<div class="quantity">
										<div class="quantity-select">
											<?php
												if($cartquan>1){
														echo "<a class='entry value-minus' href='?cartid=$cartid&itemid=$iid&type=decrease'>&nbsp;
														</a>";
												}else{
														echo '<a class="entry value-minus" disabled>&nbsp;</a>';
												}
											?>
											<div class="entry value"><span class="span-1"><?php echo $cartquan;?></span></div>
											<a class='entry value-plus' href='?cartid=<?php echo $cartid;?>&itemid=<?php echo $iid;?>&type=increase'>&nbsp;
												</a>
										</div>
									</div>
								</td>
								<td class="invert"><?php echo $proname; ?></td>
								<td class="invert"><?php echo $amount; ?></td>
								<td class="invert">
									<div class="rem">
										<a href="remove.php?itemid=<?php echo $iid;?>&cartid=<?php echo $cartid;?>&cqnt=<?php echo $cartquan;?>"><div class="close1"></div></a>
									</div>
								</td>
						<?php 
							}
							$_SESSION['total_amount'] = $total_amount;
						?>
						</tbody>
					</table>
				</div>
					<div style="margin-top: 20px;">
						<center>
			  				<h3>Total Amount: Rs. <?php echo $total_amount;?> </h3>&nbsp;&nbsp;&nbsp;&nbsp;
			  				<button class="w3view-cart" style="margin-top: 2px;height: 50px;font-size: unset;width: 150px;background: #f65a5b;border-color: #f65a5b;color: white;font-weight: bold;" name="order">Place Order</button>
		  				</center>
		  			</div>
		  			</form>
		  			</tr>
				<?php
					} 
					else{
						echo '<div class="alert alert-danger" role="alert" id="my-cart-empty-message">Your cart is empty</div>';
					}

				?>
			</div>
		</div>
	</div>
<!-- //checkout -->	
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
