		<link rel="stylesheet" type="text/css" href="css/style.css"/>
		<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous"/>
		<script src="JavaScript/jquery-1.10.2.js" type="text/javascript"></script> 

		<!-- Logo Area Starts -->
		<div class="container"id="logo">
			<a class="navbar-brand-center" href="index.php"><center><img class="img-fluid" src="admin/public/images/logo.jfif"></center></a>
		</div>
		<!-- Logo Area Ends -->
		<!-- Nav Area Start -->
		<nav class="navbar navbar-expand-md navbar-light">
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
			<span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse" id="collapsibleNavbar">
				<ul class="navbar-nav navbar-menu ml-6">
					<li class="nav-item active">
						<a class="nav-link" href="index.php">HOME</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="showprod.php">ART</a>
					</li>
					
					<li class="nav-item">
						<a class="nav-link" href="contact.php">CONTACT US</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="about.php">ABOUT US</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="login.php"><?php if(isset($_SESSION['user_name']))echo"ACCOUNT";else echo"USER LOGIN"?></a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="artistlogin.php">ARTIST LOGIN</a>
					</li>
				</ul>
			</div>	
		</nav>
		<!-- Nav Area Ends -->