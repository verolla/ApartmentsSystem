<body>
<br>
<center><font color="#660066" size="+3">Issue a Complaint here</font></center>
<br>

<br><br>
<center><fieldset style="width:50%">
<form  name="testform" method="post" enctype="multipart/form-data" >
<table align="center">
<tr><td width="111"><span class="style3">House:</span></td>

<td width="264"><select name=hid onChange="showUser(this.value)">
  <option value=''>Select One</option>
 <?php
require "dbconnect1.php";// connection to database 
$q=mysql_query("SELECT * from house");
while($n=mysql_fetch_array($q)){
echo "<option value=".$n['HID'].">".$n['HNumber']."</option>";
}
?>

</select></td>
</tr>

<tr>
  <td><span class="style3">Subject: </span></td>
  <td><label>
    <input name="t1" type="text" id="t1">
  </label></td>
</tr>
<tr>
  <td><span class="style3">Complaint: </span></td>
  <td><label>
    <input name="t1" type="text" id="t1">
  </label></td>
</tr>
<tr><td  colspan="2" align="center"><input name="sub" type="submit" value="Submit"></td></tr>
</table>
</form>
</fieldset></center>
</body>
<?php
include("dbconnect1.php");
$HID=$_REQUEST['hid'];
//$subcatg=$_REQUEST['subcat'];
//$img=$_FILES['file']['tmp_name'];
$housenumber=$_REQUEST['t1'];

$housefloor=$_REQUEST['t2'];

//$apart= "select ApartID from ApartmentDetails where $_REQUEST['t3']="
if($_REQUEST['sub'])
  {
    if(mysql_query("INSERT into payment  values('','amount','datepaid', 'LID','ApartID','HID','TID','accountno','bank') "))
	   {
	    //move_uploaded_file($_FILES['file']['tmp_name'],["/itempics/"]);
		
	    echo "<font size='+2'>Payment details have been inserted successfully.</font>";
		}
	else
	 {
	   echo "Payment details not been inserted. Try again later.";
	   }
	}  

	
	?>
