<!DOCTYPE html>
<html>
<head>
 <?php include('assets/layout/layouts/header.php');?>
 <?php include('authentication/isCookie.php');?>

</style>
</head>
<body id="top">



<div class="wrapper row0">
  <div id="topbar" class="clear"> 
    <div class="fl_left">
      <ul class="nospace inline">
        <li><i class="fa fa-phone"></i> (02) 912 5869</li>
        <li><i class="fa fa-envelope-o"></i> searchandsecurek9@gmail.com</li>
      </ul>
    </div>
    <div class="fl_right">
      <ul class="faico clear">
        <li><a class="faicon-facebook" href="https://web.facebook.com/sascanine/"><i class="fa fa-facebook"></i></a></li>
        <li><a class="faicon-twitter" href="#"><i class="fa fa-twitter"></i></a></li>
        <li><a class="faicon-google-plus" href="#"><i class="fa fa-google-plus"></i></a></li>
      
      </ul>
    </div>
 
  </div>
</div>



<div class="wrapper row1">
     <header id="header" class="clear"> 
          <div id="logo" class="fl_left">
            <h1><a href="index.html"><img src="images/logo.png" style="width:50px;position:relative;top:-10px"/></a></h1>
          </div>
          <nav id="mainav" class="fl_right">
            <ul class="clear">
              <li class="active"><a href="index.php">Home</a></li>
              <li><a href="about.php">About</a></li>
              <li><a href="contact.php">Contact</a></li>
              <li><a href="login.php" data-toggle="modal" id="login">Login</a></li>
            </ul>
          </nav>
     </header>
</div>
<div class="col-md-12">
  <center><img src="images/slide_14.jpg" style="width:90%;height:500px"></center>
</div>


  

<div class="wrapper row2">
    <div id="services" class="clear"> 
        <center><h1 style="font-size:200%;font-family:arial">Welcome To Search And Secure</h1></center>
    <div class="clear"></div>
  </div>
</div>



<div class="wrapper row4">
  <footer id="footer" class="clear"> 
    <h2 class="underlined btmspace-50">Search And Secure</h2>
    <div class="group">
      <div class="one_third first">
        <address>
        Search And Secure<br>
        Street Name &amp; UNIT 3B#37 Diego Silang St,Project 4 Brgy San Roque QC
        </address>
      </div>
      <div class="one_third">
        <ul class="nospace">
          <li class="btmspace-10"><span class="fa fa-phone"></span> (02) 912 5869</li>
          <li><span class="fa fa-envelope-o"></span> searchandsecurek9@gmail.com</li>
        </ul>
      </div>
      <div class="one_third">
        <ul class="faico clear">
          <li><a class="faicon-facebook" href="#"><i class="fa fa-facebook"></i></a></li>
          <li><a class="faicon-twitter" href="#"><i class="fa fa-twitter"></i></a></li>
          <li><a class="faicon-google-plus" href="#"><i class="fa fa-google-plus"></i></a></li>
        </ul>
      </div>
    </div>
 
  </footer>
</div>


<div class="wrapper row5">
  <div id="copyright" class="clear"> 
    <p class="fl_left">Copyright &copy; 2017 - All Rights Reserved - <a href="#">Search And Secure</a></p>
  </div>
</div>

<?php include('assets/layout/layouts/footer.php');?>
<script>
 $(document).ready(function(){
       $(window).load(function() {
        $('#slider').nivoSlider();
     });
 });   
</script>
</body>
</html>