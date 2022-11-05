<?php
	include 'connection.php';
?>

<?php
session_start();
	$a = $_SESSION['sess_admin'];
	$sql = "SELECT * FROM registration WHERE user_id='".$a."'";
	$query= mysqli_query($conn,$sql);
?>
<!DOCTYPE HTML>
<html>
<head>
<title>Add Menu Item</title>
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
		
					<!-- //sidebar-collapse -->
	<?php
		include 'menu.php';
	?>

	<?php
		include 'header.php';
	?>
		<!--left-fixed -navigation-->
		<!-- header-starts -->
		
		<!-- //header-ends -->
		<!-- main content start-->
		<div id="page-wrapper">
			<div class="main-page">
				<div class="forms">
					<div class="form-grids row widget-shadow" data-example-id="basic-forms"> 
						
					<div class="row">
						<h3 class="title1">Add Menu Item</h3>
						<div class="form-three widget-shadow">
							<form class="form-horizontal" method="POST" enctype="multipart/form-data">
								<div class="form-group">
									<label class="col-sm-2 control-label">Item Name</label>
									<div class="col-sm-8">
										<input type="text" class="form-control1" id="name" name="name" placeholder="Enter Item Name" pattern="(?=.*[a-z])(?=.*[A-Z]).{,100}" required="">
									</div>
									
								</div>
								<div class="form-group">
									<label class="col-sm-2 control-label">Category Name</label>
									<div class="col-sm-8">
										<select name="cat_id" class="form-control">
											<option value="a" selected disabled>Select Category</option> 
											<?php 
												$sql1 = "SELECT * FROM menu_cat";
												$result1 = mysqli_query($conn,$sql1);
												while($value1=mysqli_fetch_array($result1)){
													$catid=$value1['CAT_ID'];
													$catname=$value1['CAT_NAME'];
											?>	
											<option value="<?php echo $catid ?>"><?php echo $catname; ?></option> 
										<?php } ?>
										</select>
									</div>
								</div>
								<div class="form-group">
									<label  class="col-sm-2 control-label">Ingredients</label>
									<div class="col-sm-8">
										<input type="text" class="form-control1" id="number" name="ingre" placeholder="Enter Ingredients" pattern="(?=.*[a-z])(?=.*[A-Z]).{,100}" required="">
									</div>
								</div>
								
								<div class="form-group">
									<label class="col-sm-2 control-label">Price</label>
									<div class="col-sm-8">
										<input type="text" class="form-control1" id="inputPassword" name="price" placeholder="Enter Price" pattern="(?=.*\d).{,100}" required="">
									</div>	
								</div>	
								<div class="form-group">
									<label class="col-sm-2 control-label">Image</label>
									<div class="col-sm-8">
										<input type="file" name="image" id="photo-img" ><br>	 
									</div>
								</div>
						
									<button type="submit" name="submit" class="btn btn-default">Submit</button>
							</form>
								<?php
			if(isset($_POST['submit']))
			{
			$name=$_POST['name'];
			$cat_id=$_POST['cat_id'];
			$ingre=$_POST['ingre'];
			$price=$_POST['price'];
			$filename= addslashes($_FILES['image']['name']);
			$tmpname= addslashes($_FILES['image']['tmp_name']);
			
			
			date_default_timezone_set("Asia/Calcutta");// required to generate image
			$date = date('YmdHis');
			
			$iname = (string)(date("YmdHis"));
			$extension = pathinfo($filename,PATHINFO_EXTENSION);
			$image_path = $iname.".".$extension;

			$extension = pathinfo($_FILES["image"]["tmp_name"], PATHINFO_EXTENSION);

			if($extension=='jpg' || $extension=='jpeg' || $extension=='png')
			{
				if($filename)
			{
				move_uploaded_file($_FILES['image']['tmp_name'],"../images/".$image_path);
			}
				$query = "INSERT INTO menu (CAT_ID, ITEM_NAME, PRICE, INGREDIENTS, STATUS,USER_ID,PHOTO) VALUES ('$cat_id','$name','$price','$ingre','Available',1,'$image_path')";
				$sql = mysqli_query($conn,$query);
				if ($sql) {
					echo "<script>alert('Item Added Successfully!!');</script>";
				}
				else{
					echo "<script>alert('Error Occured Please Try Again!!');</script>";
				}
			
				}
				else
			{
				
				echo "<script>alert('Select Image Format');
									window.location.href='add_menu.php'</script>";
			}
			
				}
			

				

		?>
		
						</div>
					</div>
							</div>
						</div>
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