<?php 
$servername = "localhost";
$username = "root";
$password = "vovo";
$database="NyumbaApartments";
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

  if($uname!="veevee"){
echo "incorrect login";
  }
  else{

  

  $sql= "SELECT * from createaccount where Firstname='".$uname."' AND Password='".$pass."' limit 1";
  $result=mysqli_query($conn, $sql);
}

if (mysqli_num_rows($result)!=0) {
  //echo "You have successfully logged in";
  //Direct to tenants portal after log in
  header("Location: adminindex.php");
  exit();
}
else{
echo "You have entered incorrect credentials";
exit();
}
}

?>
<html>
<center><h1> ADMIN LOGIN</h1></center>

<form method="POST" action="#">
  <div class="imgcontainer">
    <center><img src="../Nyumbaimages/nyu.jpg" alt="Avatar" class="avatar"></center>
  </div>
<p>


</p>
  <div class="container">
    
    <center><label for="user"><b>USERNAME</b></label>
    <input type="text" placeholder="Enter your user name" name="username" required>

    <label for="pass"><b>PASSWORD</b></label>
    <input type="password" placeholder="Enter Password" name="psw" required>
        
    <input type="submit" name ="submit" value="  LOGIN  " />
    <label>
      <input type="checkbox" checked="checked" name="remember"> Remember me
    </label></center>
  </div>
  </form>

  </html>