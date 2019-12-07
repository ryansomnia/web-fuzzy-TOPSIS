<?php
if (version_compare(phpversion(), "5.3.0", ">=")  == 1)
  error_reporting(E_ALL & ~E_NOTICE & ~E_DEPRECATED);
else
  error_reporting(E_ALL & ~E_NOTICE);  
  ?>
<?php
session_start();
//error_reporting(0);
require_once"konmysqli.php";

date_default_timezone_set("Asia/Jakarta");

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title><?php echo $header;?></title>
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="css/sb-admin.css" rel="stylesheet">

  </head>

  <body class="bg-dark">

    <div class="container">
      <div class="card card-login mx-auto mt-5">
        <div class="card-header">Reset Password</div>
        <div class="card-body">
          <div class="text-center mb-4">
            <h4>Forgot your password?</h4>
            <p>Enter your email address and we will send you instructions on how to reset your password.</p>
          </div>
          <form action="" method="post">
            <div class="form-group">
              <div class="form-label-group">
                <input type="email" name="email" id="inputEmail" class="form-control" placeholder="Enter email address" required="required" autofocus="autofocus">
                <label for="inputEmail">Enter email address</label>
              </div>
            </div>
            <input type="Submit" name="RESET" value="Reset Password"  class="btn btn-primary btn-block" >
          </form>
		  
          <div class="text-center">
            <a class="d-block small mt-3" href="hregister.php">Register an Account</a>
            <a class="d-block small" href="hlogin.php">Login Page</a>
          </div>
        </div>
      </div>
    </div>

    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  </body>

</html>


<?php
if(isset($_POST["RESET"])){
$email=$_POST["email"];
echo"<script>alert('Proses Reset Sudah dikirimkan ke $email');</script>";


$msg = "First line of text\nSecond line of text";
$msg = wordwrap($msg,70);

mail($email,"Request Account",$msg);
}
?>

