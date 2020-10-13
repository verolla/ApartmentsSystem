<?php
error_reporting(1);
session_start();
require_once 'dbconnect1.php';
$name=$_SESSION['eid'];

if($_REQUEST['log']=='out')
{
session_destroy();
header("location:index.php");
}
else if($name=="")
{
header("location:index.php");
}
?>
<head>
 <link rel="stylesheet" href="../admin/afyabackend/ourown.css" />
<style>
a{text-decoration:none}
a:hover{background :"../Nyumbaimages/niceimage.jpg"}

</style>
</head>
<body background-color:#fcfbe3 >
<div style="width:100%;float:left">
<div style="width:13%;float:left"><img src="../Nyumbaimages/nyu.jpg" width="182" height="166"/></div>
<div style="width:86.25%;height:27%;float:right;background-color:grey">
    <div  style="width:30%;height:10%;float:right">
  <!-- Start of Page Search -->

    <form action="search.php" method="GET">
        <h5>&nbsp;</h5>
        <input type="text" name="query" placeholder="Search..." />
            <input type="submit" value="Go" />

    

      <h5>&nbsp;</h5>
      </form>
    

    <!-- End of Page Search -->
  </div>

  <div style="width:50%;height:10%;float:right">
<br /><br /><br /><br/>
    <a href="?con=hm"><font color="#660066" size="+2">Home</font></a>&nbsp;&nbsp;&nbsp;&nbsp; 
  <a href="?log=out"><font color="#660066" size="+2">LogOut</font></a>
  <?php
  echo "     ".$name; ?>
  </div>
</div>
</div>

<div>

<div style="width:13.7%;height:100%;float:left;background-color:grey">
  <div align="center"><br />
      <br />
      <a href="?con=add"><font color="#660066" size="+2">Add House</font></a><br/>
    <br /><br />

    <a href="?con=view"><font color="#660066" size="+2">View Houses</font>
  </a><br/><br/><br />
  <a href="?con=addapart"><font color="#660066" size="+2">Add Apartment</font></a><br/>
    <br /><br/>
   <a href="?con=ord"><font color="#660066" size="+2">Rent Payments(
   <?php
   include("dbconnect1.php");
$count=0;
$sel=mysql_query("SELECT * from Payment");
$count=mysql_num_rows($sel);
echo $count;
   ?>)</font>
  </a>
  <br/><br/><br />
  <a href="?con=viewtenants"><font color="#660066" size="+2">All tenants(
   <?php
   include("dbconnect1.php");
$count=0;
$sel=mysql_query("SELECT * from Tenants");
$count=mysql_num_rows($sel);  
echo $count;
   ?>)</font>
  </a>
  <br/><br/><br />
    <a href="?con=addtenant"><font color="#660066" size="+2">Add tenant</font></a><br/>
    <br /><br />
    <a href="?con=vacatenotice"><font color="#660066" size="+2">Notice to vacate(<?php
   include("dbconnect1.php");
$count=0;
$sel=mysql_query("SELECT * from vacate");
$count=mysql_num_rows($sel);
if($count!=0){
echo $count;} else{
  echo "0 notices";
}
   ?>)   </font></a><br/>
    <br /><br />
    

   <a href="?con=fdbk"><font color="#660066" size="+2">Feedback(
   <?php
   include("dbconnect1.php");
$count=0;
$sel=mysql_query("SELECT * from ContactDetails");
$count=mysql_num_rows($sel);
echo $count;
   ?>)</font>
  </a>

  </div>
</div>
<div style="width:86.2%;height:100%;float:right;background-color:#fcfbe3">
<?php
switch($_REQUEST['con'])
{
case 'add':include("addhouse.php");
        break;

case 'view':include("viewhouses.php");
        break;
    case 'ord':include("payments.php");
        break;
    case 'fdbk':include("fdbk.php");
        break;
case 'hm':include("hm.php");
        break;
        case 'vacatenotice':include("vacatenotices.php");
        break;
        case 'addapart':include("addapart.php");
        break;
        case 'addtenant':include("addtenant.php");
        break;

case 'viewtenants':include("tenants.php");
        break;

    }
    if($_REQUEST['view'])
    {
    include("viewtablehouses.php");
    }
     if($_REQUEST['viewtenants'])
    {
    include("viewtabletenants.php");
    }
     if($_REQUEST['viewhouses'])
    {
    include("viewtable.php");
    }
  
    ?>
   <div class="clearfix"></div> 
</div>
</div>
<div class="clearfix"></div> 
       
                 <div class="clearfix"></div> 

      <footer>
       <div class ="section">
       <p><em>Nyumba Apartments Management System</em></p>
       <p><b>+254 708 828421<br>
       30023-00100 Nairobi<br>
       nyumbaapartments@gmail.com</b>
       </p>
       </div>


       <div class="section">
       <p>Connect with us</p>
       <ul>

       <li><a href="../incompletepage.php"><img src="../admin/afyaBackend/fb.jpg"/></a></li>
       <li><a href="../incompletepage.php"><img src="../admin/afyaBackend/twitter.jpg"/></a></li>
       <li><a href="../incompletepage.php"><img src="../admin/afyaBackend/googleplus.jpg"/></a></li>
       <li><a href="../incompletepage.php"><img src="../admin/afyaBackend/instagram.jpg"/></a></li>
       <li><a href="../incompletepage.php"><img src="../admin/afyaBackend/gmail.jpg"/></a></li>
       </ul>
       </div>
       <div class="section">
       <img src="../Nyumbaimages/nyu.jpg" height="180"/>
       </div>
       </footer>
       </div>
       <p style="text-align: center; padding:0px;">&#169;Copyright-Nyumba Apartments Management System, 2018.</p>

</body>
                        </html>
