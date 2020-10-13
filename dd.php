<?php
$HID=$_GET['HID'];
require "dbconnect1.php";
$q=$_GET["q"];

$sql="SELECT * FROM house WHERE HID ='$q'";

$result = mysql_query($sql);

 


while($row = mysql_fetch_array($result))
{
echo "<option>" . $row['HID'] . "</option>";
}
//echo "</select>";
?>