<html>
<body>

<!-- //header -->
<!-- banner -->
<div class="banner-slider">
	<div class="banner-pos">
		<!-- responsiveslides -->
							<script src="js/responsiveslides.min.js"></script>
								<script>
									// You can also use "$(window).load(function() {"
									$(function () {
									 // Slideshow 4
									$("#slider3").responsiveSlides({
										auto: true,
										pager: false,
										nav: false,
										speed: 500,
										namespace: "callbacks",
										before: function () {
									$('.events').append("<li>before event fired.</li>");
									},
									after: function () {
										$('.events').append("<li>after event fired.</li>");
										}
										});
										});
								</script>
		<!-- responsiveslides -->
		<div  id="top" class="callbacks_container">
			<ul class="rslides" id="slider3">
				<li>
					<div class="banner one">
						<div class="container">
							<div class="navigation text-center">
								<span class="menu"><img src="images/menu.png" alt="" width="1150" height="350"/></span>
									<ul class="nav1">
										<li><a href="index.php">HOME</a></li>
										<li><a href="about.php">ABOUT</a></li>
										<li><a href="menu.php">OUR MENU</a></li>
										<li><a href="gallery.php">GALLERY</a></li>
										<li><a href="contact.php">REACH US</a></li>
										<li><a href="feedback.php">FEEDBACK</a></li>
										<div class="clearfix"></div>
									</ul>
								

							</div>
							<!-- point burst circle -->
							<div class="logo">
									<h1>CAFE DOWNTOWN</h1>
								</a>
							</div>
							<!-- //point burst circle -->
						
						</div>
					</div>
				</li>
				<li>
					<div class="banner two">
						<div class="container">
							<div class="navigation text-center">
								<span class="menu"><img src="images/menu.png" alt="" width="1150" height="350" /></span>
									<ul class="nav1">
										<li><a href="index.php">HOME</a></li>
										<li><a href="about.php">ABOUT</a></li>
										<li><a href="menu.php">OUR MENU</a></li>
										<li><a href="gallery.php">GALLERY</a></li>
										<li><a href="contact.php">REACH US</a></li>
										<li><a href="feedback.php">FEEDBACK</a></li>
										<div class="clearfix"></div>
									</ul>
									<!-- script for menu -->
										<script> 
											$( "span.menu" ).click(function() {
											$( "ul.nav1" ).slideToggle( 300, function() {
											 // Animation complete.
											});
											});
										</script>
									<!-- //script for menu -->
							</div>
							<!-- point burst circle -->
							<div class="logo">
									<h1>CAFE DOWNTOWN</h1>
							</div>
							<!-- //point burst circle -->
						</div>
					</div>
				</li>				
			</ul>
		</div>
	</div>
	<div class="clearfix"></div>
</body>
</html>