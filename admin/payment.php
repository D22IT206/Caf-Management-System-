<?php
	include 'connection.php';
?>

<!DOCTYPE HTML>
<html>
<head>
<title>Payment</title>
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
			<?php
				include 'menu.php';
			?>
		<!--left-fixed -navigation-->
		<!-- header-starts -->
			<?php
				include 'header.php';
			?>
		<!-- //header-ends -->
		<!-- main content start-->
		<div id="page-wrapper">
			<div class="main-page">
			<?php
				$sql = "SELECT * FROM payment";
				$query = mysqli_query($conn,$sql);

			?>
				<div class="blank-page widget-shadow scroll" id="style-2 div1">
					<div class="table-responsive bs-example widget-shadow">
					
						<table class="table table-bordered"> 
							<thead> 
								<tr>  
									<th>USER ID</th> 
									<th>PAYMENT ID</th> 
									<th>METHOD</th> 
									<th>AMOUNT</th> 
									<th>ACTION</th> 
								</tr> 
							</thead> 
							<tbody>
							<?php  
							$sql = "select * from payment";
							$query = mysqli_query($conn,$sql);
							while($value= mysqli_fetch_array($query))
							{
							?>
								<tr>  
									<td><?php echo $value['USER_ID']?> </td> 
									<td><?php echo $value['PAYEMNT_ID'] ?></td> 
									<td><?php echo $value['METHOD'] ?></td> 
									<td><?php echo $value['AMOUNT'] ?></td> 
									<td> 
										<a href="payment.php?del=<?php echo $value['PAYMENT_ID'];?>"> DELETE </a></td>
								</tr> 
							</tbody>
							<?php
							}
							if(isset($_GET['del']))
							{
								$sq = "delete from contact_us where PAYEMNT_ID=".$_GET['del']."";
								$resulta = mysqli_query($conn,$sq);
								
								if($resulta)
								{
									header("Location:dashboard.php");
								}
								else
								{
									echo "Row Not Deleted";
								}
							}
							?>
						 </table> 
					</div>
				</div>
			</div>
		</div>
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