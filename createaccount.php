<?php
 ob_start();
 session_start();
 #if( isset($_SESSION[''])!="" ){
 # header("Location: login.php");
# }
 #include_once 'dbconnect.php';
 $servername = "localhost";
$username = "root";
$password = "";
$database="nyumba";
// Create connection
$conn = new mysqli($servername, $username, $password);
mysqli_select_db($conn,$database);

 $error = false;

 if ( isset($_POST['submit']) ) {
  
  // clean user inputs to prevent sql injections
 $fname = trim($_POST['fname']);
  $fname = strip_tags($fname);
  $fname = htmlspecialchars($fname);
  
  $lname = trim($_POST['lname']);
  $lname = strip_tags($lname);
  $lname = htmlspecialchars($lname);

  $email = trim($_POST['email']);
  $email = strip_tags($email);
  $email = htmlspecialchars($email);
  
  $phone = trim($_POST['phone']);
  $phone = strip_tags($phone);
  $phone = htmlspecialchars($phone);

  $idno = trim($_POST['idno']);
  $idno = strip_tags($idno);
  $idno = htmlspecialchars($idno);

   $HouseID = trim($_POST['HouseID']);
  $HouseID = strip_tags($HouseID);
  $HouseID = htmlspecialchars($HouseID);

   $ApartID = trim($_POST['ApartID']);
  $ApartID = strip_tags($ApartID);
  $ApartID = htmlspecialchars($ApartID);

 $marriage = trim($_POST['marriage']);
  $marriage = strip_tags($marriage);
  $marriage = htmlspecialchars($marriage);

  $job= trim($_POST['job']);
  $job= strip_tags($job);
  $job=htmlspecialchars($job);

   $age= trim($_POST['age']);
  $age= strip_tags($age);
  $age=htmlspecialchars($age);

  $psw = trim($_POST['psw']);
  $psw = strip_tags($psw);
  $psw = htmlspecialchars($psw);

  $pswrepeat= trim($_POST['pswrepeat']);
  $pswrepeat= strip_tags($pswrepeat);
  $pswrepeat=htmlspecialchars($pswrepeat);

  $gender=$_POST['gender'];
  
 

   
  // basic name validation
  if (empty($fname)) {
   $error = true;
   $fnameError = "Please enter your first name.";
  } else if (strlen($fname) < 2) {
   $error = true;
   $fnameError = "Name must have atleat 2 characters.";
  } else if (!preg_match("/^[a-zA-Z ]+$/",$fname)) {
   $error = true;
   $fnameError = "Name must contain alphabets and space.";
  }

  if (empty($lname)) {
   $error = true;
   $lnameError = "Please enter your last name.";
  } else if (strlen($lname) < 2) {
   $error = true;
   $lnameError = "Name must have atleat 2 characters.";
  } else if (!preg_match("/^[a-zA-Z ]+$/",$fname)) {
   $error = true;
   $lnameError = "Name must contain alphabets and space.";
  }
  
  //basic email validation
  if ( !filter_var($email,FILTER_VALIDATE_EMAIL) ) {
   $error = true;
   $emailError = "Please enter valid email address.";
  } else {
   // check email exist or not
   $query = " SELECT * FROM tenants WHERE email='$email'";
  $result = mysqli_query($conn, $query);
   
   if(mysqli_num_rows($result)!=0){
    $error = true;
    $emailError = "Provided Email is already in use.";
   }
    //echo "Successfully created an account. Click to log in";
    //<p> <a href="login.php" > LOGIN HERE </a></p>
  }
  // password validation
  if (empty($psw)){
   $error = true;
   $passError = "Please enter password.";
  } else if(strlen($psw) < 6) {
   $error = true;
   $passError = "Password must have at least 6 characters.";
  }
  if($psw=$pswrepeat){

  // password encrypt using SHA256();
  $password = hash('sha256', $psw);
  } else{
    $error=true;
    $pswError="passwords do not match";
    unset($psw);
    unset($pswrepeat);
  }
  // if there's no error, continue to signup
  if( !$error ) {
   
   //$query1 = "INSERT INTO Tenants(Firstname, Lastname, Password, Email, AccountID, Phone, ID_Number) VALUES('$fname','$lname','$password','$email','','$phone','$idno')";

   $query= "INSERT INTO tenants ('', '$fname','$lname','$phone','$email','$idno','$job','$age', '$gender','$marriage',NOW(),'$HouseID','$ApartID','','$password')";
   //$query="INSERT into createaccount('$fname','$lname','$psw','$email','','$phone','$idno','$gender')";
  
   $res = mysqli_query($conn, $query);
    
   if (!$res) {
$errTyp = "danger";
    $errMSG = "Something went wrong, try again later."; 
    
    
   } else {
    
$errTyp = "success";
    $errMSG = "Successfully registered, you may login now";
    unset($fname);
    unset($lname);
    unset($phone);
    unset($HouseID);
    unset($ApartID);
unset($age);
unset($marriage);
unset($job);
unset($gender);
    unset($idno);
    unset($psw);
     unset($repeatpsw);
   } 
    
  }
}
?>


<!DOCTYPE html>
<html>
<head>
<style>
body {font-family: Arial, Helvetica, sans-serif;}
* {box-sizing: border-box}
/* Full-width input fields */
input[type=text], input[type=password] {
    width: 100%;
    padding: 15px;
    margin: 5px 0 22px 0;
    display: inline-block;
    border: none;
    background: #f1f1f1;
}

/* Add a background color when the inputs get focus */
input[type=text]:focus, input[type=password]:focus {
    background-color: #ddd;
    outline: none;
}

/* Set a style for all buttons */
button {
    background-color: #4CAF50;
    color: white;
    padding: 14px 20px;
    margin: 8px 0;
    border: none;
    cursor: pointer;
    width: 100%;
    opacity: 0.9;
}

button:hover {
    opacity:1;
}

/* Extra styles for the cancel button */
.cancelbtn {
    padding: 14px 20px;
    background-color: #f44336;
}

/* Float cancel and signup buttons and add an equal width */
.cancelbtn, .signupbtn {
  float: left;
  width: 50%;
}

/* Add padding to container elements */
.container {
    padding: 16px;
    background-color: #f1f1f1;
}

/* The Modal (background) */
.modal {
    display: none; /* Hidden by default */
    position: fixed; /* Stay in place */
    z-index: 1; /* Sit on top */
    left: 0;
    top: 0;
    width: 100%; /* Full width */
    height: 100%; /* Full height */
    overflow: auto; /* Enable scroll if needed */
    background-color: #474e5d;
    padding-top: 50px;
}

/* Modal Content/Box */
.modal-content {
    background-color: #fefefe;
    margin: 5% auto 15% auto; /* 5% from the top, 15% from the bottom and centered */
    border: 1px solid #888;
    width: 80%; /* Could be more or less, depending on screen size */
}

/* Style the horizontal ruler */
hr {
    border: 1px solid #f1f1f1;
    margin-bottom: 25px;
}
 
/* The Close Button (x) */
.close {
    position: absolute;
    right: 35px;
    top: 15px;
    font-size: 40px;
    font-weight: bold;
    color: #f1f1f1;
}

.close:hover,
.close:focus {
    color: #f44336;
    cursor: pointer;
}

/* Clear floats */
.clearfix::after {
    content: "";
    clear: both;
    display: table;
}
/*input {
    width: 100%;
    padding: 12px;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
    margin-top: 6px;
    margin-bottom: 16px;
}*/

/* Style the submit button */
input[type=submit] {
    background-color: grey;
    color: white;
}

/* Style the container for inputs */


#message {
    display:none;
    background: #f1f1f1;
    color: #000;
    position: relative;
    padding: 20px;
    margin-top: 10px;
}

#message p {
    padding: 10px 35px;
    font-size: 18px;
}

/* Add a green text color and a checkmark when the requirements are right */
.valid {
    color: green;
}

.valid:before {
    position: relative;
    left: -35px;
    content: "✔";
}

/* Add a red text color and an "x" when the requirements are wrong */
.invalid {
    color: red;
}

.invalid:before {
    position: relative;
    left: -35px;
    content: "x";
}

/* Change styles for cancel button and signup button on extra small screens */
@media screen and (max-width: 300px) {
    .cancelbtn, .signupbtn {
       width: 100%;
    }
}
</style>
</head>
<body>
<center>
<h2>Are you a new tenant in one of our apartments? Sign up to create an account</h2>

<button onclick="document.getElementById('id01').style.display='block'" style="width:auto;">Sign Up</button>

<form method="POST" action="tenants/index.php">
<h3>Please Log in here if you already have an account</h3>
<input type="submit" name="login" value="   LOGIN here    "/>
</form>
</center>
<a href="index.php"> Go back to website</a>
<div id="id01" class="modal">
  <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">&times;</span>
  <form class="modal-content" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST" autocomplete="off" >
    <div class="container">
      <h1>Welcome New Tenant</h1>
      <p>House Details.</p>
<label for="ApartID"><b>Apartment ID</b></label>
    <input type="text" placeholder="Enter Apartment ID issued to you" name="ApartID" title="Must contain digits." required>
      <label for="HouseID"><b>House ID</b></label>
    <input type="text" placeholder="Enter house ID issued to you" name="HouseID" title="Must contain only digits." required>

      <p>Personal Details.</p>
      <hr>
               <?php
   if ( isset($errMSG) ) {
    
    ?>
    <div>
             <div class="alert alert-<?php echo ($errTyp=="success") ? "success" : $errTyp; ?>">
    <span ></span> <?php echo $errMSG; ?>
                </div>
             </div>
                <?php
   }
   ?>
    
      <label for="firstname"><b>Firstname</b></label>
    <input type="text" placeholder="Enter first name" name="fname" title="Must contain only letters, no digits." required>

    <label for="lastname"><b>Lastname</b></label>
    <input type="text" placeholder="Enter last name" name="lname"  title="Must contain only letters, no digits." required>
<p>
      <label for="email"><b>Email</b></label>
      <input type="email" placeholder="Enter Email" name="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$" title="Must be a valid email address"   required>
</p>
      <p><label for="phone"><b>Phone Number</b></label>
      <input type="tel" placeholder="Enter phone number" name="phone" pattern="\d*" maxlength="12" title="Must contain a valid phone number beginning with 254..."  required>
</p>
      <p><label for="gender"><b>Select Gender</b></label>
      <input type="radio" name="gender" value="female">Female
<input type="radio" name="gender" value="male">Male
<input type="radio" name="gender" value="other">Other</p>
<p>
      <label for="idno"><b>ID Number</b></label>
      <input type="text" placeholder="Enter ID number" name="idno" required>
</p>
<p>
      <label for="job"><b>Job</b></label>
      <input type="text" placeholder="Enter ID job" name="job" required>
</p>
<p>
      <label for="marriage"><b>Marital Status </b></label>
      <input type="text" placeholder="Enter if married or single" name="marriage" required>
</p>
<p>
      <label for="age"><b>Age</b></label>
      <input type="text" placeholder="Enter age" name="age" required>
</p>

      <label for="psw"><b>Password</b></label>
      <input type="password" id="psw" placeholder="Enter Password" name="psw" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 6 or more characters" required>

      <label for="psw-repeat"><b>Repeat Password</b></label>
      <input type="password" placeholder="Repeat Password" name="pswrepeat" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,}" title="Passwords must match and contain at least 6 characters"required>


      <label>
        <input type="checkbox" checked="checked" name="remember" style="margin-bottom:15px"> Remember me
      </label>

      <p>By creating an account you agree to our <a href="incompletepage.php" style="color:dodgerblue">Terms & Privacy</a>.</p>

      <div class="clearfix">
        <button type="button" onclick="document.getElementById('id01').style.display='none'" class="cancelbtn">Cancel</button>
        <button type="submit" name="submit" class="signupbtn">Sign Up</button>
      </div>
    </div>
  </form>

</div>
  <div id="message">
  <h3>Password must contain the following:</h3>
  <p id="letter" class="invalid">A <b>lowercase</b> letter</p>
  <p id="capital" class="invalid">A <b>capital (uppercase)</b> letter</p>
  <p id="number" class="invalid">A <b>number</b></p>
  <p id="length" class="invalid">Minimum <b>8 characters</b></p>
</div>
      <script>
// Get the modal
var modal = document.getElementById('id01');

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}
</script>  
<script>
var myInput = document.getElementById("psw");
var letter = document.getElementById("letter");
var capital = document.getElementById("capital");
var number = document.getElementById("number");
var length = document.getElementById("length");

// When the user clicks on the password field, show the message box
myInput.onfocus = function() {
    document.getElementById("message").style.display = "block";
}

// When the user clicks outside of the password field, hide the message box
myInput.onblur = function() {
    document.getElementById("message").style.display = "none";
}

// When the user starts to type something inside the password field
myInput.onkeyup = function() {
  // Validate lowercase letters
  var lowerCaseLetters = /[a-z]/g;
  if(myInput.value.match(lowerCaseLetters)) {  
    letter.classList.remove("invalid");
    letter.classList.add("valid");
  } else {
    letter.classList.remove("valid");
    letter.classList.add("invalid");
  }
  
  // Validate capital letters
  var upperCaseLetters = /[A-Z]/g;
  if(myInput.value.match(upperCaseLetters)) {  
    capital.classList.remove("invalid");
    capital.classList.add("valid");
  } else {
    capital.classList.remove("valid");
    capital.classList.add("invalid");
  }

  // Validate numbers
  var numbers = /[0-9]/g;
  if(myInput.value.match(numbers)) {  
    number.classList.remove("invalid");
    number.classList.add("valid");
  } else {
    number.classList.remove("valid");
    number.classList.add("invalid");
  }
  
  // Validate length
  if(myInput.value.length >= 8) {
    length.classList.remove("invalid");
    length.classList.add("valid");
  } else {
    length.classList.remove("valid");
    length.classList.add("invalid");
  }
}
</script>




</body>
</html>
<?php ob_end_flush(); ?>