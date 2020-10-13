<?php
$cat_id=$_GET['catid'];
require "dbconnect1.php";
$q=$_GET["q"];

$sql="SELECT * FROM apcategory WHERE catid ='$q'";

$result = mysql_query($sql);

 


while($row = mysql_fetch_array($result))
{
echo "<option>" . $row['apcategory'] . "</option>";
}
//echo "</select>";
?>