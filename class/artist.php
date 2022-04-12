<?php 
class artist{
	function getArtist(){
		global $conn;
		$sql="SELECT * FROM login WHERE account_type = 'Artist'";
		$result= $conn->query($sql);
		while($row= mysqli_fetch_array($result)){
			echo "<div class='artist_box mt-3 col col-lg-3 col-md-5 col-sm-12'>";
					echo "<a href='artistProduct.php?name=".$row['name']."'><div class='artist_img text-center'><img class='rounded'width='200' height='250' src='admin/public/images/".$row['image']."'";echo"<br></div>";
					echo "<div class='artist_name text-center text-info'>".$row['name']."</div></a>";
					echo "<div class='artist_mobile text-center'>Mobile: <span class='artist_email1 text-info'>".$row['mobile']."</span></div>";
					echo "<div class='artist_email text-center'>Email: <span class='artist_email1 text-info'>".$row['email']."</span></div>";
					echo "<div class='artist_address text-center'>Address: <span class='artist_email1 text-info'>".$row['address']."</span></div>";
					echo"</div>";

		}
	
	}
	function getProduct(){
		global $conn;
			if (isset($_GET['name'])) {
		$name = $_GET['name'];
		$query = "SELECT * FROM products WHERE artist = '".$name."' AND status = 0" or die (mysqli_error());
		$res=$conn->query($query);
		$result = mysqli_num_rows($res);
		if($result == 0){
			echo "<div class='prod_box' style='margin: 30px 0 0 400px'>";
				echo "<div class='top_prod_box'></div>";
				echo "<div class='center_prod_box'>";
						echo "<div class='product_title'>There is no available product from This Artist</div>";
					echo "<div class='product_img'><img src='admin/public/images/nocateg.jpg' width='94' height='92' alt='' border='0' /></div>";
					echo "<div class='prod_price'></div>";
			echo "</div>";
			echo "<div class='bottom_prod_box'></div>";
			echo "</div>";
		}
		else{
			while($row = mysqli_fetch_array($res)){
				echo "<div class='prod_box mt-3'>";
				echo"<span class='expiring text-danger ml-3'>Expiring in</span>";
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
					echo "<div class='product_img'><a href='details.php?id=".$row['product_id']."'><img class='img-responsive mt-4 ml-3' src='admin/public/images/".$row['prod_image']."' width='180' height='180' alt='' border='0'/></a></div>";
					echo "<div class='product_title'><a href='details.php?id=".$row['product_id']."'>".$row['prod_name']."</a></div>";
					echo "<div class='prod_price'><span class='start-bid'>Artist: </span> <span class='price text-info'>".$row['artist']."</span><br/>
				</div>";
			echo "</div></div>";
		
			}
		}
	}
}
 function getProfile(){
 	global $conn;
 	if (!empty($_SESSION)) {
 	$id=$_SESSION['user_id'];
 	$sql="SELECT * FROM login where id='".$id."'";
 	$res=$conn->query($sql);
 	while($row= mysqli_fetch_array($res)){
					echo "<img class='img-responsive profile-image rounded-circle'width='80' height='80' src='admin/public/images/".$row['image']."'</br>";
					echo "<div class='artist_name text-center text-light'>".$row['name']."</br><h6 class='text-light'>Artist</h6></div>";
				

 }
}
}
function showProfile(){
	if (!empty($_SESSION)) {
	echo"<div class='container mt-5 mb-5'>";
        echo"<div class='row'>";
            echo"<div class='col-lg-8 col-md-12 col-sm-12'>";
                echo"<div class='card'>";
                 echo"<div class='card-header'>";
                      echo"<strong>Profile Dashboard</strong>
                      </div>";
                  echo"<div class='card-body'>
                    <h5 class='card-title'>Name :-".$_SESSION['user_name']."</h5>
                    <p class='card-text'>Email :- ".$_SESSION['user_email']."</p>
                    <p class='card-text'>Mobile :-".$_SESSION['user_mobile']."</p>
                    <p class='card-text'>Address :-".$_SESSION['user_address']."</p>
                    <p class='card-text'>Account Type :-".$_SESSION['account_type']."</p>
                    <a href='logout.php' class='btn btn-secondary'>Logout</a>
                  </div>
                </div>
            </div>
        </div>       
    </div>";
}
}
function showProduct(){
	global $conn;
	if(isset($_SESSION)){
		$name = $_SESSION['user_name'];
		$query = "SELECT * FROM products WHERE artist = '".$name."' AND status = 0" or die (mysqli_error());
		$res=$conn->query($query);
		$result = mysqli_num_rows($res);
		if($result == 0){
			echo "<div class='prod_box' style='margin: 30px 0 0 400px'>";
				echo "<div class='top_prod_box'></div>";
				echo "<div class='center_prod_box'>";
						echo "<div class='product_title'>There is no available product from This Artist</div>";
					echo "<div class='product_img'><img src='admin/public/images/nocateg.jpg' width='94' height='92' alt='' border='0' /></div>";
					echo "<div class='prod_price'></div>";
			echo "</div>";
			echo "<div class='bottom_prod_box'></div>";
			echo "</div>";
		}
		else{
			while($row = mysqli_fetch_array($res)){
				$sql1=mysqli_query($conn,"SELECT category_name FROM categories where category_id='".$row['category_id']."'");
				$category=mysqli_fetch_row($sql1);
				echo "<div class='prod_box mt-3'>";
				echo"<span class='expiring text-danger ml-3'>Expiring in</span>";
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
					echo "<div class='product_img'><img class='img-responsive mt-4 ml-3' src='admin/public/images/".$row['prod_image']."' width='230' height='180' alt='' border='0'/></div>";
					echo "<div class='product_title'><a>".$row['prod_name']."</a></div>";
					echo "<div class='prod_price'><span class='start-bid'>Category: </span> <span class='price text-info'>".$category[0]."</span><br/>
				</div>";
					echo "<div class='prod_price'><span class='start-bid'>Artist: </span> <span class='price text-info'>".$row['artist']."</span><br/>
				</div>";
			echo "</div></div>";
		
			}

	}
}
}
function expiredProduct(){
	global $conn;
	if (isset($_SESSION['user_name'])) {
		$sql="SELECT * FROM products WHERE status='1' and artist='".$_SESSION['user_name']."'";
		$result= $conn->query($sql);
		$res = mysqli_num_rows($result);
		if ($res==0) {
			echo "<div class='prod_box' style='margin: 30px 0 0 400px'>";
				echo "<div class='top_prod_box'></div>";
				echo "<div class='center_prod_box'>";
						echo "<div class='product_title'>There is no exprired product from This Artist</div>";
					echo "<div class='product_img'><img src='admin/public/images/nocateg.jpg' width='94' height='92' alt='' border='0' /></div>";
					echo "<div class='prod_price'></div>";
			echo "</div>";
			echo "<div class='bottom_prod_box'></div>";
			echo "</div>";
			# code...
		}else{
			while ($row = mysqli_fetch_array($result)) {
				$sql1=mysqli_query($conn,"SELECT bidder FROM bidreport where productid='".$row['product_id']."' ORDER BY bidid DESC LIMIT 1");
				$winne= mysqli_fetch_row($sql1);
				$sql2=mysqli_query($conn,"SELECT * FROM login where id='".$winne[0]."'");
				$winner= mysqli_fetch_row($sql2);
				echo "<div class='prod_box mt-3'>";
				echo"<span class='expiring text-danger ml-5'>Winner!!!!!!</span>";
				echo "<div class='timer text-dark ml-2 mt-1'>".$winner[1]."</div>";
				echo "<div class='center_prod_box'>";
					echo "<div class='product_img'><img class='img-responsive mt-4 ml-3' src='admin/public/images/".$row['prod_image']."' width='230' height='180' alt='' border='0'/></div>";
					echo "<div class='product_title'><a>".$row['prod_name']."</a></div>";
					echo "<div><a  style='font-size:15px;'class='text-info'href='bidlog.php?id=".$row['product_id']."'>Bid Log</a></div>";
					echo "<div class='prod_price'><span class='start-bid'>Artist: </span> <span class='price text-info'>".$row['artist']."</span><br/>
				</div>";
			echo "</div></div>";
				
			}
		}

		
		}
	}
}

$art= new artist();
?>