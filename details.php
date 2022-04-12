<?php require_once("functions.php"); ?>
<!DOCTYPE html>
<html>
	<head>
		<title>Art Gallery</title>
		<meta name="viewport" content="width=device-width, initial-scale=1" charset="UTF-8"/>
		<link rel="stylesheet" href="http://cdn.datatables.net/1.10.2/css/jquery.dataTables.min.css"></style>
		<script type="text/javascript" src="http://cdn.datatables.net/1.10.2/js/jquery.dataTables.min.js"></script>
		<script>
		$(document).ready(function(){
		$('#demoTable').dataTable();
		});
		</script>
	</head>
	<body>
	<?php include_once("header/header.php"); ?>
		<div class="container mb-3">
			<div class="row">
				<div class="left-container col-lg-3 mt-3">
					<div class="list-group">
						<a href="" class="list-group-item list-group-item-action list-group-item-secondary active disabled" tabindex="-1" aria-disabled="true" >Categories</a>
						<?php
						categories();
						logform();
						?>
					</div>
					<div class="center-container col-lg-9 mt-3">
						<?php
						$id = $_GET['id'];
						$query = mysqli_query($conn,"SELECT * FROM products WHERE product_id = '$id'") or die (mysqli_error());
						$row = mysqli_fetch_array($query);
						?>
						<div class="container">
							<div class="list-group-item list-group-item-action list-group-item-secondary active disabled title-bar">Product Details</div>
							<div class="container prod_box_big bg-muted">
									<div class="details_big_box container row">
										<div class='proddet col-lg-6'>
											<div class="product_title_big"><strong class="strong">Title: </strong><?php echo $row['prod_name'];?></div><br />
											<div class="specificationss"> <strong class="strong">Description:</strong> <span class="blue"><?php echo $row['prod_description'];?></span><br /><br />
											<strong class="strong">Date Added:</strong> <span class="blue"><?php echo $row['date_posted'];?></span><br /><br />
											<strong class="strong">Item number:</strong> <span class="blue"><?php echo '0998'.$row['product_id'].'';?></span><br /><br />
											<strong class="strong">Available to:</strong> <span class="blue">Art Gallrry</span><br /><br />
											<strong class="strong">Category:</strong> <span class="blue">
												<?php
													$categid = $row['category_id'];
													$categ = mysqli_query($conn,"SELECT * FROM categories WHERE category_id = '$categid'")or die(mysqli_error());
													$catega = mysqli_fetch_array($categ);
													echo $catega['category_name'];
											?></span><br /><br />
											
										</div>
									</div>
									<div class='container bid_box col-lg-6 ' style="display: none;">
										<?php
													$id = $_GET['id'];
													$_SESSION['prod_id'] = $id;
													$query = mysqli_query($conn,"SELECT * FROM products WHERE product_id = '$id'") or die (mysqli_error());
													$row = mysqli_fetch_array($query);
													$prodid = $row['product_id'];
													$prodsbid = $row['starting_bid'];
													$seller = $row['artist'];
													
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
													
													if(empty($_SESSION['user_id']) or $_SESSION['account_type']=='Artist'){
														echo"<span class='blue'><p> Please <a href='login.php'>Log-In</a> or Register as Buyer</p></br><h2> For Purchase</h2></span>";
													}else{
													
									echo"</span>
											<br/>
									&nbsp&nbsp <strong class='strong'>Artist: </strong><span class='blue'>";?><?php echo $seller;?><?php echo"</span><br/>
										<br/>
									&nbsp&nbsp <strong class='strong'>Bids: </strong><span class='blue'>";?><?php echo $noofbidders;?><?php echo"</span><br/><br/>
									&nbsp&nbsp  <strong class='strong'>Highest Bid: </strong> <span class='blue'>$";?><?php echo $highbid;?><?php echo"</span><br/><br/>
									&nbsp&nbsp  <strong class='strong'>Highest Bidder: </strong><span class='blue'>";?>
										<?php
										$name = mysqli_query($conn,"SELECT * FROM login WHERE id = '$hibidder'")or die(mysqli_error());
										$namea = mysqli_fetch_array($name);
										echo $namea['name'];?>
									<?php echo"</span><br /><br />
									&nbsp&nbsp <strong class='strong'>Time Left to Bid: </strong> <span class='blue'>";?>
										<?php
										
										$duedate = $row['due_date'];
										$closedate = date_format(date_create($duedate), 'm/d/Y H:i:s');
										?>
										<script language="JavaScript">
										TargetDate = "<?php echo $closedate ?>";
										BackColor = "";
										ForeColor = "navy";
										CountActive = true;
										CountStepper = -1;
										LeadingZero = true;
										DisplayFormat = "%%D%% Days, %%H%% Hours, %%M%% Minutes, %%S%% Seconds.";
										FinishMessage = "Bidding closed!";
										</script>
										<script language="JavaScript" src="js/countdown.js"></script>
									<?php echo'</span><br /><br />
										<form method = "post" action="bidconfirm.php?id='.$prodid.'" id="logins-form" class="form-group">
															<input type = "hidden" value="'.$highbid.'" name="high">
															&nbsp&nbsp <input type="number" class="input-group-text" id="inputGroup-sizing-default" name="bidamount">
															<input type="submit"class="btn btn-dark mt-2" value="Place Bid" name="submit">
										</form>
									&nbsp&nbsp <span class="blue">';
													echo "<span class='blue'>(Enter Price higher than $".$highbid.")</span>";
													echo "<br />&nbsp&nbsp&nbsp&nbsp<span class='blue'></br> click <button type='button' class='btn-link mb-2' data-toggle='modal' data-target='.bd-example-modal-lg'>here</button> to view Bidding Log</span> ";
													echo"";
											
													}
										?>
									</div>
									
			
								<div class="container col-lg-6  product_img_big">
									<div class="img_big text-center">	
										<a title='header=[Click to Bid] body=[&nbsp;] fade=[on]'><img class="mt-3 mb-3" src='admin/public/images/<?php echo $row['prod_image'];?>' width='280' height='240' alt='' border='0' /></a>
									</div>
										<div class='container bid_border_box'>
											<div class='bid text-responsive' style="cursor: pointer;">Click to Bid Now</div>
										</div>
										<div class='bid_border_box'>
											<div class='details' style="cursor:pointer;display: none;">Click to View Details</div>
										</div>
									</div>
									<script type='text/javascript'>
									jQuery(document).ready( function() {
									
										jQuery('.bid_box').hide(1);
										jQuery('.details').hide(1);
										
										jQuery('.details').click( function() {
											jQuery('.proddet').toggle('fade');
											jQuery('.bid').toggle('fade');
											jQuery('.bid_box').hide(1)
											jQuery('.details').hide(1);
										});
										jQuery('.bid').click( function() {
											jQuery('.details').toggle('fade');
											jQuery('.bid_box').toggle('fade');
											jQuery('.bid').hide(1);
											jQuery('.proddet').hide(1);
										});
									});
									</script>
							</div>
						</div>
						
					</div>
					<!-- end of center content -->
					<!-- end of right content -->
				</div>
			</div>
		</div>
		<!--------------------------------------     Bidding Log--------------------------------- -->
		
		<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
			<div class="modal-dialog modal-lg">
				<div class="modal-content">
					<div class="modal-header modal-lg">
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					</div>
					<div class="modal-body modal-lg"><?php
							$id = $prodid;
							$pname = mysqli_query($conn,"SELECT * FROM products WHERE product_id='$id'")or die(mysqli_error());
							$pnamea = mysqli_fetch_array($pname);
						?>
						<center><h5><?php echo $pnamea['prod_name']; ?> Bidding Log</h5></center>
						<div id="bodycon">
							<table id="demoTable" class="table table-striped">
								<thead>
									<?php echo '<tr>';
											echo '<th sort="index">Bidder</th>';
											echo '<th sort="date">Date of Bid Placed</th>';
											echo '<th sort="description">Amount</th>';
											
									echo'</tr>'; ?>
								</thead>
								<tbody>
									<?php
									$prodid =$prodid;
									$query = mysqli_query($conn,"SELECT * FROM bidreport LEFT JOIN login ON login.id = bidreport.bidder LEFT JOIN products ON products.product_id = bidreport.productid WHERE products.product_id = '$prodid'") or die(mysqli_error());
									while ($prod = mysqli_fetch_array($query)){
									echo
									"<tr>
											<td>".$prod['name']."</td>
											<td>".$prod['biddatetime']."</td>
											<td>$".$prod['bidamount']."</td>
									</tr>";
									}
									?>
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
		<?php include_once("footer/footer.php")?>
	</body>
</html>