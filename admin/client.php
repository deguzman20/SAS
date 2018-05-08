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
                                      <li class="active">
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
                    <button type="button" class="btn btn-danger" id="btn_add" data-toggle="modal" data-target="#addClient"><i class="fa fa-briefcase"></i>&nbsp;&nbsp;Add Client</button>
                   </div>
                   
                    <!-- Modal For Add Handler -->
                      <div class="modal fade" id="addClient">
                          <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                             
                               <div class="modal-header bg bg-primary">
                                 <button type="button" class="close" data-dismiss="modal">&times;</button>
                                 <h3><i class="fa fa-briefcase"></i>&nbsp;Add Client</h3>
                               </div>

                                 <div class="modal-body">
                                 
                                       <div class="col-md-12">
                                            <div class="col-md-12" style="padding-bottom:20px">
                                                <div class="input-group">
                                                    <span class="input-group-addon"><i class="fa fa-briefcase" style="font-size:21px"></i></span>
                                                    <input id="client" type="text" class="form-control"  placeholder="Company Client" style="padding-left: 10px">
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
                                    <h4 class="title">Client List</h4>
                                    <p class="category"></p>
                                </div>
                                <div class="card-content table-responsive">
                                    <table class="table" id="tbl_client_list">
                                              <tr>
                                                    <td>Client Names</td>
                                                    <td>Action</td>
                                              </tr> 
                                        
                                    </table>
                                </div>
                            </div>
                        </div>
                     </div>
                </div>
            </div>
        </div>
    <div class="modal fade" id="AssignedEmployee">
       <div class="modal-dialog modal-lg">
         <div class="modal-content">
             <div class="modal-header bg bg-primary">
               <input type="text" id="branch_ID" style="display:none"/>
               <input type="text" id="selected_BranchID" style="display:none">
               <input type="text" id="selected_BranchText" style="display:none">
               <input type="text" id="selected_OIC" style="display: none">
               <input type="text" id="selected_Handler" style="display:none; ">
               <input type="text" id="clientID" style="display:none">
               <button class="close" data-dismiss="modal" id="closeAssignEmployee">&times;</button>
                <h3><i class="fa fa-user"></i>&nbsp;Assigned Employee</h3>  
                 <input type="text" id="uid" style="display:none">
              </div>
              <div class="modal-body">
                    <div class="col-md-6">
                       <label>Branch</label><br>
                       <select id="branches" class="form-control">
                         <option></option>
                       </select>
                    </div>
                    <div class="col-md-6">
                       <label>OIC</label>
                       <select id="OIC" class="form-control">
                       <option></option>
                       </select>
                    </div>      
                     <div class="col-md-6">
                       <label>Handler</label>
                       <select id="Handler" class="form-control">
                       <option></option>
                       </select>
                    </div>                                       
              </div> 
             <div class="modal-footer">
                 <button type="button" data-dismiss="modal" class="btn pull-right btn-danger">Close</button>
                 <button type="button" id="btn_assign"  class="btn pull-right">Add</button>
             </div> 
         </div>  
       </div>
    </div> 
    <div class="modal fade" id="AddBranch">
     <div class="modal-dialog">
       <div class="modal-content">
         <div class="modal-header bg bg-primary">
           <input type="text" id="branch_id" style="display:none"/>
           <button class="close" data-dismiss="modal" id="close_addBranch">&times;</button>
           <h3><i class="fa fa-building"></i>&nbsp;Add Branch</h3>   
         </div>
         <div class="modal-body">
           <div class="col-md-12">
             <input type="text" id="branch_name" class="form-control" placeholder="Branch Name" style="padding-left: 10px">

           </div>
         </div>
         <div class="modal-footer">
             <br><br>
            <button type="text" id="btn_addBranch" class="btn btn-success">Save</button>
         </div>
       </div>
     </div> 
    </div>  
    <div class="modal fade" id="ViewClientBranch">
      <div class="modal-dialog">
        <div class="modal-content">
           <div class="modal-header">
             <button type="button" class="close" data-dismiss="modal" id="closeViewClientBranch">&times;</button>
             <h3 id="clientname"></h3>
           </div>
           <div class="modal-body">
             <table class="table table-condensed" id="tbl_client_branch_list">
               <tr class="bg bg-primary">
                 <td>Branches</td>
                 <td>Action</td>
               </tr>                
             </table>
           </div>
           <div class="modal-footer">

           </div>
        </div> 
      </div> 
    </div>  
    <div class="modal fade" id="ViewAssignedEmployee">
      <div class="modal-dialog">
        <div class="modal-content">
         <div class="modal-header bg bg-primary">
           <input type="text" id="branchIds">
           <input type="text" id="branchNameIds">
           <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h3>Assigned Employee</h3>
            
         </div>
         <div class="modal-body">
            <div id="branch_wrapper"> 
                 <ul class="nav nav-tabs">
                    <li class="active"><a data-toggle="tab" href="#handler">Handler</a></li>
                    <li><a data-toggle="tab" href="#oic">OIC</a></li>
                 </ul>

                  <div class="tab-content">
                      <div id="handler" class="tab-pane fade in active">
                        <table id="tbl_assigned_handler" class="table table-condensed table-responsive">
                           <tr>
                             <th>Branches</th>
                             <th>Action</th>
                           </tr>
                        </table> 
                      </div>
                      <div id="oic" class="tab-pane fade">
                        <table id="tbl_assigned_oic" clas="table-condensed">
                          <tr>
                             <th>Branches</th>
                             <th>Action</th>
                           </tr>
                        </table> 
                      </div>  
                  </div>
            </div>
            <div id="employee_wrapper"> 
                 <ul class="nav nav-tabs">
                    <li class="active"><a data-toggle="tab" href="#handlers">Handler</a></li>
                    <li><a data-toggle="tab" href="#oics">OIC</a></li>
                 </ul>

                  <div class="tab-content">
                      <div id="handlers" class="tab-pane fade in active">
                        <table id="tbl_assigned_handlers" class="table table-condensed table-responsive">
                           <tr>
                             <th>Fullname</th>
                             <th>Action</th>
                           </tr>
                        </table> 
                      </div>
                      <div id="oics" class="tab-pane fade">
                        <table id="tbl_assigned_o" class="table-condensed table-responsive">
                          <tr>
                            <th>Fullname</th>
                            <th>Action</th>
                          </tr>
                        </table> 
                      </div>  
                  </div>
            </div>
         </div>
         <div class="modal-footer">

         </div> 
        </div> 
      </div>  
    </div>  
   <!--  <div class="modal fade" name="ViewAssignedHandler">
      <div class="modal-dialog">
       <div class="modal-content">
         <div class="modal-header">
         </div>
         <div class="modal-body">

         </div>
         <div class="modal-footer">

         </div> 
       </div> 
      </div>  
    </div> -->

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
  
$("#employee_wrapper").hide();     

        //Add Client 
       $("#btn_save").click(function(){
           var client       = $("#client").val();
           var client_db = firebase.database().ref('Clients');
           client_db.push().set({
              Client:client
           });
       }); 

       $("#close_addBranch").click(function(){
          $("#branch_name").val("");
       });
       
       //Retreive Data
          var tblClients = document.getElementById('tbl_client_list');
                          var dbref = firebase.database().ref('Clients');
                          var rowIndex = 1;
          dbref.on('value',function(snapshot){
             snapshot.forEach(function(childSnapshot){
                 var childKey  = childSnapshot.key;
                 var childData = childSnapshot.val();
                   var row                     = tblClients.insertRow(rowIndex);
                   var cellClientName          = row.insertCell(0);
                   var cellAssignEmployee      = row.insertCell(1);
                   var cellBranch              = row.insertCell(2);
                   var cellAssignedEmployee    = row.insertCell(3);
                   var cellViewBranch          = row.insertCell(4);

                   cellClientName.appendChild(document.createTextNode(childData.Client));

                   var AssignEmployee = document.createElement('BUTTON');
                              var att = document.createAttribute("class");
                              att.value = "btn btn-success";
                              AssignEmployee.innerHTML="<i class='fa fa-user'></i>&nbsp;&nbsp;Assign Employee"; 
                              AssignEmployee.setAttributeNode(att);
                              AssignEmployee.setAttribute("id",childKey);
                              AssignEmployee.setAttribute("data-toggle","modal");
                              AssignEmployee.addEventListener("click",function(){
                                     $("#AssignedEmployee").modal({backdrop: "static"});
                                    $("#clientID").val(this.id);
                                    $.getJSON("https://searchand-f8856.firebaseio.com/Clients/"+childKey+"/Branches.json",function(data){
                                        $.each(data,function(key,val){
                                           $("#branches").append("<option id='"+key+"' value='"+val['BranchName']+"'>"+val['BranchName']+"</option>");
                                             
                                              $("option[value='undefined']").css({
                                                 "display":"none"
                                              });

                                            $('#branches').on('change', function () {
                                                 var selectedId    = this.selectedOptions[0].id;
                                                 var selectedText  = this.selectedOptions[0].text;
                                                 $("#selected_BranchID").val(selectedId);
                                                 $("#selected_BranchText").val(selectedText);
                                            });


                                        });
                                    });

                                     $("#btn_assign").click(function(){
                                               var id = $("#OIC").val();
                                               var handlerID = $("#Handler").val();
                                               var selectedOIC = $("#selected_OIC").val();
                                               var selectedHandler = $("#selected_Handler").val();
                                               var clientID = $("#clientID").val();
                                               var BranchSelectedId = $("#selected_BranchID").val();
                                               var BranchSelectedText= $("#selected_BranchText").val();

                                               var OICRef = firebase.database().ref('User').child('OIC').child(id);
                                               
                                               var HandlerRef =firebase.database().ref('User').child('Handlers').child(handlerID);

                                               var branchAssignOICRef  = firebase.database().ref('Clients').child(clientID).child('Branches').child(BranchSelectedId).child('Assigned_OIC');
                                               
                                                var branchAssignHandlerRef  = firebase.database().ref('Clients').child(clientID).child('Branches').child(BranchSelectedId).child('Assigned_Handlers');
                                              

                                               branchAssignOICRef.push().set({
                                                  Fullname:selectedOIC,
                                                  uid:id

                                               }) 

                                               branchAssignHandlerRef.push().set({
                                                  Fullname:selectedHandler,
                                                  uid:handlerID
                                               }) 
                                                
                                                OICRef.update({
                                                     haveAssign:'true' 
                                                   })

                                                HandlerRef.update({
                                                     haveAssign:'true' 
                                                   })

                                            
                                           });

                                    $.getJSON("https://searchand-f8856.firebaseio.com/User/OIC.json",function(data){
                                        $.each(data,function(key,val){
                                           $("#OIC").append("<option value='"+key+"' id='"+val['Position']+"' name='"+val['haveAssign']+"'>"+val['firstname']+" "+val['lastname']+"</option>");
                                           
                                           $("#OIC").change(function(){
                                                 var selectedValue = this.selectedOptions[0].text;
                                                 $("#selected_OIC").val(selectedValue);
                                                  
                                           });

                                           $("#OIC > option[name='true']").css({
                                               "display":"none"
                                           }); 
                                          
                                           $("option[id='Handler']").css({
                                                 "display":"none" 
                                           });

                                        });
                                    });

                                    $.getJSON("https://searchand-f8856.firebaseio.com/User/Handlers.json",function(data){
                                        $.each(data,function(key,val){
                                           $("#Handler").append("<option value='"+key+"' id='"+val['Position']+"' name='"+val['haveAssign']+"'>"+val['firstname']+" "+val['lastname']+"</option>");
                                           
                                           $("#Handler").change(function(){
                                                 var selectedValue = this.selectedOptions[0].text;
                                                 $("#selected_Handler").val(selectedValue);
                                                  
                                           });
                                           
                                           
                                           $("#Handler > option[name='true']").css({
                                               "display":"none"
                                           });   

                                           $("option[id='Handler']").css({
                                                 "display":"none" 
                                           });

                                        });
                                    });



                              });

                   cellAssignEmployee.appendChild(AssignEmployee);           
                   var BtnBranch   = document.createElement('BUTTON');
                   var branchAtt   = document.createAttribute('class');
                   branchAtt.value = "btn btn-warning";
                   BtnBranch.innerHTML="<i class='fa fa-building'></i>&nbsp;&nbsp;Add Branch";
                   BtnBranch.setAttributeNode(branchAtt);
                   BtnBranch.setAttribute("id",childKey);
                   BtnBranch.setAttribute("data-toggle","modal");
                   BtnBranch.setAttribute("data-target","#AddBranch");
                   BtnBranch.addEventListener("click",function(){
                        $("#branch_id").val(this.id);   
                   });


                 

                   cellBranch.appendChild(BtnBranch);  
                  

                    var AssignedEmployee = document.createElement('BUTTON');
                              var attAssigned = document.createAttribute("class");
                              attAssigned.value = "btn btn-info";
                              AssignedEmployee.innerHTML="<i class='fa fa-user'></i>&nbsp;&nbsp;Assigned Employee"; 
                              AssignedEmployee.setAttributeNode(attAssigned);
                              AssignedEmployee.setAttribute("id",childKey);
                              AssignedEmployee.setAttribute("data-toggle","modal");
                              AssignedEmployee.addEventListener("click",function(){
                                 $("#ViewAssignedEmployee").modal({backdrop:"static"});
                                

                                 $("#branchIds").val(this.id);
                                 $.getJSON("https://searchand-f8856.firebaseio.com/Clients/"+this.id+"/Branches.json",function(data){
                                     $.each(data,function(key,val){
                                        $("#tbl_assigned_oic").append("<tr id='"+key+"'><td>"+val['BranchName']+"</td><td><button type='button' class='btn btn-info' data-toggle='modal' data-target'#"+key+"'><span class='fa fa-eye'></span>&nbsp;View OIC</button></td></tr>");
                                         $("div[name='ViewAssignedHandler']").attr("id",key);
                                         $("#"+key).click(function(){
                                               $("#branchNameIds").val(key);
                                             
                                              $.getJSON("https://searchand-f8856.firebaseio.com/Clients/"+$("#branchIds").val()+"/Branches/"+$("#branchNameIds").val()+"/Assigned_OIC.json",function(data){
                                                    $.each(data,function(key,val){
                                                         $("#tbl_assigned_o").html("<tr><td>"+val['Fullname']+"</td><td><button type='button' class='btn btn-danger' id='"+key+"'>Remove</button></td></tr>");
                                                           
                                                    });                  
                                              });

                                              $("#branch_wrapper").slideUp();
                                              $("#employee_wrapper").slideDown(); 
                                         });
                                     }); 
                                 });    
                                 


                                 $.getJSON("https://searchand-f8856.firebaseio.com/Clients/"+this.id+"/Branches.json",function(data){
                                     $.each(data,function(key,val){
                                        $("#tbl_assigned_handler").append("<tr id='"+key+"'><td>"+val['BranchName']+"</td><td><button type='button' class='btn btn-info' data-toggle='modal' data-target'#"+key+"-handler'><span class='fa fa-eye'></span>&nbsp;View Handlers</button></td></tr>");
                                         $("div[name='ViewAssignedHandler']").attr("id",key);
                                         $("#"+key).click(function(){
                                               $("#branchNameIds").val(key);
                                             
                                              $.getJSON("https://searchand-f8856.firebaseio.com/Clients/"+$("#branchIds").val()+"/Branches/"+$("#branchNameIds").val()+"/Assigned_Handlers.json",function(data){
                                                   $.each(data,function(key,val){
                                                      $("#tbl_assigned_handlers").append("<tr><td>"+val['Fullname']+"</td><td><button type='button' class='btn btn-danger' id='"+key+"'>Remove</button></td></tr>"); 

                                                      $("#"+key).click(function(){
                                                             
                                                              alertify.confirm('Message','Are you sure you want to remove this handler in this branch ?', function(){ 
                                                                  var branchId = $("#branchIds").val();
                                                                  var handlerRef = firebase.database().ref('User').child('Handlers').child(val['uid']);
                                                                   
                                                                  handlerRef.update({
                                                                    haveAssign:'false'
                                                                  }) 


                                                                  var branchName = $("#branchNameIds").val();    
                                                                 var handlerref=firebase.database().ref('Clients').child(branchId).child('Branches').child(branchName).child('Assigned_Handlers').child(key);

                                                                  handlerref.remove()
                                                                  .then(function(){
                                                                       console.log("Remove succeeded");
                                                                  })  
                                                                  .catch(function(error){
                                                                       console.log("Remove failed "+error)
                                                                  }) 


                                                               
                                                                alertify.success('Handler Removed successfully')
                                                                 },
                                                                function(){
                                                                
                                                                }).set('labels', {ok:'Yes', cancel:'No'});


                                                      });

                                                   });                       
                                              });

                                              $("#branch_wrapper").slideUp();
                                              $("#employee_wrapper").slideDown(); 
                                         });
                                     }); 
                                 });                                 
                              });
                              

                     cellAssignedEmployee.appendChild(AssignedEmployee);
                     
                     var ViewBranch = document.createElement('BUTTON');
                              var attViewBranch = document.createAttribute("class");
                              attViewBranch.value = "btn btn-danger";
                              ViewBranch.innerHTML="<i class='fa fa-eye'></i>&nbsp;&nbsp;View Branch";
                              ViewBranch.setAttributeNode(attViewBranch);
                              ViewBranch.setAttribute("id",childKey); 
                              ViewBranch.setAttribute("data-toggle","modal");
                              ViewBranch.addEventListener("click",function(){
                                    $("#ViewClientBranch").modal({backdrop: "static"});  
                                    $.ajax({
                                          url:'https://searchand-f8856.firebaseio.com/Clients/'+this.id+'.json',
                                          type:"GET",
                                          dataType:"JSON",
                                          success:function(data){
                                             $("#clientname").html(data.Client);
                                          },
                                          error:function(err)
                                          {  
                                             console.log(err);
                                          }


                                    });

                                     $.getJSON("https://searchand-f8856.firebaseio.com/Clients/"+this.id+"/Branches.json",function(data){
                                            
                                           $.each(data,function(key,val){
                                                var arrs = [];
                                                var arr = key=='Assigned_Handlers'? '':arrs.push(key);
                                              
                                                if(arrs.length==1)
                                                {
                                                   
                                                  $("#tbl_client_branch_list").append("<tr id='"+val['BranchName']+"'><td>"+val['BranchName']+"</td><td><div class='btn-group'><button type='button' class='btn btn-warning' >Edit</button><button type='button' class='btn btn-danger' id='"+arrs[0]+"'>Remove</button></div></td></tr>");
                                                   
                                                   $("button[id='"+arrs[0]+"']").click(function(){
                                                               alertify.confirm('Message','Are you sure you want to remove this branch ?<input type="text" value="'+this.id+'" id="branchID" style="display:none">',
                                                                function(){ 
                                                                 var branchID = $("#branchID").val();

                                                                    var branchref = firebase.database().ref('Clients').child(childKey).child('Branches').child(branchID);
                                                                     branchref.remove()
                                                                    .then(function(){
                                                                         console.log("Remove succeeded");
                                                                    })  
                                                                    .catch(function(error){
                                                                         console.log("Remove failed "+error)
                                                                    })  

                                                                 alertify.success('Branch removed successfully')
                                                               },
                                                                function(){
                                                            
                                                            }).set('labels', {ok:'Yes', cancel:'No'});
                                                  });   
                                                }
                           
                                                
                                               $("#undefined").css({
                                                  "display":"none"
                                               }); 

                                           }); 
                                     });

                              });   

                     cellViewBranch.appendChild(ViewBranch);

                   rowIndex+=1;
             }); 
          });

         dbref.on("child_changed",function(snapshot){
             location.reload();
         });    

         dbref.on("child_removed",function(snapshot){
             location.reload();
         });

         $("#btn_addBranch").click(function(){
            var branchID   = $("#branch_id").val();
            var branchName = $("#branch_name").val();
            var branchRef   = firebase.database().ref('Clients').child(branchID).child('Branches');
            branchRef.push().set({
                BranchName:branchName 
            })
         });
         $("#closeAssignEmployee,#closeViewClientBranch").click(function(){
            window.location.reload();
         });
            
   });
 </script>
 
</html>
