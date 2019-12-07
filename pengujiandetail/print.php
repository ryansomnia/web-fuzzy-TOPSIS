<style type="text/css">body {width: 100%;} </style> 
<body OnLoad="window.print()" OnFocus="window.close()"> 
<?php
include "../konmysqli.php";
echo"<link href='../ypathcss/$css' rel='stylesheet' type='text/css' />";
?>

<h3><center>Laporan data Pengujian Detail:</h3>
 

<table width="100%" border="0">
  <tr>
    <th width="5%"><center>no</td>
    <th width="10%"><center>id</td>
    <th width="25%"><center>kode_pengujian</td>
    <th width="25%"><center>kode_ruko</td>
    <th width="10%"><center>rekapitulasi</td>
    <th width="25%"><center>bobot</td>
    <th width="10%"><center>ranking</td>
  
  </tr>
<?php  
  $sql="select * from `$tbpengujiandetail` order by `id` desc";
  $jum=getJum($conn,$sql);
  $no=0;
		if($jum > 0){
	$arr=getData($conn,$sql);
		foreach($arr as $d) {								
		$no++;
				$id=$d["id"];
				$kode_pengujian=$d["kode_pengujian"];
				$kode_ruko=$d["kode_ruko"];
				$rekapitulasi=$d["rekapitulasi"];
				$bobot=$d["bobot"];
				$ranking=$d["ranking"];
				
						
if($no %2==1){
echo"<tr bgcolor='#999999'>
				<td>$no</td>
				<td>$id</td>
				<td>$kode_pengujian</td>
				<td>$kode_ruko</td>
				<td>$rekapitulasi</td>
				<td>$bobot</td>
				<td>$ranking</td>
				
				</tr>";
				}//no==1
else if($no %2==0){
echo"<tr bgcolor='#cccccc'>
				<td>$no</td>
				<td>$id</td>
				<td>$kode_pengujian</td>
				<td>$kode_ruko</td>
				<td>$rekapitulasi</td>
				<td>$bobot</td>
				<td>$ranking</td>
				</tr>";
				}
			}//while
		}//if
		else{echo"<tr><td colspan='7'><blink>Maaf, Data pengujiandetail belum tersedia...</blink></td></tr>";}
		
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

