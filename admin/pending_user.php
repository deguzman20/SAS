<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <link rel="icon" type="image/png" href="../images/logo.png" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>SAS Admin Dashboard</title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />
    <link href="../assets/css/bootstrap.min.css" rel="stylesheet" />
    <link href="../assets/css/material-dashboard.css?v=1.2.0" rel="stylesheet" />
    <link href="../assets/css/demo.css" rel="stylesheet" />
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300|Material+Icons' rel='stylesheet' type='text/css'>
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
                    <li class="active">
                        <a href="./pending_user.php">
                            <i class="material-icons">person</i>
                            <p>Pending User</p>
                        </a>
                    </li>
                    <li>
                        <a href="./handler.php">
                            <i class="material-icons">content_paste</i>
                            <p>Manage Handler</p>
                        </a>
                    </li>
                    <li>
                        <a href="./message.php">
                            <i class="material-icons">library_books</i>
                            <p>Manage Message</p>
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
       <!--              <div class="collapse navbar-collapse">
                        <ul class="nav navbar-nav navbar-right">
                            <li>
                                <a href="#pablo" class="dropdown-toggle" data-toggle="dropdown">
                                    <i class="material-icons">dashboard</i>
                                    <p class="hidden-lg hidden-md">Dashboard</p>
                                </a>
                            </li>
                         
                            <li>
                                <a href="#pablo" class="dropdown-toggle" data-toggle="dropdown">
                                    <i class="material-icons">person</i>
                                    <p class="hidden-lg hidden-md">Profile</p>
                                </a>
                            </li>
                        </ul>
                        <form class="navbar-form navbar-right" role="search">
                            <div class="form-group  is-empty">
                                <input type="text" class="form-control" placeholder="Search">
                                <span class="material-input"></span>
                            </div>
                            <button type="submit" class="btn btn-white btn-round btn-just-icon">
                                <i class="material-icons">search</i>
                                <div class="ripple-container"></div>
                            </button>
                        </form>
                    </div>
        -->         </div>
            </nav>
            <div class="content">
                <div class="container-fluid">
                        
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header" data-background-color="red">
                                    <h4 class="title">Pending User List</h4>
                                    <p class="category"></p>
                                </div>
                                <div class="card-content table-responsive">
                                    <table class="table" id="tbl_pending_user_list">
                                                <tr>
                                                      <td>Email Address</td>
                                                      <td>Password</td>
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
<script src="../assets/js/jquery-3.2.1.min.js" type="text/javascript"></script>
<script src="../assets/js/bootstrap.min.js" type="text/javascript"></script>
<script src="../assets/js/material.min.js" type="text/javascript"></script>
<script src="../assets/js/chartist.min.js"></script>
<script src="../assets/js/arrive.min.js"></script>
<script src="../assets/js/perfect-scrollbar.jquery.min.js"></script>
<script src="../assets/js/bootstrap-notify.js"></script>
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>
<script src="../assets/js/material-dashboard.js?v=1.2.0"></script>
<script src="../assets/js/demo.js"></script>
 <script src="https://www.gstatic.com/firebasejs/4.10.0/firebase.js"></script>

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
                          var dbref = firebase.database().ref('Pending_User');
                          var rowIndex = 1;


              dbref.on('value',function(snapshot){
                 snapshot.forEach(function(childSnapshot){
                    var childKey = childSnapshot.key;
                    var childData= childSnapshot.val();

                    var row                = tblHandlers.insertRow(rowIndex);
                    var cellEmail          = row.insertCell(0);
                    var cellApprove        = row.insertCell(1); 
                    var cellReject         = row.insertCell(2); 

                    //Button for Approve
                    var btnApprove = document.createElement("BUTTON");
                    var att = document.createAttribute("class");
                    att.value = "btn btn-success";
                    btnApprove.textContent="Accept"; 
                    btnApprove.setAttributeNode(att);
                    btnApprove.setAttribute("id",childKey);   
                    btnApprove.addEventListener("click", function(){
                                getApproveUID(this.id,childData.Email_Address,childData.Password);
                            }); 
                   
                    
                    //Button for Reject
                    var btnReject = document.createElement("BUTTON");
                    btnReject.style.position="relative";
                    btnReject.style.left="-20%";
                    var att = document.createAttribute("class");
                    att.value = "btn btn-danger";
                    btnReject.textContent="Reject"; 
                    btnReject.setAttributeNode(att); 
                    btnReject.setAttribute("id", childKey); 
                    btnReject.addEventListener("click", function(){
                                getRejectUID(this.id);
                            }); 

                     // cellId.appendChild(document.createTextNode(childKey));
                    cellEmail.appendChild(document.createTextNode(childData.Email_Address));
                    cellApprove.appendChild(btnApprove);
                    cellReject.appendChild(btnReject);

                    rowIndex+=1; 
                  
                 });
                 
              });
             
             function getApproveUID(id,email,password)
             {  
                firebase.auth().createUserWithEmailAndPassword(email, password).then(function() {
                             var user = firebase.auth().currentUser.uid;
                             var current_user_db = firebase.database().ref('User').child('Handlers').child(user);
                             current_user_db.set(true);
                              
                               

                      }).catch(function(error) {
                     console.log(error);
                });
                      var ref = firebase.database().ref('Pending_User').child(id);
                              ref.remove()
             }


             function getRejectUID(id)
             {
                var ref = firebase.database().ref('Pending_User').child(id);
                ref.remove()
                .then(function(){
                     console.log("Remove succeeded");
                })
                .catch(function(error){
                     console.log("Remove failed "+error)
                })   
             }

         
          

   });


 </script>     
</html>