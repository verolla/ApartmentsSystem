<?php
$HID=$_GET['HID'];
require "dbconnect1.php";
$q=$_GET["q"];

$sql="SELECT * FROM payment WHERE HID ='$q'";

$result = mysql_query($sql);

 


while($row = mysql_fetch_array($result))
{
echo "<option>" . $row['payID'] . "</option>";
}
//echo "</select>";
?>