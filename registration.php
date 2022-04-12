<?php session_start();
  require_once ("dbconnection/db.php");
  if(isset($_SESSION['user_id'])!="") {
    echo"<script type='text/javascript'>
    window.location.href = 'dashboard.php';
   </script>";
  }
  
    if (isset($_POST['signup'])) {
        $name = mysqli_real_escape_string($conn, $_POST['name']);
        $email = mysqli_real_escape_string($conn, $_POST['email']);
        $mobile = mysqli_real_escape_string($conn, $_POST['mobile']);
        $password = mysqli_real_escape_string($conn, $_POST['password']);
        $cpassword = mysqli_real_escape_string($conn, $_POST['cpassword']); 
        $address = mysqli_real_escape_string($conn, $_POST['address']);
        $file = $_FILES['file']['name'];
        $target_dir = "admin/public/images/";
        $target_file = $target_dir . basename($_FILES["file"]["name"]);
        $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
        $error=1;
        if (!preg_match("/^[a-zA-Z' ]+$/",$name)) {
            $name_error = "Name must contain only alphabets and space";
            $error=0;
        }
        if(!filter_var($email,FILTER_VALIDATE_EMAIL)) {
            $email_error = "Please Enter Valid Email ID";
            $error=0;
        }   
        if(strlen($password) < 6) {
            $password_error = "Password must be minimum of 6 characters";
            $error=0;
        } 
          if(strlen($password) > 12) {
            $password_error = "Password must be maximum of 12 characters";
            $error=0;
        }           
        if(strlen($mobile) < 10) {
            $mobile_error = "Mobile number must be minimum of 10 characters";
            $error=0;
        }
        if($password != $cpassword) {
            $cpassword_error = "Password and Confirm Password doesn't match";
            $error=0;
        }
        if ($error==1) {
            if($sql=mysqli_query($conn, "INSERT INTO login (name, password, email, mobile,address,account_type,image) VALUES('" . $name . "', '" . $password . "', '" .  $email  . "', '" . $mobile . "','" . $address . "','Buyer','".$file."')")) {
                 move_uploaded_file($_FILES['file']['tmp_name'],$target_dir.$file);
                $_SESSION['registred']='Yes';
            echo"<script type='text/javascript'>
            window.location.href = 'login.php';
            </script>";
             exit();
            } else {
                $database_error= $sql . "" . mysqli_error($conn);
            }
        }
        mysqli_close($conn);
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta name="viewport" content="width=device-width, initial-scale=1" charset="UTF-8"/>
    <title>Art Gallery </title>
</head>
<body>
    <?php include_once("header/header.php"); ?>
    <div class="container mt-5 mb-5">
        <div class="row">
            <div class="col">
                <div class="page-header">
                    <h2><center>Sign up to Art Gallery</center></h2>
                </div>
                 <?php if (isset($database_error)) {
                    echo"<p class='text-danger'>".$database_error."</p>";
                    # code...
                } ?>
                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" enctype='multipart/form-data'>

                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" name="name" class="form-control" value="" maxlength="50" required="">
                        <span class="text-danger"><?php if (isset($name_error)) echo $name_error; ?></span>
                    </div>

                    <div class="form-group ">
                        <label>Email</label>
                        <input type="email" name="email" class="form-control" value="" maxlength="30" required="">
                        <span class="text-danger"><?php if (isset($email_error)) echo $email_error; ?></span>
                    </div>

                    <div class="form-group">
                        <label>Mobile</label>
                        <input type="number" name="mobile" class="form-control" value="" maxlength="12" required="">
                        <span class="text-danger"><?php if (isset($mobile_error)) echo $mobile_error; ?></span>
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlTextarea2">Address</label>
                        <textarea class="form-control rounded-0" name="address" id="exampleFormControlTextarea2" rows="3"></textarea>
                    </div>
                     <div class="form-group">
                    <label for="exampleFormControlFile1">Upload Image</label>
                        <input type="file" accept=".jpg,.gif,.png" name="file" class="form-control" id="exampleFormControlFile1" required="">
                    </div>
                    <div class="form-group">
                        <label>Password</label>
                        <input type="password" name="password" class="form-control" value="" maxlength="15" required="">
                        <span class="text-danger"><?php if (isset($password_error)) echo $password_error; ?></span>
                    </div>  

                    <div class="form-group">
                        <label>Confirm Password</label>
                        <input type="password" name="cpassword" class="form-control" value="" maxlength="15" required="">
                        <span class="text-danger"><?php if (isset($cpassword_error)) echo $cpassword_error; ?></span>
                    </div>

                    <input type="submit" class="btn btn-dark" name="signup" value="Submit">
                    Already have a account?<a href="login.php" class="btn btn-info ml-2">Login</a>
                </form>
            </div>
        </div>    
    </div>
    
</body>
</html>
