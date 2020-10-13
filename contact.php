<?php

$servername = "localhost";
$username = "root";
$password = "";
$database="nyumba";
// Create connection
$conn = new mysqli($servername, $username, $password);
mysqli_select_db($conn,$database);

if (isset($_POST['submit'])) {
  $firstname=$_POST['fname'];
  $lastname=$_POST['lname'];
  $email=$_POST['email'];
  //$county=$_POST['county'];
  $subject=$_POST['subject'];


  $sql= "INSERT INTO ContactDetails(Firstname, LastName, Email, Subject, CID) VALUES ('$firstname','$lastname','$email','$subject','')";
  $result=mysqli_query($conn, $sql);

  #if(!mysqli_query($conn, $sql)){
  if(!$result)
{

    echo "Not inserted";
  } else{
    echo "Values inserted";
  }
  
  
#$sql = "INSERT INTO comments (uid, date, message) VALUES ('".$uid."', '".$date."', '".$message."')"


}

mysqli_close($conn);

?>


<?php
$title = "contact";
$content = '<style>input[type=text], select, textarea {
    width: 100%;
    padding: 12px;
    border: 1px solid #ccc;
    margin-top: 6px;
    margin-bottom: 16px;
    resize: vertical;
}

input[type=submit] {
    background-color: #4CAF50;
    color: white;
    padding: 12px 20px;
    border: none;
    cursor: pointer;
}

input[type=submit]:hover {
    background-color: #45a049;
}

/* Style the container/contact section */
.container {
    border-radius: 5px;
    background-color: #f2f2f2;
    padding: 10px;
}

/* Create two columns that float next to eachother */
.column {
    float: left;
    width: 50%;
    margin-top: 6px;
    padding: 20px;
}

/* Clear floats after the columns */
.row:after {
    content: "";
    display: table;
    clear: both;
}

/* Responsive layout - when the screen is less than 600px wide, make the two columns stack on top of each other instead of next to each other */
@media screen and (max-width: 600px) {
    .column, input[type=submit] {
        width: 100%;
        margin-top: 0;
    }
}
</style>
</head>


<h2>Contact Us:</h2>
<p><h4>
Email Us: <a href="mailto:nyumbaapartments@gmail.com">nyumbaapartments@gmail.com</a><br>
Call now:<a href="tel:0708828421">Call Us today</a>
</p></h4>
<div class="container">
  <div style="text-align:center">
    <p>Swing by for a chat with us, or leave us a message:</p>
  </div>
  <div class="row">
    <div class="column">
    </div>
    <div class="column">
      <form method="POST" action="#">
        <label for="fname">First Name</label>
        <input type="text" id="fname" name="fname" placeholder="Your first name.." required>
        <label for="lname">Last Name</label>
        <input type="text" id="lname" name="lname" placeholder="Your last name.." required>
        <label for="email">Email</label>
        <input type="text" id="email" name="email" placeholder="Your email.." required>
        <label for="county">County</label>
        <select id="county" name="county">
          <option value="Nairobi">Nairobi</option>
          <option value="Mombasa">Mombasa</option>
          <option value="Kisumu">Kisumu</option>
        </select>
        <label for="subject">Subject</label>
        <textarea id="subject" name="subject" placeholder="Write something.." style="height:170px"></textarea>
        <input type="submit" value="Submit" name= "submit" required>
      </form>
    </div>
  </div>
</div>

';
$sidebar='<p><h2> FAQs</h2>

<p><h3>
<script type="text/javascript">
function noaccount_alert() {
    alert("No, Not anyone can create an account unless you are a tenant recently moved in to one of our apartments. You will be required to give specific details regarding the apartment and house.");
}
</script>
<a href="#" onclick="return noaccount_alert(this);">Can anyone create an account?</a>
</h3></p>
<br>
<p><h3>
<script type="text/javascript">
function account_alert() {
    alert("Click on Signup, then give your credentials and click the sign up button. NB: Please make sure you are currently a tenant with any of our apartments and give accurate personal and house details as required.");
}
</script>
<a href="createaccount.php" onclick="return account_alert(this);">How to create an account</a>
</h3></p>

<br>
<p><h3>
<script type="text/javascript">
function login_alert() {
    alert("Provide your correct username and password then click log in to be redirected to your portal.");
}
</script>
<a href="tenants/index.php" onclick="return login_alert(this);"> How to log in to your account.</a></h3></p>

<br>
<p><h3>
<script type="text/javascript">
function pass_alert() {
    alert("Go to portal login and click on forgot password. You will be redirected to a page with instructions on how to recover or change your password");
}
</script>
<a href="login.php" onclick="return pass_alert(this);"> Forgot your password.</a></h3></p>
<br>

<br>
<p><h3>
<script type="text/javascript">
function pay_alert() {
    alert("The tenant must be logged in to the tenants portal. Click on Pay rent to provide details of your transactions. If verified and found to be valid by the landlord, the tenant can then View and download transaction report as required.");
}
</script>
<a href="#" onclick="return pay_alert(this);"> How show that you paid rent.</a></h3></p>
<br>
<br>
<p><h3>
<script type="text/javascript">
function vacate_alert() {
    alert("The tenant must be logged in to the tenants portal. Click on vacate notice and fill the form provided. The landlord will be able to verify and get back to you. Kindly ensure that you give your notice a month in advance for proper planning, organization and refunds if any.");
}
</script>
<a href="#" onclick="return vacate_alert(this);"> How give a notice to vacate the building.</a></h3></p>
<br>

<br>
<p><h3>
<script type="text/javascript">
function landlord_alert() {
    alert("Due to security reasons, the landlords with verified apartments can only be added to our system by the admin. Get in touch with the admin using our phone numbers and emails provided and we will get back to you.");
}
</script>
<a href="#" onclick="return landlord_alert(this);"> Landlord- How to add your apartment to our Management System.</a></h3></p>
<br>

   
</p>';
include 'template.php';
?>



