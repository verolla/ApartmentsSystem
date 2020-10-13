<body>
<br>
<center><font color="#660066" size="+3">Rent payment Report</font></center><br>
<h3><a href="downloadrentreport.php">Click Here</a> To Download Your Rent Payment Report<h3><br>
</body>
<?php
include("dbconnect1.php");
$sel=mysql_query("SELECT * from payment");
while($arr=mysql_fetch_array($sel))
  {
     $i=$arr['payID'];
	
	echo "<center><fieldset style='width:60%'><table border='0'>
	<tr>
	
	<td><h3>Payment Details</h3><b>Tenant name:</b> ".$arr['Tfirstname']." ".$arr['TlastName']."<br>
	<b>House:</b> ".$arr['HID']."<br>
	<b>Apartment:</b> ".$arr['ApartID']."<br>
	<b>Amount:</b> ".$arr['amountPaid']."<br>
	<b>Landlord:</b> ".$arr['LID']."<br>
	<b>Bank:</b> ".$arr['Bank']."<br>
	<b>Account Number:</b> ".$arr['AccountNo']."<br>
<b>Reference Number:</b> ".$arr['HID']."<br>
<b>Rent for the month of:</b> ".$arr['month']."<br>
	<b>Date Paid:</b> ".$arr['datePaid']."<br><br>
</td>
</tr>
	</table>
</fieldset><br>
</center>";
}

	
	?>
