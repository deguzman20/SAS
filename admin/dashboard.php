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
                                    <li class="active">
                                        <a href="dashboard.php">
                                            <i class="material-icons">dashboard</i>
                                            <p>Dashboard</p>
                                        </a>
                                    </li>
                                   <!--  <li>
                                        <a href="./handlerdebug.php">
                                            <i class="material-icons">person</i>
                                            <p>Manage Handlers</p>
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
                        <div class="col-lg-3 col-md-6 col-sm-6">
                            <div class="card card-stats">
                                <div class="card-header" data-background-color="orange">
                                    <i class="fa fa-map"></i>
                                </div>
                                <div class="card-content">
                                    <p class="category">Online Handler</p>
                                    <h3 class="title" id="onlinehandler">
                                    </h3>
                                </div>
                                <div class="card-footer">
                                    <div class="stats">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-6">
                            <div class="card card-stats">
                                <div class="card-header" data-background-color="orange">
                                    <i class="fa fa-users "></i>
                                </div>
                                <div class="card-content">
                                    <p class="category">OIC</p>
                                    <h3 class="title" id="oic">
                                    </h3>
                                </div>
                                <div class="card-footer">
                                    <div class="stats">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-6">
                            <div class="card card-stats">
                                <div class="card-header" data-background-color="green">
                                    <i class="fa fa-envelope"></i>
                                </div>
                                <div class="card-content">
                                    <p class="category">Messages</p>
                                    <h3 class="title" id="messages"></h3>
                                </div>
                                <div class="card-footer">
                                    <div class="stats">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-6">
                            <div class="card card-stats">
                                <div class="card-header" data-background-color="red">
                                    <i class="material-icons">person</i>
                                </div>
                                <div class="card-content">
                                    <p class="category">Handler</p>
                                    <h3 class="title" id="handler"></h3>
                                </div>
                                <div class="card-footer">
                                    <div class="stats">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-6">
                            <div class="card card-stats">
                                <div class="card-header" data-background-color="blue">
                                    <i class="fa fa-paw"></i>
                                </div>
                                <div class="card-content">
                                    <p class="category">Dog</p>
                                    <h3 id="dogs" class="title"></h3>
                                </div>
                                <div class="card-footer">
                                    <div class="stats">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="doughnut-chart-container">
                              <canvas id="doughnut-chartcanvas-1"></canvas>
                        </div> 

                    </div>
                </div>
    </div>
</body>
     <?php include('admin-footer.php');?>
    <script>
   var config = {
    apiKey: "AIzaSyC2YYK_aIkHlHlhivxD_AghsxxUF9pFvEk",
    authDomain: "searchand-f8856.firebaseapp.com",
    databaseURL: "https://searchand-f8856.firebaseio.com",
    projectId: "searchand-f8856",
    storageBucket: "searchand-f8856.appspot.com",
    messagingSenderId: "743668634306"
  };
  firebase.initializeApp(config);
      

       database =firebase.database();
      // Count All Online Handler
       var ref = database.ref('OnlineHandlers');
       ref.on("value",gotData,errData);
        
        function gotData(data)
        {
            var uid = data.val();
            var keys = Object.keys(uid);
             //console.log(keys.length);

             
                 $("#onlinehandler").html(keys.length);
                   
        }
        function errData(err)
        {
        console.log('Error!');
        console.log(err);
        }
         ref.on("child_changed",snap=>{
            $("#onlinehandler").html(snap.length);
       }); 
       
       ref.on("child_removed",snap=>{
           $("#onlinehandler").html("0");
       });
       
        
        //Count All Messages
        var refMsg = database.ref('Messages');
       refMsg.on("value",gotMessageData,errMessageData);
        function gotMessageData(data)
        {
            var uid = data.val();
            var keys = Object.keys(uid);
             console.log(keys.length);
             
                 $("#messages").html(keys.length);
                   
        }
        function errMessageData(err)
        {
        console.log('Error!');
        console.log(err);
        $("#messages").html("0");
        }
        
       
       refMsg.on("child_changed",snap=>{
            $("#messages").html(snap.length);
       }); 
       
       refMsg.on("child_removed",snap=>{
           $("#messages").html("0");
       });


       //Count All Handler
        var refHandler = database.ref('User').child('Handlers');
       refHandler.on("value",gotHandlerData,errHandlerData);
        function gotHandlerData(data)
        {
            var uid = data.val();
            var keys = Object.keys(uid);
      
                 $("#handler").html(keys.length);
                   
        }
        function errHandlerData(err)
        {
        console.log('Error!');
        console.log(err);
        $("#handler").html("0");
        }  
        
       refHandler.on("child_changed",snap=>{
            $("#handler").html(snap.length);
       }); 
       
       refHandler.on("child_removed",snap=>{
           $("#handler").html("0");
       });




       //Count All OIC
        var refOIC = database.ref('User').child('OIC');
       refOIC.on("value",gotOICData,errOICData);
        function gotOICData(data)
        {
            var uid = data.val();
            var keys = Object.keys(uid);
      
                 $("#oic").html(keys.length);
                   
        }
        function errOICData(err)
        {
        console.log('Error!');
        console.log(err);
        $("#oic").html("0");
        }  
        
       refOIC.on("child_changed",snap=>{
            $("#oic").html(snap.length);
       }); 
       
       refOIC.on("child_removed",snap=>{
           $("#oic").html("0");
       }); 
     

     // Count all Dogs
   //Count All Handler
        var refDog = database.ref('Dog');
       refDog.on("value",gotDogData,errDogData);
        function gotDogData(data)
        {
            var uid = data.val();
            var keys = Object.keys(uid);
                 $("#dogs").html(keys.length);
                   
        }
        function errDogData(err)
        {
        console.log('Error!');
        console.log(err);
        $("#dogs").html("0");
        }  
        
       refDog.on("child_changed",snap=>{
            $("#dogs").html(snap.length);
       }); 
       
       refDog.on("child_removed",snap=>{
           $("#dogs").html("0");
       }); 
 
       $.ajax({
                url: "https://searchand-f8856.firebaseio.com/User/Handlers/.json",
               type: "GET",
           dataType: 'json',
           success:function(data)
           {
            var emp = {
                  handler : [],
                  OIC : []
                };

                 for(var i in data)
                 {
                    if(data[i].Position=="OIC")
                    {
                       emp.OIC.push(data[i].Position);   
                    }
                    else{
                       emp.handler.push(data[i].Position); 
                    }
                 }
                 console.log(emp.handler);
                 console.log(emp.OIC);
                 var data = {
                    labels: emp,
                    datasets: [
                        {
                            label: "My First dataset",
                            fillColor: "rgba(220,220,220,0.5)",
                            strokeColor: "rgba(220,220,220,0.8)",
                            highlightFill: "rgba(220,220,220,0.75)",
                            highlightStroke: "rgba(220,220,220,1)",
                            data: [1,2,3,4,5]
                        }]
                };
                var ctx = document.getElementById("doughnut-chartcanvas-1").getContext("2d");
                ctx.canvas.width = 1000;
                ctx.canvas.height = 800;
                var myChart = new Chart(ctx).Bar(data); 
             
           },
           error:function(err)
           {
             console.log(err);
           }
       });


        //Count All Pending
       //  var pendingHandler = database.ref('Pendin_User');
       // pendingHandler.on("value",gotPendingData,errPendingData);
       //  function gotPendingData(data)
       //  {
       //      var uid = data.val();
       //      var keys = Object.keys(uid);
       //       console.log(keys.length);
             
       //           $("#pending").html(keys.length);
                   
       //  }
       //  function errPendingData(err)
       //  {
       //  console.log('Error!');
       //  console.log(err);
       //  $("#pending").html("0");
       //  } 

    </script>
    <script src="js/firebase.js"></script>

</html>