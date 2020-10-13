<?php
session_start();
$name=$_SESSION['eid'];
include("dbconnect1.php");

$catg=$_REQUEST['cat'];
//$subcatg=$_REQUEST['subcat'];
$img=$_FILES['file']['tmp_name'];
$fName=$_REQUEST['t1'];
$lName=$_REQUEST['t3'];
$email=$_REQUEST['t5'];
$phone=$_REQUEST['t4'];
$idno=$_REQUEST['t5'];
$pass=$_REQUEST['t7'];
$gender=$_REQUEST['t2'];


$desc=$_REQUEST['Desctext'];
$t=date("d-m-y h-i-s");

if($_REQUEST['sub'])
  {
    if(mysql_query("INSERT into landlord  values('','$fName','$lName','$phone','$email','$idno','$gender','$catg','$pass') "))
	   {
		
	    echo "<font size='+2'>Landlord details inserted successfully to the database. They can now log in to add apartment or house details.</font>";
		}
	else
	 {
	   echo "Landlord details not inserted. Try again later.";
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
<center><h1>Add New Landlord</h1></center>
<br><br>
<center><fieldset style="width:50%">
<form  name="testform" method="post" enctype="multipart/form-data" >
<table align="center">
<tr><td width="111"><span class="style3">Apartment:</span></td>

<td width="264"><select name=cat onChange="showUser(this.value)">
  <option value=''>Select One</option>
 <?php
require "dbconnect1.php";// connection to database 
$q=mysql_query("SELECT * from apartmentdetails ");
while($n=mysql_fetch_array($q)){
echo "<option value=".$n['ApartID'].">".$n['ApartName']."</option>";
}
?>

</select></td>
</tr>

  <td><span class="style3">First Name: </span></td>
  <td><label>
    <input name="t1" type="text" id="t1">
  </label></td>
</tr>
<tr>
  <td><span class="style3">Last Name: </span></td>
  <td><label>
    <input name="t3" type="text" id="t3">
  </label></td>
</tr>
<tr>
  <td><span class="style3">Phone: </span></td>
  <td><label>
    <input name="t4" type="text" id="t4">
  </label></td>
</tr>
<tr>
  <td><span class="style3">Email: </span></td>
  <td><label>
    <input name="t6" type="text" id="t6">
  </label></td>
</tr>
<tr>
  <td><span class="style3">National ID: </span></td>
  <td><label>
    <input name="t5" type="text" id="t5">
  </label></td>
</tr>
<tr>
  <td><span class="style3">Gender:</span></td>
  <td><label>
  <input name="t2" type="text" id="t2">
  </label></td>
</tr>
<tr>
  <td><span class="style3">Password:</span></td>
  <td><label>
  <input name="t7" type="text" id="t7">
  </label></td>
</tr>
<tr>
  <td><span class="style3">Confirm Password:</span></td>
  <td><label>
  <input name="t8" type="text" id="t8">
  </label></td>
</tr>
<tr><td  colspan="2" align="center"><input name="sub" type="submit" value="Submit"></td></tr>
</table>
</form>
</fieldset></center>
</body>
