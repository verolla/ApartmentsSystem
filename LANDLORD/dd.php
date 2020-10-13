<?php
$ApartID=$_GET['ApartID'];
require "dbconnect1.php";
$q=$_GET["q"];

$sql="SELECT * FROM House WHERE ApartID ='$q'";

$result = mysql_query($sql);

 


while($row = mysql_fetch_array($result))
{
echo "<option>" . $row['ApartID'] . "</option>";
}
//echo "</select>";
?>