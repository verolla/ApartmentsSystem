<html>
<body>
<br>
<center><font color="#660066" size="+3">Tenants Notice To Vacate</font></center>
<br>

<?php
include("dbconnect1.php");
$sel=mysql_query("SELECT * from vacate");
if ($arr=mysql_fetch_array($sel)==0){
echo "<center> No tenant has requested to vacate yet. </center>";
}
else
  {
     $i=$arr['HID'];
	
	echo "<center><fieldset style='width:60%'><table border='0'>
	<tr>
	
	<td><h3>Details</h3>
	<b>Name:</b> ".$arr['name'].
	"<br><b>Email :</b> ".$arr['email'].
	"<br><b>Phone :</b> ".$arr['phone'].
	"<br><b>HID :</b> ".$arr['HID'].
	"<br><b>House Number:</b> ".$arr['HNumber'].
	"<br><b>Moved in Date:</b> ".$arr['DateOfJoin'].
	"<br><b>To Vacate Date:</b> ".$arr['vacatedate'].
	"<br><b>Reason:</b> ".$arr['reason'].
	"<br><br>
</td>
</tr>
	</table>
</fieldset><br>
</center>";
}

	
	?>
	</html>