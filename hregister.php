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
      <div class="card card-register mx-auto mt-5">
        <div class="card-header">Register an Account</div>
        <div class="card-body">
		
		
		
           <form action="" method="post">
            <div class="form-group">
              <div class="form-row">
                <div class="col-md-6">
                  <div class="form-label-group">
                    <input type="text" id="firstName" class="form-control" name="first" placeholder="First name" required="required" autofocus="autofocus">
                    <label for="firstName">First name</label>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-label-group">
                    <input type="text" id="lastName" class="form-control"  name="last" placeholder="Last name" required="required">
                    <label for="lastName">Last name</label>
                  </div>
                </div>
              </div>
            </div>
            <div class="form-group">
              <div class="form-label-group">
                <input type="email" id="inputEmail" class="form-control"  name="email"  placeholder="Email address" required="required">
                <label for="inputEmail">Email address</label>
              </div>
            </div>
            <div class="form-group">
              <div class="form-row">
                <div class="col-md-6">
                  <div class="form-label-group">
                    <input type="password" id="inputUsername" class="form-control"  name="username" placeholder="Username" required="required">
                    <label for="inputUsername">Username</label>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-label-group">
                    <input type="password" id="inputPassword" class="form-control" name="password"  placeholder="Password" required="required">
                    <label for="inputPassword">Password</label>
                  </div>
                </div>
              </div>
            </div>
			        <input type="submit" name="CREATE" value="Create Account"  class="btn btn-primary btn-block" >

          </form>
		  
		  
		  
		  
          <div class="text-center">
            <a class="d-block small mt-3" href="hlogin.php">Login Page</a>
            <a class="d-block small" href="hforgot.php">Forgot Password?</a>
          </div>
        </div>
      </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  </body>

</html>

<?php
if(isset($_POST["CREATE"])){
	$email=$_POST["email"];
	$username=$_POST["username"];
	$password=$_POST["password"];
		$first=$_POST["first"];
		$last=$_POST["last"];
		$nama_user="$first $last";
	
	
	 $sql="select `kode_user` from `$tbuser` order by `kode_user` desc";
  $q=mysqli_query($conn, $sql);
  $jum=mysqli_num_rows($q);
  $th=date("y");
  $bl=date("m")+0;if($bl<10){$bl="0".$bl;}

  $kd="USR".$th.$bl;//KEG1610001
  if($jum > 0){
   $d=mysqli_fetch_array($q);
   $idmax=$d["kode_user"];
   
   $bul=substr($idmax,5,2);
   $tah=substr($idmax,3,2);
    if($bul==$bl && $tah==$th){
     $urut=substr($idmax,7,3)+1;
     if($urut<10){$idmax="$kd"."00".$urut;}
     else if($urut<100){$idmax="$kd"."0".$urut;}
     else{$idmax="$kd".$urut;}
    }//==
    else{
     $idmax="$kd"."001";
     }   
   }//jum>0
  else{$idmax="$kd"."001";}
  $kode_user=$idmax;

 $sql=" INSERT INTO `$tbuser` (
`kode_user` ,
`nama_user` ,
`email`,
`telepon` ,
`username` ,
`password`,
`status`,
`validasi`
) VALUES (
'$kode_user', 
'$nama_user', 
'$email',
'',
'$username',
'$password',
'User','Tidak Aktif'
)";
	
$simpan=process($conn,$sql);
	if($simpan) {
		echo "<script>alert('Data $nama_user berhasil didaftarkan...silakan Tunggu untuk konfirmasi Admin... !');document.location.href='?mnu=home';</script>";
		}
	else{
			session_destroy();
			echo "<script>alert('Registrasi GAGAL !,Silakan cek data Anda kembali...');
			document.location.href='hlogin.php';</script>";
		}
}

?>


<?php
function process($conn,$sql){
$s=false;
$conn->autocommit(FALSE);
try {
  $rs = $conn->query($sql);
  if($rs){
	    $conn->commit();
	    $last_inserted_id = $conn->insert_id;
 		$affected_rows = $conn->affected_rows;
  		$s=true;
  }
} 
catch (Exception $e) {
	echo 'fail: ' . $e->getMessage();
  	$conn->rollback();
}
$conn->autocommit(TRUE);
return $s;
}

?>