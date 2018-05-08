<!DOCTYPE html>
<html lang="en">

<head>
     <?php require_once '../authentication/isCookieInAdmin.php';?>
       <?php include('admin-header.php');?>
</head>

<body>
    <div class="wrapper">
               <div class="sidebar" data-color="red" data-image="../assets/img/sidebar-1.jpg">
                           <div class="logo">
                              <img src="../images/logo.png" height="100px" width="100px" style="position:relative;left:65px">
                            </div>
                            <div class="sidebar-wrapper">
                                <ul class="nav">
                                    <li>
                                        <a href="dashboard.php">
                                            <i class="material-icons">dashboard</i>
                                            <p>Dashboard</p>
                                        </a>
                                    </li>
                                    <!-- <li>
                                        <a href="./pending_user.php">
                                            <i class="material-icons">person</i>
                                            <p>Pending User</p>
                                        </a>
                                    </li> -->
                                    <li>
                                        <a href="./handler.php">
                                            <i class="fa fa-user"></i>
                                            <p>Manage Handler</p>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="./oic.php">
                                            <i class="fa fa-tasks"></i>
                                            <p>Manage OIC</p>
                                       </a>
                                    </li>
                                    <li>
                                        <a href="./dog.php">
                                            <i class="fa fa-paw"></i>
                                            <p>Manage Dog</p>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="./message.php">
                                            <i class="material-icons">library_books</i>
                                            <p>Manage Message</p>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="./client.php">
                                            <i class="fa fa-briefcase"></i>
                                            <p>Manage Client</p>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="./map.php">
                                            <i class="fa fa-map"></i>
                                            <p>Online Handlers</p>
                                        </a>
                                    </li>
                                    <li class="active">
                                        <a href="./setting.php">
                                            <i class="fa fa-cog"></i>
                                            <p>Account Setting</p>
                                        </a>
                                    </li>
                                </ul>
                            </div>
               </div>
               <div class="main-panel">
                         <nav class="navbar navbar-transparent navbar-absolute">
                           <div class="container-fluid">
                              <div class="navbar-header">
                                <button type="button" class="navbar-toggle" data-toggle="collapse">
                                    <span class="sr-only">Toggle navigation</span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                </button>
                               </div>
                               <div class="collapse navbar-collapse">
                                <ul class="nav navbar-nav navbar-right">
                                    <li>
                                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                            <i class="material-icons">person</i><?php echo $_COOKIE['user']?>
                                            <p class="hidden-lg hidden-md">Profile</p>
                                        </a>
                                    </li>
                                    <li>
                                      <?php 
                                          if(isset($_POST['logout']))
                                          {
                                             header("location:../index.php");
                                             setcookie('user',$_COOKIE['user'], time() -1, "/");
                                          } 
                                      ?>   
                                      <form method="post">  
                                        <input type="submit" name="logout" value="Logout" class="btn">
                                      </form>  
                                    </li>
                                </ul>
                               </div>
                           </div>
                         </nav>
                       <div class="main-panel" style="width:60%;height:470px;left:-20%;position:relative;top:100px;background-color:white;padding:20px;box-shadow:2px 3px 10px gray">
                           <?php
                             $conn = mysqli_connect('localhost','root','','searchandsecure');
                             $current_user = $_COOKIE['user'];
                             $query = mysqli_query($conn,"SELECT * FROM tbl_admin WHERE username='$current_user'");
                             if(mysqli_num_rows($query)>0)
                             {
                                  while($rows = mysqli_fetch_assoc($query))
                                  {


                           ?>     <div class="col-md-12" style="background-color:rgba(244,67,54,1);">
                                     <h4 style="color:white"><span class="fa fa-cog"></span>&nbsp;Account Settings</h4>
                                  </div>
                                  <div class="col-md-6 col-md-offset-3">
                                    <br>
                                    <label>Username:</label><br>
                                    <input type="text" class="form-control" value="<?php echo $rows['username']?>" id="username" disabled="disabled">
                                  </div>
                                  <div class="col-md-6 col-md-offset-3">
                                   <br>
                                    <label>Password:</label><br>
                                    <input type="password" class="form-control" value="<?php echo $rows['password']?>" id="pass" disabled="disabled">
                                  </div>

                                  <div class="col-md-6 col-md-offset-3" id="confirmpass_wrapper">
                                  <br>
                                   <label>Confirm Password:</label><br>
                                    <input type="password" class="form-control" id="confirm-pass">
                                    <div id="confirmpass_message"></div>
                                  </div>
                                  <div class="col-md-6 col-md-offset-3" id="editpass_wrapper">
                                    <button type="button" class="btn btn-success pull-right" id="edit_pwd">Edit Password</button>
                                  </div>
                                  <div class="col-md-12" id="btnchangepass_wrapper">
                                    <button type="button" class="btn btn-danger pull-right" id="cancel">Cancel</button>
                                     <button type="button" class="btn btn-success pull-right" id="change_pwd">Change Password</button>
                                  </div>  


                           <?php
                                  }
                             }
                           ?>
                       </div>
               </div>
    </div>           
</body>
       <?php include('admin-footer.php');?>
<script>
  $(document).ready(function(){
    $("#confirmpass_wrapper,#btnchangepass_wrapper").hide();
    $("#edit_pwd").click(function(){
        $("#editpass_wrapper").slideUp();
        $("#confirmpass_wrapper,#btnchangepass_wrapper").slideDown();
        $("#pass").removeAttr("disabled","disabled");
    });
    
    $("#cancel").click(function(){
      $("#confirmpass_wrapper,#btnchangepass_wrapper").slideUp();
      $("#editpass_wrapper").slideDown();
          $("#pass").attr("disabled","disabled");
    });

    $("#confirm-pass").on("keyup",function(){
        var username    = $("#username").val(); 
        var pass        = $("#pass").val();
        var confirmpass = $("#confirm-pass").val();
        if(confirmpass.length>1)
        {
              if(confirmpass==pass)
              {
                       $("#confirmpass_message").html("<span class='fa fa-check'></span>&nbsp;Password match");
                       
                         $("#change_pwd").click(function(){
                               var user        = $("#username").val();
                               var confirmpass = $("#confirm-pass").val();
                               var dataString = "user="+user+"&pass="+pass;

                             $.ajax({
                                 url:"updatePassword.php",
                                 type:"POST",
                                 data:dataString,
                                 success:function(data){
                                    $("#pass").attr("disabled","disabled");
                                    $("#confirmpass_wrapper,#btnchangepass_wrapper").slideUp();
                                    $("#editpass_wrapper").slideDown();
                                 }
                             });
                         });
              }  
              else{
                         $("#confirmpass_message").html("<span class='fa fa-remove'></span>&nbsp;Password not match");
         
              }
        }
        else{
                         $("#confirmpass_message").html("");   
        }
    });
  });
</script>
</html>
  
