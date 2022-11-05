<?php 
	session_start();
?>
<html>
<body>
<!-- header -->
<div class="header">
	<div class="container">
		<div class="top-header">
				<div class="header-left">
					
				</div>
				<div class="login-section">
					<ul>
						<?php 
							if(isset($_SESSION['sess_user'])){
						?>
							<li><a href="logout.php">Logout</a> </li>
						<?php
							}
							else{
						?>
							<li><a href="login.php">Login</a>  </li> |
							<li><a href="register.php">Register</a> </li> 
						<?php
							}
						?>
				    
					</ul>
				</div>
				<!-- start search-->
					<!-- search-scripts -->
					<script src="js/classie.js"></script>
					<script src="js/uisearch.js"></script>
				<!-- //search-scripts -->
				<div class="header-right">
						<div class="cart box_1">
							<?php 
								if (isset($_SESSION['sess_user'])) {
								?>
									<a href="checkout.php">
										<h3><img width="20px;" src="images/bag.png" alt=""></h3>
									</a>
								<?php
								}
								else{
							?>
								<a onclick="return alert('You need to login first!!');">
									<h3><img width="20px;" src="images/bag.png" alt=""></h3>
								</a>
							<?php
								}
							?>
							<div class="clearfix"> </div>
						</div>
				</div>
				<div class="clearfix"></div>
		</div>
	</div>
</div>

<!-- //header -->
</body>
</html>