<?php
	include 'connection.php';
	error_reporting(E_ALL ^ E_WARNING);
?>

<!DOCTYPE HTML>
<html>
<head>
<title>Orders</title>
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
				$sql = "SELECT * FROM order";
				$query = mysqli_query($conn,$sql);

			?>
				<div class="blank-page widget-shadow scroll" id="style-2 div1">
					<div class="table-responsive bs-example widget-shadow">
					
						<table class="table table-bordered"> 
							<thead> 
								<tr>  
									<th>ORDER ID</th>
									<th>USER ID</th> 
									<th>ITEM NAMES</th>
									<th>TOTAL AMOUNT</th> 
									<th>PAYMENT METHOD</th> 
									<th>ACTION</th> 
								</tr> 
							</thead> 
							<tbody>
							<?php  
							$sql = "SELECT * FROM orders";
							$query = mysqli_query($conn,$sql);
							while($value= mysqli_fetch_array($query))
							{
								$orid=$value['ORDER_ID'];
								$uid=$value['USER_ID'];
								$sql1 = "SELECT * FROM cart_table WHERE ORDER_ID='$orid' AND USER_ID='$uid'";
								$query1 = mysqli_query($conn,$sql1);
							?>
								<tr>   
									<td><?php echo $value['ORDER_ID']; ?></td>
									<td><?php echo $value['USER_ID'];?> </td> 
									<td><?php 
										while($value1= mysqli_fetch_array($query1))
										{	
											$item=$value1['ITEM_ID'];
											$qnt=$value1['QUANTITY'];
											$sql2 = "SELECT * FROM menu WHERE ITEM_ID='$item'";
											$query2 = mysqli_query($conn,$sql2);
											$value2= mysqli_fetch_array($query2);
											$cnt=mysqli_num_rows($query1);
											if ($cnt>1) {
												echo '<b>'.$value2['ITEM_NAME'].' </b> Quantity - '.$qnt.'<br/> ';
											}
											else{
												echo '<b>'.$value2['ITEM_NAME'].' </b> Quantity - '.$qnt; 
											}
										}
									?></td>  
									<td><?php echo $value['TOTAL_AMOUNT']; ?></td> 
									<td><?php 
										if ($value['PAYMENT_METHOD']==1) {
											echo "Online Payment";
										}
										elseif($value['PAYMENT_METHOD']==2){
											echo "Cash";
										} ?></td> 
									<td> 
										<a href="?del=<?php echo $orid;?>"> DELETE </a></td>
								</tr> 
							</tbody>
							<?php
							}
							if(isset($_GET['del']))
							{
								$sq1 = "DELETE FROM cart_table WHERE ORDER_ID=".$_GET['del']."";
								$resulta1 = mysqli_query($conn,$sq1);

								$sq = "DELETE FROM orders WHERE ORDER_ID=".$_GET['del']."";
								$resulta = mysqli_query($conn,$sq);
								echo mysqli_error($conn);
								
								if($resulta && $resulta1)
								{
									echo "<script>alert('Order Deleted Successfully!!');
										window.location.href='order.php';</script>";
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