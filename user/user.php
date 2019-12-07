<script type="text/javascript"> 
function PRINT(){ 
win=window.open('user/print.php','win','width=1000, height=400, menubar=0, scrollbars=1, resizable=0, location=0, toolbar=0, password=0'); } 
</script>
<script language="JavaScript">
function buka(url) {window.open(url, 'window_baru', 'width=800,height=600,left=320,top=100,resizable=1,scrollbars=1');}
</script>

<?php
$menu="User";
$proses="Create $menu";
$pro="simpan";

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

if($_GET["pro"]=="ubah"){
	$kode_user=$_GET["kode"];
	$sql="select * from `$tbuser` where `kode_user`='$kode_user'";
	$d=getField($conn,$sql);
				$kode_user=$d["kode_user"];
				$kode_user0=$d["kode_user"];
				$nama_user=$d["nama_user"];
				$email=$d["email"];
				$telepon=$d["telepon"];
				$username=$d["username"];
				$password=$d["password"];
				$status=$d["status"];
				$pro="ubah";	
				$validasi=$d["validasi"];
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
<input type="text" id="nama_user" class="form-control" name="nama_user" placeholder="nama_user" value="<?= $nama_user ?>" required="required" autofocus="autofocus">
<label for="nama_user">Nama User </label>
</div>
</div>


<div class="form-group">
<div class="form-row">
<div class="col-md-6">
<div class="form-label-group">
<input type="text" id="email" class="form-control"  name="email" placeholder="email"  value="<?= $email ?>" required="required">
<label for="email">Email</label>
</div>
</div>
<div class="col-md-6">
<div class="form-label-group">

<input type="text" id="telepon" class="form-control" name="telepon" placeholder="telepon" value="<?= $telepon ?>" required="required" autofocus="autofocus">
<label for="telepon">Telepon </label>

</div>
</div>
</div>
</div>

<div class="form-group">
<div class="form-row">
<div class="col-md-6">
<div class="form-label-group">
<input type="text" id="username" class="form-control"  name="username" placeholder="username"  value="<?= $username ?>" required="required">
<label for="username">Username</label>

</div>
</div>
<div class="col-md-6">
<div class="form-label-group">



<input type="text" id="password" class="form-control"  name="password"  value="<?= $password ?>" placeholder="password"required="required">
<label for="password">Password</label>
</div>
</div>

</div>
</div>      
            
<div class="form-group">
<div class="form-label-group">
<select name="status" id="status"  class="form-control" placeholder="status" required="required">
<option value="">Pilih Status</option>
<option value="Admin" <?php if($status=="Admin"){echo "selected";}?> >Admin</option>
<option value="User" <?php if($status=="User"){echo "selected";}?> >User</option>
</select> 
</div>
</div>
        
<div class="form-group">
<div class="form-label-group">
<select name="validasi" id="validasi"  class="form-control" placeholder="validasi" required="required">
<option value="">Validasi Account</option>
<option value="Aktif" <?php if($validasi=="Aktif"){echo "selected";}?> >Aktif</option>
<option value="Tidak Aktif" <?php if($validasi=="Tidak Aktif"){echo "selected";}?> >Tidak Aktif</option>
</select> 
</div>
</div>
<input type="Submit" name="Simpan" value="<?php echo $proses;?>"  class="btn btn-primary btn-block" >
<input name="pro" type="hidden" id="pro" value="<?php echo $pro;?>" />
<input name="kode_user" type="hidden" id="kode_user" value="<?php echo $kode_user;?>" />
<input name="kode_user0" type="hidden" id="kode_user0" value="<?php echo $kode_user0;?>" />
</form>

</div>
</div>
</div>
<?php
}
?>

Data user: 
| <img src='ypathicon/print.png' alt='PRINT' OnClick="PRINT()"> |
<br>

<div class="card mb-3">
<div class="card-header"> <i class="fas fa-table"></i> <a href="?mnu=user">Data <?php echo $menu;?></a> | <i class="fas fa-table"></i><a href="?mnu=user&pro=add"> Tambah data <?php echo $menu;?></a></div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Kode</th>
                      <th>User</th>
                      <th>Email</th>
                      <th>Telepon</th>
                      <th>Status</th>
					   <th>Validasi</th>
                      <th>Menu</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th>Kode</th>
                      <th>User</th>
                      <th>Email</th>
                      <th>Telepon</th>
                      <th>Status</th>
					   <th>Validasi</th>
                      <th>Menu</th>
                    </tr>
                  </tfoot>
				  
<tbody>
<?php  
$no=1;
  $sql="select * from `$tbuser` order by `kode_user` asc";
  $jum=getJum($conn,$sql);
		if($jum > 0){
		$arr=getData($conn,$sql);
		foreach($arr as $d) {							
				$kode_user=$d["kode_user"];
				$nama_user=$d["nama_user"];
				$email=$d["email"];
				$telepon=$d["telepon"];
				$username=$d["username"];
				$password=$d["password"];
				$status=$d["status"];
				$validasi=$d["validasi"];
echo" 				<tr>
                      <td>$kode_user</td>
                      <td>$nama_user</td>
                      <td>$email</td>
					  <td>$telepon</td>
					  <td>$status</td>
					   <td>$validasi</td>
					  <td align='center'>
<a href='?mnu=user&pro=ubah&kode=$kode_user'><img src='ypathicon/ubah.jpg' alt='ubah'></a>
<a href='?mnu=user&pro=hapus&kode=$kode_user'><img src='ypathicon/h.png' alt='hapus' 
onClick='return confirm(\"Apakah Anda benar-benar akan menghapus $nama_user pada data user ?..\")'></a></td>
				</tr>";
			
			$no++;
			}//while
		}//if
		else{echo"<tr><td colspan='6'><blink>Maaf, Data user belum tersedia...</blink></td></tr>";}
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
	$kode_user=strip_tags($_POST["kode_user"]);
	$kode_user0=strip_tags($_POST["kode_user0"]);
	$nama_user=strip_tags($_POST["nama_user"]);
	$email=strip_tags($_POST["email"]);
	$telepon=strip_tags($_POST["telepon"]);
	$username=strip_tags($_POST["username"]);
	$password=strip_tags($_POST["password"]);
	$status=strip_tags($_POST["status"]);
	$validasi=strip_tags($_POST["validasi"]);
if($pro=="simpan"){
$sql=" INSERT INTO `$tbuser` (
`kode_user` ,
`nama_user` ,
`email`,
`telepon` ,`validasi` ,
`username` ,
`password`,
`status`
) VALUES (
'$kode_user', 
'$nama_user', 
'$email',
'$telepon','$validasi',
'$username',
'$password',
'$status'
)";
	
$simpan=process($conn,$sql);
		if($simpan) {echo "<script>alert('Data $kode_user berhasil disimpan !');document.location.href='?mnu=user';</script>";}
		else{echo"<script>alert('Data $kode_user gagal disimpan...');document.location.href='?mnu=user';</script>";}
	}
	else{
$sql="update `$tbuser` set 
`nama_user`='$nama_user',
`email`='$email',`validasi`='$validasi',
`telepon`='$telepon' ,
`username`='$username',
`password`='$password',
`status`='$status'
where `kode_user`='$kode_user0'";
$ubah=process($conn,$sql);
	if($ubah) {echo "<script>alert('Data $kode_user berhasil diubah !');document.location.href='?mnu=user';</script>";}
	else{echo"<script>alert('Data $kode_user gagal diubah...');document.location.href='?mnu=user';</script>";}
	}//else simpan
}
?>

<?php
if($_GET["pro"]=="hapus"){
$kode_user=$_GET["kode"];
$sql="delete from `$tbuser` where `kode_user`='$kode_user'";
$hapus=process($conn,$sql);
if($hapus) {echo "<script>alert('Data user $kode_user berhasil dihapus !');document.location.href='?mnu=user';</script>";}
else{echo"<script>alert('Data user $kode_user gagal dihapus...');document.location.href='?mnu=user';</script>";}
}
?>