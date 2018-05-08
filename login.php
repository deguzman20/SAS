<!DOCTYPE html>
<html>
<head>

 <?php include('assets/layout/layouts/header.php');
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
              <li><a href="contact.php">Contact</a></li>
              <li class="active"><a href="#" data-toggle="modal" id="login">Login</a></li>
            </ul>
          </nav>
     </header>
</div>




<div class="wrapper row3">
  <main class="container clear"> 
    <div class="group">
       <div class="two_third">
             <div class="col-md-8 col-md-offset-4">
                         <span id="message"></span>
                         <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                            <input id="username" type="text" class="form-control" name="username" placeholder="Username...">
                         </div>
                         <br>
                         <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-lock" style="font-size:21px"></i></span>
                            <input id="password" type="password" class="form-control" name="password" placeholder="Password...">
                         </div>
                         <br>
                        <button class="btn btn-success pull-right" id="btn_login">Login</button> 
              </div>           
          </div>
    </div>
    <div class="clear"></div>
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
         $("#btn_login").click(function(){
                          var username = $("#username").val();
                          var password = $("#password").val();
                          dataString = "user="+username+"&pass="+password;                
                          if(username.length==0 || password.length==0)
                          {
                              $("#message").html("<div class='alert alert-warning'><i class='fa fa-warning'></i>&nbsp;Please fillup required field</div>");
                          }  
                          else{
                                $.ajax({
                                  url:"adminlogin.php",
                                  type:"POST",
                                  data:dataString,
                                        success:function(data)
                                        {
                                         if(data=="Login Failed")
                                         { 
                                           $("#message").html("<div class='alert alert-danger'><i class='fa fa-remove'></i>&nbsp;"+data+"</div>");
                                         }  
                                         else if(data=="Login Successfully")
                                         {
                                          $("#message").html("<div class='alert alert-success'><i class='fa fa-check'></i>&nbsp;"+data+"</div>");
                                            window.location.href="admin/dashboard.php";    
                                         }
                                        },
                                        error:function(err)
                                        {

                                        }
                                    });
                          }
        });     
  }); 
</script>
</body>
</html>