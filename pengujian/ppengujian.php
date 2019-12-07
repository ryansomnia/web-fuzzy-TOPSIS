<script type="text/javascript"> 
function PRINT(){ 
win=window.open('pengujian/print.php','win','width=1000, height=400, menubar=0, scrollbars=1, resizable=0, location=0, toolbar=0, keterangan=0'); } 
</script>
<script language="JavaScript">
function buka(url) {window.open(url, 'window_baru', 'width=800,height=600,left=320,top=100,resizable=1,scrollbars=1');}
</script>

<?php
$menu="Pengujian";
$proses="Create $menu";
$pro="simpan";
$sql="select `kode_pengujian` from `$tbpengujian` order by `kode_pengujian` desc";
  $q=mysqli_query($conn, $sql);
  $jum=mysqli_num_rows($q);
  $th=date("y");
  $bl=date("m")+0;if($bl<10){$bl="0".$bl;}

  $kd="PJN".$th.$bl;//KEG1610001
  if($jum > 0){
   $d=mysqli_fetch_array($q);
   $idmax=$d["kode_pengujian"];
   
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
  $kode_pengujian=$idmax;

if($_GET["pro"]=="ubah"){
	$kode_pengujian=$_GET["kode"];
	$sql="select * from `$tbpengujian` where `kode_pengujian`='$kode_pengujian'";
	$d=getField($conn,$sql);
				$kode_pengujian=$d["kode_pengujian"];
				$kode_pengujian0=$d["kode_pengujian"];
				$nama_pengujian=$d["nama_pengujian"];
				$tanggal=$d["tanggal"];
				$kode_user=$d["kode_user"];
				$keterangan=$d["keterangan"];
				$pro="ubah";	
				$proses="Update $menu";				
}
if($_GET["pro"]=="ubah"||$_GET["pro"]=="add"){
?>

<?php
  
?>
<div class="container">
<div class="card card-register mx-auto mt-5">
<div class="card-header"><?php echo $proses;?></div>
<div class="card-body">
<form action="" method="post" enctype="multipart/form-data">


<div class="form-group">
<div class="form-label-group">
<input type="text" id="nama_pengujian" class="form-control" name="nama_pengujian" placeholder="nama_pengujian" value="<?= $nama_pengujian ?>" required="required" autofocus="autofocus">
<label for="nama_pengujian">Nama Pengujian </label>
</div>
</div>




<div class="form-group">
<div class="form-label-group">
<input type="text" id="keterangan" class="form-control"  name="keterangan"  value="<?= $keterangan ?>" placeholder="keterangan"required="required">
<label for="keterangan">Catatan Tambahan</label>
</div>
</div>

<input type="Submit" name="Simpan" value="<?php echo $proses;?>"  class="btn btn-primary btn-block" >
<input name="pro" type="hidden" id="pro" value="<?php echo $pro;?>" />
<input name="kode_pengujian" type="hidden" id="kode_pengujian" value="<?php echo $kode_pengujian;?>" />
<input name="kode_pengujian0" type="hidden" id="kode_pengujian0" value="<?php echo $kode_pengujian0;?>" />
</form>

</div>
</div>
</div>
<?php
}
?>

Data Pengujian: 
| <img src='ypathicon/print.png' alt='PRINT' OnClick="PRINT()"> |
<br>

<div class="card mb-3">
<div class="card-header"> <i class="fas fa-table"></i> <a href="?mnu=ppengujian">Data <?php echo $menu;?></a> | <i class="fas fa-table"></i><a href="?mnu=ppengujian&pro=add"> Tambah data <?php echo $menu;?></a></div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Kode</th>
                      <th>Nama Pengujian</th>
                     <th>Tanggal</th>
					  <th>Catatan</th>
                      <th>Menu</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                     <th>Kode</th>
                      <th>Nama Pengujian</th>
					  <th>Tanggal</th>
					  <th>Catatan</th>
                        <th>Menu</th>
                    </tr>
                  </tfoot>
				  
<tbody>
<?php  
$no=1;
  $sql="select * from `$tbpengujian` where kode_user='".$_SESSION["cid"]."' order by `kode_pengujian` asc";
  $jum=getJum($conn,$sql);
		if($jum > 0){
		$arr=getData($conn,$sql);
		foreach($arr as $d) {							
				$kode_pengujian=$d["kode_pengujian"];
				$nama_pengujian=$d["nama_pengujian"];
				$tanggal=WKT($d["tanggal"]);
				$keterangan=$d["keterangan"];
echo" 				<tr>
                      <td>$kode_pengujian</td>
                      <td>$nama_pengujian</td>
					   <td>$tanggal</td>
					     <td>$keterangan</td>
					  <td align='center'>
<a href='?mnu=ppengujiandetail&id=$kode_pengujian'><img src='ypathicon/11.png' title='Proses Detail'></a>					  
<a href='?mnu=ppengujian&pro=ubah&kode=$kode_pengujian'><img src='ypathicon/ubah.jpg' title='ubah'></a>
<a href='?mnu=ppengujian&pro=hapus&kode=$kode_pengujian'><img src='ypathicon/h.png' title='hapus' 
onClick='return confirm(\"Apakah Anda benar-benar akan menghapus $nama_pengujian pada data pengujian ?..\")'></a></td>
				</tr>";
			
			$no++;
			}//while
		}//if
		else{echo"<tr><td colspan='6'><blink>Maaf, Data pengujian belum tersedia...</blink></td></tr>";}
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
	$kode_pengujian=strip_tags($_POST["kode_pengujian"]);
	$kode_pengujian0=strip_tags($_POST["kode_pengujian0"]);
	$nama_pengujian=strip_tags($_POST["nama_pengujian"]);
	$tanggal=date("Y-m-d");
	$kode_user=strip_tags($_SESSION["cid"]);
	$keterangan=strip_tags($_POST["keterangan"]);
	
if($pro=="simpan"){
$sql=" INSERT INTO `$tbpengujian` (
`kode_pengujian` ,
`nama_pengujian` ,
`tanggal`,
`kode_user` ,
`keterangan`
) VALUES (
'$kode_pengujian', 
'$nama_pengujian', 
'$tanggal',
'$kode_user',
'$keterangan'
)";
	
$simpan=process($conn,$sql);
		if($simpan) {echo "<script>alert('Data $kode_pengujian berhasil disimpan !');document.location.href='?mnu=ppengujian';</script>";}
		else{echo"<script>alert('Data $kode_pengujian gagal disimpan...');document.location.href='?mnu=ppengujian';</script>";}
	}
	else{
$sql="update `$tbpengujian` set 
`nama_pengujian`='$nama_pengujian',
`tanggal`='$tanggal',
`kode_user`='$kode_user' ,
`keterangan`='$keterangan'
where `kode_pengujian`='$kode_pengujian0'";
$ubah=process($conn,$sql);
	if($ubah) {echo "<script>alert('Data $kode_pengujian berhasil diubah !');document.location.href='?mnu=ppengujian';</script>";}
	else{echo"<script>alert('Data $kode_pengujian gagal diubah...');document.location.href='?mnu=ppengujian';</script>";}
	}//else simpan
}
?>

<?php
if($_GET["pro"]=="hapus"){
$kode_pengujian=$_GET["kode"];
$sql="delete from `$tbpengujian` where `kode_pengujian`='$kode_pengujian'";
$hapus=process($conn,$sql);
if($hapus) {echo "<script>alert('Data pengujian $kode_pengujian berhasil dihapus !');document.location.href='?mnu=ppengujian';</script>";}
else{echo"<script>alert('Data pengujian $kode_pengujian gagal dihapus...');document.location.href='?mnu=ppengujian';</script>";}
}
?>