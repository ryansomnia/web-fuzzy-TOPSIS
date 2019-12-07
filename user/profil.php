<script type="text/javascript"> 
function PRINT(){ 
win=window.open('user/print.php','win','width=1000, height=400, menubar=0, scrollbars=1, resizable=0, location=0, toolbar=0, password=0'); } 
</script>
<script language="JavaScript">
function buka(url) {window.open(url, 'window_baru', 'width=800,height=600,left=320,top=100,resizable=1,scrollbars=1');}
</script>

<?php
$menu="User";
	$kode_user=$_SESSION["cid"];
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
				$proses="Update Prorfil $menu";				

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



<input type="password" id="password" class="form-control"  name="password"  value="<?= ($password) ?>" placeholder="password"required="required">
<label for="password">Password</label>
</div>
</div>

</div>
</div>      
    
<input type="Submit" name="Simpan" value="<?php echo $proses;?>"  class="btn btn-primary btn-block" >

</form>

</div>
</div>
</div>
<?php
if(isset($_POST["Simpan"])){
	$kode_user0=strip_tags($_SESSION["cid"]);
	$nama_user=strip_tags($_POST["nama_user"]);
	$email=strip_tags($_POST["email"]);
	$telepon=strip_tags($_POST["telepon"]);
	$username=strip_tags($_POST["username"]);
	$password=strip_tags($_POST["password"]);
	
$sql="update `$tbuser` set 
`nama_user`='$nama_user',
`email`='$email',
`telepon`='$telepon' ,
`username`='$username',
`password`='$password'
where `kode_user`='$kode_user0'";
$ubah=process($conn,$sql);
	if($ubah) {echo "<script>alert('Data $kode_user berhasil diubah !');document.location.href='?mnu=profil';</script>";}
	else{echo"<script>alert('Data $kode_user gagal diubah...');document.location.href='?mnu=profil';</script>";}
}
?>
