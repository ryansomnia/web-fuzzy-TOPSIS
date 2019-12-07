<style type="text/css">body {width: 100%;} </style> 
<body OnLoad="window.print()" OnFocus="window.close()"> 
<?php
include "../konmysqli.php";
echo"<link href='../ypathcss/$css' rel='stylesheet' type='text/css' />";
?>

<h3><center>Laporan data User:</h3>
 

<table width="100%" border="0">
  <tr>
    <th width="5%"><center>no</td>
    <th width="10%"><center>kode_user</td>
    <th width="25%"><center>nama_user</td>
    <th width="25%"><center>email</td>
    <th width="10%"><center>telepon</td>
    <th width="25%"><center>username</td>
    <th width="10%"><center>password</td>
    <th width="10%"><center>status</td>
  </tr>
<?php  
  $sql="select * from `$tbuser` order by `kode_user` desc";
  $jum=getJum($conn,$sql);
  $no=0;
		if($jum > 0){
	$arr=getData($conn,$sql);
		foreach($arr as $d) {								
		$no++;
				$kode_user=$d["kode_user"];
				$nama_user=$d["nama_user"];
				$email=$d["email"];
				$telepon=$d["telepon"];
				$username=$d["username"];
				$password=$d["password"];
				$status=$d["status"];
						
if($no %2==1){
echo"<tr bgcolor='#999999'>
				<td>$no</td>
				<td>$kode_user</td>
				<td>$nama_user</td>
				<td>$email</td>
				<td>$telepon</td>
				<td>$username</td>
				<td>$password</td>
				<td>$status</td>
				</tr>";
				}//no==1
else if($no %2==0){
echo"<tr bgcolor='#cccccc'>
				<td>$no</td>
				<td>$kode_user</td>
				<td>$nama_user</td>
				<td>$email</td>
				<td>$telepon</td>
				<td>$username</td>
				<td>$password</td>
				<td>$status</td>
				</tr>";
				}
			}//while
		}//if
		else{echo"<tr><td colspan='7'><blink>Maaf, Data user belum tersedia...</blink></td></tr>";}
		
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

