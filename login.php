<?php
session_start();

require_once ("dbconnection/db.php");

if(isset($_SESSION['user_id'])!="") {
   echo"<script type='text/javascript'>
   window.location.href = 'dashboard.php';
   </script>";
}

if (isset($_POST['login'])) {
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);

    if(!filter_var($email,FILTER_VALIDATE_EMAIL)) {
        $email_error = "Please Enter Valid Email ID";
    }
    if(strlen($password) < 6) {
        $password_error = "Password must be minimum of 6 characters";
    }  

    $result = mysqli_query($conn, "SELECT * FROM login WHERE email = '" . $email. "' and password = '" .$password. "'");
   if(!empty($result)){
        $row = mysqli_fetch_array($result);
         if(mysqli_num_rows($result)==0 or $row['account_type']!= 'Buyer'){
        $error_message = "Incorrect email or password!!! and if you are an artist then sign in from ARTIST section in navbar";
    }
    	else
		
		{
            $_SESSION['user_id'] = $row['id'];
            $_SESSION['user_name'] = $row['name'];
            $_SESSION['user_email'] = $row['email'];
            $_SESSION['user_mobile'] = $row['mobile'];
            $_SESSION['user_address'] =$row['address'];
            $_SESSION['account_type'] = $row['account_type'];
            $_SESSION['item_acquired'] =0;
            echo"<script type='text/javascript'>
                window.location.href = 'dashboard.php';
                </script>";
        } 
    }
   
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta name="viewport" content="width=device-width, initial-scale=1" charset="UTF-8"/>
    <title>Art Gallery Login </title>
</head>
<body>
   <?php include_once("header/header.php"); ?>
    <div class="container mt-5 mb-5">
        <div class="row">
            <div class="col">
                <div class="page-header">
                    <h2><center>Log in to Art Gallery</center></h2>
                    <?php if (isset($_SESSION['registred'])) {?>
                        <div class="alert alert-success" role="alert">
                            <h4 class="alert-heading">Well done!</h4>
                                <p><strong>Congratulations</strong>, you successfully registred as Buyer to Art Gallery.</p>
                        </div><?php
                        unset($_SESSION['registred']);
                    } ?>
                </div>
                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">

                    <div class="form-group ">
                        <label>Email</label>
                        <input type="email" name="email" class="form-control" value="" maxlength="30" required="">
                        <span class="text-danger"><?php if (isset($email_error)) echo $email_error; ?></span>
                    </div>

                    <div class="form-group">
                        <label>Password</label>
                        <input type="password" name="password" class="form-control" value="" maxlength="15" required="">
                        <span class="text-danger"><?php if (isset($password_error)) echo $password_error; ?></span>
                    </div>  
                    
                    <input type="submit" class="btn btn-info" name="login" value="Submit">
                     <span class="text-danger"><?php if (isset($error_message)) echo $error_message; ?></span>
                    <br>
                   <div class="registration mt-3"> You don't have account?<a href="registration.php" class="mt-3">Click Here</a></div>
                    
                    
                </form>
            </div>
        </div>     
    </div>
    
</body>
</html>
