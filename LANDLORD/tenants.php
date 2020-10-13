<?php
session_start();
$name=$_SESSION['eid'];
include("dbconnect1.php");
$apart=$_REQUEST['apart'];
//$subcatg=$_REQUEST['subcat'];
if($_REQUEST['sub'])
{
 echo "<script>location.href='home.php?viewtenants=$apart'</script>";
}

  
?><head>
<script>
function showUser(str)
{
if (str=="")
{
document.getElementById("txtHint").innerHTML="";
return;
}

if (window.XMLHttpRequest)
{// code for IE7+, Firefox, Chrome, Opera, Safari
xmlhttp=new XMLHttpRequest();
}
else
{// code for IE6, IE5
xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
}



xmlhttp.onreadystatechange=function()
{
if (xmlhttp.readyState==4 && xmlhttp.status==200)
{
document.getElementById("apart").innerHTML=xmlhttp.responseText;
}
}
//alert(str);
xmlhttp.open("GET","ddtenant.php?q="+str,true);
xmlhttp.send();
}

</script>

</head>

<link rel="stylesheet" href="../admin/afyaBackend/ourown.css" />
<style type="text/css">
</style>
<body>
<br><br><br>
<center><h1>Tenants</h1></center>
<br><br>
<center><fieldset style="width:50%">
<form  name="testform" method="post" enctype="multipart/form-data" >

<table align="center">
<tr><td width="118"><span class="style4">Apartment Name:</span></td>

<td width="281"><select name=apart onChange="showUser(this.value)">
  <option value=''>Select One</option>
 <?php
require "dbconnect1.php";// connection to database 
$q=mysql_query("SELECT * from ApartmentDetails ");
while($n=mysql_fetch_array($q)){
echo "<option value=".$n[ 'ApartID'].">".$n['ApartName']."</option>";
}
?>

</select></td>
</tr>

<br>
<tr><td colspan="2" align="center"><input  name="sub" type="submit" value="View" ></td></tr>
</table>
</form>
</fieldset></center>
</body>