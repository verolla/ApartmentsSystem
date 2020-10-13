
<?php
$title = "home";
$content = '

<form method="GET" action="search.php" >
  <input type="text" name="query" size="60" maxlength="80" placeholder="Search  for apartments.."/>
  <input type="submit" name="submit" value="  GO  " />
</form>
<h2>Live In Your Best Home At Best Price With Us!</h2></p>
<h4><span style="font-size:1.371em;color:rgba(53,53,53,1);">Manage your apartments with us within no time. We offer 24-hour customer care services for both you and your tenants. This is your one stop solution. We are here to make both you and your tenants happy!</span></p><p style="margin:0.36em 0em 0.36em 0em;text-align:Center;"></span> </h4>
<div class="slideshow-container">

<div class="mySlides fade">
  <div class="numbertext">1 / 3</div>
  <img src="Nyumbaimages/slide0.jpg" style="width:100%">
  <div class="text">prestigious</div>
</div>

<div class="mySlides fade">
  <div class="numbertext">2 / 3</div>
  <img src="Nyumbaimages/slide1.jpg" style="width:100%">
  <div class="text">Fully furnished</div>
</div>

<div class="mySlides fade">
  <div class="numbertext">3 / 3</div>
  <img src="Nyumbaimages/slide2.jpg" style="width:100%">
  <div class="text">comfy</div>
</div>

</div>
<br>

<div style="text-align:center">
  <span class="dot"></span> 
  <span class="dot"></span> 
  <span class="dot"></span> 
</div>

<script>
var slideIndex = 0;
showSlides();

function showSlides() {
    var i;
    var slides = document.getElementsByClassName("mySlides");
    var dots = document.getElementsByClassName("dot");
    for (i = 0; i < slides.length; i++) {
       slides[i].style.display = "none";  
    }
    slideIndex++;
    if (slideIndex > slides.length) {slideIndex = 1}    
    for (i = 0; i < dots.length; i++) {
        dots[i].className = dots[i].className.replace(" active", "");
    }
    slides[slideIndex-1].style.display = "block";  
    dots[slideIndex-1].className += " active";
    setTimeout(showSlides, 5000); // Change image every 5 seconds
}
</script>
<p> <span style="font-size:1.371em;color:rgba(53,53,53,1);">Save time, money and energy while managing your apartment. Manage with us, make us your apartments solution for reliable, better and quality services. We manage your apartments for you efficiently so that you can have time to do other things.</span></p>';
$sidebar='<p>
    <p><h4>Latest Apartments!!</h4></p>
<p><center><img src="apartmentsImages/im14.jpeg" width="250" height="200"><center></p>
<p>
 <span style="font-size:1.571em;color:rgba(53,53,53,1);">Mkenya Apartment</span></p><p style="margin:0.36em 0em 0.36em 0em;text-align:Center;"><span style="font-style:italic;font-weight:300;font-size:1.143em;color:rgba(255,111,5,1);">4 Storey | 2 BedRoom | 1 Bathroom</span></p><p style="margin:0.71em 0em 0.36em 0em;text-align:Center;line-height:1.54929577464789;"><span style="font-weight:300;font-size:1.071em;color:rgba(102,102,102,1);">This is definition of serenity giving the much needed calm and quiet away from the noisy CBD.<a href="incompletepage.php"> See more</a></span>
</p>
<p>
<p><center><img src="apartmentsImages/im15.jpg" width="250" height="200" ><center></p>
<p>
 <span style="font-size:1.571em;color:rgba(53,53,53,1);">Victory Apartment</span></p><p style="margin:0.36em 0em 0.36em 0em;text-align:Center;"><span style="font-style:italic;font-weight:300;font-size:1.143em;color:rgba(255,111,5,1);">2 Storey | 3 BedRoom | 2 Bathroom</span></p><p style="margin:0.71em 0em 0.36em 0em;text-align:Center;line-height:1.54929577464789;"><span style="font-weight:300;font-size:1.071em;color:rgba(102,102,102,1);">Need your place to recharge after the daily hustle then this is the place for you..<a href="incompletepage.php"> See more</a>
</p>
';

include 'template.php';
?>






