<?php
	include 'connection.php';
?>

<!DOCTYPE HTML>
<html>
<head>
<title>Edit Item</title>
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
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
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
				<h3 class="title1">Edit Menu</h3>
				<div class="blank-page widget-shadow scroll" id="style-2 div1">
					<?php

					$id=$_GET['id'];
					$myquery = "SELECT * FROM menu WHERE ITEM_ID='$id'";
					$getresults = mysqli_query($conn,$myquery);
					$viewdata=mysqli_fetch_array($getresults);
						$itemname = $viewdata['ITEM_NAME'];
						$catid = $viewdata['CAT_ID'];
						$price = $viewdata['PRICE'];
						$status = $viewdata['STATUS'];
						$ingre = $viewdata['INGREDIENTS'];
						$pimg = $viewdata['PHOTO'];
				?>
					<form class="form-horizontal" method="POST" enctype="multipart/form-data">
						<div class="form-group">
							<label class="col-sm-2 control-label">Item Name</label>
							<div class="col-sm-8">
								<input type="text" class="form-control1" id="name" name="ename" value="<?php echo $itemname;?>" placeholder="Enter Item Name">
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-2 control-label">Select Category</label>
							<div class="col-sm-8">
							 	<select name="cat_id" class="form-control">
											<option value="a" selected disabled>Select Category</option> 
											<?php 
												$sql1 = "SELECT * FROM menu_cat";
												$result1 = mysqli_query($conn,$sql1);
												while($value1=mysqli_fetch_array($result1)){
													$ctid=$value1['CAT_ID'];
													$catname=$value1['CAT_NAME'];
													if ($ctid==$catid) {
													?>
														<option value="<?php echo $ctid ?>" selected><?php echo $catname; ?></option> 
													<?php
													}
													else{
													?>
														<option value="<?php echo $ctid ?>"><?php echo $catname; ?></option> 
													<?php
													}
												} ?>
										</select>
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-2 control-label">Price</label>
							<div class="col-sm-8">
							 	<input type="text" class="form-control1" name="eprice" value="<?php echo $price;?>">
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-2 control-label">Status</label>
							<div class="col-sm-8">
							 	<input type="text" class="form-control1" name="estatus" value="<?php echo $status;?>">
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-2 control-label">Ingredints</label>
							<div class="col-sm-8">
							 	<input type="text" class="form-control1" name="eingre" value="<?php echo $ingre;?>">
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-2 control-label">Photo</label>
							<div class="col-sm-8">
							 	<input type="file" name="image" id="photo-img" accept="image/png,image/jpg,image/jpeg"><br>
							 	<div id="myDiv"> 
                          <!--<p class="square"> -->
                          		<img src="../images/<?php echo $pimg; ?>" id="photo-img-tag" width="200px" height="200px" />
                            		<script type="text/javascript">
                              		function readURL(input) {
                                		if (input.files && input.files[0]) {
                                  			var reader = new FileReader();  
                                  			reader.onload = function (e) {
                                  			$('#photo-img-tag').attr('src', e.target.result);
                                  			}
                                  		reader.readAsDataURL(input.files[0]);
                                		}
                              		}
                              		$("#photo-img").change(function(){
                                		readURL(this);
                              		});
                            		</script>
                        		</div> 
							</div>
						</div>
						<button type="submit" name="update" class="btn btn-primary">UPDATE DATA</button>
					</form>
					
					<?php
						if(isset($_POST['update']))
						{
							$id = $_GET['id'];
							$name = $_POST['ename'];
							$catid = $_POST['cat_id'];
							$price = $_POST['eprice'];
							$status = $_POST['estatus'];
							$ingre = $_POST['eingre'];
							$filename=addslashes($_FILES['image']['name']);
      						$tmpname=addslashes($_FILES['image']['tmp_name']);
      						date_default_timezone_set("Asia/Calcutta");
      						$date = date('Y-m-d H:i:s');
      						$iname=strtotime(date('Y-m-d H:i:s'));
      						$extension=pathinfo($filename, PATHINFO_EXTENSION);
      						$image_path= $iname.".".$extension;

      						if($filename)
      						{
        						move_uploaded_file($_FILES["image"]["tmp_name"],"../images/".$image_path);
        						$q5="UPDATE menu SET PHOTO='$image_path' WHERE ITEM_ID='$id'";
       	 						$res5=mysqli_query($conn,$q5);
      						}
							
							$query = "UPDATE menu SET ITEM_NAME='$name',CAT_ID='$catid',PRICE='$price',STATUS='$status',INGREDIENTS='$ingre' WHERE ITEM_ID='$id'";
							$sql = mysqli_query($conn,$query);
							
							if($sql || $res5)
							{
								echo "<script>alert('Item Editted Successfully!!');
								window.location.href='manage_menu.php'</script>";
							}
							else{
								echo 'Not Updated';
							}
						}
					?>
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