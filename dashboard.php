<?php session_start();
 include_once("dbconnection/db.php");
 
    if(isset($_SESSION['user_id']) =="") {
        header("Location: login.php");
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta name="viewport" content="width=device-width, initial-scale=1" charset="UTF-8"/>
    <meta charset="UTF-8">
    <title>Art Gallery</title>
</head>
<body>
   
    <?php  include_once("header/header.php"); ?>
    <div class="container mt-5 mb-5">
        <div class="row">
            <div class="col-lg-8 col-md-12 col-sm-12">
                <div class="card">
                      <div class="card-header">
                            <strong>Profile Dashboard</strong>
                      </div>
                  <div class="card-body">
                    <h5 class="card-title">Name :- <?php echo $_SESSION['user_name']?></h5>
                    <p class="card-text">Email :- <?php echo $_SESSION['user_email']?></p>
                    <p class="card-text">Mobile :- <?php echo $_SESSION['user_mobile']?></p>
                    <p class="card-text">Address :- <?php echo $_SESSION['user_address']?></p>
                    <p class="card-text">Account Type :- <?php echo $_SESSION['account_type']?></p>
                    <a href="logout.php" class="btn btn-secondary">Logout</a>
                  </div>
                  <div class="container-fluid mb-2">
	    			<?php 

	    			if (isset($_SESSION['user_id'])) {

	    	 			if($sql = mysqli_query($conn, "SELECT * FROM bidreport where bidder = '".$_SESSION['user_id'].
	    	 				"' && status = 1 ")){
	    	 				while($row = mysqli_fetch_array($sql)){
	    	 					$query = mysqli_query($conn, "SELECT * FROM products where product_id = '".$row['productid']."'");
	    	 					$_SESSION['item_acquired']= mysqli_num_rows($sql);
	    	 					while($row1 = mysqli_fetch_array($query)){
	    	 						echo "<div class='prod_box mt-3'>";
										echo"<span class='expiring text-danger ml-5'>Winner!!!!!!</span>";
											echo "<div class='timer text-dark ml-2 mt-1'>Congo</div>";
											echo "<div class='center_prod_box'>";
											echo "<div class='product_img'><img class='img-responsive mt-4 ml-3' src='admin/public/images/".$row1['prod_image']."' width='180' height='180' alt='' border='0'/></div>";
											echo "<div class='product_title'><a>".$row1['prod_name']."</a></div>";
											echo "<div class='prod_price'><span class='start-bid'>Artist: </span> <span class='price text-info'>".$row1['artist']."</span><br/></div>";
											echo "<div class='prod_price'><span class='start-bid text-danger'>Sold:</span> <span class='price text-info'>$".$row['bidamount']."</span><br/></div>";
											echo "</div></div>";

		    	 					}
	    	 				}

	    		
	    	}} ?>
	    </div>
                </div>
            </div>
        </div>       
    </div>
    
   	  
    

</body>
</html>
