<body>
<br>
<center><font color="#660066" size="+3">Payments Made</font></center>
<br>
</body>

<?php
include("dbconnect1.php");
$sel=mysql_query("SELECT * from payment");
//$sel1=mysql_query("SELECT * from tenants");
while($arr=mysql_fetch_array($sel))
  {
     $i=$arr['payID'];
	
	echo "<center><fieldset style='width:60%'><table border='0'>
	<tr>
	<td><img src='../Nyumbaimages/14.jpg' width=200 height=200></td>
	<td><h3>Payment Details:</h3><b>Apartment:</b> ".$arr['ApartID']."<br>
	<b>Payment ID:</b> ".$arr['payID']."<br>
	<b>Amount:</b> ".$arr['amountPaid']."<br>
	<b>Landlord:</b> ".$arr['LID']."<br></td>
	<b>Apartment:</b> ".$arr['ApartID']."<br></td>

	<td><h3>Tenant Details:</h3><b>Tenant:</b>  ".$arr['TID']."<br>
	<b>Account No:</b> ".$arr['AccountNo']."<br>
	<b>Mobile No:</b> ".$arr['phone']."<br>
	<b>Bank:</b> ".$arr['Bank']."<br>
	</td>
	</tr>
	</table>
</fieldset><br>
</center>";
}

	
	?>
