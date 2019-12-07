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
        <div class="card-header">Login</div>
        <div class="card-body">
          <form action="" method="post">
            <div class="form-group">
              <div class="form-label-group">
                <input type="text" id="inputUsername" class="form-control" placeholder="Username" name="username" required="required" autofocus="autofocus">
                <label for="inputUsername">Username</label>
              </div>
            </div>
            <div class="form-group">
              <div class="form-label-group">
                <input type="password" id="inputPassword" class="form-control" placeholder="Password"  name="password"  required="required">
                <label for="inputPassword">Password</label>
              </div>
            </div>
            <div class="form-group">
              <div class="checkbox">
                <label> <input type="checkbox" value="remember-me"> Remember Password
                </label>
              </div>
            </div>
			
		  <input type="Submit" value="Login" name="Login" class="btn btn-primary btn-block">
          </form>
          <div class="text-center">
		  <table align="center"><tr>
            <td><a class="d-block small" href="hforgot.php">Forgot Account?</a>  
			<td>|
			<td><a class="d-block small" href="hregister.php">Hav'n Account?</a>  
			</tr>
			</table>
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
if(isset($_POST["Login"])){
	$usr=$_POST["username"];
	$pas=$_POST["password"];

		$sql1="select * from `$tbuser` where `username`='$usr' and `password`='$pas' and validasi='Aktif'";

		if(getJum($conn,$sql1)>0){
			$d=getField($conn,$sql1);
				$kode=$d["kode_user"];
				$nama=$d["nama_user"];
				$status=$d["status"];
				   $_SESSION["cid"]=$kode;
				   $_SESSION["cnama"]=$nama;
				   $_SESSION["cstatus"]=$status;
		echo "<script>alert('Otentikasi ".$_SESSION["cstatus"]." AN ".$_SESSION["cnama"]." (".$_SESSION["cid"].") berhasil Login!');
		document.location.href='index.php?mnu=home';</script>";
		}
			else{
			session_destroy();
			echo "<script>alert('Otentikasi Login GAGAL !,Silakan cek data Anda kembali...');
			document.location.href='hlogin.php';</script>";
		}
}


function getJum($conn,$sql){
  $rs=$conn->query($sql);
  $jum= $rs->num_rows;
	$rs->free();
	return $jum;
}

function getField($conn,$sql){
	$rs=$conn->query($sql);
	$rs->data_seek(0);
	$d= $rs->fetch_assoc();
	$rs->free();
	return $d;
}
?>