<!doctype html>
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
                    <li class="active">
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
                    <li>
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
                        <!-- <a class="navbar-brand" href="#"> Table List </a> -->
                    </div>
                  <div class="collapse navbar-collapse">
                        <ul class="nav navbar-nav navbar-right">
                            <li>
                                <a href="#pablo" class="dropdown-toggle" data-toggle="dropdown">
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
            <div class="content">
                <div class="container-fluid">
                        
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header" data-background-color="red">
                                    <h4 class="title">Manage Messages</h4>
                                    <p class="category"></p>
                                </div>
                                <div class="card-content table-responsive">
                                    <table class="table" id="tbl_pending_user_list">
                                                <tr>
                                                      <td>Name</td>
                                                      <td>Email Address</td>
                                                      <td>Message</td>
                                                      <td>Action</td> 
                                                </tr> 
                                        <tbody>
                                              
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                     </div>
                </div>
            </div>
        </div>
    </div>
</body>
<?php include('admin-footer.php');?>

 <script>
      // Initialize Firebase
   $(document).ready(function(){
      
               // Initialize Firebase
  var config = {
    apiKey: "AIzaSyC2YYK_aIkHlHlhivxD_AghsxxUF9pFvEk",
    authDomain: "searchand-f8856.firebaseapp.com",
    databaseURL: "https://searchand-f8856.firebaseio.com",
    projectId: "searchand-f8856",
    storageBucket: "searchand-f8856.appspot.com",
    messagingSenderId: "743668634306"
  };
  firebase.initializeApp(config);
      

             

                          var tblHandlers = document.getElementById('tbl_pending_user_list');
                          var dbref = firebase.database().ref('Messages');
                          var rowIndex = 1;


              dbref.on('value',function(snapshot){
                 snapshot.forEach(function(childSnapshot){
                    var childKey = childSnapshot.key;
                    var childData= childSnapshot.val();

                    var row                = tblHandlers.insertRow(rowIndex);
                    var cellName          = row.insertCell(0);
                    var cellEmail         = row.insertCell(1);
                    var cellMessage       = row.insertCell(2);
                    var cellReply         = row.insertCell(3);
                     // cellId.appendChild(document.createTextNode(childKey));
                    cellName.appendChild(document.createTextNode(childData.Name));
                    cellEmail.appendChild(document.createTextNode(childData.Email_Address));
                    cellMessage.appendChild(document.createTextNode(childData.Message));
                 

                    var btnReply = document.createElement("BUTTON");
                    var att = document.createAttribute("class");
                    att.value = "btn btn-success";
                    btnReply.textContent="Reply"; 
                    btnReply.setAttributeNode(att);
                    btnReply.setAttribute("id",childKey);   
                    btnReply.setAttribute("data-toggle","modal");
                    btnReply.setAttribute("data-target","#modalID");
                    btnReply.setAttribute("back-drop","static");
                    btnReply.addEventListener("click", function(){
                            getData(this.id,
                                    childData.Email_Address,
                                    childData.Name);
                             }); 
                    rowIndex+=1; 
                            
                   cellReply.appendChild(btnReply);

                   
                   function getData(id,email,name)
                   {
                       document.getElementById('email').value=email;
                       document.getElementById('name').value=name;
                   }
                  
                    



                 });
                 
              });
          
      
            $("#send").click(function(){
                       var email = $("#email").val();
                       var msg   = $("#message").val();
                       var dataString = "email="+email+"&msg="+msg; 
                       $.ajax({
                          url:"../smtp/email.php",
                          type:"POST",
                          data:dataString,
                          success:function(data)
                          {
                             //alert(data);
                          },
                          error:function(err)
                          {
                             console.log(err);
                          }
                       });
                   });
            
            $("#close").click(function(){
                       var msg   = $("#message").val("");
            });
       
   });


 </script>  
 <div class="modal fade" id="modalID">
   <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg bg-primary">
                <a class="close" data-dismiss="modal" id="close">&times;</a>
                  <h3 class="modal-title">REPLY</h3>
             </div>
            <div class="modal-body">
                
                <div class="input-group">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                    <input id="email" type="text" class="form-control" name="email" placeholder="Email Address.." disabled="disabled">
                </div>    
                <div class="input-group">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
                    <input id="name" type="text" class="form-control" name="name" placeholder="Name.." disabled="disabled">
                </div>
                <div class="input-group">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-send"></i></span>
                    <textarea id="message" type="text" class="form-control" name="name" placeholder="Message.." style="height:100px"></textarea>

                </div>

            </div>
            <div class="modal-footer">
                  <button type="button" class="btn" id="send">send</button>
                    <!--  <a data-dismiss="modal" class="close">Close</a> -->
            </div>
        </div>    
   </div>  
 </div>   
</html>