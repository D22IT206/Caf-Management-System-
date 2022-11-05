<?php
include 'connection.php';
error_reporting(0);
session_start();
if(!isset($_SESSION['user_id']))
{
    echo "<script LANGUAGE='JavaScript'>
	window.location.href='login.php';
	</script>";
}

if(isset($_SESSION['total_amount'])){
	$tamount = $_SESSION['total_amount'];
	$ulid = $_SESSION['user_id'];
	if(isset($_POST['formsubmit']))
	{
			$paytype = $_POST['paytype'];
			$q1 = "INSERT INTO orders(USER_ID, TOTAL_AMOUNT, PAYMENT_METHOD) VALUES ('$ulid', '$tamount', '$paytype')";
			$res1 = mysqli_query($conn, $q1);

			$q2 = "SELECT * FROM orders WHERE USER_ID='$ulid' AND PAYMENT_METHOD='$paytype' AND TOTAL_AMOUNT='$tamount' ORDER BY ORDER_ID DESC LIMIT 1";
			$res2 = mysqli_query($conn, $q2);
			$row2 = mysqli_fetch_array($res2);
			$orderid = $row2['ORDER_ID'];

			$q3 = "SELECT * FROM cart_table WHERE USER_ID='$ulid' AND STATUS=0 AND ORDER_ID is NULL";
			$res3 = mysqli_query($conn, $q3);
			$count1 = mysqli_num_rows($res3);
			$count2 = 0;
			while($row3 = mysqli_fetch_array($res3)){
				$cartid = $row3['CART_ID'];
				$q5 = "UPDATE cart_table SET ORDER_ID='$orderid',STATUS=1 WHERE CART_ID='$cartid'";
				$res5 = mysqli_query($conn, $q5);
				if($res5){
					++$count2;
				}
			}
			if ($paytype==1){
        		$cardnum=$_POST['cardnumber'];
        		$expmonth=$_POST['expmonth'];
        		$expyear=$_POST['expyear'];
        		$cvv=$_POST['cvv'];
        		$cstatus = 1;

        		$cqry = "INSERT INTO `payment`(`USER_ID`, `ORDER_ID`, `CARD_NUM`, `EXP_MONTH`, `EXP_YEAR`, `CARD_CVV`, `STATUS`) VALUES ('$ulid','$orderid','$cardnum','$expmonth','$expyear','$cvv','$cstatus')";
                $cans = mysqli_query($conn,$cqry);
    		}

			if($res1 && ($count1==$count2)){
				echo "<script LANGUAGE='javascript'>
						window.alert('Your Order Placed Successfully!!!');
						window.location.href='checkout.php';
					  </script>";
				unset($_SESSION['total_amount']);
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
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
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
<style type="text/css">
	.col-50 {
	  -ms-flex: 50%; /* IE10 */
	  flex: 50%;
	}
	.col-25 {
	  -ms-flex: 25%; /* IE10 */
	  flex: 25%;
	}
	.icon-container {
	  margin-bottom: 20px;
	  padding: 7px 0;
	  font-size: 24px;
	}
	.cardrow {
	  display: -ms-flexbox; /* IE10 */
	  display: flex;
	  -ms-flex-wrap: wrap; /* IE10 */
	  flex-wrap: wrap;
	  /*margin: 0 -16px;*/
	}
	.cardtext {
		width: 100%;
		margin-bottom: 20px;
		padding: 12px;
		border: 1px solid #ccc;
		border-radius: 3px;
	}
	.cardlabel {
	  margin-bottom: 10px;
	  display: block;
	}
</style>
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
			 <h1>PLACE ORDER</h1>
			 <div class="strip-line"></div>
				<div class="cart-gd">
					<form method="POST">
						<div class="form-group">
							<label style="font-size: 20px;font-weight: bold;">Select Payment Method:</label><br>
							<select style="width:99%;height:4rem;outline:none;padding-left:1rem;border: 1px solid #CECECE;font-size: 13px;color: #5b5b5b;border-radius: 2px;" name="paytype" id="payment" required>
								<option value="0" selected disabled>Select Payment Type</option>
								<option value="1">Online Payment</option>
								<option value="2">Cash</option>
							</select>
						</div>
						<div id="carddetails">
							<div class="col-50">
				            <h3>Payment</h3>
				            <label for="fname">Accepted Cards</label>
				            <div class="icon-container">
				              <i class="fa fa-cc-visa" style="color:navy;"></i>
				              <i class="fa fa-cc-amex" style="color:blue;"></i>
				              <i class="fa fa-cc-mastercard" style="color:red;"></i>
				              <i class="fa fa-cc-discover" style="color:orange;"></i>
				            </div>
				            <label for="ccnum" class="cardlabel">Card number</label>
				            <input type="text" class="cardtext" id="cnum" name="cardnumber" placeholder="1111-2222-3333-4444" maxlength="16" required="">
				            <label for="expmonth" class="cardlabel">Exp Month</label>
				            <input type="text" class="cardtext" id="expmonth" name="expmonth" placeholder="09" maxlength="2" required="">
				            <div class="cardrow">
				              <div class="col-25">
				                <label for="expyear" class="cardlabel">Exp Year</label>
				                <input type="text" class="cardtext" id="expyear" name="expyear" placeholder="2022" maxlength="4" required="">
				              </div>
				              <div class="col-25">
				                <label for="cvv" class="cardlabel">CVV</label>
				                <input type="password" class="cardtext" id="cvv" name="cvv" maxlength="3" required="">
				              </div>
				            </div>
				          </div>
						</div>
						<button type="submit" class="w3view-cart" style="margin-top: 2px;height: 50px;font-size: unset;width: 150px;background: #f65a5b;border-color: #f65a5b;color: white;font-weight: bold;" name="formsubmit">Order Now</button>
					</form>
				</div>
				<div class="clearfix"></div>
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
<script>
  $(document).ready(function(){
  	$("#carddetails").hide();
  	$('#payment').bind('change', function(){ 
        var pay = $(this).val(); 
        if(pay==1){
             $("#carddetails").show();
        }
        else{       
        	$("#carddetails").hide();
        }
    });
});
</script>