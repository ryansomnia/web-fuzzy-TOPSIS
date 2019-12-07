<script type="text/javascript"> 
function PRINT(){ 
win=window.open('kriteria/print.php','win','width=1000, height=400, menubar=0, scrollbars=1, resizable=0, location=0, toolbar=0, bobot=0'); } 
</script>
<script language="JavaScript">
function buka(url) {window.open(url, 'window_baru', 'width=800,height=600,left=320,top=100,resizable=1,scrollbars=1');}
</script>

<?php
$menu="kriteria";
$proses="Create $menu";
$pro="simpan";

 $sql="select `kode_kriteria` from `$tbkriteria` order by `kode_kriteria` desc";
  $q=mysqli_query($conn, $sql);
  $jum=mysqli_num_rows($q);
  $th=date("y");
  $bl=date("m")+0;if($bl<10){$bl="0".$bl;}

  $kd="KRI".$th.$bl;//KEG1610001
  if($jum > 0){
   $d=mysqli_fetch_array($q);
   $idmax=$d["kode_kriteria"];
   
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
  $kode_kriteria=$idmax;

if($_GET["pro"]=="ubah"){
	$kode_kriteria=$_GET["kode"];
	$sql="select * from `$tbkriteria` where `kode_kriteria`='$kode_kriteria'";
	$d=getField($conn,$sql);
				$kode_kriteria=$d["kode_kriteria"];
				$kode_kriteria0=$d["kode_kriteria"];
				$nama_kriteria=$d["nama_kriteria"];
				$nilai1=$d["nilai1"];
				$nilai2=$d["nilai2"];
				$nilai3=$d["nilai3"];
				$bobot=$d["bobot"];
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
<input type="text" id="nama_kriteria" class="form-control" name="nama_kriteria" placeholder="nama_kriteria" value="<?= $nama_kriteria ?>" required="required" autofocus="autofocus">
<label for="nama_kriteria">Nama kriteria </label>
</div>
</div>


<div class="form-group">
<div class="form-row">
<div class="col-md-6">
<div class="form-label-group">
<input type="text" id="nilai1" class="form-control"  name="nilai1" placeholder="nilai1"  value="<?= $nilai1 ?>" required="required">
<label for="nilai1">Minimum</label>
</div>
</div>
<div class="col-md-6">
<div class="form-label-group">

<input type="text" id="nilai2" class="form-control" name="nilai2" placeholder="nilai2" value="<?= $nilai2 ?>" required="required" autofocus="autofocus">

<label for="nilai2">Medium</label>

</div>
</div>
</div>
</div>

<div class="form-group">
<div class="form-row">
<div class="col-md-6">
<div class="form-label-group">
<input type="text" id="nilai3" class="form-control"  name="nilai3" placeholder="nilai3"  value="<?= $nilai3 ?>" required="required">
<label for="nilai3">Maximum</label>

</div>
</div>
<div class="col-md-6">
<div class="form-label-group">



<input type="text" id="bobot" class="form-control"  name="bobot"  value="<?= $bobot ?>" placeholder="bobot"required="required">
<label for="bobot">Bobot</label>
</div>
</div>

</div>
</div>      
            
<div class="form-group">
<div class="form-label-group">
<select name="keterangan" id="keterangan"  class="form-control" placeholder="keterangan" required="required">
<option value="">Pilih Keterangan</option>
<option value="Benefit" <?php if($keterangan=="Benefit"){echo "selected";}?> >Benefit</option>
<option value="Cost" <?php if($keterangan=="Cost"){echo "selected";}?> >Cost</option>
</select> 
</div>
</div>

<input type="Submit" name="Simpan" value="<?php echo $proses;?>"  class="btn btn-primary btn-block" >
<input name="pro" type="hidden" id="pro" value="<?php echo $pro;?>" />
<input name="kode_kriteria" type="hidden" id="kode_kriteria" value="<?php echo $kode_kriteria;?>" />
<input name="kode_kriteria0" type="hidden" id="kode_kriteria0" value="<?php echo $kode_kriteria0;?>" />
</form>

</div>
</div>
</div>
<?php
}
?>

Data kriteria: 
| <img src='ypathicon/print.png' alt='PRINT' OnClick="PRINT()"> |
<br>

<div class="card mb-3">
<div class="card-header"> <i class="fas fa-table"></i> <a href="?mnu=kriteria">Data <?php echo $menu;?></a></div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>kriteria</th>
                      <th>min</th>
                      <th>med</th>
                      <th>max</th>
                      <th>bobot</th>
                      <th>keterangan</th>
                      <th>menu</th>
                    </tr>
                  </thead>
                  <tfoot>
                      <tr>
                      <th>kriteria</th>
                      <th>min</th>
                      <th>med</th>
                      <th>max</th>
                      <th>bobot</th>
                      <th>keterangan</th>
                      <th>menu</th>
                    </tr>
                  </tfoot>
				  
<tbody>
<?php  
$no=1;
  $sql="select * from `$tbkriteria` order by `kode_kriteria` asc";
  $jum=getJum($conn,$sql);
		if($jum > 0){
		$arr=getData($conn,$sql);
		foreach($arr as $d) {							
				$kode_kriteria=$d["kode_kriteria"];
				$nama_kriteria=$d["nama_kriteria"];
				$nilai1=$d["nilai1"];
				$nilai2=$d["nilai2"];
				$nilai3=$d["nilai3"];
				$bobot=$d["bobot"];
				$keterangan=$d["keterangan"];
				
echo" 				<tr>
                      <td>$nama_kriteria</td>
                      <td>$nilai1</td>
					  <td>$nilai2</td>
					  <td>$nilai3</td>
					  <td>$bobot</td>
					  <td>$keterangan</td>
					  <td align='center'>
<a href='?mnu=kriteria&pro=ubah&kode=$kode_kriteria'><img src='ypathicon/ubah.jpg' alt='ubah'></a></td>
				</tr>";
			
			$no++;
			}//while
		}//if
		else{echo"<tr><td colspan='6'><blink>Maaf, Data kriteria belum tersedia...</blink></td></tr>";}
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
	$kode_kriteria=strip_tags($_POST["kode_kriteria"]);
	$kode_kriteria0=strip_tags($_POST["kode_kriteria0"]);
	$nama_kriteria=strip_tags($_POST["nama_kriteria"]);
	$nilai1=strip_tags($_POST["nilai1"]);
	$nilai2=strip_tags($_POST["nilai2"]);
	$nilai3=strip_tags($_POST["nilai3"]);
	$bobot=strip_tags($_POST["bobot"]);
	$keterangan=strip_tags($_POST["keterangan"]);
	
if($pro=="simpan"){
$sql=" INSERT INTO `$tbkriteria` (
`kode_kriteria` ,
`nama_kriteria` ,
`nilai1`,
`nilai2` ,
`nilai3` ,
`bobot`,
`keterangan`
) VALUES (
'$kode_kriteria', 
'$nama_kriteria', 
'$nilai1',
'$nilai2',
'$nilai3',
'$bobot',
'$keterangan'
)";
	
$simpan=process($conn,$sql);
		if($simpan) {echo "<script>alert('Data $kode_kriteria berhasil disimpan !');document.location.href='?mnu=kriteria';</script>";}
		else{echo"<script>alert('Data $kode_kriteria gagal disimpan...');document.location.href='?mnu=kriteria';</script>";}
	}
	else{
$sql="update `$tbkriteria` set 
`nama_kriteria`='$nama_kriteria',
`nilai1`='$nilai1',
`nilai2`='$nilai2' ,
`nilai3`='$nilai3',
`bobot`='$bobot',
`keterangan`='$keterangan'
where `kode_kriteria`='$kode_kriteria0'";
$ubah=process($conn,$sql);
	if($ubah) {echo "<script>alert('Data $kode_kriteria berhasil diubah !');document.location.href='?mnu=kriteria';</script>";}
	else{echo"<script>alert('Data $kode_kriteria gagal diubah...');document.location.href='?mnu=kriteria';</script>";}
	}//else simpan
}
?>

<?php
if($_GET["pro"]=="hapus"){
$kode_kriteria=$_GET["kode"];
$sql="delete from `$tbkriteria` where `kode_kriteria`='$kode_kriteria'";
$hapus=process($conn,$sql);
if($hapus) {echo "<script>alert('Data kriteria $kode_kriteria berhasil dihapus !');document.location.href='?mnu=kriteria';</script>";}
else{echo"<script>alert('Data kriteria $kode_kriteria gagal dihapus...');document.location.href='?mnu=kriteria';</script>";}
}
?>