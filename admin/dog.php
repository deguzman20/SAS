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
                    <li class="active">
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
                  <div class="col-md-6">  
                    <button type="button" class="btn btn-danger" id="btn_add" data-toggle="modal"><i class="fa fa-paw"></i>&nbsp;&nbsp;Add Dog</button>
                    <!-- <input type="file" accept="image/*" capture="camera" id="cameraInput"> -->
                    <!-- <button type="button" class="btn btn-danger" id="btn_add" data-toggle="modal" data-target="#assignDog"><i class="fa fa-tasks"></i>&nbsp;&nbsp;Assign Dog</button> -->
                  </div>
                   
                  <div class="col-md-4 col-md-offset-8">
                    <br>
                        <div class="col-md-12">
                       <!--    <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-search"></i></span>
                            <input id="search" type="text" class="form-control" name="search" placeholder="Search...">
                          </div> -->
                        </div>  
                  </div>   
                    <!-- Modal For Add Handler -->
                      <div class="modal fade" id="addDog">
                          <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                             
                               <div class="modal-header bg bg-primary">
                                 <button type="button" class="close" data-dismiss="modal">&times;</button>
                                 <h3><i class="fa fa-paw"></i>&nbsp;Add Dog</h3>
                               </div>

                                 <div class="modal-body">
                                 
                                   <div class="col-md-12">
                                        <div class="col-md-6" style="padding-bottom:20px">
                                            <div class="input-group">
                                                <span class="input-group-addon"><i class="fa fa-paw" style="font-size:21px"></i></span>
                                                <input id="dog_name" type="text" class="form-control" name="dog_name" placeholder="Dog Name" style="padding-left: 10px">
                                            </div>
                                        </div>
                                        <div class="col-md-6" style="padding-bottom:30px">
                                            <div class="input-group">
                                                <span class="input-group-addon"><i class="fa fa-list-alt" style="font-size:21px"></i></span>
                                               <select id="dog_breed" class="form-control">
                                                 <option></option>
                                                 <option>Belgian Malinois</option> 
                                                 <option>Labrador</option>
                                                 <option>Jack Russell Terrier</option>
                                                 <option>German Shepherd</option>
                                                 <option>Golden Retreiver</option>
                                                 <option>Rottweiler</option>
                                               </select>
                                            </div>
                                        </div>
                                     
                                        <div class="col-md-6" style="padding-bottom:30px">
                                            <div class="input-group">
                                                <span class="input-group-addon"><i class="fa fa-microchip" style="font-size:21px"></i></span>
                                                <input id="microchip" type="text" class="form-control" name="microchip" placeholder="Microchip Number" style="padding-left: 5px">
                                                <div id="microhip_message"></div>
                                            </div>
                                        </div>
                                         <div class="col-md-3">
                                            <div class="input-group">
                                                <span class="input-group-addon"><i class="fa fa-calendar" style="font-size:21px"></i></span>
                                                <input id="dob" type="text"  name="dob"  style="padding-left: 5px" placeholder="--/--/----">
                                            </div>                                            
                                        </div> 
                                        <div class="col-md-2">
                                            <div class="input-group">
                                                <span class="input-group-addon"><i class="fa fa-users" style="font-size:21px"></i></span>
                                                <input id="age" type="text"  name="age"  style="padding-left: 5px" disabled="disabled">
                                            </div>                                            
                                        </div>  
                                         
                                  </div>
                                  </div>

                               <div class="modal-footer">
                                    <div class="btn-group">
                                       <button class="btn btn-success " type="button" id="btn_save">Save</button>
                                       <button class="btn btn-danger" type="button" id="btn_close" data-dismiss="modal">Close</button>
                                    </div> 
                               </div>

                            </div> 
                          </div>  
                        </div>   
                      </div> 
                    <!-- ////////////////////////////// -->
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header" data-background-color="red">
                                    <h4 class="title">Dog List</h4>
                                    <p class="category"></p>
                                </div>
                                <div class="card-content table-responsive">
                                    <table class="table" id="tbl_dog_list">
                                              <tr>
                                                    <!-- <td><font color="white">ID</font></td> -->
                                                    <!-- <td>Image</td> -->
                                                    <td>Name</td>
                                                    <td>Breed</td>
                                                    <td>Birthdate</td>
                                                    <td>Age</td>
                                                    <td>Microchip</td>
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
    <div class="modal fade" id="modalID">
       <div class="modal-dialog modal-lg">
         <div class="modal-content">
             <div class="modal-header bg bg-primary">
               <button class="close" data-dismiss="modal">&times;</button>
                <h3>Profile</h3>  
                 <input type="text" id="uid" style="display:none">
              </div>
              <div class="modal-body">
                    <div class="col-md-12">
                                        <div class="col-md-6" style="padding-bottom:20px">
                                            <div class="input-group">
                                                <span class="input-group-addon"><i class="fa fa-paw" style="font-size:21px"></i></span>
                                                <input id="dog_names" type="text" class="form-control" placeholder="Dog Name" style="padding-left: 10px">
                                            </div>
                                        </div>
                                        <div class="col-md-6" style="padding-bottom:30px">
                                            <div class="input-group">
                                                <span class="input-group-addon"><i class="fa fa-list-alt" style="font-size:21px"></i></span>
                                               <select id="dog_breeds" class="form-control">
                                                 <option></option>
                                                 <option>Belgian Malinois</option> 
                                                 <option>Labrador</option>
                                                 <option>Jack Russell Terrier</option>
                                                 <option>German Shepherd</option>
                                                 <option>Golden Retreiver</option>
                                                 <option>Rottweiler</option>
                                               </select>
                                            </div>
                                        </div>
                                     
                                        <div class="col-md-6" style="padding-bottom:30px">
                                            <div class="input-group">
                                                <span class="input-group-addon"><i class="fa fa-microchip" style="font-size:21px"></i></span>
                                                <input id="microchips" type="text" class="form-control" placeholder="Microchip Number" style="padding-left: 5px">
                                                <div id="microhip_message"></div>
                                            </div>
                                        </div>
                                         <div class="col-md-3">
                                            <div class="input-group">
                                                <span class="input-group-addon"><i class="fa fa-calendar" style="font-size:21px"></i></span>
                                                <input id="dobs" type="text"  name="dob"  style="padding-left: 5px" placeholder="--/--/----">
                                            </div>                                            
                                        </div> 
                                        <div class="col-md-2">
                                            <div class="input-group">
                                                <span class="input-group-addon"><i class="fa fa-users" style="font-size:21px"></i></span>
                                                <input id="ages" type="text"  name="age"  style="padding-left: 5px" disabled="disabled">
                                            </div>                                            
                                        </div>  
                    
              </div> 
             <div class="modal-footer">
                 <button type="button" data-dismiss="modal" class="btn pull-right btn-danger">Close</button>
                                           <button type="button" id="btn_updateDog"  class="btn pull-right">Add</button>
             </div> 
         </div>  
       </div>
    </div> 
</body>

 
<?php include('admin-footer.php');?>
 <script>
      // Initialize Firebase
   $(document).ready(function(){

             var config = {
                  apiKey: "AIzaSyC2YYK_aIkHlHlhivxD_AghsxxUF9pFvEk",
                  authDomain: "searchand-f8856.firebaseapp.com",
                  databaseURL: "https://searchand-f8856.firebaseio.com",
                    projectId: "searchand-f8856",
                    storageBucket: "searchand-f8856.appspot.com",
                    messagingSenderId: "743668634306"
  };
  firebase.initializeApp(config);

   $("#btn_add").click(function(){
       $("#addDog").modal({backdrop: "static"});
   }); 

   $('#dob').datepicker({
                   onSelect: function(value, ui) {
                   console.log(ui.selectedYear)
                   var today = new Date(), 
                   dob = new Date(value), 
                   age =  today.getFullYear() - ui.selectedYear ;
                   $('#age').val(parseInt(age)-1);
                 },
                   maxDate: '+0d',
                   changeMonth: true,
                   changeYear: true,
                   defaultDate: '-18yr',
                });              

   $('#dobs').datepicker({
                   onSelect: function(value, ui) {
                   console.log(ui.selectedYear)
                   var today = new Date(), 
                   dob = new Date(value), 
                   age =  today.getFullYear() - ui.selectedYear ;
                   $('#ages').val(parseInt(age)-1);
                 },
                   maxDate: '+0d',
                   changeMonth: true,
                   changeYear: true,
                   defaultDate: '-18yr',
                });              


           var dogRef = firebase.database().ref("Dog");
           $("#btn_save").click(function(){
               var dogName   = $("#dog_name").val();
               var dogBreed  = $("#dog_breed").val();
               var microChip = $("#microchip").val();
               var dob       = $("#dob").val();
               var age       = $("#age").val();
              dogRef.push({
                  Dog_Name:dogName,
                  Breed:dogBreed,
                  Microchip:microChip,
                  Birthdate:dob,
                  Age:age,
                  haveHandler:"false"
              });
           });      


           $("#btn_updateDog").click(function(){
                
                var uid      = $("#uid").val()
                var dogName   = $("#dog_names").val();
                var dgBreed  = $("#dog_breeds").val();
                var mchips   = $("#microchips").val();
                var dgbd     = $("#dobs").val();
                var ages     = $("#ages").val();
                var dogDB = firebase.database().ref('Dog').child(uid);
                dogDB.update({
                  Dog_Name:dogName,    
                  Age:ages,
                  Birthdate:dgbd,
                  Breed:dgBreed,
                  Microchip:mchips
                });
                

           });    

           
          var tblDogs = document.getElementById('tbl_dog_list'); 
          var dbref = firebase.database().ref('Dog');
          var rowIndex = 1;
          
               dbref.on('child_changed',function(snapshot){
                  location.reload();
               }); 
               
               dbref.on('child_removed',function(snapshot){
                  location.reload();
               }); 

        
          dbref.on('value',function(snapshot){
             snapshot.forEach( function(childSnapshot) {
                   var childKey  = childSnapshot.key;
                   var childData = childSnapshot.val();
                         var row                     = tblDogs.insertRow(rowIndex);
                         var cellDogName             = row.insertCell(0);
                         var cellBreed               = row.insertCell(1);
                         var cellBirthdate           = row.insertCell(2); 
                         var cellAge                 = row.insertCell(3);
                         var cellMicroChip           = row.insertCell(4);
                         var cellEdit                = row.insertCell(5); 
                         var cellDelete              = row.insertCell(6);
                         // var cellAssign              = row.insertCell(7);
                         cellDogName.appendChild(document.createTextNode(childData.Dog_Name));
                         cellBreed.appendChild(document.createTextNode(childData.Breed));
                         cellBirthdate.appendChild(document.createTextNode(childData.Birthdate));
                         cellAge.appendChild(document.createTextNode(childData.Age));
                         cellMicroChip.appendChild(document.createTextNode(childData.Microchip));

                       var btnEdit = document.createElement("BUTTON");
                              var att = document.createAttribute("class");
                              att.value = "btn btn-success";
                              btnEdit.innerHTML="<i class='fa fa-edit'></i>&nbsp;&nbsp;Edit"; 
                              btnEdit.setAttributeNode(att);
                              btnEdit.setAttribute("id",childKey);
                              btnEdit.setAttribute("data-toggle","modal");
                              btnEdit.addEventListener("click", function(){
                                    $("#modalID").modal({backdrop: 'static'});
                                    getDogInfo(this.id,childData.Dog_Name,childData.Breed,childData.Birthdate,childData.Age,childData.Microchip);   
                              });
                        cellEdit.appendChild(btnEdit);


                        var btnDelete = document.createElement("BUTTON");
                              var attr = document.createAttribute("class");
                              attr.value = "btn btn-danger";
                              btnDelete.innerHTML="<i class='fa fa-remove'></i>&nbsp;&nbsp;Delete"; 
                              btnDelete.setAttributeNode(attr);
                              btnDelete.setAttribute("id",childKey);
                              btnDelete.addEventListener("click",function(){
                                   DeleteDog(this.id);
                              });
                              cellDelete.appendChild(btnDelete);
                          
                         rowIndex++;

                         function getDogInfo(id,dog,breed,bd,age,microchip)
                         {
                              $("#dog_names").val(dog);
                              $("#dog_breeds").val(breed);
                              $("#microchips").val(microchip);
                              $("#dobs").val(bd);
                              $("#ages").val(age);
                              $("#uid").val(id);
                         }

                         function DeleteDog(id)
                         {
                             
                            alertify.confirm('Message','Are you sure you want to remove this dog ?',   function(){ 
                                       var ref = firebase.database().ref('Dog').child(id);
                                        ref.remove()
                                        .then(function(){
                                             console.log("Remove succeeded");
                                        })
                                        .catch(function(error){
                                             console.log("Remove failed "+error)
                                        })    
                                       alertify.success('Dog assign successfully')
                                   },
                                  function(){
                                  
                                  }).set('labels', {ok:'Yes', cancel:'No'});  
                         }

                        

                         function getDogID(id)
                         {
                            $("#dog_uid").val(id);
                          
                         }
              
             });
          });
       //Text Keycode
            $("#dog_names,#dog_name").keypress(function (e) {
              if(e.keyCode != 8 &&  e.keyCode!=32 &&
                (e.keyCode < 65 || e.keyCode > 90) && 
                (e.keyCode < 97 || e.keyCode >122))
                 {   
                   e.preventDefault();
                  }
               });

            
            
   });


 </script>    
</html>
  