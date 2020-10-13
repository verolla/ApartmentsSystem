<?php
session_start();
$name=$_SESSION['eid'];
include("dbconnect1.php");
$apart=$_REQUEST['viewtenants'];
//$subcatg=$_REQUEST['view1'];
//SELECT A.List_Of_columns,B.List_Of_columns  FROM Table1 AS A   INNER JOIN Table2 as B   ON A.ID=B.ID (Here Id is Common in both table).
//SELECT b.*, a.name FROM tableB AS b INNER JOIN tableA as A ON (b.id=a.id);
   $sel=mysql_query("SELECT t.*, h.* from tenants AS t INNER JOIN house as h ON (t.HouseID=h.HID)");
    while($arr=mysql_fetch_array($sel))
   {
   $i=$arr['TID'];
      echo "<form method='post'><table border='1' align='center'>
   <tr><td><font size='+1'><b>House Details</b></font>
</td>
  </tr>";
   echo "<tr>
   <tr>
   <td><b>Tenant Name:</b>".$arr['Tfirstname']." ".$arr['Tlastname'].
   "<br><b>Phone:</b>".$arr['phone'].
   "<br><b>ID Number:</b>".$arr['IDNumber'].
   "<br><b>Email:</b>".$arr['email'].
   "<br><b>Date Joined:</b>".$arr['DateOfJoin'].
   "<br><b>House ID:</b>".$arr['HID'].
   "<br><b>House Number:</b>&nbsp;".$arr['HNumber'].
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