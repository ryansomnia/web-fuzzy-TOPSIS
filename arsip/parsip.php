<script type="text/javascript"> 
function PRINT(v){ 
win=window.open('arsip/print.php?v='+v,'win','width=1000, height=400, menubar=0, scrollbars=1, resizable=0, location=0, toolbar=0, kode_user=0'); } 
</script>
<script language="JavaScript">
function buka(url) {window.open(url, 'window_baru', 'width=800,height=600,left=320,top=100,resizable=1,scrollbars=1');}
</script>


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
<?php
$kode_user=$_SESSION["cid"];
 $sqlc="select distinct(kode_pengujian) from `tb_arsip` where kode_user='$kode_user' order by `kode_pengujian` desc";
  $jumc=getJum($conn,$sqlc);
		if($jumc <1){
			echo"Maaf data belum tersedia....";
		}
		$arrc=getData($conn,$sqlc);
		foreach($arrc as $dc) {							
				$kode_pengujian=$dc["kode_pengujian"];
				
				?>
<h2><a href="#">Pengujian <?php echo $kode_pengujian;?></a></h2>
<div> 
Data Arsip Pengujian <?php echo $kode_pengujian;?>: 
| <img src='ypathicon/print.png' alt='PRINT' OnClick="PRINT('<?php echo $kode_pengujian;?>')"> |
<br>

<div class="card mb-3">
<div class="card-header"> <i class="fas fa-table"></i> 
<a href="?mnu=arsip">Data <?php echo $menu;?></a> 
</div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
					<th>Kode</th>
                      <th>Ruko</th>
                      <th>Bobot</th>
                      <th>Ranking</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
					   <th>Kode</th>
                      <th>Ruko</th>
                      <th>Bobot</th>
                      <th>Ranking</th>
                    </tr>
                  </tfoot>
				  
<tbody>
<?php  
$no=1;
  $sql="select * from `tb_arsip` where kode_pengujian='$kode_pengujian' and kode_user='$kode_user'  order by `kode_arsip` asc";
  $jum=getJum($conn,$sql);
		if($jum > 0){
		$arr=getData($conn,$sql);
		foreach($arr as $d) {							
				$kode_arsip=$d["kode_arsip"];
				$kode_ruko=$d["kode_ruko"];
				$nama_ruko=getRuko($conn,$d["kode_ruko"]);
				$bobot=$d["bobot"];
				$ranking=$d["ranking"];
				$keterangan=$d["keterangan"];
				$kode_pengujian=$d["kode_pengujian"];
echo" 				<tr>
                      <td>RKO-$kode_ruko</td>
					  <td>$nama_ruko</td>
                      <td>$bobot</td>
					  <td>$ranking</td>
					</tr>";
			
			$no++;
			}//while
		}//if
		else{echo"<tr><td colspan='6'><blink>Maaf, Data arsip belum tersedia...</blink></td></tr>";}
?>
				 
                  </tbody>
                </table>
                </div>
                </div>
                </div>

</div>
<?php
}
?>
</div>


<?php
if($_GET["pro"]=="hapus"){
$kode_arsip=$_GET["kode"];
$sql="delete from `tb_arsip` where `kode_arsip`='$kode_arsip'";
$hapus=process($conn,$sql);
if($hapus) {echo "<script>alert('Data arsip $kode_arsip berhasil dihapus !');document.location.href='?mnu=arsip';</script>";}
else{echo"<script>alert('Data arsip $kode_arsip gagal dihapus...');document.location.href='?mnu=arsip';</script>";}
}
?>