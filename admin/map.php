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
                                    <li class="active">
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
                       <div class="main-panel" style="width:100%">
                          <div id="map" style="width:100%;height: 560px"></div>
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
                               
    </script>
    <script>
      function initMap() {
        var uluru = {lat: 14.683396, lng: 120.999703};
         var mapOptions = {
            zoom: 13,
            center: uluru,
            scrollwheel: false,
            styles: [{
                "featureType": "water",
                "stylers": [{
                    "saturation": 43
                }, {
                    "lightness": -11
                }, {
                    "hue": "#0088ff"
                }]
            }, {
                "featureType": "road",
                "elementType": "geometry.fill",
                "stylers": [{
                    "hue": "#ff0000"
                }, {
                    "saturation": -100
                }, {
                    "lightness": 99
                }]
            }, {
                "featureType": "road",
                "elementType": "geometry.stroke",
                "stylers": [{
                    "color": "#808080"
                }, {
                    "lightness": 54
                }]
            }, {
                "featureType": "landscape.man_made",
                "elementType": "geometry.fill",
                "stylers": [{
                    "color": "#ece2d9"
                }]
            }, {
                "featureType": "poi.park",
                "elementType": "geometry.fill",
                "stylers": [{
                    "color": "#ccdca1"
                }]
            }, {
                "featureType": "road",
                "elementType": "labels.text.fill",
                "stylers": [{
                    "color": "#767676"
                }]
            }, {
                "featureType": "road",
                "elementType": "labels.text.stroke",
                "stylers": [{
                    "color": "#ffffff"
                }]
            }, {
                "featureType": "poi",
                "stylers": [{
                    "visibility": "off"
                }]
            }, {
                "featureType": "landscape.natural",
                "elementType": "geometry.fill",
                "stylers": [{
                    "visibility": "on"
                }, {
                    "color": "#b8cb93"
                }]
            }, {
                "featureType": "poi.park",
                "stylers": [{
                    "visibility": "on"
                }]
            }, {
                "featureType": "poi.sports_complex",
                "stylers": [{
                    "visibility": "on"
                }]
            }, {
                "featureType": "poi.medical",
                "stylers": [{
                    "visibility": "on"
                }]
            }, {
                "featureType": "poi.business",
                "stylers": [{
                    "visibility": "simplified"
                }]
            }]
        }
        var map = new google.maps.Map(document.getElementById('map'),mapOptions);
        
         ref = firebase.database().ref('OnlineHandlers');  
         ref.once('value',function(snap){
            datos = snap.val();
             for(k in datos)
             {           
                fila  = datos[k];
                lats = fila.l[0];
                lngs = fila.l[1];
                pos = {lat: parseFloat(lats), lng:parseFloat(lngs)};
                marker = new google.maps.Marker({
                  position:pos,
                  map:map,
                  draggable: true,
                  animation: google.maps.Animation.DROP,
        
                });
                marker.addListener('click', toggleBounce);
             }

        });
        
       ref.on('child_removed',function(snap){
           window.location='map.php';  
       }); 



      }
       function toggleBounce() {
        if (marker.getAnimation() !== null) {
          marker.setAnimation(null);
        } else {
          marker.setAnimation(google.maps.Animation.BOUNCE);
        }
      }
    </script>
    <script async defer 
src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDCN4nwCYIm4WKtF0MTJB_jev25ZHWh7bU&callback=initMap"></script>
</html>
  
