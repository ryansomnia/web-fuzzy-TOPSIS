<?php
if (version_compare(phpversion(), "5.3.0", ">=")  == 1)
  error_reporting(E_ALL & ~E_NOTICE & ~E_DEPRECATED);
else
  error_reporting(E_ALL & ~E_NOTICE);  
  ?>
<?php
session_start();
if(!isset($_SESSION["cid"])){
die("<script>location.href='hlogin.php';</script>");
}
//error_reporting(0);
require_once"konmysqli.php";
$mnu="";
if(isset($_GET["mnu"])){
	$mnu=$_GET["mnu"];
}

date_default_timezone_set("Asia/Jakarta");
$ckriteria1="Usaha";
$ckriteria2="Fasum";
$ckriteria3="Pasar";
$ckriteria4="Luas";
$ckriteria5="Sewa";
$ckriteria6="Traffik";
$ckriteria7="Kepadatan";

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
	<link href="vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">
	<link href="css/sb-admin.css" rel="stylesheet">

  </head>

  <body id="page-top">
    <nav class="navbar navbar-expand navbar-dark bg-dark static-top">
      <a class="navbar-brand mr-1" href="index.php">APLIKASI PENENTUAN PEMILIHAN LOKASI USAHA MINIMARKET TERBAIK</a>

    
      <!-- Navbar Search -->
      <form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">
        <div class="input-group">
          <?php
		  if(isset($_SESSION["cid"])){
			  echo "<font color='white'><strong>".$_SESSION["cnama"]." | ".$_SESSION["cstatus"]."</strong></font>";
		  }
		  ?>
        </div>
      </form>
      <?php
		
		/*
		<input type="text" class="form-control" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
          <div class="input-group-append">
            <button class="btn btn-primary" type="button">
              <i class="fas fa-search"></i>
            </button>
          </div>
		  */
		  
		  //require_once("mynav.php");
	  ?>
    </nav>
    <div id="wrapper">
	<?php  require_once "mysidebar.php";?>

      <div id="content-wrapper">
		  <div class="container-fluid">
			  <ol class="breadcrumb">
				<li class="breadcrumb-item"><a href="#">Home</a></li>
				<li class="breadcrumb-item active"><?php echo $mnu;?></li>
			  </ol>
<?php  


if($mnu=="mytable"){require_once "mytable.php";}
else if($mnu=="profil"){require_once"user/profil.php";}
else if($mnu=="profil2"){require_once"user/profil2.php";}
else if($mnu=="ppengujian"){require_once"pengujian/ppengujian.php";}
else if($mnu=="arsip"){require_once"arsip/arsip.php";}
else if($mnu=="parsip"){require_once"arsip/parsip.php";}
else if($mnu=="admin"){require_once"admin/admin.php";}
else if($mnu=="pengujian"){require_once"pengujian/pengujian.php";}
else if($mnu=="pengujiandetail"){require_once"pengujiandetail/pengujiandetail.php";}
else if($mnu=="ppengujiandetail"){require_once"pengujiandetail/ppengujiandetail.php";}
else if($mnu=="ppengujiandetail2"){require_once"pengujiandetail/ppengujiandetail2.php";}
else if($mnu=="ruko"){require_once"ruko/ruko.php";}
else if($mnu=="pruko"){require_once"ruko/pruko.php";}

else if($mnu=="user"){require_once"user/user.php";}
else if($mnu=="kriteria"){require_once"kriteria/kriteria.php";}
else if($mnu=="mychart"){require_once "mychart.php";}
else if($mnu=="mypage"){require_once "mypage.php";}
else{	//home		
			require_once "myicon.php";//myhome
			//require_once "mygraph.php";//myhome
			//require_once "mytable.php";//myhome
}	

require_once "myfooter.php";
?>
			
			</div><!-- /.container-fluid -->
      </div> <!-- /.content-wrapper -->
    </div> <!-- /#wrapper -->
    <!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top"><i class="fas fa-angle-up"></i></a>
    <!-- Logout Modal-->
<?php
require_once "mylogout.php";
?>
    <!-- Bootstrap core JavaScript-->
   <?php
if($mnu=="arsip"||$mnu=="pengujiandetail"|| $mnu="ppengujiandetail"){}
else{
	?>
	
	<?php	
}

?>   
<script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
    <!-- Page level plugin JavaScript-->
    <script src="vendor/chart.js/Chart.min.js"></script>
    <script src="vendor/datatables/jquery.dataTables.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.js"></script>
    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin.min.js"></script>

    <!-- Demo scripts for this page-->
    <script src="js/demo/datatables-demo.js"></script>
    <script src="js/demo/chart-area-demo.js"></script>
    <script src="js/demo/chart-bar-demo.js"></script>
    <script src="js/demo/chart-pie-demo.js"></script>
  </body>
</html>

<?php function RP($rupiah){return number_format($rupiah,"2",",",".");}?>
<?php
function WKT($sekarang){
$tanggal = substr($sekarang,8,2)+0;
$bulan = substr($sekarang,5,2);
$tahun = substr($sekarang,0,4);

$judul_bln=array(1=> "Januari", "Februari", "Maret", "April", "Mei","Juni", "Juli", "Agustus", "September","Oktober", "November", "Desember");
$wk=$tanggal." ".$judul_bln[(int)$bulan]." ".$tahun;
return $wk;
}
?>
<?php


function WKTP($sekarang){
$tanggal = substr($sekarang,8,2)+0;
$bulan = substr($sekarang,5,2);
$tahun = substr($sekarang,2,2);

$judul_bln=array(1=> "Jan", "Feb", "Mar", "Apr", "Mei","Jun", "Jul", "Agu", "Sep","Okt", "Nov", "Des");
$wk=$tanggal." ".$judul_bln[(int)$bulan]."'".$tahun;
return $wk;
}
?>
<?php
function BAL($tanggal){
	$arr=explode(" ",$tanggal);
	if($arr[1]=="Januari"||$arr[1]=="January"){$bul="01";}
	else if($arr[1]=="Februari"||$arr[1]=="February"){$bul="02";}
	else if($arr[1]=="Maret"||$arr[1]=="March"){$bul="03";}
	else if($arr[1]=="April"){$bul="04";}
	else if($arr[1]=="Mei"||$arr[1]=="May"){$bul="05";}
	else if($arr[1]=="Juni"||$arr[1]=="June"){$bul="06";}
	else if($arr[1]=="Juli"||$arr[1]=="July"){$bul="07";}
	else if($arr[1]=="Agustus"||$arr[1]=="August"){$bul="08";}
	else if($arr[1]=="September"){$bul="09";}
	else if($arr[1]=="Oktober"||$arr[1]=="October"){$bul="10";}
	else if($arr[1]=="November"){$bul="11";}
	else if($arr[1]=="Nopember"){$bul="11";}
	else if($arr[1]=="Desember"||$arr[1]=="December"){$bul="12";}
return "$arr[2]-$bul-$arr[0]";	
}
?>

<?php
function BALP($tanggal){
	$arr=explode(" ",$tanggal);
	if($arr[1]=="Jan"){$bul="01";}
	else if($arr[1]=="Feb"){$bul="02";}
	else if($arr[1]=="Mar"){$bul="03";}
	else if($arr[1]=="Apr"){$bul="04";}
	else if($arr[1]=="Mei"){$bul="05";}
	else if($arr[1]=="Jun"){$bul="06";}
	else if($arr[1]=="Jul"){$bul="07";}
	else if($arr[1]=="Agu"){$bul="08";}
	else if($arr[1]=="Sep"){$bul="09";}
	else if($arr[1]=="Okt"){$bul="10";}
	else if($arr[1]=="Nov"){$bul="11";}
	else if($arr[1]=="Nop"){$bul="11";}
	else if($arr[1]=="Des"){$bul="12";}
return "$arr[2]-$bul-$arr[0]";	
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

function getData($conn,$sql){
	$rs=$conn->query($sql);
	$rs->data_seek(0);
	$arr = $rs->fetch_all(MYSQLI_ASSOC);
	//foreach($arr as $row) {
	//  echo $row['nama_kelas'] . '*<br>';
	//}
	
	$rs->free();
	return $arr;
}

function getAdmin($conn,$kode){
$field="username";
$sql="SELECT `$field` FROM `tb_admin` where `kode_admin`='$kode'";
$rs=$conn->query($sql);	
	$rs->data_seek(0);
	$row = $rs->fetch_assoc();
	$rs->free();
    return $row[$field];
	}
	
	function getUser($conn,$kode){
$field="nama_user";
$sql="SELECT `$field` FROM `tb_user` where `kode_user`='$kode'";
$rs=$conn->query($sql);	
	$rs->data_seek(0);
	$row = $rs->fetch_assoc();
	$rs->free();
    return $row[$field];
	}
function getRuko($conn,$kode){
$field="nama_ruko";
$sql="SELECT `$field` FROM `tb_ruko` where `kode_ruko`='$kode'";
$rs=$conn->query($sql);	
	$rs->data_seek(0);
	$row = $rs->fetch_assoc();
	$rs->free();
    return $row[$field];
	}
	
if(isset($_GET["pro"]) && $_GET["pro"]=="logout"){
	session_destroy();
					echo "<script>alert('terimakasih atas kunjungannya...See You Later...');
					document.location.href='index.php?mnu=home';</script>";
	
}

function getKecil($x,$min,$max){
	//=IF(AND(B24>=I$23,B24<=J$23),(J$23-B24)/(J$23-I$23),IF(B24>=J$23,0,0))
	$out=0;	
	if($x>=$min && $x<=$max){$out=($max-$x)/($max-$min);}
	elseif($x>=$max){$out=0;}
	elseif($x<=$min){$out=1;}
	return cbulat($out);
}
function getCek($x,$y,$z){
	$out=0;
		if($x>=$y && $x>=$z){$out=1;}
		else if($y>=$x && $y>=$z){$out=2;}
		else if($z>=$y && $z>=$x){$out=3;}
		return cbulat($out);	
}

function getSedang($x,$min,$max,$max2){
	//=IF(B24<=I$23,0,IF(AND(B24>=I$23,B24<=J$23),(B24-I$23)/(J$23-I$23),
	//IF(AND(B24>=J$23,B24<=K$23),(K$23-B24)/(K$23-J$23),IF(B24>=K$23,0,0))))	
	$out=0;	
	if($x<=$min){$out=0;}
	elseif($x>=$min && $x<=$max){$out=($x-$min)/($max-$min);}
	elseif($x>=$max && $x <=$max2){$out=($max2-$x)/($max2-$max);}
	elseif($x>$max2){$out=0;}
	return cbulat($out);
}

function getBesar($x,$min,$max){
	//IF(B24<=J$23,0,IF(AND(B24>=J$23,B24<=K$23),(B24-J$23)/(K$23-J$23),IF(B24>=K$23,1,0)))
	$out=0;	
	if($x<$min){$out=0;}
	elseif($x>=$min && $x<=$max){$out=($x-$min)/($max-$min);}
	elseif($x>=$max){$out=1;}
	return cbulat($out);
}	

function cbulat($x){
return	round($x,4);
}
?>