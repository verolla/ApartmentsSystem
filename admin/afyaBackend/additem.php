<?php
session_start();
$name=$_SESSION['eid'];
include("dbconnect1.php");

$catg=$_REQUEST['cat'];
//$subcatg=$_REQUEST['subcat'];
$img=$_FILES['file']['tmp_name'];
$ApartName=$_REQUEST['t1'];
$rent=$_REQUEST['t2'];
$Location=$_REQUEST['t3'];
$rooms=$_REQUEST['t6'];
$floors=$_REQUEST['t5'];
$houses=$_REQUEST['t4'];


$desc=$_REQUEST['Desctext'];
$t=date("d-m-y h-i-s");

if($_REQUEST['sub'])
  {
    if(mysql_query("INSERT into ApartmentDetails  values('','$ApartName','$Location','$rooms','$rent','$desc','$floors','$img','$t','$houses','$catg') "))
	   {
	    move_uploaded_file($_FILES['file']['tmp_name'],["/itempics/"]);
		
	    echo "<font size='+2'>Apartment has been inserted successfully</font>";
		}
	else
	 {
	   echo "Apartment is not inserted. Try again later.";
	   }
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


xmlhttp.open("GET","dd.php?q="+str,true);
xmlhttp.send();
}
</script>

</head>


<style type="text/css">
<!--
.style3 {font-size: 18px; font-weight: bold; }
-->
</style>
<body>
<br><br><br>
<center><h1>Add Apartment</h1></center>
<br><br>
<center><fieldset style="width:50%">
<form  name="testform" method="post" enctype="multipart/form-data" >
<table align="center">
<tr><td width="111"><span class="style3">Category:</span></td>

<td width="264"><select name=cat onChange="showUser(this.value)">
  <option value=''>Select One</option>
 <?php
require "dbconnect1.php";// connection to database 
$q=mysql_query("SELECT * from apcategory ");
while($n=mysql_fetch_array($q)){
echo "<option value=".$n['catid'].">".$n['catname']."</option>";
}
?>

</select></td>
</tr>


<tr>
<td><span class="style3">Apartment Image:</span></td>
<td><input name="file" type="file"></td></tr>
<tr>
  <td><span class="style3">Apartment Name: </span></td>
  <td><label>
    <input name="t1" type="text" id="t1">
  </label></td>
</tr>
<tr>
  <td><span class="style3">Apartment Location: </span></td>
  <td><label>
    <input name="t3" type="text" id="t3">
  </label></td>
</tr>
<tr>
  <td><span class="style3">Number of Houses: </span></td>
  <td><label>
    <input name="t4" type="text" id="t4">
  </label></td>
</tr>
<tr>
  <td><span class="style3">Number of Bedrooms: </span></td>
  <td><label>
    <input name="t6" type="text" id="t6">
  </label></td>
</tr>
<tr>
  <td><span class="style3">Number of Storeys/Floors: </span></td>
  <td><label>
    <input name="t5" type="text" id="t5">
  </label></td>
</tr>
<tr>
  <td><span class="style3">Monthly Rent:</span></td>
  <td><label>
  <input name="t2" type="text" id="t2">
  </label></td>
</tr>
<tr>
<td><span class="style3">Description:</span></td>
<td><textarea name="Desctext" cols="35" rows="6"></textarea></td></tr>
<tr><td  colspan="2" align="center"><input name="sub" type="submit" value="Submit"></td></tr>
</table>
</form>
</fieldset></center>
</body>
