<html>
<head>

<script type="text/javascript">
var xmlHttp

function showUser(str){ 
xmlHttp=GetXmlHttpObject()
if (xmlHttp==null){
 alert ("Browser tidak support HTTP Request")
 return
 } 
var url="getuser.php"
url=url+"?q="+str
url=url+"&sid="+Math.random()
xmlHttp.onreadystatechange=SC1 
xmlHttp.open("GET",url,true)
xmlHttp.send(null)
}

function SC1() { 
if (xmlHttp.readyState==4 || xmlHttp.readyState=="complete"){ 
 document.getElementById("txtHint").innerHTML=xmlHttp.responseText 
 } 
}

function GetXmlHttpObject(){
var xmlHttp=null;
try{xmlHttp=new XMLHttpRequest();}
catch (e){
	try{xmlHttp=new ActiveXObject("Msxml2.XMLHTTP");}
 	catch (e){xmlHttp=new ActiveXObject("Microsoft.XMLHTTP");}
 }
return xmlHttp;
}
</script>

</head>
<body>
<form> 
Pilih User:
	<select name="users" onChange="showUser(this.value)">
	<option value="1">Nama ID 1</option>
	<option value="2">Nama ID 2</option>
	<option value="3">Nama ID 3</option>
    <option value="4">Nama ID 4</option>
	</select>
</form>
<p>
<div id="txtHint"><b>Informasi user akan tampil di sini...</b></div>
</p>
</body>
</html>
