<!DOCTYPE html>
<html>
<title>NIShub</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="../templates/stylish.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
body,h1,h2,h3,h4,h5,h6 {
    font-family: "Raleway", sans-serif;
    font-size: 20px;
    }

body, html {
  height: 100%;
  line-height: 1.8;
}

/* Full height image header */
.bgimg-1 {
  background-position: center;
  background-size: cover;
  background-image: URL("https://critiquingchemist.files.wordpress.com/2018/11/img_3810.jpg?w=723");
  min-height: 100%;
}

.w3-bar .w3-button {
  padding: 16px;
}
</style>
<body>

<!-- Navbar (sit on top) -->
<div class="top">
  <div class="bar white card" id="myNavbar">
    <a href="#home" class="bar-item button wide">NIShub</a>
    <!-- Right-sided navbar links -->
    <div class="right hide-small">
      <a href="#about" class="bar-item button">ABOUT</a>
      <a href="#contact" class="bar-item button"></i> CONTACT</a>
<a href="../index.php" class="bar-item button"></i> LOG IN</a>
      <a href="../process/sign-up-page.php" class="bar-item w3-button"></i> SIGN UP</a>
    </div>
    
    <!-- Hide right-floated links on small screens and replace them with a menu icon -->
    <a href="javascript:void(0)" class="w3-bar-item button right hide-large hide-medium" onclick="open()">
      <i class="fa fa-bars"></i>
    </a>
  </div>
</div>

<!-- Header with full-height image -->
<header class="bgimg-1 display-container grayscale-min" id="home">
  <div class="display-left text-white" style="padding:48px">
    <span class="jumbo hide-small">Join the NIShub community</span><br>
    <span class="xxlarge hide-large hide-medium">Join the NIShub community</span><br>
    <span class="large">Become a member of a big family. Journey starts here.</span>
    <p><a href="#about" class="button white padding-large large margin-top opacity hover-opacity-off">Learn more.</a></p>
</header>

<!-- About Section -->
<div class="container" style="padding:128px 16px" id="about">
  <h3 class="center">ABOUT THE NIShub</h3>
  <p class="center large">Key features</p>
  <div class="row-padding center" style="margin-top:64px">
    <div class="quarter">
      <i class="fa fa-database margin-bottom jumbo center"></i>
      <p class="large">Location</p>
      <p>Is the system where you can store all of your data and have access to it at any time and at any place.</p>
    </div>
    <div class="quarter">
      <i class="fa fa-heart margin-bottom jumbo"></i>
      <p class="large">Comfortable</p>
      <p>Everything you need to study is already there. You did not need to desturb since all teachers, curators and students is linked on one network.</p>
    </div>
    <div class="quarter">
      <i class="fa fa-diamond margin-bottom jumbo"></i>
      <p class="large">Design</p>
      <p>User-friendly design that is easy to use.</p>
    </div>
    <div class="quarter">
      <i class="fa fa-group margin-bottom jumbo"></i>
      <p class="large">Unique</p>
      <p>This network is the unique system that is adapted to NIS schools that includes some features of it.</p>
    </div>
  </div>
</div>

<div class="container light-grey" style="padding:128px 16px">
<div class="row-padding">
    <div class="col m6">
      <br/>
       <br/>
        <br/>
      <h3>Who we are?</h3>
      <p>We are the community that is joined at one system. Every individual who involved in NIS will find something interesting and beneficial.</p>
    </div>
    <div class="col m6">
      <img class="image round-large" src="https://i.pinimg.com/originals/12/76/c8/1276c846396d6bea3232a8d455c7d253.jpg" width="700" height="394">
    </div>
  </div>
</div>


<div class="container" style="padding:128px 30px" id="contact">
  <h3 class="center">CONTACT</h3>
  <p class="center large">Send us a message:</p>
  <div style="margin-top:48px">
    <p><i class="fa fa-phone fa-fw xxlarge margin-right"></i> Phone: +7 707 778 88 99</p>
    <p><i class="fa fa-envelope fa-fw xxlarge margin-right"> </i> Email: nishub@mail.com</p>
    <br>
    <form action="./sendmess.php" method="POST">
      <p><input class="input border" type="email" placeholder=" Enter your mail" required name=" Mymail"></p>
      <p><input class="input border" type="email" placeholder=" Enter reciever's mail" required name="Email"></p>
      <p><input class="input border" type="text" placeholder="Subject" required name="Subject"></p>
      <p><input class="input border" type="text" placeholder="Message" required name="Message"></p>
      <p>
        <button class="button black" type="submit">
          <i class="fa fa-paper-plane"></i> SEND MESSAGE
        </button>
      </p>
    </form>
  </div>
</div>

<!-- Footer -->
<footer class="center black padding-64">
  <a href="#home" class="button light-grey"><i class="fa fa-arrow-up margin-right"></i>To the top</a>
</footer>
 
<script>
// Modal Image Gallery
function onClick(element) {
  document.getElementById("img01").src = element.src;
  document.getElementById("modal01").style.display = "block";
  var captionText = document.getElementById("caption");
  captionText.innerHTML = element.alt;
}
// Toggle between showing and hiding the sidebar when clicking the menu icon
var mySidebar = document.getElementById("mySidebar");

function open() {
  if (mySidebar.style.display === 'block') {
    mySidebar.style.display = 'none';
  } else {
    mySidebar.style.display = 'block';
  }
}

// Close the sidebar with the close button
function close() {
    mySidebar.style.display = "none";
}
</script>

</body>
</html>