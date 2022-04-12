<?php
session_start();
require_once("dbconnection/db.php");
//shows categories--------
	function categories(){
			global $conn;
	$query = mysqli_query($conn,"SELECT * FROM `categories`") or die (mysqli_error());
		while($row = mysqli_fetch_array($query)){
										echo "<a href ='showprod.php?id=".$row['category_id']."' class='list-group-item list-group-item-dark'>".$row['category_name']."</a>";
			}
		echo "</div>";
		}
		//Shows Products ------------
		function showprod(){
			global $conn;
			if (isset($_GET['id'])) {
		$id = $_GET['id'];
		$query = mysqli_query($conn,"SELECT * FROM products WHERE category_id = '$id' AND status = 0") or die (mysqli_error());
		$res = mysqli_num_rows($query);
		if($res == 0){
			echo "<div class='prod_box'>";
				echo "<div class='top_prod_box'></div>";
				echo "<div class='center_prod_box'>";
						echo "<div class='product_title'>There is no available product on this category</div>";
					echo "<div class='product_img'><img src='admin/public/images/nocateg.jpg' width='94' height='92' alt='' border='0' /></div>";
					echo "<div class='prod_price'></div>";
			echo "</div>";
			echo "<div class='bottom_prod_box'></div>";
			echo "<div class='prod_details_tab'><a href='' class='prod_details ml-5'>Try Another Category</a> </div>";
			echo "</div>";
		}else{
		while($row = mysqli_fetch_array($query))
		{
			$prodid = $row['product_id'];
			$prodsbid = $row['starting_bid'];
			//for displaying highest bid and no of bidders
			$query2 = mysqli_query($conn,"SELECT * FROM bidreport WHERE productid = '$prodid'") or die (mysqli_error());
			$noofbidders = MYSQLI_NUM_ROWS($query2);
			$highbid = $prodsbid;
			while($highonthis = mysqli_fetch_array($query2)){
				$checkthis = $highonthis['bidamount'];
				if($checkthis > $highbid){
					$highbid = $checkthis;
				}
			}
			$highestbidder = mysqli_query($conn,"SELECT * FROM bidreport WHERE bidamount = '$highbid'")or die(mysqli_error());
			$highestbiddera = mysqli_fetch_array($highestbidder);
			$hibidder = $highestbiddera['bidder'];
			$name = mysqli_query($conn,"SELECT * FROM login WHERE id = '$hibidder'")or die(mysqli_error());
			$namea = mysqli_fetch_array($name);
			$highname = $namea['name'];
			echo "<div class='prod_box mt-3'>";
				echo"<span class='expiring text-danger ml-2'>Expiring in</span>";
				echo "<div class='timer text-dark ml-2 mt-1'data-countdown=".$row['due_date'].">";?>
				<script type="text/javascript">
							$('[data-countdown]').each(function() {
 								 var $this = $(this), finalDate = $(this).data('countdown');
  								$this.countdown(finalDate, function(event) {
   								 $this.html(event.strftime('%D days %H:%M:%S'));
  									});
								});
								</script><?php echo"</div>";
				echo "<div class='center_prod_box'>";
					echo "<div class='product_img'><a href='details.php?id=".$row['product_id']."'><img class='img-responsive mt-4 ml-3' src='admin/public/images/".$row['prod_image']."' width='230' height='180' alt='' border='0'/></a></div>";
					echo "<div class='product_title'><a href='details.php?id=".$row['product_id']."'>".$row['prod_name']."</a></div>";
					echo "<div class='prod_price'><span class='start-bid'>Artist: </span> <span class='price text-info'>".$row['artist']."</span><br/>
					<span class='start-bid'>Start Bid at: </span> <span class='price text-info'>$".$row['starting_bid']."</span><br />
					<span class='start-bid'>Highest Bidder: </span> <span class='price text-info'>".$highname."</span>
				</div>";
			echo "</div>";
		
			echo "<div class='prod_details_tab ist-group-item list-group-item-action list-group-item-secondary active aria-disabled'><a href='details.php?id=".$row['product_id']."' class='prod_details' title='header=[Click to Bid] body=[&nbsp;] fade=[on]'>Bid Now</a> </div>";
			echo "</div>";
		}
	}
	}
}
//Account Info //
function logform(){
	global $conn;
	if (empty($_SESSION['user_id'])){
	echo '<div class="list-group mt-3 text-center">
						<p class="list-group-item list-group-item-action list-group-item-secondary active disabled" tabindex="-1" aria-disabled="true"">Welcome</p>
						<p class="list-group-item list-group-item-dark"><strong>User: </strong>Guest</p>
						<p class="list-group-item list-group-item-dark"><strong>Account Type:</strong> Not Available</p>
						<p class="list-group-item list-group-item-dark"><strong>Bid Counter:</strong> Not Available</p>
						<p class="list-group-item list-group-item-dark"><strong>Items Acquired:</strong> Not Available</p>
						<p class="list-group-item list-group-item-dark"><strong>Feedbacks:</strong> Not Available</p>
			</div>';
	}else{
		$hisid = $_SESSION['user_id'];
		$query = mysqli_query($conn,"SELECT * FROM login WHERE id = '$hisid' ");
		$query2 = mysqli_query($conn,"SELECT * FROM bidreport where bidder= '$hisid'");
		if($query3 = mysqli_query($conn,"SELECT * FROM contact where name='".$_SESSION['user_name']."'"))
		{
			$feeback=mysqli_num_rows($query3);
		}
		$bidcount= mysqli_num_rows($query2);
		While($rows = mysqli_fetch_array($query)){
			echo '<div class="list-group mt-3 text-center">
						<p class="list-group-item list-group-item-action list-group-item-secondary active disabled" tabindex="-1" aria-disabled="true"">Welcome</p>
						<p class="list-group-item list-group-item-dark"><strong>Username:</strong> '.$rows['name'].'</p>
						<p class="list-group-item list-group-item-dark"><strong>Account Type: </strong> '.$rows['account_type'].'</p>
						<p class="list-group-item list-group-item-dark"><strong>Bid Counter:</strong> '.$bidcount.'</p>
						<p class="list-group-item list-group-item-dark"><strong>Items Acquired: </strong>'.$_SESSION['item_acquired'].'</p>
						<p class="list-group-item list-group-item-dark"><strong>Feedbacks:</strong> '.$feeback.'</p>
			
				</div>';
			}
		}
	}
	function latest(){
		global $conn;
		$query = mysqli_query($conn,"SELECT * FROM products WHERE status = 0 ORDER BY product_id") or die (mysqli_error());
		
		while($row = mysqli_fetch_array($query))
		{
			$prodid = $row['product_id'];
			$prodsbid = $row['starting_bid'];
			//for displaying highest bid and no of bidders
			$query2 = mysqli_query($conn,"SELECT * FROM bidreport WHERE productid = '$prodid'") or die (mysqli_error());
			$noofbidders = MYSQLI_NUM_ROWS($query2);
			$highbid = $prodsbid;
			while($highonthis = mysqli_fetch_array($query2)){
				$checkthis = $highonthis['bidamount'];
				if($checkthis > $highbid){
					$highbid = $checkthis;
				}
			}
			// $highestbidder = mysqli_query($conn,"SELECT * FROM bidreport WHERE bidamount = '$highbid'")or die(mysqli_error());
			// $highestbiddera = mysqli_fetch_array($highestbidder);
			// $hibidder = $highestbiddera['bidder'];
			// $name = mysqli_query($conn,"SELECT * FROM login WHERE id = '$hibidder'")or die(mysqli_error());
			// $namea = mysqli_fetch_array($name);
			// $highname = $namea['name'];
			echo "<div class='prod_box mt-3'>";
			echo"<span class='expiring text-danger ml-2'>Expiring in</span>";
				echo"<div class='timer text-dark ml-2 mt-1'data-countdown=".$row['due_date'].">";?>
						<script type="text/javascript">
							$('[data-countdown]').each(function() {
 								 var $this = $(this), finalDate = $(this).data('countdown');
  								$this.countdown(finalDate, function(event) {
   								 $this.html(event.strftime('%D days %H:%M:%S'));
  									});
								});
								</script><?php echo"</div>";
					echo "<div class='center_prod_box'>";
					echo "<div class='product_img'><a href='details.php?id=".$row['product_id']."'><img class='img-responsive mt-4 ml-3' src='admin/public/images/".$row['prod_image']."' width='230' height='180' alt='' border='0'/></a></div>";
					echo "<div class='product_title'><a href='details.php?id=".$row['product_id']."'>".$row['prod_name']."</a></div>";
					echo "<div class='prod_price'><span class='start-bid'>Artist: </span> <span class='price text-info'>".$row['artist']."</span><br />
					<span class='start-bid'>Start Bid at: </span> <span class='price text-info'>$".$row['starting_bid']."</span><br />
				
				</div>";
			echo "</div>";
			echo "<div class='prod_details_tab ist-group-item list-group-item-action list-group-item-secondary active aria-disabled'><a href='details.php?id=".$row['product_id']."' class='prod_details' title='header=[Click to Bid] body=[&nbsp;] fade=[on]'>Bid Now</a> </div>";
			echo "</div>";
		}
	  }
?>