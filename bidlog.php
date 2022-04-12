<?php require_once("dbconnection/db.php"); ?>
<head>  
<meta name="viewport" content="width=device-width, initial-scale=1" charset="UTF-8"/>	
<link rel="stylesheet" href="http://cdn.datatables.net/1.10.2/css/jquery.dataTables.min.css"></style>
<script type="text/javascript" src="http://cdn.datatables.net/1.10.2/js/jquery.dataTables.min.js"></script>
    <script>
$(document).ready(function(){
    $('#demoTable').dataTable();
});
</script>
<script type="text/javascript">
  $('#myModal').modal('hide');
</script>
</head>
  <body>  
  <?php include_once("header/header.php"); ?>
<div class="container"> 
    <div class="container mt-5"><?php
    $id = $_GET['id'];
    $pname = mysqli_query($conn,"SELECT * FROM products WHERE product_id='$id'")or die(mysqli_error());
    $pnamea = mysqli_fetch_array($pname);
  ?>
   <a href="artists.php?id=4"><button type="button" class="btn btn-grey text-info">Back</button></a>
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
        $prodid = $_GET['id'];
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
  <?php include_once("footer/footer.php"); ?>
  </body>