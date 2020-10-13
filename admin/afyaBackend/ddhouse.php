<?php
$apartid=$_GET['ApartID'];
require "dbconnect1.php";
$q=$_GET["q"];

$sql="SELECT * FROM apartmentdetails WHERE ApartID ='$q'";

$result = mysql_query($sql);

 


while($row = mysql_fetch_array($result))
{
echo "<option>" . $row['apartmentdetails'] . "</option>";
}
//echo "</select>";
?>