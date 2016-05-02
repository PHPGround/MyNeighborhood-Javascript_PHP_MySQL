<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>
        myHood
    </title>
    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/bootstrap-select.min.css" rel="stylesheet">
    <link href="css/bootstrap-toggle.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <link href="css/toaster.css" rel="stylesheet">
    <link href="css/jquery.scrollbar.css" rel="stylesheet">
    <script src="js/moment.js"></script>
</head>

<body class="well-sm">
    <nav class="navbar navbar-default navbar-fixed-top">
        <div class="container">
            <div class="navbar-header">
                <a href="">
                    <img src="image/logo.png" style="height:36px; background-repeat:no-repeat; margin-top:10px">
                </a>
            </div>
            <div id="navbar" class="navbar-right">
                <a id="welcome" class="navbar-brand" href="home.php">
                
               </a>
                <a href="editprofile.php">
                    <img data-toggle="tooltip" data-placement="bottom" title="Edit Profile" src="image/edit.png" style="width:20px; height:20px; background-repeat:no-repeat; margin-top:15px">
                </a>
                <a href="#notify" data-toggle="modal" data-target="#notificationModal">
                    <img data-toggle="tooltip" data-placement="bottom" title="Notification" src="image/notification.png" style="width:24px; height:24px; background-repeat:no-repeat; margin-top:15px">
                </a>
                <a href="#setting" data-toggle="modal" data-target="#settingsModal">
                    <img data-toggle="tooltip" data-placement="bottom" title="Settings" src="image/settings.png" style="width:24px; height:24px; background-repeat:no-repeat; margin-top:15px">
                </a>
            </div>
        </div>
    </nav>
    <div class="container">
        <div style="margin-top:50px" class="row">
            <div class="col-md-8">
                <form class="form-inline">
                    <div class="form-group">
                        <h4>
                     Message Feed  <button id="new-topic" type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#postTopicModal">
                     Post New Topic
                     </button>
                  </h4>
                    </div>
                    <div class="form-group pull-right">
                        <div class="input-group">
                            <input id="searchkey" type="text" class="form-control" placeholder="Search for...">
                            <span class="input-group-btn">
                     <button class="btn btn-default btn-search" data-toggle="modal" type="button">
                     Search
                     </button>
                     </span>
                        </div>
                    </div>
                </form>
                <ul class="nav nav-tabs feed-tab">
                    <li class="active">
                        <a data-toggle="tab" href="#all">
                  All
                  </a>
                    </li>
                    <li>
                        <a data-toggle="tab" href="#hood">
                  Hood
                  </a>
                    </li>
                    <li>
                        <a data-toggle="tab" href="#block">
                  Block
                  </a>
                    </li>
                    <li>
                        <a data-toggle="tab" href="#friend">
                  Friends
                  </a>
                    </li>
                    <li>
                        <a data-toggle="tab" href="#neighbor">
                  Neighbors
                  </a>
                    </li>
                    <li>
                        <a data-toggle="tab" href="#personal">
                  Personal
                  </a>
                    </li>
                </ul>
                <!-- ALL MESSAGES -->
                <div class="tab-content ">
                    <div id="all" class="tab-pane fade in active well  ">
                    </div>
                    <!-- HOOD MESSAGES -->
                    <div id="hood" class="tab-pane fade well">
                    </div>
                    <!-- BLOCK MESSAGES -->
                    <div id="block" class="tab-pane fade well">
                    </div>
                    <!-- FRIEND MESSAGES -->
                    <div id="friend" class="tab-pane fade well">
                    </div>
                    <!-- NEIGHBOR MESSAGES -->
                    <div id="neighbor" class="tab-pane fade well">
                    </div>
                    <!-- PERSONAL MESSAGES -->
                    <div id="personal" class="tab-pane fade well">
                    </div>
                </div>
                <!-- POST NEW TOPIC Modal -->
                <div class="modal fade" id="postTopicModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">
                        &times;
                        </span>
                                </button>
                                <h4 class="modal-title" id="myModalLabel">
                           Post a new topic
                        </h4>
                            </div>
                            <div class="modal-body">
                                <div style="height:200px">
                                    <div class="well" style="height:100%" id="topic-map"></div>
                                </div>
                                <br>
                                <div>
                                    <textarea id="topic-subject" class="form-control" rows="2">
                                    </textarea>
                                </div>
                                <br>
                                <div>
                                    <textarea id="topic-message" class="form-control" rows="5">
                                    </textarea>
                                </div>
                                <br>
                                <select id="topic-recipient" class="selectpicker" title='Select recipient'>
                                    <option value="HOOD">
                                        To everyone in my hood
                                    </option>
                                    <option value="BLOCK">
                                        To everyone in my block
                                    </option>
                                    <option value="FRIENDS">
                                        To all my friends
                                    </option>
                                    <option value="NEIGHBORS">
                                        To all my neighbors
                                    </option>
                                    <option data-divider="true">
                                    </option>
                                    <option value="PERSONAL">
                                        To specific people
                                    </option>
                                </select>
                                <span id="select-recipient-users" style="display:none">
                        <select id="topic-recipient-users" class="selectpicker" multiple title='Select 1 or more people'>
           <!--              <option value="21">Adam Gabriel</option>
                        <option value="24">Renata Jacobs</option>
                        <option value="26">Dedrick Bullard</option>
                        <option value="28">Tristan A Daley</option>
                        <option value="30">Neha Sharma</option> -->
                        <?php include 'php/recipients.php';?>
                        </select>
                        </span>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">
                                    Close
                                </button>
                                <button type="button" class="btn btn-primary btn-post-topic">
                                    Post
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- PRIVATE MESSAGE Modal -->
                <div class="modal fade" id="privateMessageModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">
                        &times;
                        </span>
                                </button>
                                <h4 class="modal-title" id="myModalLabel">
                           Send private message to
                        </h4>
                            </div>
                            <div class="modal-body">
                                <div>
                                    <textarea id="topic-subject" class="form-control" placeholder="Enter your subject..." rows="2">
                                    </textarea>
                                </div>
                                <br>
                                <div>
                                    <textarea id="topic-message" class="form-control" placeholder="Enter your message..." rows="5">
                                    </textarea>
                                </div>
                                <br>
                                </span>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">
                                    Close
                                </button>
                                <button type="button" class="btn btn-primary btn-post-topic">
                                    Post
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- SEARCH Modal -->
                <div class="modal fade" id="searchModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                </div>



                <div id="settingsModal" class="modal fade" tabindex="-1" role="dialog">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">
                        &times;
                        </span>
                                </button>
                                <h4 class="modal-title" id="myModalLabel">
                           Configure settings
                        </h4>
                            </div>
                            <div class="modal-body">

                                <div class="checkbox">
                                    <label>
                                        <input id="setting-email-alert" type="checkbox" data-toggle="toggle"> Enable email alerts
                                    </label>
                                </div>

                                <div class="checkbox disabled">
                                    <label>
                                        <input id="setting-phone-alert" type="checkbox" disabled data-toggle="toggle"> Enable phone alerts
                                    </label>
                                </div>



                            </div>

                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">
                                    Close
                                </button>
                                <button type="button" class="btn btn-primary btn-setting-save">
                                    Save
                                </button>
                            </div>

                        </div>
                        <!-- /.modal-content -->
                    </div>
                    <!-- /.modal-dialog -->
                </div>
                <!-- /.modal -->



                <!-- TOPIC MAP -->
                <div id="topicMapZoom" class="modal fade" tabindex="-1" role="dialog">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-body">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                <br>
                                <div class="well" style="height:300px" id="topic-map-zoom"></div>
                            </div>
                        </div>
                        <!-- /.modal-content -->
                    </div>
                    <!-- /.modal-dialog -->
                </div>
                <!-- /.modal -->

                <!-- NOTIFICATION -->
                <div id="notificationModal" class="modal fade" tabindex="-1" role="dialog">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-body">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                <br>
                                <div class="well" id="notifications"></div>
                            </div>
                        </div>
                        <!-- /.modal-content -->
                    </div>
                    <!-- /.modal-dialog -->
                </div>
                <!-- /.modal -->



            </div>
            <div class="col-md-4">
                <div id="people" class="form-group">
                    <h4>
                  People in your neighborhood
               </h4>
                </div>
                <div class="well" style="height:200px" id="map"></div>
                <div id="hood-members" class=" scolldiv well scrollbar-light">
                </div>
            </div>
        </div>
    </div>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="js/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/jquery.scrollbar.min.js"></script>
    <script src="js/master.js"></script>
    <script src="js/toaster.js"></script>
    <script src="js/bootstrap-select.min.js"></script>
    <script src="js/bootstrap-toggle.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/spinner.min.js"></script>
    <script type="text/javascript">
        // This example creates a simple polygon representing the Bermuda Triangle.


        var oms;
        var active_marker = 0;

        function initMap() {

            $.getScript("js/google_maps_api_v3_7.js", function(data, textStatus, jqxhr) {
                // console.log( data ); // Data returned
                // console.log( textStatus ); // Success
                // console.log( jqxhr.status ); // 200
                // console.log( "Load was performed." );

               

                var map = new google.maps.Map(document.getElementById('map'), {
                    zoom: 12,
                    center: {
                        lat: 40.732509,
                        lng: -73.994639
                    },
                    mapTypeId: google.maps.MapTypeId.TERRAIN
                });

                oms = new OverlappingMarkerSpiderfier(map);




                $.post('php/memberhoodcoords.php', function(response) {
try{
                    console.log(response);
                    var hoodcoords = response;
                    if (hoodcoords.charAt(hoodcoords.length - 2) == ',') {
                        hoodcoords = hoodcoords.substr(0, hoodcoords.length - 2) + "]";
                    }
                    hoodcoords = JSON.parse(hoodcoords);

                    var polygon = new google.maps.Polygon({
                        paths: hoodcoords,
                        strokeColor: '#FF0000',
                        strokeOpacity: 0.8,
                        strokeWeight: 2,
                        fillColor: '#FF0000',
                        fillOpacity: 0.1
                    });

                    polygon.setMap(map);
                }catch(e){
                    console.log(e)
                }

                })


                $.post('php/usercoords.php', function(response) {

                    console.log(response);
                    var usercoords = response;
                    if (usercoords.charAt(usercoords.length - 2) == ',') {
                        usercoords = usercoords.substr(0, usercoords.length - 2) + "]";
                    }
                    // console.log(usercoords)
                    usercoords = JSON.parse(usercoords);
                    if(usercoords.length>0){
                    var bounds = new google.maps.LatLngBounds();
                    var markers = [];
                    var labels = [];
                    var labelIndex = 0;

                    function drop() {
                        // clearMarkers();
                        for (var i = 0; i < usercoords.length; i++) {
                            addMarkerWithTimeout(usercoords[i], i * 200);
                            labels.push('<img style="margin-top:-4px" src="image/user.png" width="16px">' + usercoords[i].userName + '');

                        }
                        //console.log(labels)
                        window.setTimeout(function() {
                            //console.log(bounds)
                            map.fitBounds(bounds);
                            map.panToBounds(bounds);
                            //map.setZoom(map.getZoom()-1)
                        }, 1000);

                    }


                    // var active_marker;
                    function addMarkerWithTimeout(position, timeout) {
                        window.setTimeout(function() {
                            var marker = new google.maps.Marker({
                                position: position,
                                map: map,
                                icon: 'image/house-marker.png',
                                //label: "sadasdasfdf",
                                //animation: google.maps.Animation.DROP
                            });

                            markers.push(marker);

                            var infowindow = new google.maps.InfoWindow({
                                //content: labels[labelIndex++]
                            });
                            //   marker.addListener('click', function() {
                            //   console.log(active_marker);
                            //   if(active_marker!=0){
                            //     active_marker.close();
                            //   } 

                            //   infowindow.open(map, marker);
                            //   active_marker = infowindow;
                            // });
                            var gm = google.maps;
                            var iw = new gm.InfoWindow();
                            oms.addListener('click', function(marker, event) {
                                infowindow.setContent(marker.desc);
                                infowindow.open(map, marker);
                            });
                            // oms.addListener('spiderfy', function(markers) {
                            //   infowindow.close();
                            // });


                            marker.desc = labels[labelIndex++];
                            oms.addMarker(marker);

                            var loc = new google.maps.LatLng(markers[markers.length - 1].position.lat(), markers[markers.length - 1].position.lng());

                            bounds.extend(loc);


                        }, timeout);

                    }
                    window.setTimeout(function() {
                        drop();
                    }, 100);
                }
                }) //end
            });

        }


        //INIT TOPIC MAP
        var topicMarker = [];

        function initTopicMap() {
            var map = new google.maps.Map(document.getElementById('topic-map'), {
                zoom: 13,
                center: {
                    lat: 40.732509,
                    lng: -73.994639
                },
                mapTypeId: google.maps.MapTypeId.TERRAIN,
                zoomControl: true
            });

            google.maps.event.addListener(map, 'click', function(e) {

                removeMarkers();
                var lat = e.latLng.lat();
                var lng = e.latLng.lng();
                var pos = JSON.parse('{"lat":' + lat + ',"lng":' + lng + '}');

                var marker = new google.maps.Marker({
                    position: pos,
                    map: map,
                    animation: google.maps.Animation.DROP
                });
                topicMarker.push(marker);
            });
        }


        //REMOVE MARKERS
        function removeMarkers() {
            for (var i = 0; i < topicMarker.length; i++) {
                topicMarker[i].setMap(null);
            }
        }

        //ZOOM MAP
        function zoomMap(pos) {
            console.log(pos);
            var position = pos.split(",");
            var lat = parseFloat(position[0]);
            var lng = parseFloat(position[1]);
            // console.log(position)
            var map = new google.maps.Map(document.getElementById('topic-map-zoom'), {
                zoom: 13,
                center: {
                    lat: lat,
                    lng: lng
                },
                mapTypeId: google.maps.MapTypeId.TERRAIN,
                zoomControl: true
            });

            var pos = JSON.parse('{"lat":' + lat + ',"lng":' + lng + '}');

            var marker = new google.maps.Marker({
                position: pos,
                map: map,
                animation: google.maps.Animation.DROP
            });
            // var infoWindow = new google.maps.InfoWindow;
            // infoWindow.setPosition(map.latLng);
            //           infoWindow.open(map);
        }
    </script>
    <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDXUQnsU2g7qb5ZBme_4AhJBJNwMtS6ewU&callback=initMap"></script>

</body>

</html>