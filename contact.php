<!DOCTYPE html>
<html>
<head>
<?php  
include('assets/layout/layouts/header.php');
?>

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
        <li><a class="faicon-facebook" href="#"><i class="fa fa-facebook"></i></a></li>
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
        <li><a href="index.php">Home</a></li>
        <li><a href="about.php">About</a></li>
        <li class="active"><a href="#">Contact</a></li>
        <li><a href="login.php">Login</a></li>
      </ul>
    </nav>
 
  </header>
</div>


<div class="wrapper row2 bg bg-primary" style="background-color:white">
  <main class="container clear"> 
    <div class="group">
       <div class="container">
            <div class="row">
                  <div class="col-md-4">
                    <br>
                    <h3>Contact Info.</h3>
                    <ul class="contact-info" style="list-style-type:none">
                      <li><i class="fa fa-map-marker"></i>&nbsp;UNIT 3B#37 Diego Silang St,Project 4 Brgy San Roque QC</li><br>
                      <li><i class="fa fa-phone"></i>&nbsp;(02) 912 5869</li><br>
                      <li><i class="fa fa-envelope"></i>&nbsp;searchandsecurek9@gmail.com</li>
                    </ul>
                  </div>
                  <div class="col-md-8 col-md-push-1 col-sm-12 col-sm-push-0 col-xs-12 col-xs-push-0">
                    <br>
                    <div class="row">
                        <div class="col-md-6">
                        <div class="form-group">
                          <input class="form-control" placeholder="Name" type="text" id="name" name="name">
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <input class="form-control" placeholder="Email" type="text" id="email" name="email">
                        </div>
                      </div>
                      <div class="col-md-12">
                        <div class="form-group">
                          <textarea name="" class="form-control" cols="30" rows="7" placeholder="Message" id="message" name="message"></textarea>
                        </div>
                      </div>
                      <div class="col-md-12">
                        <div class="form-group">
                          <button class="btn btn-primary" type="button" id="btnsendmessage">Send Message</button>
                        </div>
                      </div>
                              
                    </div>
                  </div>
                  
            </div>
       </div>  
     </div>
  </main>     
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
  $(function(){
       var config = {
           apiKey: "AIzaSyC2YYK_aIkHlHlhivxD_AghsxxUF9pFvEk",
           authDomain: "searchand-f8856.firebaseapp.com",
           databaseURL: "https://searchand-f8856.firebaseio.com",
             projectId: "searchand-f8856",
           storageBucket: "searchand-f8856.appspot.com",
           messagingSenderId: "743668634306"
        };
       firebase.initializeApp(config);
       var Message = firebase.database().ref("Messages");
       $("#btnsendmessage").click(function(e){
                    var name = $("#name").val();
                    var email = $("#email").val();
                    var msg = $("#message").val();
                   Message.push({
                       Name: name,
                       Email_Address:email,
                       Message: msg
          });
             
          e.preventDefault();

      }); 
  });
</script>
</body>
</html>