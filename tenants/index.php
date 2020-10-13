<?php
error_reporting(1);
require_once 'dbconnect1.php';
$name=$_REQUEST['t1'];
$pass=$_REQUEST['p1'];

if($_REQUEST['sub'])
 {
 $sel=mysql_query("SELECT Tfirstname,pass from tenants where Tfirstname='$name'");
 
 $arr=mysql_fetch_array($sel);
 if($arr['Tfirstname']==$name and $arr['pass']==$pass)
   {
   session_start();
   $_SESSION['eid']=$name;
  header("location:home.php");
  }
  else
   {
     $er="Sorry, your name and password do not match!";
	 }
}	 
?>
<html>
<head>
<script>
function nam()
{
  var nam=/^[a-zA-Z]{4,15}$/;
   if(document.f1.t1.value.search(nam)==-1)
    {
	 alert("Please Enter the correct name!");
	 document.f1.t1.focus();
	 return false;
	 }
	} 
		function pass()
	{
	var pass=/^[a-zA-Z0-9-_]{6,16}$/;
   if(document.f1.p1.value.search(pass)==-1)
    {
	 alert("Please Enter the correct password!");
	 document.f1.p1.focus();
	 return false;
	 }
	 }
	 
	 	
function vali()
{
  var nam=/^[a-zA-Z]{4,15}$/;
  var pass=/^[a-zA-Z0-9-_]{6,16}$/;
	 if(document.f1.t1.value.search(nam)==-1)
    {
	 alert("Please Enter the correct credentials!");
	 document.f1.t1.focus();
	 return false;
	 }
	  else if(document.f1.p1.value.search(pass)==-1)
    {
	 alert("Please Enter the correct credentials!");
	 document.f1.p1.focus();
	 return false;
	 }
	 	 else 
	{
	 return true;
	 }
	 }
	
</script>
</head>
<link rel="stylesheet" href="../admin/afyaBackend/ourown.css" />
<body background="../apartmentImages/im9.jpeg">

<div><br><h1>TENANTS LOGIN PAGE</h1>
</div>
<br><br><br><br><br>
<div style="width:100%;float:left" align="center" >
<center><fieldset style="background:#FFFFFF;width:300;height:130">
<br>
<table width="200" border="0" align="center">
<form method="post" name="f1" onSubmit="return vali()">
<tr><td colspan="2"><?php echo "<font color='red'>$er</font>";?></td></tr>
  <tr>
    <td width="81"><h4>UserName:</h4  ></td>
    <td width="103"><label>
      <input name="t1" type="text" id="t1" onChange="return nam()">
    </label></td>
  </tr>
  <tr>
    <td><h4>Password:</h4></td>
    <td><input name="p1" type="password" id="p1" onChange="return pass()"></td>
  </tr>
 
  <tr>
    <td colspan="2" align="center"><label>
      <input name="sub" type="submit" id="sub" value="Login">
    </label></td>
   
  </form>
</table>
</fieldset></center>
<a href="../incompletepage.php">Forgot Password.. </a>
</div>

<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
<br><h1><a href="../index.php">Go to website instead.. </a> </h1><br><br>
<div class="clearfix"></div> 
       <!--<center><img src="../../Nyumbaimages/nyu.jpg" width="400" height="150"/> -->
                 <div class="clearfix"></div> 

      
       </div>
       <p></p>
       <p style="text-align: center; padding:0px;">&#169;Copyright-Nyumba Apartments Management System, 2018.</p>


</body>
</html>