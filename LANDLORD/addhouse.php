<?php
session_start();
$name=$_SESSION['eid'];
include("dbconnect1.php");

$apart=$_REQUEST['apart'];
//$subcatg=$_REQUEST['subcat'];
//$img=$_FILES['file']['tmp_name'];
$housenumber=$_REQUEST['t1'];

$housefloor=$_REQUEST['t2'];

//$apart= "select ApartID from ApartmentDetails where $_REQUEST['t3']="
if($_REQUEST['sub'])
  {
    if(mysql_query("INSERT into House  values('','$housenumber','$housefloor','$apart') "))
	   {
	    //move_uploaded_file($_FILES['file']['tmp_name'],["/itempics/"]);
		
	    echo "<font size='+2'>House has been inserted successfully</font>";
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
<center><h1>Add House</h1></center>
<br><br>
<center><fieldset style="width:50%">
<form  name="testform" method="post" enctype="multipart/form-data" >
<table align="center">
<tr><td width="111"><span class="style3">Apartment:</span></td>

<td width="264"><select name=apart onChange="showUser(this.value)">
  <option value=''>Select One</option>
 <?php
require "dbconnect1.php";// connection to database 
$q=mysql_query("SELECT * from ApartmentDetails");
while($n=mysql_fetch_array($q)){
echo "<option value=".$n['ApartID'].">".$n['ApartName']."</option>";
}
?>

</select></td>
</tr>

<tr>
  <td><span class="style3">House Number: </span></td>
  <td><label>
    <input name="t1" type="text" id="t1">
  </label></td>
</tr>
<tr>
  <td><span class="style3">House Floor: </span></td>
  <td><label>
    <input name="t2" type="text" id="t2">
  </label></td>
</tr>
<tr><td  colspan="2" align="center"><input name="sub" type="submit" value="Submit"></td></tr>
</table>
</form>
</fieldset></center>
</body>
