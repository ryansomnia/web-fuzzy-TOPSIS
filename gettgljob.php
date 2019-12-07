<?php
require_once"konmysqli.php";

$kode_job=$_GET["q"];
	$sql="select * from `$tbjob` where `kode_job`='$kode_job'";
	$d=getField($conn,$sql);
				$kode_job=$d["kode_job"];
				$nama_job=$d["nama_job"];
				$tanggal_mulai=WKT($d["tanggal_mulai"]);
				$tanggal_selesai=WKT($d["tanggal_selesai"]);
				
				echo "$tanggal_mulai s/d $tanggal_selesai";
				
				?>
				
                
                <?php
				

function getField($conn,$sql){
	$rs=$conn->query($sql);
	$rs->data_seek(0);
	$d= $rs->fetch_assoc();
	$rs->free();
	return $d;
}
				
function WKT($sekarang){
$tanggal = substr($sekarang,8,2)+0;
$bulan = substr($sekarang,5,2);
$tahun = substr($sekarang,0,4);

$judul_bln=array(1=> "Januari", "Februari", "Maret", "April", "Mei","Juni", "Juli", "Agustus", "September","Oktober", "November", "Desember");
$wk=$tanggal." ".$judul_bln[(int)$bulan]." ".$tahun;
return $wk;
}
?>