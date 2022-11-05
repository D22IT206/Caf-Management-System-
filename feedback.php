<?php
	include 'connection.php';
?>
<!DOCTYPE html>
<html>
<head>
	<title> Feedback</title>
	<!--fonts-->
		<link href='http://fonts.googleapis.com/css?family=Lato:100,300,400,700,900,100italic,300italic,400italic,700italic,900italic' rel='stylesheet' type='text/css'>
		<link href='http://fonts.googleapis.com/css?family=Slabo+27px' rel='stylesheet' type='text/css'>
		<link href='http://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700' rel='stylesheet' type='text/css'>
		
	<!--//fonts-->
			<link href="css/bootstrap.css" rel="stylesheet">
			<link href="css/mystyle.css" rel="stylesheet">
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
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
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
<!-- registration-form -->
<div class="gallery">
	<div class="container">
		<div class="gallery-info">
			<h3>FEEDBACK</h3>
			<div class="strip-line st-border"></div><br/>
		</div>
			<div class="registration-grids">
				<div style="margin: auto;width: 50%;">
					<div class="">
						<form method="POST" action="addfeedback.php" class="text-left">
                    <?php
                    if(isset($_GET['flag'])){
                      if($_GET['flag']==1)
                      {
                      	echo "<div class='alert alert-success'><strong>Thank You for sharing your valuable feedback!!</strong></div>";
                      }
                      elseif ($_GET['flag']==0) {
                        echo "<div class='alert alert-danger'><strong>Sorry Something went wrong please try again!!</strong></div>";
                      }
                    }
                	?>
                    <div class="star-rating">
                        <div class="star-input">
                          <input type="radio" name="rating" id="rating-5" value="5" required>
                          <label for="rating-5" class="fa fa-star"></label>
                          <input type="radio" name="rating" id="rating-4" value="4">
                          <label for="rating-4" class="fa fa-star"></label>
                          <input type="radio" name="rating" id="rating-3" value="3">
                          <label for="rating-3" class="fa fa-star"></label>
                          <input type="radio" name="rating" id="rating-2" value="2">
                          <label for="rating-2" class="fa fa-star"></label>
                          <input type="radio" name="rating" id="rating-1" value="1">
                          <label for="rating-1" class="fa fa-star"></label>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="text-dark">Select Item </label>
                        <select style="width:99%;height:4rem;outline:none;padding-left:1rem;border: 1px solid #CECECE;font-size: 13px;color: #5b5b5b;border-radius: 2px;" name="item" id="item" required>
								<option value="a" selected disabled>Select Your Ordered Item</option>
								<?php 
									$ulog=$_SESSION['user_id'];
									$q1 = "SELECT * FROM cart_table WHERE USER_ID='$ulog' AND STATUS=1";
		  							$res = mysqli_query($conn, $q1);
		  							while($ans=mysqli_fetch_array($res)){
		  								$item=$ans['ITEM_ID'];
		  								$q2 = "SELECT * FROM menu WHERE ITEM_ID='$item'";
		  								$res2 = mysqli_query($conn, $q2);
		  								$ans2=mysqli_fetch_array($res2);
		  						?>
		  							<option value="<?php echo $ans2['ITEM_ID'] ?>"><?php echo $ans2['ITEM_NAME'] ?></option>
		  						<?php
		  							}
								?>
							</select>
                      </div>
                      <div class="form-group">
                        <label for="contacts-message" class="text-dark">Comment </label>
                        <textarea id="contacts-message" name="message" data-constraints="@Required" rows="5" style="max-height: 250px;" class="form-control" required></textarea>
                      </div>
                      <?php 
                          if(isset($_SESSION['user_id'])){
                      ?>
                          <div class="text-center text-sm-left">
                            <button type="submit" name="formsubmit" class="w3view-cart" style="margin-top: 2px;height: 50px;font-size: unset;width: 150px;background: #f65a5b;border-color: #f65a5b;color: white;font-weight: bold;">Give Feedback</button>
                          </div>
                      <?php
                          }else{
                      ?>
                      	<a href="login.php"><h3 style="color: black;text-align: center;">You need to Login first to give Feedback.</h3></a><br/>
                          <div class="text-center text-sm-left">
                            <button type="submit" name="formsubmit" class="w3view-cart" style="margin-top: 2px;height: 50px;font-size: unset;width: 150px;background: #f65a5b;border-color: #f65a5b;color: white;font-weight: bold;" disabled>Give Feedback</button>
                          </div>
                      <?php
                          }
                      ?>
                    </form>
				</div>
			</div>
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
