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
/*else if($name=="")
{
header("location:index.php");
}*/
?>
<head>
 <link rel="stylesheet" href="ourown.css" />
<style>
a{text-decoration:none}
a:hover{background :"../../Nyumbaimages/niceimage.jpg"}

</style>
</head>
<body background = "../../Nyumbaimages/niceimage.jpg">
<div style="width:100%;float:left">
<div style="width:13%;float:left"><img src="../../Nyumbaimages/nyu.jpg" width="182" height="166"/></div>
<div style="width:86.25%;height:27%;float:right;background-color:grey">
  	<div  style="width:30%;height:10%;float:right">
	<!-- Start of Page Search -->

		
		    <form action="search.php" method="GET">
        <h5>&nbsp;</h5>
        <input type="text" name="query" placeholder="Search..." />
            <input type="submit" value="Go" />

    

      <h5>&nbsp;</h5>
      </form>
		  <!--</form>-->
		

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
      <a href="?con=add"><font color="#660066" size="+2">Add Apartment</font></a><br/>
    <br /><br />

    <a href="?con=view"><font color="#660066" size="+2">View Apartments</font>
	</a><br/><br/><br />
  <a href="?con=addlandlord"><font color="#660066" size="+2">Add Landlord</font></a><br/>
    <br /><br/>
	 <a href="?con=ord"><font color="#660066" size="+2">Rent Payments(
	 <?php
	 include("dbconnect1.php");
$count=0;
$sel=mysql_query("select * from payment");
$count=mysql_num_rows($sel);
echo $count;
	 ?>)</font>
	</a>
	<br/><br/><br />
  <a href="?con=viewhouse"><font color="#660066" size="+2">View Houses</font></a><br/>
    <br />
    <br />
    
	 <a href="?con=fdbk"><font color="#660066" size="+2">Feedback(	 <?php
	 include("dbconnect1.php");
$count=0;
$sel=mysql_query("select * from ContactDetails");
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
case 'add':include("additem.php");
        break;
        case 'addlandlord':include("addlandlord.php");
        break;

case 'view':include("view.php");
        break;
        case 'viewhouse':include("viewhouse.php");
        break;
		case 'ord':include("orders.php");
        break;
		case 'fdbk':include("fdbk.php");
        break;
case 'hm':include("hm.php");
        break;
        case 'deletetenant':include("deletetenant.php");
        break;
        case 'addlandlord': include("addlandlord.php");
        break;
		}
		if($_REQUEST['view'])
		{
		include("viewtable.php");
		}
    if($_REQUEST['viewhouse'])
    {
    include("viewtablehouse.php");
    }
	
		?>
	
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

       <li><a href="../../incompletepage.php"><img src="fb.jpg"/></a></li>
       <li><a href="socialmedia.html"><img src="twitter.jpg"/></a></li>
       <li><a href="socialmedia.html"><img src="googleplus.jpg"/></a></li>
       <li><a href="socialmedia.html"><img src="instagram.jpg"/></a></li>
       <li><a href="socialmedia.html"><img src="gmail.jpg"/></a></li>
       </ul>
       </div>
       <div class="section">
       <img src="../../Nyumbaimages/nyu.jpg" height="180"/>
       </div>
       </footer>
       </div>
       <p style="text-align: center; padding:0px;">&#169;Copyright-Nyumba Apartments Management System, 2018.</p>

</body>
                        </html>
