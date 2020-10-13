<body>
<br>
<center><font color="#660066" size="+3">Feedback</font></center>
<br>
</body>
<?php
include("dbconnect1.php");
$sel=mysql_query("SELECT * from ContactDetails");
while($arr=mysql_fetch_array($sel))
  {
     $i=$arr['CID'];
	
	echo "<center><fieldset style='width:60%'><table border='0'>
	<tr>
	
	<td><h3>Details</h3><b>Name:</b> ".$arr['Firstname']."  " .$arr['LastName']."<br>
	<b>Email:</b> ".$arr['Email']."<br>
	<b>Message:</b> ".$arr['Subject']."<br><br>
</td>
</tr>
	</table>
</fieldset><br>
</center>";
}

	
	?>
