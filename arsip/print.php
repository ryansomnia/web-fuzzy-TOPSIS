<style type="text/css">body {width: 100%;} </style> 
<body OnLoad="window.print()" OnFocus="window.close()"> 
<?php
$kode_pengujian=$_GET["v"];
include "../konmysqli.php";
echo"<link href='../ypathcss/$css' rel='stylesheet' type='text/css' />";
?>

<h3><center>Arsip Data Pengujian:</h3>
  <table class="table table-bordered" id="dataTable" width="90%" cellspacing="0">
                  <thead>
                    <tr>
					<th>Kode</th>
                      <th>Ruko</th>
					  <th>Formula</th>
                      <th>Bobot</th>
                      <th>Ranking</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
					   <th>Kode</th>
                      <th>Ruko</th>
					  <th>Formula</th>
                      <th>Bobot</th>
                      <th>Ranking</th>
                    </tr>
                  </tfoot>
				  
<tbody>
<?php  
$no=1;
  $sql="select * from `tb_arsip` where kode_pengujian='$kode_pengujian' order by `kode_arsip` asc";
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
				$kode_user=$d["kode_user"];
				$kode_pengujian=$d["kode_pengujian"];
echo" 				<tr>
                      <td>RKO-$kode_ruko</td>
					  <td>$nama_ruko</td>
					  <td>$keterangan</td>
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
<?php				
function getJum($conn,$sql){
  $rs=$conn->query($sql);
  $jum= $rs->num_rows;
	$rs->free();
	return $jum;
}

function getData($conn,$sql){
	$rs=$conn->query($sql);
	$rs->data_seek(0);
	$arr = $rs->fetch_all(MYSQLI_ASSOC);
	
	$rs->free();
	return $arr;
}
function getRuko($conn,$kode){
$field="nama_ruko";
$sql="SELECT `$field` FROM `tb_ruko` where `kode_ruko`='$kode'";
$rs=$conn->query($sql);	
	$rs->data_seek(0);
	$row = $rs->fetch_assoc();
	$rs->free();
    return $row[$field];
	}		
?>
</table>

