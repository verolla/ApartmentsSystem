<?php
session_start();
$name=$_SESSION['eid'];
include("dbconnect1.php");
$catg=$_REQUEST['viewhouses'];
//$subcatg=$_REQUEST['view1'];

   $sel=mysql_query("SELECT * from house where ApartID='$catg'");
    //$sel1=mysql_query("SELECT * from ApartmentDetails where ApartID='$catg'");
    while($arr=mysql_fetch_array($sel))//&&$arr=mysql_fetch_array($sel1))
   {
   $i=$arr['ApartID'];
      echo "<form method='post'><table border='1' align='center'>
   <tr><td><font size='+1'><b>Apartment</b></font></td>
   <td><font size='+1'><b>Details</b></font></td></tr>";
   echo "<tr>
   <tr><td><img src='itempics/$i.jpg' height='200' width='200'></td>
   <td><b>House ID:</b>".$arr['HID'].
   "<br><b>House Number:</b>&nbsp;".$arr['HNumber'].
   //"<br><b>Bedrooms:</b>&nbsp;".$arr['Bedrooms'].
   //"<br><b>Rent:</b>&nbsp;".$arr['Rent'].
   "<br><b>Floor:</b>".$arr['Hfloor'].
   "<br><br><input type='checkbox' name='c1[]' value='$arr[dat]'/><b>Delete</b>
   </td>
   </tr></table>";
   

	
    }
		echo "<center><input type='submit' name='del' value='Delete'/></center></form>";
	
	if($_REQUEST['del'])
  {
    $c=$_REQUEST['c1'];
	if($c!=NULL)
	  {
	    $flag=0;
		foreach($c as $c1)
		  {
		  $sel=mysql_query("SELECT * from house where dat='$c1'");
		  $arr=mysql_fetch_array($sel);
		  $HID=$arr['HID'];
		  $hno=$arr['HNumber'];
		  $floor=$arr['Hfloor'];
		  $catg=$arr['ApartID'];
		

		  //$t=date("d-m-y h-i-s");
		  
		   mysql_query("insert into trash values('$HID','$hno','$floor','$catg')");
		    mysql_query("delete from ApartmentDetails where dat='$c1'");
		   $flag=1;
		   }
		   if($flag==1)
		     {
			   echo "<font size='+2'>item deleted successfully</font>";
			  }
			  else
			   {
			     echo "<font size='+2'>item is not deleted</font>";
				 }
		  }
		  else
		    {
			  echo "<font size='+2'>please select a checkbox</font>";
			 }
	 }	
 
  ?>