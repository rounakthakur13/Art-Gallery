<?php session_start();
require_once("dbconnection/db.php");
require('class/artist.php');

        if (isset($_POST['submit'])) {
          $title = mysqli_real_escape_string($conn, $_POST['name']);
          $category = mysqli_real_escape_string($conn, $_POST['category']);
          $description = mysqli_real_escape_string($conn, $_POST['description']);
          $price = mysqli_real_escape_string($conn,$_POST['price']);
          $sprice =mysqli_real_escape_string($conn, $_POST['sprice']);
          $date = mysqli_real_escape_string($conn, $_POST['date']);
          if ($date==Date("Y-m-d")) {
          	$date=strftime("%Y-%m-%d", strtotime("$date +1 day"));
          }
          $file = $_FILES['file']['name'];
          $target_dir = "admin/public/images/";
          $target_file = $target_dir . basename($_FILES["file"]["name"]);
          $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
          $error=1;
          if ($sprice<$price) {
            $sprice_error= "Staring Bid must bigger then base price";
            $error=0;
          }
          if ($error==1) {

             if($sql=mysqli_query($conn, "INSERT INTO products (prod_name, category_id, prod_description, prod_image, regular_price, date_posted, due_date, status, starting_bid, artist) VALUES('" . $title . "', '" . $category . "', '" .  $description  . "', '" . $file . "','" . $price . "','".date("Y/m/d")."','".$date."','0','".$sprice."','".$_SESSION['user_name']."')")){
                move_uploaded_file($_FILES['file']['tmp_name'],$target_dir.$file);
                $_SESSION['success']="true";
                echo"<script type='text/javascript'>
                window.location.href = 'artists.php?id=2';
               </script>";
                }
                else{
                echo"There is an error";
                }
             }       
            }
?>
<!DOCTYPE html>
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1" charset="UTF-8"/>	
	<title>Art Gallery</title>
</head>
<body>
<?php include_once("header/header.php");?>
<script src="js/jquery.countdown.min.js"></script>
	<div class="container">
		<?php if (empty($_SESSION) or $_SESSION['account_type']=='Buyer'){?>
			<div class="row    mt-3">
						<a href="" class="list-group-item list-group-item-action list-group-item-secondary active disabled text-center" tabindex="-1" aria-disabled="true"  ><h4>Artists</h4></a>
		</div>
		<div class="row">
			<div class="container col">
				<div class="card bg-info text-light mt-3">
  <div class="card-body">
    <h5 class="card-title text-center">Welcome to Artists Section</h5>
    <hr/>	
    <p class="card-text">If you are an artist then click below to login</p>
    <a href="artistLogin.php" class="card-link text-secondary"><button type="button" class="btn btn-secondary">Login</button></a>
    <p class="card-text mt-1">If you don't have an account click to register</p>
    <a href="artistRegistration.php" class="card-link text-secondary"> <button type="button" class="btn btn-secondary">Register</button></br></br></br></br></a>
  </div>
</div>	
			
			</div>
			<?php $art= new artist();
			$art->getArtist();?>
		</div>
	<?php }?>


</div>
<?php if(!empty($_SESSION['account_type'])) {
   if($_SESSION['account_type']=='Artist'){?>
    <div class="row">
        <div class="left-container col-lg-2 mt-3">
	
            <div class="list-group">
            <li href="" class="list-group-item  text-center list-group-item-action list-group-item-light active disabled" tabindex="-1" aria-disabled="true" ><?php
      $art= new artist(); 
      $art->getProfile();
      ?></li>
        <a href ='?id=1' class='list-group-item list-group-item-light text-center'>Profile Dashboard</a>
        <a href='?id=2' class='list-group-item list-group-item-light text-center'>My Products</a>
         <a href='?id=3' class='list-group-item list-group-item-light text-center'>Add Product</a>
         <a href='?id=4' class='list-group-item list-group-item-light text-center'>Auction Result</a>
        
      </div>
    </div>
    <div class="container col-lg-10 mt-3">
    <?php if(isset($_SESSION['success'])){ ?>
      <div class="alert alert-success" role="alert">
      <h4 class="alert-heading">Well done!</h4>
          <p><strong>Congratulations</strong>, you successfully Uploaded an auction.</p>
  </div>
   <?php } ?>
      <?php if (empty($_GET)) {
        echo"<div class='container text-center'>";
       echo"<h3>Successfully Logged</h3>";
       echo"<p class='text-danger'> Please click on sidebar links to perform actions</p>";
       echo"</div>";
        } ?>
     

      <?php if (!empty($_GET)) {
        if ($_GET['id']=='1') {
          $art->showProfile();
          # code...
        }
        if ($_GET['id']=='2') {
          $art->showProduct();
          # code...
        }
        if ($_GET['id']=='3') {?>
        <div class="container">
          <div class="row">
            <div class="col mt-3">
                <div class="page-header">
                    <h2>Add Product</h2>
                </div>
                <form action="artists.php?id=3" method="post" enctype='multipart/form-data' class="mt-3">

                    <div class="form-group mt-5">
                        <label>Product Title</label>
                        <input type="text" name="name" class="form-control" value="" maxlength="50" required="">
                    </div>
                    <div class="form-group">
                      <label>Category</label>
                          <select class="form-control" id="exampleFormControlSelect1" name="category">
                            <?php 

                              $sql = mysqli_query($conn, "SELECT * FROM categories");

                                  while ($row = $sql->fetch_assoc()){?>
                              <?php echo  "<option value='".$row['category_id']."'>".$row['category_name']."</option>"; ?></option>
                            <?php }?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlTextarea2">Description</label>
                        <textarea class="form-control rounded-0" name="description" id="exampleFormControlTextarea2" rows="3" required=""></textarea>
                    </div>
                     <div class="form-group">
                    <label for="exampleFormControlFile1">Product Image</label>
                        <input type="file" accept=".jpg,.gif,.png" name="file" class="form-control" id="exampleFormControlFile1" required="">
                    </div>
                     <div class="form-group">
                        <label>Base Price</label>
                        <input type="number" name="price" class="form-control" value="" required="">
                    </div>
                    <div class="form-group">
                        <label>Starting Bid</label>
                        <input type="number" name="sprice" class="form-control" value="" required="">
                         <span class="text-danger"><?php if (isset($sprice_error)) echo $sprice_error; ?></span>
                    </div>
                    <div class="form-group">
                        <label>End date</label>
                        <input type="date" name="date" class="form-control" value="" <?php echo' min="'.Date("Y-m-d").'"';?> required="">
                    </div>
                    <input type="submit" class="btn btn-info mb-3" name="submit" value="Submit">
                </form>
            </div>
        </div>  
        </div>  

      <?php } if($_GET['id']=='4'){
        $art->expiredProduct();
        ?><?php
      } ?>
     <?php } ?>
      
    </div><?php }}?>
<?php include_once("footer/footer.php");?>

</body>
</html>