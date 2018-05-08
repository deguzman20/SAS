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
                                    <li>
                                        <a href="./handler.php">
                                            <i class="fa fa-user"></i>
                                            <p>Manage Handler</p>
                                        </a>
                                    </li>
                                     <li class="active">
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
                  <div class="col-md-3">  
                    <button type="button"  class='btn btn-danger' id="btn_add" data-toggle="modal"><i class='fa fa-user'></i>&nbsp;&nbsp;Add OIC</button>
                  </div> 
                  <div class="col-md-4 col-md-offset-5">
                    <br>
                        <div class="col-md-12">
                          <!-- <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-search"></i></span>
                            <input id="search" type="text" class="form-control" name="search" placeholder="Search...">
                          </div> -->
                        </div>  
                  </div>   
                    <!-- Modal For Add Handler -->
                      <div class="modal fade" id="addHandler">
                          <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                             
                               <div class="modal-header bg bg-primary">
                                 <button type="button" class="close" data-dismiss="modal">&times;</button>
                                 <h3><i class='fa fa-user'></i>&nbsp;Add OIC</h3>
                               </div>

                                 <div class="modal-body">
                                   
                                   <div class="col-md-6">
                                        <div class="col-md-12" style="padding-bottom:20px">
                                                <input id="fnames" type="text" class="form-control" name="fnames" placeholder="Firstname" style="padding-left: 10px">
                                        </div>
                                        <div class="col-md-12" style="padding-bottom:30px">
                                                <input id="mnames" type="text" class="form-control" name="mnames" placeholder="Middlename" style="padding-left: 10px">                       
                                        </div>
                                        <div class="col-md-12" style="padding-bottom:30px">
                                                <input id="lnames" type="text" class="form-control" name="lnames" placeholder="Lastname" style="padding-left: 10px">
                                            
                                        </div>
                                        <div class="col-md-12" style="padding-bottom:30px">
                                                 <input id="add" type="text" class="form-control" name="add" placeholder="Address" style="padding-left: 5px">
                                        </div>
                                        <div class="col-md-12" style="padding-bottom:30px">
                                                <input id="no" type="text" class="form-control" name="no" placeholder="Contact Number" style="padding-left: 5px">
                                                <div id="no_message"></div>
                                            
                                        </div>
                                         <div class="col-md-5">
                                                <input id="dob" type="text"  name="dob"  style="padding-left: 5px" placeholder="--/--/----">
                                                                                      
                                        </div> 
                                        <div class="col-md-5 col-md-offset-2">
                                                <input id="ages" type="text"  name="age"  style="padding-left: 5px" disabled="disabled">
                                            </div>                                            
                                        
                                         
                                   </div>
                                   <div class="col-md-6">  
                                      <!--  <div class="col-md-12">
                                                <select id="position" name="Select Position" class="form-control" style="padding-left: 10px">
                                                  <option>Select Position</option>
                                                  <option>Handler</option>
                                                  <option>OIC</option>
                                                </select>  
                                            
                                            <br>
                                        </div>  --> 
                                       <div class="col-md-12" style="padding-bottom:20px"> 
                                           
                                                <input id="em" type="text" class="form-control" name="email" placeholder="Email Address..." style="padding-left:10px">
                                                 <div id="email_message"></div>
                                           
                                       </div> 

                                        <div class="col-md-12" style="padding-bottom:30px"> 
                                             
                                                 <input id="pa" type="password" class="form-control" name="password" placeholder="Password..." style="padding-left: 10px">
                                                 <div id="pass_message"></div>
                                             
                                        </div>
                                        <div class="col-md-12" style="padding-bottom:40px">
                                                <input id="re" type="password" class="form-control" name="password" placeholder="Re-type password..." style="padding-left: 10px">
                                                <div id="repass_message"></div>
                                        </div>
                                        <div class="col-md-12">
                                          <br><br><br><br><br>
                                           <button type="button" data-dismiss="modal" class="btn pull-right btn-danger">Close</button>
                                           <button type="button" id="btn_addOIC"  class="btn pull-right">Add</button>
                                        </div>   
                                   </div> 
                                 </div>

                               <div class="modal-footer">
                                    
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
                                    <h4 class="title">OIC List</h4>
                                    <p class="category"></p>
                                </div>
                                <div class="card-content table-responsive">
                                    <table class="table" id="tbl_OIC_list">
                                              <tr>
                                                    <!-- <td><font color="white">ID</font></td> -->
                                                    <td>Firstname</td>
                                                    <td>Middlename</td>
                                                    <td>Lastname</td>
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
                    <div class="col-md-9">  
                        <div class="col-md-4"> 
                          <span><b>Firstname</b></span>
                         <input type="text" id="fname" class="form-control" placeholder="Firstname" />
                        </div>
                         <div class="col-md-4">
                          <span><b>Middlename</b></span> 
                         <input type="text" id="mname" class="form-control" placeholder="Middlename" />
                        </div>
                        <div class="col-md-4">
                          <span><b>Lastname</b></span> 
                         <input type="text" id="lname" class="form-control" placeholder="Lastname" />
                        </div>
                        <div class="col-md-12">
                          <span><b>Address</b></span> 
                         <input type="text" id="address" class="form-control" placeholder="Address" />
                        </div>  
                        <div class="col-md-4">
                          <span><b>Birtdate</b></span>  
                          <input type="text" id="BD" class="form-control">
                        </div>
                        <div class="col-md-4">
                          <span><b>Age</b></span>  
                          <input type="text" id="age" class="form-control" disabled="disabled">
                        </div>
                        <div class="col-md-4">
                          <span><b>Contact No</b></span>  
                          <input type="text" id="cp" class="form-control">
                        </div>
                        <!-- <div class="col-md-6">
                          <span><b>Position</b></span>
                          <select class="form-control" id="positions">
                            <option>Handler</option>
                            <option>OIC</option>
                          </select>
                        </div>   -->
                        <div class="col-md-6">
                          <br>
                          <button type="text" class="btn btn-sucess pull-right" id="btn_update">Update</button>
                        </div>  
                    </div>  
                    <div class="col-md-3">
                      <div class="col-md-12">
                         <img id="profile_image" style="width:100%;height:250px" class="img img-thumbnail">
                       </div>   
                    </div>
              </div> 
             <div class="modal-footer">
             </div> 
         </div>  
       </div>
    </div> 
    <div class="modal fade" id="assignDog">
                      <div class="modal-dialog modal-lg">
                         <div class="modal-content">
                            <div class="modal-header">
                                <input type="text" id="handler_uid" style="display:none">
                            </div>
                            <div class="modal-body">
                               <table id="list_of_dogs" class="table table-bordered">
                                 <tr class="bg bg-primary">
                                   <!-- <th>Image</th> -->
                                   <th>Dog Name</th>
                                   <th>Breed</th>
                                   <th>Birthdate</th>
                                   <th>Age</th>
                                   <th>Microchip</th>
                                   <th>Action</th>
                                </tr>
                               </table>
                            </div>
                            <div class="modal-footer">

                            </div>      
                         </div>
                      </div>
    </div>
    <div class="modal fade" id="myDogs">
       <div class="modal-dialog modal-lg">
         <div class="modal-content">
             <div class="modal-header">
                 <input type="text" id="OIC_id" style="display:none">   
             </div>
             <div class="modal-body">
                <table class="table">
                  <tr class="bg bg-primary">
                    <td>Name</td>
                    <td>Breed</td>
                    <td>Birthdate</td>
                    <td>Age</td>
                    <td>Microchip</td>
                    <td>Action</td>
                  </tr>
                </table>
                <table id="list_of_mydog" class="table">
                   
                </table>
             </div>
             <div class="modal-footer">

             </div> 
         </div> 
       </div>
    </div>
    <div class="modal fade" id="assignHandler">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <input type="text" id="OIC_uid">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
          </div>
          <div class="modal-body">
            <table class="table" id="tbl_handlers_list">
              <tr class="bg bg-primary">
                <th>Fullname</th>
                <th>Action</th>
              </tr>
            </table>
          </div>
          <div class="modal-footer">

          </div>  
        </div>  
      </div> 
    </div>  
    <div class="modal fade" id="assignedHandler">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <input type="text" id="OIC_uids">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
          </div>
          <div class="modal-body">
            <table class="table" id="tbl_assigned_handler_list">
              <tr class="bg bg-primary">
                <th>Fullname</th>
                <th>Action</th>
              </tr>
            </table>
          </div>
          <div class="modal-footer">

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
                  $("#addHandler").modal({backdrop: "static"});
             });   
                             
               var tblHandlers = document.getElementById('tbl_OIC_list');
                          var dbref = firebase.database().ref('User').child('OIC');
                          var rowIndex = 1;
                

               dbref.on('value',function(snapshot){
                  snapshot.forEach( function(childSnapshot) {
                         var childKey  = childSnapshot.key;
                         var childData = childSnapshot.val();
                         var row                = tblHandlers.insertRow(rowIndex);
                         var cellFname          = row.insertCell(0);
                         var cellMname          = row.insertCell(1);
                         var cellLname          = row.insertCell(2); 
                         var cellEdit           = row.insertCell(3); 
                         var cellDel            = row.insertCell(4);
                         var cellAssign         = row.insertCell(5);
                         var cellViewMyDogs     = row.insertCell(6);
                         var cellassignHandler  = row.insertCell(7);
                         var cellassignedHandler= row.insertCell(8);  

                             
                            cellFname.appendChild(document.createTextNode(childData.firstname)); 
                            cellMname.appendChild(document.createTextNode(childData.middlename)); 
                            cellLname.appendChild(document.createTextNode(childData.lastname)); 
                            
                              var btnEdit = document.createElement("BUTTON");
                              var att = document.createAttribute("class");
                              att.value = "btn btn-success";
                              btnEdit.innerHTML="<i class='fa fa-edit'></i>&nbsp;&nbsp;Edit"; 
                              btnEdit.setAttributeNode(att);
                              btnEdit.setAttribute("id",childKey);
                              btnEdit.setAttribute("data-toggle","modal");
                        
                             cellEdit.appendChild(btnEdit); 
                             btnEdit .addEventListener("click", function(){
                               $("#modalID").modal({backdrop: "static"});
                                getInfo(this.id,childData.firstname,childData.middlename,childData.lastname,childData.Address,childData.Birthdate,childData.Age,childData.Contact_Number,childData.profileImageUrl,childData.Position);
                            });           

                             var btnDel = document.createElement("BUTTON");
                             var attr = document.createAttribute("class");
                             attr.value="btn btn-danger";
                             btnDel.innerHTML="<i class='fa fa-remove'></i>&nbsp;&nbsp;Delete";
                             btnDel.setAttributeNode(attr);
                             btnDel.setAttribute("id",childKey);
                             btnDel.addEventListener("click", function(){
                                   deleteInfo(this.id);
                              });           

                             cellDel.appendChild(btnDel);

                            var btnAssign = document.createElement("BUTTON");
                              var attrs = document.createAttribute("class");
                              attrs.value = "btn btn-warning";
                              btnAssign.innerHTML="<i class='fa fa-tasks'></i>&nbsp;&nbsp;Assign"; 
                              btnAssign.setAttributeNode(attrs);
                              btnAssign.setAttribute("id",childKey);
                              btnAssign.setAttribute("data-toggle","modal");
                              btnAssign.addEventListener("click", function(){
                                 $("#assignDog").modal({backdrop: "static"});
                                getDogID(this.id); 
                              });
                              cellAssign.appendChild(btnAssign);

                              var btnViewMyDogs = document.createElement("BUTTON");
                              var viewMyDogsAttr = document.createAttribute("class");
                              viewMyDogsAttr.value="btn btn-info";
                              btnViewMyDogs.innerHTML="<i class='fa fa-paw'></i>&nbsp;&nbsp;Dog";
                              btnViewMyDogs.setAttributeNode(viewMyDogsAttr);
                              btnViewMyDogs.setAttribute("id","viewMyDog-"+childKey);
                              btnViewMyDogs.setAttribute("data-toggle","modal");
                              btnViewMyDogs.addEventListener("click",function(){
                                     $("#myDogs").modal({backdrop: "static"});     
                              });                    
                              cellViewMyDogs.appendChild(btnViewMyDogs);
                              
                              var btnAssignHandler = document.createElement('BUTTON');
                              var assignHandlerAttr= document.createAttribute('class');
                              assignHandlerAttr.value="btn btn-default";
                              btnAssignHandler.innerHTML="<i class='fa fa-user'></i>&nbsp;&nbsp;Assign Handler";
                              btnAssignHandler.setAttributeNode(assignHandlerAttr);
                              btnAssignHandler.setAttribute("id",childKey);
                              btnAssignHandler.setAttribute("data-toggle","modal");
                              btnAssignHandler.addEventListener("click",function(){
                                     $("#OIC_uid").val(this.id);
                                     $.getJSON("https://searchand-f8856.firebaseio.com/User/Handlers.json", function(data){
                                           $.each(data,function(key,val){
                                               $("#tbl_handlers_list").append("<tr id='"+val['haveOIC']+"'><td>"+val['firstname']+' '+val['middlename']+' '+val['lastname']+"</td><td><button type='button' class='btn btn-success' id='"+key+"'>assign</button></td></tr>");
                                                 $("tr[id='true']").css({
                                                    "display":"none"
                                                 });
                                                 $("#"+key).click(function(){
                                                   var OIC_id = $("#OIC_uid").val();
                                                   var fullname = 
                                                            [
                                                               val['firstname'],
                                                               val['middlename'],
                                                               val['lastname']
                                                            ];

                                                   var fullNam = fullname.join(' ');
                                                   var id = this.id;
                                                   var OICRef = firebase.database().ref('User').child('OIC/Assigned_Handlers/'+OIC_id);
                                                   OICRef.push().set({
                                                     uid:id,
                                                     fullname:fullNam
                                                   })
                                                   var handlerRef =  firebase.database().ref('User').child('Handlers/'+this.id);
                                                     handlerRef.update({
                                                        haveOIC:'true'
                                                     })
                                                   
                                                 });
                                           });
                                     });   
                                     $("#assignHandler").modal({backdrop: "static"});
                                         
                              });                    
                              cellassignHandler.appendChild(btnAssignHandler);

                              var btnAssignedHandler = document.createElement('BUTTON');
                              var assignedHandlerAttr= document.createAttribute('class');
                              assignedHandlerAttr.value="btn btn-default";
                              btnAssignedHandler.innerHTML="<i class='fa fa-user'></i>&nbsp;&nbsp;Handler";
                              btnAssignedHandler.setAttributeNode(assignedHandlerAttr);
                              btnAssignedHandler.setAttribute("id",childKey);
                              btnAssignedHandler.setAttribute("data-toggle","modal");
                              btnAssignedHandler.addEventListener("click",function(){
                                   $("#assignedHandler").modal({backdrop: "static"});
                                   $.ajax({
                                        url:"https://searchand-f8856.firebaseio.com/User/OIC/"+childKey+"/Assigned_Handlers.json",
                                        type:"GET",
                                        dataType:"json",
                                        success:function(data)
                                        {
                                           $.each(data,function(key,val){
                                               $("#tbl_assigned_handler_list").append("<tr><td>"+val['fullname']+"</td><td><button type='button' class='btn btn-danger' id='"+key+"'>Remove</button></td><tr>");   
                                                 
                                                 $("#"+key).click(function(){
                                                          alertify.confirm('Message','Are you sure you want to remove this assigned handler ?', function(){ 
                                                              
                                                              var handlerStatusRef=firebase.database().ref('User').child('Handlers').child(val['uid']);

                                                              handlerStatusRef.update({
                                                                 haveOIC:'false'
                                                              })
 

                                                              var assignedHandlerRef=firebase.database().ref('User').child('OIC').child(childKey).child('Assigned_Handlers').child(key);

                                                              

                                                              assignedHandlerRef.remove()
                                                                .then(function(){
                                                                     console.log("Remove succeeded");
                                                                })  
                                                                .catch(function(error){
                                                                     console.log("Remove failed "+error)
                                                                })  

                                                            alertify.success('Dog assign successfully')
                                                            }, function(){
                  
                                                            }).set('labels', {ok:'Yes', cancel:'No'});
                                                });
                                           });

                                        },
                                        error:function(err)
                                        {
                                          // /console.log(err);
                                        }
                                   });
                                      
                              });
                              cellassignedHandler.appendChild(btnAssignedHandler);                              

                                

                               $("#viewMyDog-"+childKey).click(function(){
                                   $("#OIC_id").val(childKey);
                                   $.getJSON("https://searchand-f8856.firebaseio.com/User/OIC/"+childKey+"/Assigned_Dogs.json", function(data){
                                            $.each(data,function(key,val){
                                               $("#list_of_mydog").html("<tr><td>"+val['Dog_Name']+"</td><td>"+val['Dog_Breed']+"</td><td>"+val['Dog_Birthdate']+"</td><td>"+val['Dog_Age']+"</td><td>"+val['Dog_Microchip']+"</td><td><button type='button' class='btn btn-danger' id='"+key+"' onclick='removeMyDog(this.id);'>Remove</button></td></tr>");

                                            });
                                     });       
                              });
                            rowIndex+=1;     
                  });
               }); 
               

               dbref.on('child_changed',function(snapshot){
                  location.reload();
               }); 
               
               dbref.on('child_removed',function(snapshot){
                  location.reload();
               });
               
               dbref.on('child_changed',function(snapshot){
                
                    $.getJSON("https://searchand-f8856.firebaseio.com/Dog/json",function(data){
                        $.each(data,function(key,val){
                           $("#list_of_dogs").append("<tr><td>"+val['Breed']+"</td></tr>"); 
                        });
                    }); 
                    
                  
                    $.getJSON("https://searchand-f8856.firebaseio.com/User/OIC.json",function(data){
                     $.each(snapshot,function(key,val){
                          $("#tbl_OIC_list").append("<tr><td>"+val['firstname']+"</td><td>"+val['middlename']+"</td><td>"+val['lastname']+"</td><td>"+val['Address']+"</td><td>"+val['Age']+"</td><td>"+val['Birthdate']+"</td><td>"+val['Contact_Number']+"</td><td>"+val['Position']+"</td><td><div class='btn-group'><button class='btn btn-success' data-toggle='modal' data-target='#modalID'>Edit</button><button class='btn btn-danger' onclick='deletes(this.id)' id='"+key+"'>DELETE</button></div></td></tr>");
                             

                                  $("#fname").val(val['firstname']);
                                  $("#mname").val(val['middlename']); 
                                  $("#lname").val(val['lastname']);
                                  $("#address").val(val['Address']);
                                  $("#cp").val(val['Contact_Number']);
                                  $("#age").val(val['Age']);
                                  $("#uid").val(key);
                           });
                      });

               });           
                         function getInfo(uid,fname,mname,lname,add,bd,age,contact,img,pos)
                         {
                                  $("#fname").val(fname);
                                  $("#mname").val(mname); 
                                  $("#lname").val(lname);
                                  $("#address").val(add);
                                  $("#cp").val(contact);
                                  $("#BD").val(bd);
                                  $("#positions").val(pos);
                                  $("#age").val(age);
                                  $("#uid").val(uid);   
                                  $("#profile_image").attr("src",img);
                         }   

                         function deleteInfo(id)
                         {
                               alertify.confirm('Message','Are you sure you want to remove this handler ?', function(){ 
                                         var ref = firebase.database().ref('User').child('OIC').child(id);
                                          ref.remove()
                                          .then(function(){
                                               console.log("Remove succeeded");
                                          })
                                          .catch(function(error){
                                               console.log("Remove failed "+error);
                                          })            
                                       alertify.success('Handler felete successfuly')
                                   },
                                  function(){
                                
                                  }).set('labels', {ok:'Yes', cancel:'No'});
                         }       

               $('#dob').datepicker({
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

                  $('#BD').datepicker({
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
               
               
               $("#no").keypress(function(e){
                  if(e.keyCode < 47 || e.keyCode > 57)
                    {   
                     e.preventDefault();
                    }
                    var cp_no = $("#no").val();
                   if(cp_no.length==11)
                   {
                      e.preventDefault();
                   }       
                 });
                

               $("#fnames,#mnames,#lnames,#fname,#mname,#lname").keypress(function (e) {
              if(e.keyCode != 8 &&  e.keyCode!=32 &&
                (e.keyCode < 65 || e.keyCode > 90) && 
                (e.keyCode < 97 || e.keyCode >122))
                 {   
                   e.preventDefault();
                  }
               });
               
               $("#no").keyup(function(){
                 var cp_number = $("#no").val();
                 var exp = /^(09|\+639)\d{9}$/
                 var result = exp.test(cp_number);
                 if(result)
                 {
                    $("#no_message").html("<span class='fa fa-check'></span>&nbsp;Valid contact number");
                 }
                 else{
                    $("#no_message").html("<span class='fa fa-remove'></span>&nbsp;Invalid contact number"); 
                 }
               });

               $("#cp").keyup(function(){
                 var cp_number = $("#cp").val();
                 var exp = /^(09|\+639)\d{9}$/
                 var result = exp.test(cp_number);
                 if(result)
                 {
                    $("#no_message").html("<span class='fa fa-check'></span>&nbsp;Valid contact number");
                 }
                 else{
                    $("#no_message").html("<span class='fa fa-remove'></span>&nbsp;Invalid contact number"); 
                 }
               });            

               $("#em").keyup(function(){
                  var email = $("#em").val();
                  var exp = /^(([^<>()\[\]\.,;:\s@\"]+(\.[^<>()\[\]\.,;:\s@\"]+)*)|(\".+\"))@(([^<>()[\]\.,;:\s@\"]+\.)+[^<>()[\]\.,;:\s@\"]{2,})$/i;
                  var result = exp.test(email);
                  if(result)
                  {
                        $("#email_message").html("<span class='fa fa-check'></span>&nbsp;Valid email address"); 
                  }
                  else{
                        $("#email_message").html("<span class='fa fa-remove'></span>&nbsp;Invalid email address"); 
                  }
               });
                 
              $("#pa").keyup(function(){
                  var pass = $("#pa").val();
                  if(pass.length<6 || pass.length > 1)
                  {
                    $("#pass_message").html("<span class='fa fa-remove'></span>&nbsp;password too short"); 
                  }  
                  if(pass.length>6){
                    $("#pass_message").html("<span class='fa fa-check'></span>&nbsp;Valid password"); 
                  }
              }); 
               

              $("#re").keyup(function(){
                var pass = $("#pa").val();
                var repa = $("#re").val();
                if(pass == repa)
                {
                  $("#repass_message").html("<span class='fa fa-check'></span>&nbsp;password match");
                }
                else{
                  $("#repass_message").html("<span class='fa fa-warning'></span>&nbsp;password not match"); 
                }
              });

                 
              $("#btn_addOIC").click(function(){                    
                  var email = $("#em").val();
                  var pass  = $("#pa").val();
                  var repas = $("#re").val(); 
                  var fname = $("#fnames").val();
                  var mname = $("#mnames").val();
                  var lname = $("#lnames").val(); 
                  var add   = $("#add").val();
                  var bd    = $("#dob").val();
                  var no    = $("#no").val();
                  var age   = $("#ages").val();
                  var number_exp = /^(09|\+639)\d{9}$/
                  var email_exp = /^(([^<>()\[\]\.,;:\s@\"]+(\.[^<>()\[\]\.,;:\s@\"]+)*)|(\".+\"))@(([^<>()[\]\.,;:\s@\"]+\.)+[^<>()[\]\.,;:\s@\"]{2,})$/i;
                  var emailResult  = email_exp.test(email);
                  var numberResult = number_exp.test(no);
                  if(emailResult==true &&  numberResult==true &&(pass == repas) && fname.length!=0 && mname.length!=0 && lname.length!=0 && add.length!=0 && bd.length!=0 && (no.length>10)&& age.length!=0)
                  {
                            var email = $("#em").val();
                            var pass  = $("#pa").val();
                        
                            firebase.auth().createUserWithEmailAndPassword(email, pass).then(function() {
                               var user = firebase.auth().currentUser.uid;
                               var current_user_db = firebase.database().ref('User').child('OIC/'+user);
                              current_user_db.set({
                                 Address:add,
                                 Age:age,
                                 Contact_Number:no,
                                 firstname:fname,
                                 lastname:lname,
                                 middlename:mname,
                                 Birthdate:bd,
                                 haveAssign:'false'

                              });

                       //--------------CLEAR OBJECT-------------//
                                $("#em").val("");
                                $("#pa").val("");
                                $("#re").val(""); 
                                $("#fnames").val("");
                                $("#mnames").val("");
                                $("#lnames").val(""); 
                                $("#add").val("");
                                $("#dob").html("");
                                $("#no").val("");
                                $("#ages").val("");
                                $("#no_message").html("");
                                $("#email_message").html("");
                                $("#pass_message").html("");
                                $("#repass_message").html("");
                      //--------------------------------------//         

                             }).catch(function(error) {
                                  var errorCode = error.code;
                               var errorMessage = error.message;
                             
                             console.log("error code"+errorCode+" error msg "+errorMessage);
                          });
                  }
                  else{
                    alert("Add Handler failed");
                  }
                  
             
              });
               


               $.getJSON("https://searchand-f8856.firebaseio.com/Dog.json",function(data){
                  //console.log(data);
                  $.each(data,function(key,val){
                     $("#list_of_dogs").append("<tr id='"+val['haveHandler']+"'><td>"+val['Dog_Name']+"</td><td>"+val['Breed']+"</td><td>"+val['Birthdate']+"</td><td>"+val['Age']+"</td><td>"+val['Microchip']+"</td><td><button type='buton' class='btn btn-success'  onclick='assignDog(this.id)' id='"+key+"'><i class='fa fa-tasks'></i>&nbsp;Assign</button></td></tr>"); 
                    $("tr[id='true']").css({"display":"none"});

                    
                  });

               });
               

               $("#btn_update").click(function(){
                              var id    =    $("#uid").val();
                              var fname =    $("#fname").val();
                              var mname =    $("#mname").val(); 
                              var lname =    $("#lname").val();  
                              var add   =    $("#address").val();
                              var cp    =    $("#cp").val();
                              var age   =    $("#age").val();
                              firebase.database().ref('User').child('OIC/' +id)
                               .update({ 
                                   firstname: fname, 
                                   middlename:mname,
                                   lastname:lname,
                                   Contact_Number:cp,
                                   Age:age,
                                   Address:add,
                             });
               }); 

                    var rowIndex = 1;
                  
              
                 
   });


 </script>    
<script type="text/javascript">
  function deletes(id)
  {
       var ref = firebase.database().ref('User').child('OIC').child(id);
                ref.remove()
                .then(function(){
                     console.log("Remove succeeded");
                })  
                .catch(function(error){
                     console.log("Remove failed "+error)
                })    
  }
  
  function removeMyDog(dogUID){
      var handerUID = $("#OIC_id").val();
      var handlerref = firebase.database().ref('User').child('OIC').child(handerUID).child('Assigned_Dogs').child(dogUID);
                 handlerref.remove()
                .then(function(){
                     console.log("Remove succeeded");
                })  
                .catch(function(error){
                     console.log("Remove failed "+error)
                })  

       var dogref = firebase.database().ref('Dog').child(dogUID); 
       dogref.update({
           haveHandler:'false'
       })      
  }
  
  
  function getDogID(id)
  {
    $("#handler_uid").val(id);
  }

  function assignDog(id){
    var handlerUID = $("#handler_uid").val();
      $.getJSON("https://searchand-f8856.firebaseio.com/Dog/"+id+".json",function(data){
            var name  = data['Dog_Name'];
            var breed = data['Breed'];
            var bd    = data['Birthdate'];
            var age   = data['Age'];
            var mchip = data['Microchip'];
                alertify.confirm('Message','Are you sure you want to assign this dog ?', function(){ 
                       var dbhandlerref = firebase.database().ref('User').child('OIC').child(handlerUID);
                       var dbdogref = firebase.database().ref('Dog/'+id);   
                            console.log(id);
 
                        dbdogref.update({
                           haveHandler:"true"
                        })

                        dbhandlerref.child('Assigned_Dogs').child(id)
                        .set({
                          Dog_Name:name,
                          Dog_Breed:breed,
                          Dog_Birthdate:bd,
                          Dog_Age:age,
                          Dog_Microchip:mchip
                        })

                       alertify.success('Dog assign successfully')
                   },
                  function(){
                  
                  }).set('labels', {ok:'Yes', cancel:'No'});
      });
     
  }  
</script>
</html>
