<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Art Gallery</title>
		<meta name="viewport" content="width=device-width, initial-scale=1"/>
	</head>
	<body>
	 <?php include_once("header/header.php"); ?>
		<!-- Banner Area Starts-->
		<div class="container-fluid   p-0 mt-4   banner-carousel">
			<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel" data-interval="4000" data-pause="hover">
				<ol class="carousel-indicators">
					<li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
					<li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
					<li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
				</ol>
				<div class="carousel-inner banner-area">
					<div class="carousel-item active">
						<img class="d-block w-100 rounded" src="admin/public/images/3.jpg " alt="First slide">
					</div>
					<div class="carousel-item">
						<img class="d-block w-100 rounded" src="admin/public/images/2.jpg" alt="Second slide">
					</div>
					<div class="carousel-item">
						<img class="d-block w-100 rounded" src="admin/public/images/bg.jpg" alt="Third slide">
					</div>
					<div class="carousel-item">
						<img class="d-block w-100 rounded" src="admin/public/images/4.jpg" alt="forth slide">
					</div>
				</div>
				<a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
					<span class="carousel-control-prev-icon" aria-hidden="true"></span>
					<span class="sr-only">Previous</span>
				</a>
				<a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
					<span class="carousel-control-next-icon" aria-hidden="true"></span>
					<span class="sr-only">Next</span>
				</a>
			</div>
		</div>
		<!-- Banner Area Ends-->
		<!-- Art Area Starts-->
		<!-- <div class="container-fluid text-center mt-5" id="art-area">
			<div id="art-container">
				<div class="row pb-2 ">
					
					<div class="art-link fit-image col-lg-6 col-md-6 col-sm-6 col-xs-6">
						<a href="showprod.php?id=1">
							<img class="d-block w-100"src="admin/public/images/link1.jpg" alt="link-1" />
							<h3>PAINTING</h3>
						</a>
					</div>
					<div class="art-link col-lg-6 col-md-6 col-sm-6 col-xs-6" >
						<a href="showprod.php?id=2">
							<img class="d-block w-100" src="admin/public/images/link2.jpg" alt="link-2"/>
							<h3>SCULPTURE</h3>
						</a>
					</div>
				</div>
				<div class="row">
					<div class="art-link col-lg-6 col-md-6 col-sm-6 col-xs-6">
						<a href="showprod.php?id=3">
							<img class="d-block w-100" src="admin/public/images/link3.jpg" alt="link-3"/>
							<h3>PRINT MAKING</h3>
						</a>
					</div>
					<div class="art-link col-lg-6 col-md-6 col-sm-6 col-xs-6">
						<a href="showprod.php?id=4">
							<img class="d-block w-100" src="admin/public/images/link4.jpg" alt="link-4"/>
							<h3>NEW MEDIA</h3>
						</a>
					</div>
				</div>
			</div>
		</div> -->
		<!--  -->
		<div class="container" id="art-area4">
			<div class="Working">
				<div class="row">
					<div class="col">	
					<p class="p4"><b class="bold">How</b> It Works</p>
					</div>
				</div>
				<div class="row">
					<div class="col-lg-2.5 sub-cont">
						<div class="img1">
							<img src="admin/public/images/register.png" width="100px" height="100px" class="reg">
						</div>
						<center><b class="bold">Register</b></center>
						<p class="text-center">First, Register yourself as member(buyer) from login section in navbar.</p>
					</div>
					<div class="col-lg-2.5 sub-cont">
						<div class="img1">
							<img src="admin/public/images/buy.png" width="80px" height="80px" class="buy">
						</div>
						<center><b class="bold">Buy Or Bid</b></center>
						<p class="text-center">After, registration login with your account. Find a product you wanna buy. Check starting bid or already submitted bids.</p>
					</div>
					<div class="col-lg-2.5 sub-cont">
						<div class="img1">
							<img src="admin/public/images/bid.png" width="80px" height="80px" class="buy">
						</div>
						<center><b class="bold">Submit A Bid</b></center>
						<p class="text-center">Place a bid higher then starting bid or all previously submitted bids.</p>
					</div>
					<div class="col-lg-2.5 sub-cont">
						<div class="img1">
							<img src="admin/public/images/win.png" width="120px" height="100px" class="win">
						</div>
						<center><b class="bold">Win</b></center>
						<p class="text-center">After completing end date you will win the product</p>
					</div>
				</div>
			</div>
		</div>
		
	</div>
	<!-- Art Area end-->
	<?php 
	// include("footer/footer.php");
	 ?>
	
</body>
</html>