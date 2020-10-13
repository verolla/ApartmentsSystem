<?php 
$servername = "localhost";
$username = "root";
$password = "";
$database="nyumba";
// Create connection
$conn = new mysqli($servername, $username, $password);
mysqli_select_db($conn,$database);

if (isset($_POST['username'])) {
  
  $uname = trim($_POST['username']);
  $uname = strip_tags($uname);
  $uname = htmlspecialchars($uname);

  $pass = trim($_POST['psw']);
  $pass = strip_tags($pass);
  $pass = htmlspecialchars($pass);

  $sql= "select * from createaccount where Firstname='".$uname."' AND Password='".$pass."' limit 1";
  $result=mysqli_query($conn, $sql);


if (mysqli_num_rows($result)!=0) {
  //echo "You have successfully logged in";
  //Direct to tenants portal after log in
  header("Location: tenants/tenantportal.php");///ApartmentsSystem/tenants/tenantportal.php
  exit();
}
else{
echo "You have entered incorrect credentials";
exit();
}
}


?>


<?php
$title = "login";
$content = '<h2>Login to Nyumba Portal</h2>

<form method="POST" action="#">
  <div class="imgcontainer">
    <img src="Nyumbaimages/nyu.jpg" alt="Avatar" class="avatar">
  </div>

  <div class="container">
    
    <label for="user"><b>Username</b></label>
    <input type="text" placeholder="Enter your first name" name="username" required>

    <label for="pass"><b>Password</b></label>
    <input type="password" placeholder="Enter Password" name="psw" required>
        
    <input type="submit" name ="submit" value="  LOGIN  " />
    <label>
      <input type="checkbox" checked="checked" name="remember"> Remember me
    </label>
  </div>

  <div class="container" style="background-color:#f1f1f1">
    <button type="button" class="cancelbtn" action="index.php" >Cancel</button>
    <span class="psw"><a href="incompletepage.php">Forgot password?</a></span>
    <span class="psw"><a href="createaccount.php">Need an account? Sign up instead</a></span>
  </div>
</form>';
$sidebar='<p>
  <p><h4>Fully Furnished Apartments</h4></p>

<p><center><img src="apartmentsImages/im1.jpg" width="250" height="200"><center></p>
<p>
<a href="incompletepage.php">This is definition of serenity giving the much needed calm and quiet away from the noisy CBD.</a>
</p>
<p>
<p><center><img src="apartmentsImages/im3.jpeg" width="250" length="250" ><center></p>
<p>
<a href="incompletepage.php">Our very luxirous and affordable apartments with the state of the art modern facilities and equipment is the place to be.</a>
</p>
</p>';
include 'template.php';
#ßinclude 'dbconnect.php';
?>


