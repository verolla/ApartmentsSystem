<?php
session_start();
$name=$_SESSION['eid'];
include("dbconnect1.php");
$catg=$_REQUEST['view'];
//$subcatg=$_REQUEST['view1'];

   $sel=mysql_query("SELECT * from ApartmentDetails where Category='$catg'");
    while($arr=mysql_fetch_array($sel))
   {
   $i=$arr['ApartID'];
      echo "<form method='post'><table border='1' align='center'>
   <tr><td><font size='+1'><b>Apartment</b></font></td>
   <td><font size='+1'><b>Details</b></font></td></tr>";
   echo "<tr>
   <tr><td><img src='itempics/$i.jpg' height='200' width='200'></td>
   <td><b>Apartment Name:</b>".$arr['ApartName'].
   "<br><b>Location:</b>&nbsp;".$arr['Location'].
   "<br><b>Bedrooms:</b>&nbsp;".$arr['Bedrooms'].
   "<br><b>Rent:</b>&nbsp;".$arr['Rent'].
   "<br><b>Description:</b>".$arr['Description'].
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
		  $sel=mysql_query("select * from ApartmentDetails where dat='$c1'");
		  $arr=mysql_fetch_array($sel);
		  $ApartName=$arr['ApartName'];
		  $Location=$arr['Location'];
		  $img=$arr['Image'];
		  $t=$arr['Added'];
		  $rent=$arr['Rent'];
		  $desc=$arr['Description'];
		  $houses=$arr['NumberOfHouses'];
		  $floors=$arr['$Floors'];
		  $rooms=$arr['Bedrooms'];

		  //$t=date("d-m-y h-i-s");
		  
		   mysql_query("insert into trash values('','$ApartName','$Location','$rooms','$rent','$desc','$floors','$img','$t','$houses','$Category')");
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