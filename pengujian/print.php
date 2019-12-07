<style type="text/css">body {width: 100%;} </style> 
<body OnLoad="window.print()" OnFocus="window.close()"> 
<?php
include "../konmysqli.php";
echo"<link href='../ypathcss/$css' rel='stylesheet' type='text/css' />";
?>

<h3><center>Laporan data Pengujian:</h3>
 

<table width="100%" border="0">
  <tr>
    <th width="5%"><center>no</td>
    <th width="10%"><center>kode_pengujian</td>
    <th width="25%"><center>nama_pengujian</td>
    <th width="25%"><center>tanggal</td>
    <th width="10%"><center>kode_user</td>
    <th width="10%"><center>keterangan</td>
  
  </tr>
<?php  
  $sql="select * from `$tbpengujian` order by `kode_pengujian` desc";
  $jum=getJum($conn,$sql);
  $no=0;
		if($jum > 0){
	$arr=getData($conn,$sql);
		foreach($arr as $d) {								
		$no++;
				$kode_pengujian=$d["kode_pengujian"];
				$nama_pengujian=$d["nama_pengujian"];
				$tanggal=$d["tanggal"];
				$kode_user=$d["kode_user"];
				$keterangan=$d["keterangan"];
				
						
if($no %2==1){
echo"<tr bgcolor='#999999'>
				<td>$no</td>
				<td>$kode_pengujian</td>
				<td>$nama_pengujian</td>
				<td>$tanggal</td>
				<td>$kode_user</td>
				<td>$keterangan</td>
				
				</tr>";
				}//no==1
else if($no %2==0){
echo"<tr bgcolor='#cccccc'>
				<td>$no</td>
				<td>$kode_pengujian</td>
				<td>$nama_pengujian</td>
				<td>$tanggal</td>
				<td>$kode_user</td>
				<td>$keterangan</td>
				</tr>";
				}
			}//while
		}//if
		else{echo"<tr><td colspan='7'><blink>Maaf, Data pengujian belum tersedia...</blink></td></tr>";}
		
/*+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++*/

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
		
?>
</table>

