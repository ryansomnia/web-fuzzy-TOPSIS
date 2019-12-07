<script type="text/javascript"> 
function PRINT(){ 
win=window.open('pengujiandetail/print.php','win','width=1000, height=400, menubar=0, scrollbars=1, resizable=0, location=0, toolbar=0, ranking=0'); } 
</script>
<script language="JavaScript">
function buka(url) {window.open(url, 'window_baru', 'width=800,height=600,left=320,top=100,resizable=1,scrollbars=1');}
</script>

<?php
$kode_pengujian=$_GET["id"];
	$sql="select * from `$tbpengujian` where `kode_pengujian`='$kode_pengujian'";
	$d=getField($conn,$sql);
				$kode_pengujian=$d["kode_pengujian"];
				$kode_pengujian0=$d["kode_pengujian"];
				$nama_pengujian=$d["nama_pengujian"];
				$tanggal=$d["tanggal"];
				$kode_user=$d["kode_user"];
				$keterangan=$d["keterangan"];
?>

<div class="container">
<div class="card card-register mx-auto mt-5">
<div class="card-header">Kode Pengujian <?php echo $kode_pengujian;?></div>
<div class="card-body">
<form action="" method="post" enctype="multipart/form-data">


<div class="form-group">
<div class="form-label-group">
<input type="text" id="nama_pengujian" class="form-control" disabled name="nama_pengujian" placeholder="nama_pengujian" value="<?= $nama_pengujian ?>" required="required" autofocus="autofocus">
<label for="nama_pengujian">Nama Pengujian </label>
</div>
</div>



<div class="form-group">
<div class="form-label-group">
<input type="text" id="keterangan" disabled class="form-control"  name="keterangan"  value="<?= $keterangan ?>" placeholder="keterangan"required="required">
<label for="keterangan">Catatan Tambahan</label>
</div>
</div>


</div>
</div>
</div>
<hr>

<?php
$menu="Pengujian Detail";
$proses="Create $menu";
$pro="simpan";

if($_GET["pro"]=="ubah"){
	$id=$_GET["kode"];
	$sql="select * from `$tbpengujiandetail` where `id`='$id'";
	$d=getField($conn,$sql);
				$id=$d["id"];
				$id0=$d["id"];
				$kode_pengujian=$d["kode_pengujian"];
				$kode_ruko=$d["kode_ruko"];
				$rekapitulasi=$d["rekapitulasi"];
				$bobot=$d["bobot"];
				$ranking=$d["ranking"];
				$pro="ubah";	
				$proses="Update $menu";				
}
if($_GET["pro"]=="ubah"||$_GET["pro"]=="add"){
?>

<div class="container">
<div class="card card-register mx-auto mt-5">
<div class="card-header"><?php echo $proses;?></div>
<div class="card-body">
<form action="" method="post" enctype="multipart/form-data">


<div class="form-group">
<div class="form-label-group">
<select name="kode_ruko" id="kode_ruko"  class="form-control" placeholder="kode_ruko" required="required">
<option value="">Pilih Ruko</option>
<?php
	  $s="select * from `tb_ruko`";
	$q=getData($conn,$s);
		foreach($q as $d){							
				$kode_ruko0=$d["kode_ruko"];
				$nama_ruko0=$d["nama_ruko"];
	echo"<option value='$kode_ruko0' ";if($kode_ruko0==$kode_ruko){echo"selected";} echo">$kode_ruko0 - $nama_ruko0</option>";
	}
	?>
</select> 
</div>
</div>

<div class="form-group">
<div class="form-row">
<div class="col-md-6">
<div class="form-label-group">
<input type="text" id="bobot" class="form-control" name="bobot" placeholder="bobot" value="<?= $bobot ?>" required="required" autofocus="autofocus">
<label for="bobot">Bobot </label>
</div>
</div>
<div class="col-md-6">
<div class="form-label-group">
<input type="text" id="ranking" class="form-control"  name="ranking" placeholder="ranking"  value="<?= $ranking ?>" required="required">
<label for="ranking">Ranking</label>
</div>
</div>
</div>
</div>

<div class="form-group">
<div class="form-label-group">
<input type="text" id="rekapitulasi" class="form-control"  name="rekapitulasi"  value="<?= $rekapitulasi ?>" placeholder="rekapitulasi"required="required">
<label for="rekapitulasi">Rekapitulasi</label>
</div>
</div>			

<input type="Submit" name="Simpan" value="<?php echo $proses;?>"  class="btn btn-primary btn-block" >
<input name="pro" type="hidden" id="pro" value="<?php echo $pro;?>" />
<input name="id" type="hidden" id="id" value="<?php echo $id;?>" />
<input name="id0" type="hidden" id="id0" value="<?php echo $id0;?>" />
</form>

</div>
</div>
</div>
<?php
}
?>

Data pengujiandetail: 
| <img src='ypathicon/print.png' alt='PRINT' OnClick="PRINT()"> |
<br>

<div class="card mb-3">
<div class="card-header"> <i class="fas fa-table"></i> <a href="?mnu=pengujiandetail">Data <?php echo $menu;?></a> | <i class="fas fa-table"></i><a href="?mnu=pengujiandetail&pro=add"> Add <?php echo $menu;?></a></div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Kode</th>
                      <th>Pengujian</th>
                      <th>Ruko</th>
                      <th>Bobot</th>
                      <th>Ranking</th>
                      <th>Menu</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th>Kode</th>
                      <th>Pengujian</th>
                      <th>Ruko</th>
                      <th>Bobot</th>
                      <th>Ranking</th>
                      <th>Menu</th>
                    </tr>
                  </tfoot>
				  
<tbody>
<?php  
$no=1;
  $sql="select * from `$tbpengujiandetail` order by `id` asc";
  $jum=getJum($conn,$sql);
		if($jum > 0){
		$arr=getData($conn,$sql);
		foreach($arr as $d) {							
				$id=$d["id"];
				$kode_pengujian=$d["kode_pengujian"];
				$kode_ruko=$d["kode_ruko"];
				$rekapitulasi=$d["rekapitulasi"];
				$bobot=$d["bobot"];
				$ranking=$d["ranking"];
echo" 				<tr>
                      <td>$id</td>
                      <td>$kode_pengujian</td>
                      <td>$kode_ruko</td>
					  <td>$bobot</td>
					  <td>$ranking</td>
					  <td align='center'>
<a href='?mnu=pengujiandetail&pro=ubah&kode=$id'><img src='ypathicon/u.png' alt='ubah'></a>
<a href='?mnu=pengujiandetail&pro=hapus&kode=$id'><img src='ypathicon/h.png' alt='hapus' 
onClick='return confirm(\"Apakah Anda benar-benar akan menghapus $kode_pengujian pada data pengujiandetail ?..\")'></a></td>
				</tr>";
			
			$no++;
			}//while
		}//if
		else{echo"<tr><td colspan='6'><blink>Maaf, Data pengujiandetail belum tersedia...</blink></td></tr>";}
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
	$id=strip_tags($_POST["id"]);
	$id0=strip_tags($_POST["id0"]);
	$kode_pengujian=strip_tags($_POST["kode_pengujian"]);
	$kode_ruko=strip_tags($_POST["kode_ruko"]);
	$rekapitulasi=strip_tags($_POST["rekapitulasi"]);
	$bobot=strip_tags($_POST["bobot"]);
	$ranking=strip_tags($_POST["ranking"]);
	
if($pro=="simpan"){
$sql=" INSERT INTO `$tbpengujiandetail` (
`id` ,
`kode_pengujian` ,
`kode_ruko`,
`rekapitulasi` ,
`bobot` ,
`ranking`
) VALUES (
'$id', 
'$kode_pengujian', 
'$kode_ruko',
'$rekapitulasi',
'$bobot',
'$ranking'
)";
	
$simpan=process($conn,$sql);
		if($simpan) {echo "<script>alert('Data $id berhasil disimpan !');document.location.href='?mnu=pengujiandetail';</script>";}
		else{echo"<script>alert('Data $id gagal disimpan...');document.location.href='?mnu=pengujiandetail';</script>";}
	}
	else{
$sql="update `$tbpengujiandetail` set 
`kode_pengujian`='$kode_pengujian',
`kode_ruko`='$kode_ruko',
`rekapitulasi`='$rekapitulasi' ,
`bobot`='$bobot',
`ranking`='$ranking'
where `id`='$id0'";
$ubah=process($conn,$sql);
	if($ubah) {echo "<script>alert('Data $id berhasil diubah !');document.location.href='?mnu=pengujiandetail';</script>";}
	else{echo"<script>alert('Data $id gagal diubah...');document.location.href='?mnu=pengujiandetail';</script>";}
	}//else simpan
}
?>

<?php
if($_GET["pro"]=="hapus"){
$id=$_GET["kode"];
$sql="delete from `$tbpengujiandetail` where `id`='$id'";
$hapus=process($conn,$sql);
if($hapus) {echo "<script>alert('Data pengujiandetail $id berhasil dihapus !');document.location.href='?mnu=pengujiandetail';</script>";}
else{echo"<script>alert('Data pengujiandetail $id gagal dihapus...');document.location.href='?mnu=pengujiandetail';</script>";}
}
?>