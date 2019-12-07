<?php
require_once"konmysqli.php";

$kode_kategori=$_GET["q"];
	?>
    
    <table id="table">
  <tr bgcolor="#036">
    <th width="3%">No</td>
     <th width="20%">Nama Job</td>
    <th width="30%">Waktu</td>
    <th width="30%">Deskripsi</td>
      <th width="30%">Status</td>

    <th width="10%">Dokumen</td>
    <th width="15%">Pilih</td>
  </tr>
<?php  
$no=1;
  $sql="select * from `$tbjob` where kode_kategori='$kode_kategori' order by `kode_job` asc";
 	$arr=getData($conn,$sql);
		foreach($arr as $d) {						
				$kode_job=$d["kode_job"];
				$nama_job=$d["nama_job"];
				$tanggal_mulai=WKT($d["tanggal_mulai"]);
				$tanggal_selesai=WKT($d["tanggal_selesai"]);
				$kode_kategori=getKategori($conn,$d["kode_kategori"]);
				
				$keterangan2=$d["keterangan"];
				$status2=$d["status"];
				$dokumen=$d["dokumen"];
				$dokumen0=$d["dokumen"];
				$color="#dddddd";		
					if($no %2==0){$color="#eeeeee";}
echo"<tr bgcolor='$color'>
				<td>$no</td>
				<td>$nama_job</td>
				<td>$tanggal_mulai s/d $tanggal_selesai</td>
				<td>$keterangan2</td>
				
				<td>$status2</td>
				<td><div align='center'>";
echo"<a href='#' onclick='buka(\"job/zoom.php?id=$kode_job\")'>
<img src='$YPATH/$dokumen' width='40' height='40' /></a></div>";
				echo"</td>
				
				<td><div align='center'><input type='radio' name='kode_job' value='$kode_job'></div></td>
				</tr>";
				
			$no++;
			}//while
	?>
</table>




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
	
	
function getKategori($conn,$kode){
$field="nama_kategori";
$sql="SELECT `$field` FROM `tb_kategori` where `kode_kategori`='$kode'";
$rs=$conn->query($sql);	
	$rs->data_seek(0);
	$row = $rs->fetch_assoc();
	$rs->free();
    return $row[$field];
	
	}
	
function getJob($conn,$kode){
$field="nama_job";
$sql="SELECT `$field` FROM `tb_job` where `kode_job`='$kode'";
$rs=$conn->query($sql);	
	$rs->data_seek(0);
	$row = $rs->fetch_assoc();
	$rs->free();
    return $row[$field];
	}
	
	
?>

