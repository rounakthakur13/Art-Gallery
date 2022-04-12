<?php require_once("functions.php"); ?>
<!DOCTYPE html>
<html>
	<head>
	<meta name="viewport" content="width=device-width, initial-scale=1" charset="UTF-8"/>	
		<title>Art Gallery</title>
		<link rel="stylesheet" type="text/css" href="css/style.css">
		<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

<script type="text/javascript">
    $(window).on('load',function(){
        $('#myModal').modal('show');
        $('#submit').hide();
    });

</script>
	</head>
	<body>
		
		<div class="container">
			<!-- Trigger the modal with a button -->
			<button type="button" style="visibility: hidden;" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Open Modal</button>
			<!-- Modal -->
			<div class="modal fade" id="myModal" role="dialog">
				<div class="modal-dialog">
					
					<!-- Modal content-->
					<div class="modal-content">
						<div class="modal-header">
							<a href="showprod.php" class="close">&times;</a>
							
						</div>
						<div class="modal-body">
							<?php
							if(isset($_POST['submit'])){
							$high = $_POST['high'];
							$id = $_GET['id'];
							$bidamount = $_POST['bidamount'];
							$query = mysqli_query($conn,"SELECT * FROM products WHERE product_id = '$id'") or die (mysqli_error());
							$prod = mysqli_fetch_array($query);
							if(isset($_SESSION['user_id'])){
							$userid = $_SESSION['user_id'];
							}
							$query2 = mysqli_query($conn,"SELECT * FROM login WHERE id = '$userid'") or die (mysqli_error());
							$user = mysqli_fetch_array($query2);
							$biddername = $user['id'];
							$prodname = $prod['prod_name'];
							if($bidamount > $high){
							mysqli_query($conn,"INSERT INTO bidreport(productid,bidder,biddatetime,bidamount,status) VALUES ('$id','$biddername',now(),'$bidamount',0)");
							echo "Congratulations ".$_SESSION['user_name']."! You are the highest bidder for Item ".$prodname."<br /><br /><a class='float-right'href='details.php?id=".$id."'>Back</a>";
							
							
							}elseif($bidamount <= $high){
							echo "Your Bid is not counted for the amount is lower than the highest bid or does not exceed the starting bid<br /><br /><a class='float-right' href=details.php?id=".$id.">Back</a>";
							}
							}
							?></br>
						</div>
						<div class="modal-footer">
							<button type="button" class="invisible btn btn-default" data-dismiss="modal" hidden>Close</button>
						</div>
					</div>
					
				</div>
			</div>
			
		</div>
		
		
	</body>
</html>