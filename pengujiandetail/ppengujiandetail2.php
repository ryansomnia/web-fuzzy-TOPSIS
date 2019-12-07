<script type="text/javascript"> 
function PRINT(){ 
win=window.open('pengujiandetail/print.php','win','width=1000, height=400, menubar=0, scrollbars=1, resizable=0, location=0, toolbar=0, ranking=0'); } 
</script>
<script language="JavaScript">
function buka(url) {window.open(url, 'window_baru', 'width=800,height=600,left=320,top=100,resizable=1,scrollbars=1');}
</script>

<?php
$menu="Pengujian Detail";
$kode_pengujian=$_GET["id"];
$_SESSION["ckode_pengujian"]=$kode_pengujian;
	$sql="select * from `$tbpengujian` where `kode_pengujian`='$kode_pengujian'";
	$d=getField($conn,$sql);
				$kode_pengujian=$d["kode_pengujian"];
				$kode_pengujian0=$d["kode_pengujian"];
				$nama_pengujian=$d["nama_pengujian"];
				$tanggal=$d["tanggal"];
				$kode_user=$d["kode_user"];
				$keterangan=$d["keterangan"];
$menu="Pemilihan Ruko Tempat Usaha";
?>

 <link href="js/jquery-ui.css" rel="stylesheet">
	   <script src="js/jquery-1.8.2.js"></script>
	   <script src="js/jquery-ui-1.9.0.custom.js"></script>
    <script type="text/javascript">
      $(document).ready(function(){
          $("#isi").accordion({
  		        animated: "easeOutBounce"     
          });
      });
    </script>
  </head>
<body style="font-size:100%;">
<div id="isi">
<h2><a href="#">Pengujian Perhitungan</a></h2>
<div>
			
<div class="container">
<div class="card card-register mx-auto mt-5">
<div class="card-header">Kode Pengujian <?php echo $kode_pengujian;?></div>
<div class="card-body">
<form action="" method="post" enctype="multipart/form-data">


<div class="form-group">
<div class="form-label-group">
<input type="text" id="nama_pengujian" class="form-control" disabled name="nama_pengujian" placeholder="nama_pengujian" value="<?= $nama_pengujian ?>" required autofocus>
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


Data Ruko Untuk Perangkingan: 


<div >
<div class="card-header"> <i class="fas fa-table"></i> 
<a href="?mnu=ppengujiandetail&id=<?php echo $kode_pengujian;?>">Data <?php echo $menu;?></a> 
</div>


    <form action="" method="post">        
			<table class="table table-bordered" width="100%" cellspacing="0">
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
$sudahpilih=0;
$peoses="Pilih dan Analisa Ruko Terpilih";
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
			
			$ck="";	
			$sqlv="select * from `$tbpengujiandetail` where `kode_ruko`='$kode_ruko' and kode_pengujian='$kode_pengujian'";
			$adav=getJum($conn,$sqlv);;
			$proses="Simpan Data Ruko Terpilih";
				if($adav>0){
					$sudahpilih++;
					$dv=getField($conn,$sqlv);
					$id=$dv["id"];
					$kode_ruko=$dv["kode_ruko"];
					$peoses="Ubah Data Ruko Terpilih";
					$ck="checked";
				}
		echo"<tr>
                      <td>$nama_ruko</td>
                      <td>$jarak_usaha_serupa</td>
                      <td>$jarak_fasilitas_umum</td>
                      <td>$jarak_pasar</td>
					  <td>$luas_usaha</td>
                      <td>$harga_sewa</td>
					  <td>$traffic</td>
					  <td>$kepadatan_penduduk</td>
					  <td align='center'>
						<input type='checkbox'  name='pil$no' value='$kode_ruko' $ck>
					  </td>
				</tr>";
				?>
				
			<input type="hidden" name="kr<?php echo $no;?>" value="<?php echo $kode_ruko;?>" >
			<?php
			$no++;
			}//while
		}//if
		else{echo"<tr><td colspan='6'><blink>Maaf, Data ruko belum tersedia...</blink></td></tr>";}

		?>
				 
                  </tbody>
                </table>
				<br>
				
				
<input type="Submit" name="Simpan" value="<?php echo $peoses;?>"  
class="btn btn-primary btn-block" >
<input name="kode_pengujian" type="hidden" id="kode_pengujian" value="<?php echo $kode_pengujian;?>" />
<input name="no" type="hidden" id="no" value="<?php echo $no;?>" />

</form>



 </div>
 



<?php
$jumruko=$jum;

if(isset($_POST["Simpan"])){
	$no=strip_tags($_POST["no"]);
	$kode_pengujian=strip_tags($_POST["kode_pengujian"]);
	$sql="delete from `$tbpengujiandetail` where `kode_pengujian`='$kode_pengujian'";
	$hapus=process($conn,$sql);

	for($i=1;$i<=$no;$i++){
	$kode_ruko=$_POST["kr$i"];
	$pil=$_POST["pil$i"]+0;
if($pil>0){
   $sql=" INSERT INTO `$tbpengujiandetail` (
`id` ,
`kode_pengujian` ,
`kode_ruko`,
`rekapitulasi` ,
`bobot` ,
`ranking`
) VALUES (
'', 
'$kode_pengujian', 
'$kode_ruko',
'$pil',
'',
''
)";
	
$simpan=process($conn,$sql);
	}
	}//for
	if($simpan) {echo "<script>alert('Data Pemilihan Ruko berhasil  !');document.location.href='?mnu=ppengujiandetail&id=$kode_pengujian';</script>";}		
}



$no=0;
  $sql="select * from `$tbkriteria` order by `kode_kriteria` asc";
  $jum=getJum($conn,$sql);
  $arr=getData($conn,$sql);
		foreach($arr as $d) {							
				$arkk[$no]=$d["kode_kriteria"];
				$arnk[$no]=$d["nama_kriteria"];
				$arn1[$no]=$d["nilai1"];
				$arn2[$no]=$d["nilai2"];
				$arn3[$no]=$d["nilai3"];
				$arbobot[$no]=$d["bobot"];
				$arket[$no]=$d["keterangan"];
			$no++;				
		}
?>


</div> 

<?php
if(isset($_POST["Simpan"]) ||$sudahpilih>0){
	
	?>
<h2><a href="#">Membuat matriks keputusan <?php echo $menu;?></a></h2>
<div>
<div class="card mb-3">
<div class="card-header"> <i class="fas fa-table"></i> 
<a href="?mnu=ppengujiandetail">1 Data <?php echo $menu;?></a> 
</div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                      <tr>
                      <th rowspan="2" align="center">Nama Ruko</th></th>
                      <th colspan="3" align="center"><?php echo $ckriteria1;?></th>
                      <th colspan="3" align="center"><?php echo $ckriteria2;?></th>
                      <th colspan="3" align="center"><?php echo $ckriteria3;?></th>
                      <th colspan="3" align="center"><?php echo $ckriteria4;?></th>
                      <th colspan="3" align="center"><?php echo $ckriteria5;?></th>
					  <th colspan="3" align="center"><?php echo $ckriteria6;?></th>
					  <th colspan="3" align="center"><?php echo $ckriteria7;?></th>
                    </tr>
                      <tr>
                      <th align="center">min
                      <th align="center">med                    
                      <th align="center">max</th>
                      <th align="center">min
                      <th align="center">med                    
                      <th align="center">max</th>				  
                      <th align="center">min
                      <th align="center">med                     
                      <th align="center">max</th>              
                      <th align="center">min
                      <th align="center">med                    
                      <th align="center">max</th>   
                      <th align="center">min
                      <th align="center">med                     
                      <th align="center">max</th>                  
					  <th align="center">min
                      <th align="center">med                    
                      <th align="center">max</th>                 
					  <th align="center">min
                      <th align="center">med                     
                      <th align="center">max</th>                  
                    </tr>
                  </tfoot>
				  
<tbody>
<?php  

$kode_pengujian=$_SESSION["ckode_pengujian"];		
$no=1;
  $sql="select * from `$tbpengujiandetail` where kode_pengujian='$kode_pengujian' order by `id` asc";
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
				
				$j=$no-1;
				$sqlf="select * from `$tbruko` where `kode_ruko`='$kode_ruko'";
	$df=getField($conn,$sqlf);
				$nama_ruko=$df["nama_ruko"];
				$jarak_usaha_serupa=$df["jarak_usaha_serupa"];
				$jarak_fasilitas_umum=$df["jarak_fasilitas_umum"];
				$jarak_pasar=$df["jarak_pasar"];
				$luas_usaha=$df["luas_usaha"];
				$harga_sewa=$df["harga_sewa"];
				$traffic=$df["traffic"];
				$kepadatan_penduduk=$df["kepadatan_penduduk"];
				$kode_user=$df["kode_user"];
					$i=$no-1;
					$arID[$i]=$id;
					$arKP[$i]=$kode_pengujian;
					$arKR[$i]=$kode_ruko;
					$arNR[$i]=$nama_ruko;
				
$index=0;			
	$min1=getKecil($jarak_usaha_serupa,$arn1[$index],$arn2[$index]);			
	$med1=getSedang($jarak_usaha_serupa,$arn1[$index],$arn2[$index],$arn3[$index]);		
	$max1=getBesar($jarak_usaha_serupa,$arn2[$index],$arn3[$index]);		
$index++;	
	$min2=getKecil($jarak_fasilitas_umum,$arn1[$index],$arn2[$index]);			
	$med2=getSedang($jarak_fasilitas_umum,$arn1[$index],$arn2[$index],$arn3[$index]);		
	$max2=getBesar($jarak_fasilitas_umum,$arn2[$index],$arn3[$index]);		
$index++;	
	$min3=getKecil($jarak_pasar,$arn1[$index],$arn2[$index]);			
	$med3=getSedang($jarak_pasar,$arn1[$index],$arn2[$index],$arn3[$index]);		
	$max3=getBesar($jarak_pasar,$arn2[$index],$arn3[$index]);		
$index++;	
	$min4=getKecil($luas_usaha,$arn1[$index],$arn2[$index]);			
	$med4=getSedang($luas_usaha,$arn1[$index],$arn2[$index],$arn3[$index]);		
	$max4=getBesar($luas_usaha,$arn2[$index],$arn3[$index]);		
$index++;	
	$min5=getKecil($harga_sewa,$arn1[$index],$arn2[$index]);			
	$med5=getSedang($harga_sewa,$arn1[$index],$arn2[$index],$arn3[$index]);		
	$max5=getBesar($harga_sewa,$arn2[$index],$arn3[$index]);		
$index++;	
	$min6=getKecil($traffic,$arn1[$index],$arn2[$index]);			
	$med6=getSedang($traffic,$arn1[$index],$arn2[$index],$arn3[$index]);		
	$max6=getBesar($traffic,$arn2[$index],$arn3[$index]);		
$index++;	
	$min7=getKecil($kepadatan_penduduk,$arn1[$index],$arn2[$index]);			
	$med7=getSedang($kepadatan_penduduk,$arn1[$index],$arn2[$index],$arn3[$index]);		
	$max7=getBesar($kepadatan_penduduk,$arn2[$index],$arn3[$index]);		

$x1= getCek($min1,$med1,$max1);	
	if($x1==1){$ar1[$j][0]=$arn1[0];$ar1[$j][1]=$arn1[0];$ar1[$j][2]=$arn2[0];}
	else if($x1==2){$ar1[$j][0]=$arn1[0];$ar1[$j][1]=$arn2[0];$ar1[$j][2]=$arn3[0];}
	else if($x1==3){$ar1[$j][0]=$arn2[0];$ar1[$j][1]=$arn3[0];$ar1[$j][2]=$arn3[0];}
$x2= getCek($min2,$med2,$max2);	
	if($x2==1){$ar2[$j][0]=$arn1[1];$ar2[$j][1]=$arn1[1];$ar2[$j][2]=$arn2[1];}
	else if($x2==2){$ar2[$j][0]=$arn1[1];$ar2[$j][1]=$arn2[1];$ar2[$j][2]=$arn3[1];}
	else if($x2==3){$ar2[$j][0]=$arn2[1];$ar2[$j][1]=$arn3[1];$ar2[$j][2]=$arn3[1];}
$x3= getCek($min3,$med3,$max3);	
	if($x3==1){$ar3[$j][0]=$arn1[2];$ar3[$j][1]=$arn1[2];$ar3[$j][2]=$arn2[2];}
	else if($x3==2){$ar3[$j][0]=$arn1[2];$ar3[$j][1]=$arn2[2];$ar3[$j][2]=$arn3[2];}
	else if($x3==3){$ar3[$j][0]=$arn2[2];$ar3[$j][1]=$arn3[2];$ar3[$j][2]=$arn3[2];}
$x4= getCek($min4,$med4,$max4);	
	if($x4==1){$ar4[$j][0]=$arn1[3];$ar4[$j][1]=$arn1[3];$ar4[$j][2]=$arn2[3];}
	else if($x4==2){$ar4[$j][0]=$arn1[3];$ar4[$j][1]=$arn2[3];$ar4[$j][2]=$arn3[3];}
	else if($x4==3){$ar4[$j][0]=$arn2[3];$ar4[$j][1]=$arn3[3];$ar4[$j][2]=$arn3[3];}
$x5= getCek($min5,$med5,$max5);	
	if($x5==1){$ar5[$j][0]=$arn1[4];$ar5[$j][1]=$arn1[4];$ar5[$j][2]=$arn2[4];}
	else if($x5==2){$ar5[$j][0]=$arn1[4];$ar5[$j][1]=$arn2[4];$ar5[$j][2]=$arn3[4];}
	else if($x5==3){$ar5[$j][0]=$arn2[4];$ar5[$j][1]=$arn3[4];$ar5[$j][2]=$arn3[4];}
$x6= getCek($min6,$med6,$max6);	
	if($x6==1){$ar6[$j][0]=$arn1[5];$ar6[$j][1]=$arn1[5];$ar6[$j][2]=$arn2[5];}
	else if($x6==2){$ar6[$j][0]=$arn1[5];$ar6[$j][1]=$arn2[5];$ar6[$j][2]=$arn3[5];}
	else if($x6==3){$ar6[$j][0]=$arn2[5];$ar6[$j][1]=$arn3[5];$ar6[$j][2]=$arn3[5];}
$x7= getCek($min7,$med7,$max7);	
	if($x7==1){$ar7[$j][0]=$arn1[6];$ar7[$j][1]=$arn1[6];$ar7[$j][2]=$arn2[6];}
	else if($x7==2){$ar7[$j][0]=$arn1[6];$ar7[$j][1]=$arn2[6];$ar7[$j][2]=$arn3[6];}
	else if($x7==3){$ar7[$j][0]=$arn2[6];$ar7[$j][1]=$arn3[6];$ar7[$j][2]=$arn3[6];}

//1=max =aab
//2=max =abc
//3=max =bcc

echo" 				<tr>
                      <td>$nama_ruko</td>
                      <td>$min1</td>
					  <td>$med1</td>
					  <td>$max1</td>
                      <td>$min2</td>
					  <td>$med2</td>
					  <td>$max2</td>					
                      <td>$min3</td>
					  <td>$med3</td>
					  <td>$max3</td>
                      <td>$min4</td>
					  <td>$med4</td>
					  <td>$max4</td>
                      <td>$min5</td>
					  <td>$med5</td>
					  <td>$max5</td>
                      <td>$min6</td>
					  <td>$med6</td>
					  <td>$max6</td>
                      <td>$min7</td>
					  <td>$med7</td>
					  <td>$max7</td>					  
					</tr>";
			
			$no++;
			}//while
		}//if
		else{echo"<tr><td colspan='20'><blink>Maaf, Data pengujiandetail belum tersedia...</blink></td></tr>";}
?>
				 
                  </tbody>
                </table>
              </div>
    </div>
                <div class="card-footer small text-muted">Updated date <?php echo date("Y m d H i s");?></div>
  </div>
				
</div> 
<h2><a href="#">Matriks TFN <?php echo $menu;?></a></h2>
<div>




<div class="card mb-3">
<div class="card-header"> <i class="fas fa-table"></i> 
<a href="?mnu=ppengujiandetail">3 Data <?php echo $menu;?></a> 
</div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                      <tr>
                      <th rowspan="2" align="center">Nama Ruko</th></th>
                      <th colspan="3" align="center"><?php echo $ckriteria1;?></th>
                      <th colspan="3" align="center"><?php echo $ckriteria2;?></th>
                      <th colspan="3" align="center"><?php echo $ckriteria3;?></th>
                      <th colspan="3" align="center"><?php echo $ckriteria4;?></th>
                      <th colspan="3" align="center"><?php echo $ckriteria5;?></th>
					  <th colspan="3" align="center"><?php echo $ckriteria6;?></th>
					  <th colspan="3" align="center"><?php echo $ckriteria7;?></th>
                    </tr>
                       <tr>
                      <th align="center">min
                      <th align="center">med                    
                      <th align="center">max</th>
                      <th align="center">min
                      <th align="center">med                    
                      <th align="center">max</th>				  
                      <th align="center">min
                      <th align="center">med                     
                      <th align="center">max</th>              
                      <th align="center">min
                      <th align="center">med                    
                      <th align="center">max</th>   
                      <th align="center">min
                      <th align="center">med                     
                      <th align="center">max</th>                  
					  <th align="center">min
                      <th align="center">med                    
                      <th align="center">max</th>                 
					  <th align="center">min
                      <th align="center">med                     
                      <th align="center">max</th>                  
                    </tr>
                  </tfoot>
				  
<tbody>
<?php  

		
$no=1;
for($i=0;$i<count($arKR);$i++){
	$id=$arID[$i];
	$kode_ruko=$arKR[$i];
	$nama_ruko=$arNR[$i];
	
echo" 				<tr>
                      <td>$nama_ruko</td>
					 <td>".$ar1[$i][0]."</td>
					  <td>".$ar1[$i][1]."</td>
					  <td>".$ar1[$i][2]."</td>
                    <td>".$ar2[$i][0]."</td>
					  <td>".$ar2[$i][1]."</td>
					  <td>".$ar2[$i][2]."</td>
					<td>".$ar3[$i][0]."</td>
					  <td>".$ar3[$i][1]."</td>
					  <td>".$ar3[$i][2]."</td>
					<td>".$ar4[$i][0]."</td>
					  <td>".$ar4[$i][1]."</td>
					  <td>".$ar4[$i][2]."</td>
					<td>".$ar5[$i][0]."</td>
					  <td>".$ar5[$i][1]."</td>
					  <td>".$ar5[$i][2]."</td>
					<td>".$ar6[$i][0]."</td>
					  <td>".$ar6[$i][1]."</td>
					  <td>".$ar6[$i][2]."</td>
					<td>".$ar7[$i][0]."</td>
					  <td>".$ar7[$i][1]."</td>
					  <td>".$ar7[$i][2]."</td>
					  
					</tr>";
			$arg1[$i]=$ar1[$i][0];
			$arg2[$i]=$ar1[$i][1];
			$arg3[$i]=$ar1[$i][2];
			$arg4[$i]=$ar2[$i][0];
			$arg5[$i]=$ar2[$i][1];
			$arg6[$i]=$ar2[$i][2];
			$arg7[$i]=$ar3[$i][0];
			$arg8[$i]=$ar3[$i][1];
			$arg9[$i]=$ar3[$i][2];
			$arg10[$i]=$ar4[$i][0];
			$arg11[$i]=$ar4[$i][1];
			$arg12[$i]=$ar4[$i][2];
			$arg13[$i]=$ar5[$i][0];
			$arg14[$i]=$ar5[$i][1];
			$arg15[$i]=$ar5[$i][2];
			$arg16[$i]=$ar6[$i][0];
			$arg17[$i]=$ar6[$i][1];
			$arg18[$i]=$ar6[$i][2];
			$arg19[$i]=$ar7[$i][0];
			$arg20[$i]=$ar7[$i][1];
			$arg21[$i]=$ar7[$i][2];
			
			$no++;
			}//while
?>
				 
                  </tbody>
                </table>
                </div>
                </div>
               </div>
				

</div> 
<h2><a href="#"> Tabel Min dan Max  <?php echo $menu;?></a></h2>
<div>				
				
				
				

<div class="card mb-3">
<div class="card-header"> <i class="fas fa-table"></i> 
<a href="?mnu=ppengujiandetail">4 Data <?php echo $menu;?></a> 
</div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                      <tr>
                      <th colspan="3" align="center"><?php echo $ckriteria1;?></th>
                      <th colspan="3" align="center"><?php echo $ckriteria2;?></th>
                      <th colspan="3" align="center"><?php echo $ckriteria3;?></th>
                      <th colspan="3" align="center"><?php echo $ckriteria4;?></th>
                      <th colspan="3" align="center"><?php echo $ckriteria5;?></th>
					  <th colspan="3" align="center"><?php echo $ckriteria6;?></th>
					  <th colspan="3" align="center"><?php echo $ckriteria7;?></th>
                    </tr>
                       <tr>
                      <th align="center">min
                      <th align="center">med                    
                      <th align="center">max</th>
                      <th align="center">min
                      <th align="center">med                    
                      <th align="center">max</th>				  
                      <th align="center">min
                      <th align="center">med                     
                      <th align="center">max</th>              
                      <th align="center">min
                      <th align="center">med                    
                      <th align="center">max</th>   
                      <th align="center">min
                      <th align="center">med                     
                      <th align="center">max</th>                  
					  <th align="center">min
                      <th align="center">med                    
                      <th align="center">max</th>                 
					  <th align="center">min
                      <th align="center">med                     
                      <th align="center">max</th>                  
                    </tr>
                  </tfoot>
				  
<tbody>
				
<?php  
	$arMin[0]=min($arg1);
		$arMax[0]=max($arg1);
	$arMin[1]=min($arg2);
		$arMax[1]=max($arg2);
	$arMin[2]=min($arg3);
		$arMax[2]=max($arg3);
		if($arket[0]=="Cost"){
			$arG[0]=$arMin[0];
			$arG[1]=$arMin[1];
			$arG[2]=$arMin[2];
		}
		else{
			$arG[0]=$arMax[0];
			$arG[1]=$arMax[1];
			$arG[2]=$arMax[2];			
		}
		
	$arMin[3]=min($arg4);
		$arMax[3]=max($arg4);
	$arMin[4]=min($arg5);
		$arMax[4]=max($arg5);
	$arMin[5]=min($arg6);
		$arMax[5]=max($arg6);
		if($arket[1]=="Cost"){
			$arG[3]=$arMin[3];
			$arG[4]=$arMin[4];
			$arG[5]=$arMin[5];
		}
		else{
			$arG[3]=$arMax[3];
			$arG[4]=$arMax[4];
			$arG[5]=$arMax[5];			
		}
		
	$arMin[6]=min($arg7);
		$arMax[6]=max($arg7);
	$arMin[7]=min($arg8);
		$arMax[7]=max($arg8);
	$arMin[8]=min($arg9);
		$arMax[8]=max($arg9);
		if($arket[2]=="Cost"){
			$arG[6]=$arMin[6];
			$arG[7]=$arMin[7];
			$arG[8]=$arMin[8];
		}
		else{
			$arG[6]=$arMax[6];
			$arG[7]=$arMax[7];
			$arG[8]=$arMax[8];			
		}
		
	$arMin[9]=min($arg10);
		$arMax[9]=max($arg10);
	$arMin[10]=min($arg11);
		$arMax[10]=max($arg11);
	$arMin[11]=min($arg12);
		$arMax[11]=max($arg12);
		if($arket[3]=="Cost"){
			$arG[9]=$arMin[9];
			$arG[10]=$arMin[10];
			$arG[11]=$arMin[11];
		}
		else{
			$arG[9]=$arMax[9];
			$arG[10]=$arMax[10];
			$arG[11]=$arMax[11];			
		}
		
	$arMin[12]=min($arg13);
		$arMax[12]=max($arg13);
	$arMin[13]=min($arg14);
		$arMax[13]=max($arg14);
	$arMin[14]=min($arg15);
		$arMax[14]=max($arg15);
		if($arket[4]=="Cost"){
			$arG[12]=$arMin[12];
			$arG[13]=$arMin[13];
			$arG[14]=$arMin[14];
		}
		else{
			$arG[12]=$arMax[12];
			$arG[13]=$arMax[13];
			$arG[14]=$arMax[14];			
		}
		
	$arMin[15]=min($arg16);
		$arMax[15]=max($arg16);
	$arMin[16]=min($arg17);
		$arMax[16]=max($arg17);
	$arMin[17]=min($arg18);
		$arMax[17]=max($arg18);
		if($arket[5]=="Cost"){
			$arG[15]=$arMin[15];
			$arG[16]=$arMin[16];
			$arG[17]=$arMin[17];
		}
		else{
			$arG[15]=$arMax[15];
			$arG[16]=$arMax[16];
			$arG[17]=$arMax[17];			
		}
		
	$arMin[18]=min($arg19);
		$arMax[18]=max($arg19);
	$arMin[19]=min($arg20);
		$arMax[19]=max($arg20);
	$arMin[20]=min($arg21);
		$arMax[20]=max($arg21);
		if($arket[6]=="Cost"){
			$arG[18]=$arMin[18];
			$arG[19]=$arMin[19];
			$arG[20]=$arMin[20];
		}
		else{
			$arG[18]=$arMax[18];
			$arG[19]=$arMax[19];
			$arG[20]=$arMax[20];			
		}	
		
	echo" 				<tr>
					 <td>".$arG[0]."</td>
					 <td>".$arG[1]."</td>
					 <td>".$arG[2]."</td>
					 <td>".$arG[3]."</td>
					 <td>".$arG[4]."</td>
					 <td>".$arG[5]."</td>
					 <td>".$arG[6]."</td>
					 <td>".$arG[7]."</td>
					 <td>".$arG[8]."</td>
					 <td>".$arG[9]."</td>
					 <td>".$arG[10]."</td>
					 <td>".$arG[11]."</td>
					 <td>".$arG[12]."</td>
					 <td>".$arG[13]."</td>
					 <td>".$arG[14]."</td>
					 <td>".$arG[15]."</td>
					 <td>".$arG[16]."</td>
					 <td>".$arG[17]."</td>
					 <td>".$arG[18]."</td>
					 <td>".$arG[19]."</td>
					 <td>".$arG[20]."</td>
					</tr>";

?>

     </tbody>
                </table>
                </div>
                </div>
               </div>


</div> 
<h2><a href="#">Matriks keputusan ternormalisasi <?php echo $menu;?></a></h2>
<div>			   
			   

<div class="card mb-3">
<div class="card-header"> <i class="fas fa-table"></i> 
<a href="?mnu=ppengujiandetail">5 Data <?php echo $menu;?></a> 
</div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                      <tr>
                      <th rowspan="2" align="center">Nama Ruko</th></th>
                      <th colspan="3" align="center"><?php echo $ckriteria1;?></th>
                      <th colspan="3" align="center"><?php echo $ckriteria2;?></th>
                      <th colspan="3" align="center"><?php echo $ckriteria3;?></th>
                      <th colspan="3" align="center"><?php echo $ckriteria4;?></th>
                      <th colspan="3" align="center"><?php echo $ckriteria5;?></th>
					  <th colspan="3" align="center"><?php echo $ckriteria6;?></th>
					  <th colspan="3" align="center"><?php echo $ckriteria7;?></th>
                    </tr>
                      <tr>
                      <th align="center">min
                      <th align="center">med                    
                      <th align="center">max</th>
                      <th align="center">min
                      <th align="center">med                    
                      <th align="center">max</th>				  
                      <th align="center">min
                      <th align="center">med                     
                      <th align="center">max</th>              
                      <th align="center">min
                      <th align="center">med                    
                      <th align="center">max</th>   
                      <th align="center">min
                      <th align="center">med                     
                      <th align="center">max</th>                  
					  <th align="center">min
                      <th align="center">med                    
                      <th align="center">max</th>                 
					  <th align="center">min
                      <th align="center">med                     
                      <th align="center">max</th>                  
                    </tr>
                  </tfoot>
				  
<tbody>
<?php  

		
$no=1;
error_reporting(0);
for($i=0;$i<count($arKR);$i++){
	$id=$arID[$i];
	$kode_ruko=$arKR[$i];
	$nama_ruko=$arNR[$i];
	
	$arGmin1=min($arG[0],$arG[1],$arG[2]);
	$arGmax1=max($arG[0],$arG[1],$arG[2]);

	$arGmin2=min($arG[3],$arG[4],$arG[5]);
	$arGmax2=max($arG[3],$arG[4],$arG[5]);

	$arGmin3=min($arG[6],$arG[7],$arG[8]);
	$arGmax3=max($arG[6],$arG[7],$arG[8]);

	$arGmin4=min($arG[9],$arG[10],$arG[11]);
	$arGmax4=max($arG[9],$arG[10],$arG[11]);

	$arGmin5=min($arG[12],$arG[13],$arG[14]);
	$arGmax5=max($arG[12],$arG[13],$arG[14]);

	$arGmin6=min($arG[15],$arG[16],$arG[17]);
	$arGmax6=max($arG[15],$arG[16],$arG[17]);

	$arGmin7=min($arG[18],$arG[19],$arG[20]);
	$arGmax7=max($arG[18],$arG[19],$arG[20]);
	
		if($arket[0]=="Cost"){
			$arG2[0]=$arGmin1/$ar1[$i][2];
			$arG2[1]=$arGmin1/$ar1[$i][1];
			$arG2[2]=$arGmin1/$ar1[$i][0];
		}
		else{
			$arG2[0]=$ar1[$i][0]/$arGmax1;
			$arG2[1]=$ar1[$i][1]/$arGmax1;
			$arG2[2]=$ar1[$i][2]/$arGmax1;
		}
		
		if($arket[1]=="Cost"){
			$arG2[3]=$arGmin2/$ar2[$i][2];
			$arG2[4]=$arGmin2/$ar2[$i][1];
			$arG2[5]=$arGmin2/$ar2[$i][0];
		}
		else{
			$arG2[3]=$ar2[$i][0]/$arGmax2;
			$arG2[4]=$ar2[$i][1]/$arGmax2;
			$arG2[5]=$ar2[$i][2]/$arGmax2;
		}
	if($arket[2]=="Cost"){
			$arG2[6]=$arGmin3/$ar3[$i][2];
			$arG2[7]=$arGmin3/$ar3[$i][1];
			$arG2[8]=$arGmin3/$ar3[$i][0];
		}
		else{
			$arG2[6]=$ar3[$i][0]/$arGmax3;
			$arG2[7]=$ar3[$i][1]/$arGmax3;
			$arG2[8]=$ar3[$i][2]/$arGmax3;
		}
	if($arket[3]=="Cost"){
			$arG2[9]=$arGmin4/$ar4[$i][2];
			$arG2[10]=$arGmin4/$ar4[$i][1];
			$arG2[11]=$arGmin4/$ar4[$i][0];
		}
		else{
			$arG2[9]=$ar4[$i][0]/$arGmax4;
			$arG2[10]=$ar4[$i][1]/$arGmax4;
			$arG2[11]=$ar4[$i][2]/$arGmax4;
		}
	if($arket[4]=="Cost"){
			$arG2[12]=$arGmin5/$ar5[$i][2];
			$arG2[13]=$arGmin5/$ar5[$i][1];
			$arG2[14]=$arGmin5/$ar5[$i][0];
		}
		else{
			$arG2[12]=$ar5[$i][0]/$arGmax5;
			$arG2[13]=$ar5[$i][1]/$arGmax5;
			$arG2[14]=$ar5[$i][2]/$arGmax5;
		}
	if($arket[5]=="Cost"){
			$arG2[15]=$arGmin6/$ar6[$i][2];
			$arG2[16]=$arGmin6/$ar6[$i][1];
			$arG2[17]=$arGmin6/$ar6[$i][0];
		}
		else{
			$arG2[15]=$ar6[$i][0]/$arGmax6;
			$arG2[16]=$ar6[$i][1]/$arGmax6;
			$arG2[17]=$ar6[$i][2]/$arGmax6;
		}
	if($arket[6]=="Cost"){
			$arG2[18]=$arGmin7/$ar7[$i][2];
			$arG2[19]=$arGmin7/$ar7[$i][1];
			$arG2[20]=$arGmin7/$ar7[$i][0];
		}
		else{
			$arG2[18]=$ar7[$i][0]/$arGmax7;
			$arG2[19]=$ar7[$i][1]/$arGmax7;
			$arG2[20]=$ar7[$i][2]/$arGmax7;
		}	
		
		
		$arG3[$i][0]=$arG2[0] *$arbobot[0];
		$arG3[$i][1]=$arG2[1] *$arbobot[0];
		$arG3[$i][2]=$arG2[2] *$arbobot[0];
		$arG3[$i][3]=$arG2[3] *$arbobot[1];
		$arG3[$i][4]=$arG2[4] *$arbobot[1];
		$arG3[$i][5]=$arG2[5] *$arbobot[1];
		$arG3[$i][6]=$arG2[6] *$arbobot[2];
		$arG3[$i][7]=$arG2[7] *$arbobot[2];
		$arG3[$i][8]=$arG2[8] *$arbobot[2];
		$arG3[$i][9]=$arG2[9] *$arbobot[3];
		
		$arG3[$i][10]=$arG2[10] *$arbobot[3];
		$arG3[$i][11]=$arG2[11] *$arbobot[3];
		$arG3[$i][12]=$arG2[12] *$arbobot[4];
		$arG3[$i][13]=$arG2[13] *$arbobot[4];
		$arG3[$i][14]=$arG2[14] *$arbobot[4];
		$arG3[$i][15]=$arG2[15] *$arbobot[5];
		$arG3[$i][16]=$arG2[16] *$arbobot[5];
		$arG3[$i][17]=$arG2[17] *$arbobot[5];
		$arG3[$i][18]=$arG2[18] *$arbobot[6];
		$arG3[$i][19]=$arG2[19] *$arbobot[6];
		$arG3[$i][20]=$arG2[20] *$arbobot[6];
		
echo" 				<tr>
                      <td>$nama_ruko</td>
					 <td>".cbulat($arG2[0])."</td>
					 <td>".cbulat($arG2[1])."</td>
					 <td>".cbulat($arG2[2])."</td>
					 <td>".cbulat($arG2[3])."</td>
					 <td>".cbulat($arG2[4])."</td>
					 <td>".cbulat($arG2[5])."</td>
					 <td>".cbulat($arG2[6])."</td>
					 <td>".cbulat($arG2[7])."</td>
					 <td>".cbulat($arG2[8])."</td>
					 <td>".cbulat($arG2[9])."</td>
					 <td>".cbulat($arG2[10])."</td>
					 <td>".cbulat($arG2[11])."</td>
					 <td>".cbulat($arG2[12])."</td>
					 <td>".cbulat($arG2[13])."</td>
					 <td>".cbulat($arG2[14])."</td>
					 <td>".cbulat($arG2[15])."</td>
					 <td>".cbulat($arG2[16])."</td>
					 <td>".cbulat($arG2[17])."</td>
					 <td>".cbulat($arG2[18])."</td>
					 <td>".cbulat($arG2[19])."</td>
					 <td>".cbulat($arG2[20])."</td>    
					 </tr>";
			$no++;
			}//while
?>
				 
                  </tbody>
                </table>
                </div>
                </div>
               </div>
				

</div> 
<h2><a href="#">Matriks keputusan yang ternormalisasi dan terbobot. <?php echo $menu;?></a></h2>
<div>				
				
				
			 
	
<div class="card mb-3">
<div class="card-header"> <i class="fas fa-table"></i> 
<a href="?mnu=ppengujiandetail">6 Data <?php echo $menu;?></a> 
</div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                      <tr>
                      <th rowspan="2" align="center">Nama Ruko</th></th>
                      <th colspan="3" align="center"><?php echo $ckriteria1;?></th>
                      <th colspan="3" align="center"><?php echo $ckriteria2;?></th>
                      <th colspan="3" align="center"><?php echo $ckriteria3;?></th>
                      <th colspan="3" align="center"><?php echo $ckriteria4;?></th>
                      <th colspan="3" align="center"><?php echo $ckriteria5;?></th>
					  <th colspan="3" align="center"><?php echo $ckriteria6;?></th>
					  <th colspan="3" align="center"><?php echo $ckriteria7;?></th>
                    </tr>
                      <tr>
                      <th align="center">min
                      <th align="center">med                    
                      <th align="center">max</th>
                      <th align="center">min
                      <th align="center">med                    
                      <th align="center">max</th>				  
                      <th align="center">min
                      <th align="center">med                     
                      <th align="center">max</th>              
                      <th align="center">min
                      <th align="center">med                    
                      <th align="center">max</th>   
                      <th align="center">min
                      <th align="center">med                     
                      <th align="center">max</th>                  
					  <th align="center">min
                      <th align="center">med                    
                      <th align="center">max</th>                 
					  <th align="center">min
                      <th align="center">med                     
                      <th align="center">max</th>                  
                    </tr>
                  </tfoot>
				  
<tbody>
<?php  

		
$no=1;
error_reporting(0);
for($i=0;$i<count($arKR);$i++){
	$id=$arID[$i];
	$kode_ruko=$arKR[$i];
	$nama_ruko=$arNR[$i];

		
echo" 				<tr>
                      <td>$nama_ruko</td>
					 <td>".cbulat($arG3[$i][0])."</td>
					 <td>".cbulat($arG3[$i][1])."</td>
					 <td>".cbulat($arG3[$i][2])."</td>
					 <td>".cbulat($arG3[$i][3])."</td>
					 <td>".cbulat($arG3[$i][4])."</td>
					 <td>".cbulat($arG3[$i][5])."</td>
					 <td>".cbulat($arG3[$i][6])."</td>
					 <td>".cbulat($arG3[$i][7])."</td>
					 <td>".cbulat($arG3[$i][8])."</td>
					 <td>".cbulat($arG3[$i][9])."</td>
					 <td>".cbulat($arG3[$i][10])."</td>
					 <td>".cbulat($arG3[$i][11])."</td>
					 <td>".cbulat($arG3[$i][12])."</td>
					 <td>".cbulat($arG3[$i][13])."</td>
					 <td>".cbulat($arG3[$i][14])."</td>
					 <td>".cbulat($arG3[$i][15])."</td>
					 <td>".cbulat($arG3[$i][16])."</td>
					 <td>".cbulat($arG3[$i][17])."</td>
					 <td>".cbulat($arG3[$i][18])."</td>
					 <td>".cbulat($arG3[$i][19])."</td>
					 <td>".cbulat($arG3[$i][20])."</td>    
					 </tr>";
			$no++;
			}//while
?>
				 
                  </tbody>
                </table>
                </div>
                </div>
               </div>


</div> 
<h2><a href="#">matriks SIP dan matriks SIN <?php echo $menu;?></a></h2>
<div>
<div class="card mb-3">
<div class="card-header"> <i class="fas fa-table"></i> 
<a href="?mnu=ppengujiandetail">7 Data <?php echo $menu;?></a> 
</div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                      <tr>
                      <th rowspan="2" align="center">AValue</th></th>
                      <th colspan="3" align="center"><?php echo $ckriteria1;?></th>
                      <th colspan="3" align="center"><?php echo $ckriteria2;?></th>
                      <th colspan="3" align="center"><?php echo $ckriteria3;?></th>
                      <th colspan="3" align="center"><?php echo $ckriteria4;?></th>
                      <th colspan="3" align="center"><?php echo $ckriteria5;?></th>
					  <th colspan="3" align="center"><?php echo $ckriteria6;?></th>
					  <th colspan="3" align="center"><?php echo $ckriteria7;?></th>
                    </tr>
                      <tr>
                      <th align="center">min
                      <th align="center">med                    
                      <th align="center">max</th>
                      <th align="center">min
                      <th align="center">med                    
                      <th align="center">max</th>				  
                      <th align="center">min
                      <th align="center">med                     
                      <th align="center">max</th>              
                      <th align="center">min
                      <th align="center">med                    
                      <th align="center">max</th>   
                      <th align="center">min
                      <th align="center">med                     
                      <th align="center">max</th>                  
					  <th align="center">min
                      <th align="center">med                    
                      <th align="center">max</th>                 
					  <th align="center">min
                      <th align="center">med                     
                      <th align="center">max</th>                  
                    </tr>
                  </tfoot>
				  
<tbody>
<?php  

$gab1="<tr><td>A<sup>+</sup>";		
$gab2="<tr><td>A<sup>-</sup>";		
$no=1;
for($j=0;$j<21;$j++){
	for($i=0;$i<count($arKR);$i++){
		$arT[$i]=$arG3[$i][$j];
	}//baris
	$maxD[$j]=	max($arT);
	$minD[$j]=	min($arT);
	$gab1.="<td>".cbulat($maxD[$j]);		
	$gab2.="<td>".cbulat($minD[$j]);	
}//kolom
$gab1.="</tr>";		
$gab2.="</tr>";	
echo $gab1;
echo $gab2;
?>
				 
                  </tbody>
                </table>
                </div>
                </div>
               </div>
						   
                           						   



</div> 
<h2><a href="#">Jarak antara nilai setiap alternatif dengan matriks SIP. <?php echo $menu;?></a></h2>
<div>




<div class="card mb-3">
<div class="card-header"> <i class="fas fa-table"></i> 
<a href="?mnu=ppengujiandetail">Data SIP <?php echo $menu;?></a> 
</div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                      <tr>
                      <th align="center">Nama Ruko</th></th>
                      <th  align="center"><?php echo $ckriteria1;?></th>
                      <th  align="center"><?php echo $ckriteria2;?></th>
                      <th  align="center"><?php echo $ckriteria3;?></th>
                      <th  align="center"><?php echo $ckriteria4;?></th>
                      <th  align="center"><?php echo $ckriteria5;?></th>
					  <th  align="center"><?php echo $ckriteria6;?></th>
					  <th  align="center"><?php echo $ckriteria7;?></th>
                      <th  align="center">TOTAL</th>
                    </tr>
                  
                  </tfoot>
				  
<tbody>
<?php  
	
$no=1;
error_reporting(0);
for($i=0;$i<count($arKR);$i++){
	$id=$arID[$i];
	$kode_ruko=$arKR[$i];
	$nama_ruko=$arNR[$i];

		$A1=pow($arG3[$i][0]-$maxD[0],2);
		$A2=pow($arG3[$i][1]-$maxD[1],2);
		$A3=pow($arG3[$i][2]-$maxD[2],2);
			$B1=pow($arG3[$i][0]-$minD[0],2);
			$B2=pow($arG3[$i][1]-$minD[1],2);
			$B3=pow($arG3[$i][2]-$minD[2],2);		
				$HA[$i][0]=sqrt(($A1+$A2+$A3)/3);
				$HB[$i][0]=sqrt(($B1+$B2+$B3)/3);
		$A1=pow($arG3[$i][3]-$maxD[3],2);
		$A2=pow($arG3[$i][4]-$maxD[4],2);
		$A3=pow($arG3[$i][5]-$maxD[5],2);
			$B1=pow($arG3[$i][3]-$minD[3],2);
			$B2=pow($arG3[$i][4]-$minD[4],2);
			$B3=pow($arG3[$i][5]-$minD[5],2);		
				$HA[$i][1]=sqrt(($A1+$A2+$A3)/3);
				$HB[$i][1]=sqrt(($B1+$B2+$B3)/3);
		$A1=pow($arG3[$i][6]-$maxD[6],2);
		$A2=pow($arG3[$i][7]-$maxD[7],2);
		$A3=pow($arG3[$i][8]-$maxD[8],2);
			$B1=pow($arG3[$i][6]-$minD[6],2);
			$B2=pow($arG3[$i][7]-$minD[7],2);
			$B3=pow($arG3[$i][8]-$minD[8],2);		
				$HA[$i][2]=sqrt(($A1+$A2+$A3)/3);
				$HB[$i][2]=sqrt(($B1+$B2+$B3)/3);
				
		$A1=pow($arG3[$i][9]-$maxD[9],2);
		$A2=pow($arG3[$i][10]-$maxD[10],2);
		$A3=pow($arG3[$i][11]-$maxD[11],2);
			$B1=pow($arG3[$i][9]-$minD[9],2);
			$B2=pow($arG3[$i][10]-$minD[10],2);
			$B3=pow($arG3[$i][11]-$minD[11],2);		
				$HA[$i][3]=sqrt(($A1+$A2+$A3)/3);
				$HB[$i][3]=sqrt(($B1+$B2+$B3)/3);				

		$A1=pow($arG3[$i][12]-$maxD[12],2);
		$A2=pow($arG3[$i][13]-$maxD[13],2);
		$A3=pow($arG3[$i][14]-$maxD[14],2);
			$B1=pow($arG3[$i][12]-$minD[12],2);
			$B2=pow($arG3[$i][13]-$minD[13],2);
			$B3=pow($arG3[$i][14]-$minD[14],2);		
				$HA[$i][4]=sqrt(($A1+$A2+$A3)/3);
				$HB[$i][4]=sqrt(($B1+$B2+$B3)/3);
				
		$A1=pow($arG3[$i][15]-$maxD[15],2);
		$A2=pow($arG3[$i][16]-$maxD[16],2);
		$A3=pow($arG3[$i][17]-$maxD[17],2);
			$B1=pow($arG3[$i][15]-$minD[15],2);
			$B2=pow($arG3[$i][16]-$minD[16],2);
			$B3=pow($arG3[$i][17]-$minD[17],2);		
				$HA[$i][5]=sqrt(($A1+$A2+$A3)/3);
				$HB[$i][5]=sqrt(($B1+$B2+$B3)/3);

		$A1=pow($arG3[$i][18]-$maxD[18],2);
		$A2=pow($arG3[$i][19]-$maxD[19],2);
		$A3=pow($arG3[$i][20]-$maxD[20],2);
			$B1=pow($arG3[$i][18]-$minD[18],2);
			$B2=pow($arG3[$i][19]-$minD[19],2);
			$B3=pow($arG3[$i][20]-$minD[20],2);				
				$HA[$i][6]=sqrt(($A1+$A2+$A3)/3);
				$HB[$i][6]=sqrt(($B1+$B2+$B3)/3);
				
				$arTotalA[$i]=	$HA[$i][0]+$HA[$i][1]+$HA[$i][2]+$HA[$i][3]+$HA[$i][4]+$HA[$i][5]+$HA[$i][6];	
				$arTotalB[$i]=	$HB[$i][0]+$HB[$i][1]+$HB[$i][2]+$HB[$i][3]+$HB[$i][4]+$HB[$i][5]+$HB[$i][6];	
				$arTotal[$i]=	$arTotalB[$i]/($arTotalA[$i]+$arTotalB[$i]);
				$arTotalS[$i]=	cbulat($arTotalB[$i])."/(".cbulat($arTotalA[$i])."+".cbulat($arTotalB[$i]).")";	
																
echo" 				<tr>
                      <td>$nama_ruko</td>
					 <td>".cbulat($HA[$i][0])."</td>
					 <td>".cbulat($HA[$i][1])."</td>
					 <td>".cbulat($HA[$i][2])."</td>
					 <td>".cbulat($HA[$i][3])."</td>
					 <td>".cbulat($HA[$i][4])."</td>
					 <td>".cbulat($HA[$i][5])."</td>
					 <td>".cbulat($HA[$i][6])."</td> 
					  <td>".cbulat($arTotalA[$i])."</td> 
					 </tr>";
			$no++;
			}//while
?>
				 
                  </tbody>
                </table>
                </div>
                </div>
               </div>
               
               
</div> 
<h2><a href="#">Jarak antara nilai setiap alternatif dengan matriks SIN. <?php echo $menu;?></a></h2>
<div>
<div class="card mb-3">
<div class="card-header"> <i class="fas fa-table"></i> 
<a href="?mnu=ppengujiandetail">Data SIN <?php echo $menu;?></a> 
</div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                      <tr>
                      <th  align="center">Nama Ruko</th></th>
                      <th  align="center"><?php echo $ckriteria1;?></th>
                      <th align="center"><?php echo $ckriteria2;?></th>
                      <th align="center"><?php echo $ckriteria3;?></th>
                      <th align="center"><?php echo $ckriteria4;?></th>
                      <th align="center"><?php echo $ckriteria5;?></th>
					  <th align="center"><?php echo $ckriteria6;?></th>
					  <th align="center"><?php echo $ckriteria7;?></th>
                       <th align="center">Total</th>
                    </tr>
                  
                  </tfoot>
				  
<tbody>
<?php  
	
$no=1;
error_reporting(0);
for($i=0;$i<count($arKR);$i++){
	$id=$arID[$i];
	$kode_ruko=$arKR[$i];
	$nama_ruko=$arNR[$i];
				
echo" 				<tr>
                      <td>$nama_ruko</td>
					 <td>".cbulat($HB[$i][0])."</td>
					 <td>".cbulat($HB[$i][1])."</td>
					 <td>".cbulat($HB[$i][2])."</td>
					 <td>".cbulat($HB[$i][3])."</td>
					 <td>".cbulat($HB[$i][4])."</td>
					 <td>".cbulat($HB[$i][5])."</td>
					 <td>".cbulat($HB[$i][6])."</td> 
					  <td>".cbulat($arTotalB[$i])."</td> 
					 </tr>";
			$no++;
			}//while
?>
				 
                  </tbody>
                </table>
                </div>
                </div>
               </div>
               
               
               
     
     
     
</div> 
<h2><a href="#">Closeness Coefficient atau nilai prefrensi  <?php echo $menu;?></a></h2>
<div> 
<div class="card mb-3">
<div class="card-header"> <i class="fas fa-table"></i> 
<a href="?mnu=ppengujiandetail">Data Cci <?php echo $menu;?></a> 
</div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                      <tr>
                      <th  align="center">Nama Ruko</th></th>
                      <th  align="center">Formula</th></th>
                       <th align="center">Bobot</th>
                    </tr>
                  
                  </tfoot>
				  
<tbody>
<?php  
	
$no=1;
for($i=0;$i<count($arKR);$i++){
	$id=$arID[$i];
	$kode_ruko=$arKR[$i];

	$nama_ruko=$arNR[$i];
				
echo" 				<tr>
                     <td>$nama_ruko</td>
					 <td>".$arTotalS[$i]."</td>
					 <td>".cbulat($arTotal[$i])."</td>
					 
					 </tr>";
			$no++;
			}//while
?>
				 
                  </tbody>
                </table>
                </div>
                </div>
               </div>
               
               
               
   
   
  <?php
$array_count  =count($arKR);
    for($x = 0; $x < $array_count; $x++){
            for($a = 0 ;  $a < $array_count - 1 ; $a++){
                if($a < $array_count ){
                    if($arTotal[$a] < $arTotal[$a + 1] ){
                            swap($arTotal, $a, $a+1);
							 swap($arTotalS, $a, $a+1);
							  swap($arKR, $a, $a+1);
							   swap($arNR, $a, $a+1);
                    }
                }
            }
        }
		
		?> 
   
   
 </div> 
<h2><a href="#">Hasil Akhir <?php echo $menu;?></a></h2>
<div>
<div class="card mb-3">
<div class="card-header"> <i class="fas fa-table"></i> 
<a href="?mnu=ppengujiandetail">Data Pengurutan <?php echo $menu;?></a> 
</div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                      <tr>
                      <th  align="center">Nama Ruko</th></th>
                       <th align="center">Formula</th>
                       <th align="center">Bobot</th>
                       <th align="center">Ranking</th>
                    </tr>
                  
                  </tfoot>
				  
<tbody>
<?php  
$sql="delete from `tb_arsip` where kode_pengujian='$kode_pengujian'";
$del=process($conn,$sql);
$kode_user=$_SESSION["cid"];

$no=1;
for($i=0;$i<count($arKR);$i++){
	$id=$arID[$i];
	$kode_ruko=$arKR[$i];
	$nama_ruko=$arNR[$i];
				
$sqls="INSERT INTO `tb_arsip` (`kode_arsip`, `kode_user`, `kode_pengujian`, `kode_ruko`, `bobot`, `ranking`, `keterangan`) 
VALUES ('', '$kode_user', '$kode_pengujian', '$kode_ruko', '".$arTotal[$i]."', '$no', '".cbulat($arTotalS[$i])."');";
$up=process($conn,$sqls);

echo" 				<tr>
                     <td>$nama_ruko</td>
					 <td>".$arTotalS[$i]."</td>
					 <td>".cbulat($arTotal[$i])."</td>
					  <td>$no</td>
					 </tr>";
			$no++;
			}//while
?>
				 
                  </tbody>
                </table>
                </div>
                </div>
               </div>
               
</div> 

<?php
}//if Simpan /adav>0
?>

<a href="?mnu=ppengujiandetail&id=<?php echo $kode_pengujian;?>" class="btn btn-primary btn-block">Kembali</a>
</div>                                         
 <?php
 

    function swap(&$arr, $a, $b) {
        $tmp = $arr[$a];
        $arr[$a] = $arr[$b];
        $arr[$b] = $tmp;
    }
	
	?>              
               