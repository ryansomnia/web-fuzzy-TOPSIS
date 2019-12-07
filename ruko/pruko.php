<script type="text/javascript"> 
function PRINT(){ 
win=window.open('ruko/print.php','win','width=1000, height=400, menubar=0, scrollbars=1, resizable=0, location=0, toolbar=0, jarak_usaha_serupa=0'); } 
</script>
<script language="JavaScript">
function buka(url) {window.open(url, 'window_baru', 'width=800,height=600,left=320,top=100,resizable=1,scrollbars=1');}
</script>

<?php
$menu="Ruko";
$proses="Create $menu";
$pro="simpan";
$kode_user=$_SESSION["cid"];

 $sql="select `kode_ruko` from `$tbruko` order by `kode_ruko` desc";
  $q=mysqli_query($conn, $sql);
  $jum=mysqli_num_rows($q);
  $th=date("y");
  $bl=date("m")+0;if($bl<10){$bl="0".$bl;}

  $kd="RKO".$th.$bl;//KEG1610001
  if($jum > 0){
   $d=mysqli_fetch_array($q);
   $idmax=$d["kode_ruko"];
   
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
  $kode_ruko=$idmax;
  
if($_GET["pro"]=="ubah"){
	$kode_ruko=$_GET["kode"];
	$sql="select * from `$tbruko` where `kode_ruko`='$kode_ruko'";
	$d=getField($conn,$sql);
				$kode_ruko=$d["kode_ruko"];
				$kode_ruko0=$d["kode_ruko"];
				$nama_ruko=$d["nama_ruko"];
				$jarak_usaha_serupa=$d["jarak_usaha_serupa"];
				$jarak_fasilitas_umum=$d["jarak_fasilitas_umum"];
				$jarak_pasar=$d["jarak_pasar"];
				$luas_usaha=$d["luas_usaha"];
				$harga_sewa=$d["harga_sewa"];
				$traffic=$d["traffic"];
				$kepadatan_penduduk=$d["kepadatan_penduduk"];
				$kode_user=$d["kode_user"];
				$pro="ubah";	
				$proses="Update $menu";				
}
if($_GET["pro"]=="ubah"||$_GET["pro"]=="add"){
?>
<?php
 
?>
<script type="text/javascript">
function MM_validateForm() { //v4.0
  if (document.getElementById){
    var i,p,q,nm,test,num,min,max,errors='',args=MM_validateForm.arguments;
    for (i=0; i<(args.length-2); i+=3) { test=args[i+2]; val=document.getElementById(args[i]);
      if (val) { nm=val.name; if ((val=val.value)!="") {
        if (test.indexOf('isEmail')!=-1) { p=val.indexOf('@');
          if (p<1 || p==(val.length-1)) errors+='- '+nm+' must contain an e-mail address.\n';
        } else if (test!='R') { num = parseFloat(val);
          if (isNaN(val)) errors+='- '+nm+' must contain a number.\n';
          if (test.indexOf('inRange') != -1) { p=test.indexOf(':');
            min=test.substring(8,p); max=test.substring(p+1);
            if (num<min || max<num) errors+='- '+nm+' must contain a number between '+min+' and '+max+'.\n';
      } } } else if (test.charAt(0) == 'R') errors += '- '+nm+' is required.\n'; }
    } if (errors) alert('The following error(s) occurred:\n'+errors);
    document.MM_returnValue = (errors == '');
} }
</script>
<style type="text/css">
<!--
p.MsoNormal {
margin-top:0cm;
margin-right:0cm;
margin-bottom:10.0pt;
margin-left:0cm;
line-height:115%;
font-size:11.0pt;
font-family:"Calibri","sans-serif";
}
-->
</style>

<?php
if(isset($_GET['petunjuk'])){
?>

<!-- Start -->
<style>
.collapsible {
  background-color: #777;
  color: white;
  cursor: pointer;
  padding: 18px;
  width: 100%;
  border: none;
  text-align: left;
  outline: none;
  font-size: 15px;
}


.content {
  padding: 0 18px;
  display: none;
  overflow: hidden;
  background-color: #f1f1f1;
}
</style>

<p>Tata Cara Pengisian Data :</p>

<button class="collapsible">Kriteria Jarak Usaha serupa </button>
<div class="content">
  <p>Dalam kriteria ini dapat diisi dengan nilai jarak antara lahan usaha yang akan digunakan dengan minimarket terdekat yang sudah ada dengan ketentuan satuan <b>meter</b> </p>
</div>
<button class="collapsible">Kriteria Jarak antara fasilitas umum</button>
<div class="content">
  <p>Dalam kriteria ini dapat diisi dengan nilai jarak antara lahan usaha yang akan digunakan dengan Fasilitas Ummum terdekat  dengan ketentuan satuan <b>meter</b>.<br>Fasilitas umum yang dimaksud adalah: Rumah Sakit, Sekolah, Perumahan, Tempat wisata, Tempat Ibadah (contoh:taman rekreasi,taman kota dsb), Tempat pemberhentian transportasi(stasiun,terminal dsb).  </p>
</div>
<button class="collapsible">Kriteria Jarak dengan pasar tradisional</button>
<div class="content">
  <p>Dalam kriteria ini dapat diisi dengan nilai jarak antara lahan usaha yang akan digunakan dengan Pasar Tradisional terdekat  dengan ketentuan satuan <b>meter</b>.<br>Jarak dengan Pasar Tradisional diatur dalam PERDA Kabupaten Bogor Nomor 11 Tahun 2012 Bagian ke II Pasal 8 ayat 1 berbunyi <i> “Minimarket berjarak minimal 500 meter (lima ratus meter) dari Pasar Tradisional dan 100 meter (seratus meter) dari usaha kecil sejenis yang terletak di pinggir Jalan Kolektor/Arteri”.</i> </p>
</div>
<button class="collapsible">Kriteria Luas daerah usaha</button>
<div class="content">
  <p>Dalam kriteria ini bangunan ruko menjadi ruang lingkup dalam aplikasi ini dan dalam pengisian data dapat diisi dengan nilai luas usaha keseluruhan berikut dengan lahan parkirnya dan nilai tersebut diisi dengan satuan m<sup>2</sup>  </p>
</div>
<button class="collapsible">Kriteria Harga sewa</button>
<div class="content">
  <p>Dalam kriteria ini dapat diisi dengan nilai harga dengan satuan juta (contoh 10jt, 100jt, 53jt dll). Harga yang dimaksud juga disini adalah harga per-satu ruko per-tahun.</p>
</div>
<button class="collapsible">Kriteria Traffic</button>
<div class="content">
  <p>Mengitung  rata rata keramaian kendaraan dengan satuan kendaraan per-15 menit. <br>
  Perhitungan dihitung selama 2 jam di jam-jam tertentu yaitu jam 6:00-8:00 dan di jam 16:00-18:00 dan dilakukan di hari minggu dan senin karena diambil perbandingan antara hari libur dan di hari kerja. Setelah semua data terkumpul diambilah satuan kendaraan per-15 menit yang tertinggi.  </p>
</div>

<button class="collapsible">Kepadatan penduduk</button>
<div class="content">
  <p>Kepadatan penduduk dihitung per-kelurahan di daerah lahan usaha dengan satuan jiwa /kilometer persegi. 
  	<br>untuk mengetahui kepadatan penduduk bisa diakses <a href="https://bogorkota.bps.go.id/"> di sini </a> untuk daerah Bogor </p>
</div>
<p>
  <script>
var coll = document.getElementsByClassName("collapsible");
var i;

for (i = 0; i < coll.length; i++) {
  coll[i].addEventListener("click", function() {
    this.classList.toggle("active");
    var content = this.nextElementSibling;
    if (content.style.display === "block") {
      content.style.display = "none";
    } else {
      content.style.display = "block";
    }
  });
}
</script>
</p>
<p><br>
  <!-- end -->
  
  <?php
}else{
?>
<div class="container">
<div class="card card-register mx-auto mt-5">
<div class="card-header"><?php echo $proses;?></div>
<div class="card-body">
<form action="" method="post" enctype="multipart/form-data">

<div class="form-group">
<div class="form-row">
<div class="col-md-6">
<div class="form-label-group"> 
<input type="text" id="nama_ruko" class="form-control" name="nama_ruko" placeholder="nama_ruko" value="<?= $nama_ruko ?>" required="required" autofocus="autofocus">
<label for="nama_ruko">Nama Ruko</label>
</div>
</div>
<div class="col-md-6">
<div class="form-label-group">
<input type="text" id="jarak_usaha_serupa" class="form-control"  name="jarak_usaha_serupa" placeholder="jarak_usaha_serupa"  value="<?= $jarak_usaha_serupa ?>" required="required">
<label for="jarak_usaha_serupa">Jarak Usaha Serupa per-meter</label>
</div>
</div>
</div>
</div>

<div class="form-group">
<div class="form-row">
<div class="col-md-6">
<div class="form-label-group">
<input type="text" id="jarak_fasilitas_umum" class="form-control" name="jarak_fasilitas_umum" placeholder="jarak_fasilitas_umum" value="<?= $jarak_fasilitas_umum ?>" required="required" autofocus="autofocus">
<label for="jarak_fasilitas_umum">Jarak Fasilitas Umum per-meter</label>
</div>
</div>
<div class="col-md-6">
<div class="form-label-group">
<input type="text" id="jarak_pasar" class="form-control"  name="jarak_pasar" placeholder="jarak_pasar"  value="<?= $jarak_pasar ?>" required="required">
<label for="jarak_pasar">Jarak Pasar Tradisional per-meter</label>
</div>
</div>
</div>
</div>

<div class="form-group">
<div class="form-row">
<div class="col-md-6">
<div class="form-label-group">
<input type="text" id="luas_usaha" class="form-control" name="luas_usaha" placeholder="luas_usaha" value="<?= $luas_usaha ?>" required="required" autofocus="autofocus">
<label for="luas_usaha">Luas Usaha meter per-segi </label>
</div>
</div>
<div class="col-md-6">
<div class="form-label-group">
<input type="text" id="harga_sewa" class="form-control"  name="harga_sewa" placeholder="harga_sewa"  value="<?= $harga_sewa ?>" required="required">
<label for="harga_sewa">Harga Sewa per-juta (ex:15jt,100jt dll)</label>
</div>
</div>
</div>
</div>

<div class="form-group">
<div class="form-row">
<div class="col-md-6">
<div class="form-label-group">
<input type="text" id="traffic" class="form-control" name="traffic" placeholder="traffic" value="<?= $traffic ?>" required="required" autofocus="autofocus">
<label for="traffic">Traffic kend/15 menit  </label>
</div>
</div>
<div class="col-md-6">
<div class="form-label-group">
<input type="text" id="kepadatan_penduduk" class="form-control"  name="kepadatan_penduduk" placeholder="kepadatan_penduduk"  value="<?= $kepadatan_penduduk ?>" required="required">
<label for="kepadatan_penduduk">Kepadatan Penduduk jiwa/Km2</label>
</div>
</div>
</div>
</div>
	
<input name="Simpan" type="Submit"  class="btn btn-primary btn-block" onclick="MM_validateForm('nama_ruko','','R','jarak_usaha_serupa','','RisNum','jarak_fasilitas_umum','','RisNum','jarak_pasar','','RisNum','luas_usaha','','RisNum','harga_sewa','','RisNum','traffic','','RisNum','kepadatan_penduduk','','RisNum');return document.MM_returnValue" value="<?php echo $proses;?>" >
<input name="pro" type="hidden" id="pro" value="<?php echo $pro;?>" />
<input name="foto0" type="hidden" id="foto0" value="<?php echo $foto0;?>" />
<input name="kode_ruko" type="hidden" id="kode_ruko" value="<?php echo $kode_ruko;?>" />
<input name="kode_ruko0" type="hidden" id="kode_ruko0" value="<?php echo $kode_ruko0;?>" />
</form>

</div>
</div>
</div>
<?php
}
}
?>

Data ruko: 
| <img src='ypathicon/print.png' alt='PRINT' OnClick="PRINT()"> |  <button name="petunjuk" class="btn btn-outline-warning"><a href="?mnu=pruko&pro=add&petunjuk">petunjuk pengisian data ruko</a></button>
<br>

<div class="card mb-3">
<div class="card-header"> <i class="fas fa-table"></i> <a href="?mnu=pruko">Data <?php echo $menu;?></a> | <i class="fas fa-table"></i><a href="?mnu=pruko&pro=add"> Tambah data <?php echo $menu;?></a></div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                     <tr>
                      <th>Nama Ruko</th>
                      <th>Usaha</th>
                      <th>Fasum</th>
                      <th>Pasar</th>
                      <th>Luas</th>
                      <th>Sewa</th>
                      <th>Traffic</th>
                      <th>Kepadatan</th>
                      <th>Menu</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th>Nama Ruko</th>
                      <th>Usaha</th>
                      <th>Fasum</th>
                      <th>Pasar</th>
                      <th>Luas</th>
                      <th>Sewa</th>
                      <th>Traffic</th>
                      <th>Kepadatan</th>
                      <th>Menu</th>
                    </tr>
                  </tfoot>
				  
<tbody>
<?php  
$no=1;
  $sql="select * from `$tbruko` where kode_user='".$_SESSION["cid"]."' order by `kode_ruko` asc";
  $jum=getJum($conn,$sql);
		if($jum > 0){
		$arr=getData($conn,$sql);
		foreach($arr as $d) {							
				$kode_ruko=$d["kode_ruko"];
				$nama_ruko=$d["nama_ruko"];
				$jarak_usaha_serupa=$d["jarak_usaha_serupa"];
				$jarak_fasilitas_umum=$d["jarak_fasilitas_umum"];
				$jarak_pasar=$d["jarak_pasar"];
				$luas_usaha=$d["luas_usaha"];
				$harga_sewa=$d["harga_sewa"];
				$traffic=$d["traffic"];
				$kepadatan_penduduk=$d["kepadatan_penduduk"];
echo" 				<tr>
                      <td>$nama_ruko</td>
                      <td>$jarak_usaha_serupa</td>
                      <td>$jarak_fasilitas_umum</td>
                      <td>$jarak_pasar</td>
					  <td>$luas_usaha</td>
                      <td>$harga_sewa</td>
					  <td>$traffic</td>
					  <td>$kepadatan_penduduk</td>
					  <td align='center'>
<a href='?mnu=pruko&pro=ubah&kode=$kode_ruko'><img src='ypathicon/ubah.jpg' alt='ubah'></a>
<a href='?mnu=pruko&pro=hapus&kode=$kode_ruko'><img src='ypathicon/h.png' alt='hapus' 
onClick='return confirm(\"Apakah Anda benar-benar akan menghapus $nama_ruko pada data ruko ?..\")'></a></td>
				</tr>";
			
			$no++;
			}//while
		}//if
		else{echo"<tr><td colspan='6'><blink>Maaf, Data ruko belum tersedia...</blink></td></tr>";}
?>
				 
                  </tbody>
                </table>
                </div>
                </div>
                <div class="card-footer small text-muted">Updated date <?php echo date("Y m d H i s");?></div>
                </div>

<?php
if(isset($_POST["Simpan"])){
	$pro=strip_tags($_POST["pro"]);
	$kode_ruko=strip_tags($_POST["kode_ruko"]);
	$kode_ruko0=strip_tags($_POST["kode_ruko0"]);
	$nama_ruko=strip_tags($_POST["nama_ruko"]);
	$jarak_usaha_serupa=strip_tags($_POST["jarak_usaha_serupa"]);
	$jarak_fasilitas_umum=strip_tags($_POST["jarak_fasilitas_umum"]);
	$jarak_pasar=strip_tags($_POST["jarak_pasar"]);
	$luas_usaha=strip_tags($_POST["luas_usaha"]);
	$harga_sewa=strip_tags($_POST["harga_sewa"]);
	$traffic=strip_tags($_POST["traffic"]);
	$kepadatan_penduduk=strip_tags($_POST["kepadatan_penduduk"]);
	$kode_user=strip_tags($_SESSION["cid"]);
	
if($pro=="simpan"){
$sql=" INSERT INTO `$tbruko` (
`kode_ruko` ,
`nama_ruko` ,
`jarak_usaha_serupa`,
`jarak_fasilitas_umum` ,
`jarak_pasar` ,
`luas_usaha` ,`kode_user` ,
`harga_sewa` ,
`traffic` ,
`kepadatan_penduduk`
) VALUES (
'$kode_ruko', 
'$nama_ruko', 
'$jarak_usaha_serupa',
'$jarak_fasilitas_umum', 
'$jarak_pasar',
'$luas_usaha', '$kode_user', 
'$harga_sewa',
'$traffic',
'$kepadatan_penduduk'
)";
	
$simpan=process($conn,$sql);
		if($simpan) {echo "<script>alert('Data $kode_ruko berhasil disimpan !');document.location.href='?mnu=pruko';</script>";}
		else{echo"<script>alert('Data $kode_ruko gagal disimpan...');document.location.href='?mnu=pruko';</script>";}
	}
	else{
$sql="update `$tbruko` set 
`nama_ruko`='$nama_ruko',
`jarak_usaha_serupa`='$jarak_usaha_serupa',
`jarak_fasilitas_umum`='$jarak_fasilitas_umum',
`jarak_pasar`='$jarak_pasar' ,`kode_user`='$kode_user' ,
`luas_usaha`='$luas_usaha',
`harga_sewa`='$harga_sewa' ,
`traffic`='$traffic',
`kepadatan_penduduk`='$kepadatan_penduduk'
where `kode_ruko`='$kode_ruko0'";
$ubah=process($conn,$sql);
	if($ubah) {echo "<script>alert('Data $kode_ruko berhasil diubah !');document.location.href='?mnu=pruko';</script>";}
	else{echo"<script>alert('Data $kode_ruko gagal diubah...');document.location.href='?mnu=pruko';</script>";}
	}//else simpan
}
?>

<?php
if($_GET["pro"]=="hapus"){
$kode_ruko=$_GET["kode"];
$sql="delete from `$tbruko` where `kode_ruko`='$kode_ruko'";
$hapus=process($conn,$sql);
if($hapus) {echo "<script>alert('Data ruko $kode_ruko berhasil dihapus !');document.location.href='?mnu=pruko';</script>";}
else{echo"<script>alert('Data ruko $kode_ruko gagal dihapus...');document.location.href='?mnu=pruko';</script>";}
}
?>