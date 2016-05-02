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
    <link href="css/style.css" rel="stylesheet">
    <link href="css/toaster.css" rel="stylesheet">
    <link href="css/jquery.scrollbar.css" rel="stylesheet">
    <script src="js/moment.js"></script>
    <style>
        html,
        body {
            height: 95%;
        }
    </style>
</head>

<body class="well-sm">
    <nav class="navbar navbar-default navbar-fixed-top">
        <div class="container">
            <div class="navbar-header">
               <a href="">
                    <img src="image/logo.png" style="height:36px; background-repeat:no-repeat; margin-top:10px">
                </a>
            </div>
        </div>
    </nav>
    <div class="container" style="height:100%; padding:20px">
        <div class="jumbotron " style="height:100%; background:rgb(251, 251, 251)">
            <h2>Step 2: Join a Neighborhood !</h2>
            <br>
            <br>
            <div style="height:75%; border:1px solid #9d9d9d ">
                <div style="height:100%" class="row">
                    <div style="height:100%" class="col-md-8">
                        <div class="well" style="height:100% " id="map" data-toggle="tooltip" data-placement="top" title="Tooltip"></div>
                        <button type="button" id="resetMap" class="btn btn-danger btn-sm pull-right">Reset</button>
                    </div>
                    <div class="col-md-4">
                        <div class="well-sm" style=" height:100% " id="recent-join">
                            <h4 class="text text-primary">Recently joined blocks</h4>
                            <div></div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="js/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/jquery.scrollbar.min.js"></script>
    <script src="js/toaster.js"></script>
    <script src="js/bootstrap-select.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script type="text/javascript">
        var hood_list;
        var map;
        var geocoder;
        $(document).ready(function() {

            //GET ALL THE HOODS AND INITIALIZE MAP
            $.post('php/gethoods.php', function(response) {

                if (response.charAt(response.length - 2) == ',') {
                    response = response.substr(0, response.length - 2) + "]";
                }
                hood_list = JSON.parse(response);
                initMap();

            });

            //GET RECENTLY JOINED BLOCKS
            $.post('php/recentjoinedblocks.php', function(response) {

                $('#recent-join div').html(response);

            });


            //CBIND CLICK EVENT TO RESET BUTTON
            $('#resetMap').click(function() {

                initMap();
            });

        });

        var active_marker = 0;
        var infoWindow;

        //CALL THIS FUNCTION TO INITIALIZE MAP VIEW
        function initMap() {

            map = new google.maps.Map(document.getElementById('map'), {
                zoom: 13,
                center: {
                    lat: 40.723592,
                    lng: -73.997864
                },


                mapTypeId: google.maps.MapTypeId.TERRAIN
            });

            for (hood in hood_list) {
console.log(hood_list[hood].hoodId)

                $.post('php/hoodcoords.php', {
                    hoodId: hood_list[hood].hoodId
                }, function(response) {

                    var hoodcoords = response;
                    if (hoodcoords.charAt(hoodcoords.length - 2) == ',') {
                        hoodcoords = hoodcoords.substr(0, hoodcoords.length - 2) + "]";
                    }
                    hoodcoords = JSON.parse(hoodcoords);
                    console.log(hoodcoords)
                    var polygon = new google.maps.Polygon({
                        paths: hoodcoords,
                        strokeColor: '#FF0000',
                        strokeOpacity: 0.8,
                        strokeWeight: 2,
                        fillColor: '#FF0000',
                        fillOpacity: 0.1
                    });

                    infoWindow = new google.maps.InfoWindow;


                    polygon.setMap(map);
                    // STEP 3: Listen for clicks on the polygon.
                    //polygon.addListener('click', showArrays);
                    google.maps.event.addListener(polygon, 'click', function(e) {
                        singleHoodMap(e, polygon, hoodcoords[0].hoodId);
                    });
                    // STEP 4: Listen for when the mouse hovers over the polygon.
                    google.maps.event.addListener(polygon, 'mouseover', function(e) {


                        // Within the event listener, "this" refers to the polygon which
                        // received the event.
                        this.setOptions({
                            strokeColor: '#00ff00',
                            fillColor: '#00ff00'
                        });
                        var content; 
                        for (var item in hood_list) {
                            if (hoodcoords[0].hoodId == hood_list[item].hoodId) {
                                infoWindow.setContent("<h5>" + hood_list[item].hoodName + "</h5>");
                                content = hood_list[item].hoodName;

                            }
                        }
                        //var NE = map.getBounds().getNorthEast();
                        //infoWindow.setPosition(e.latLng);
                        //infoWindow.open(map);
                        $('#map').tooltip().attr('data-original-title', content);
                        $('#map').tooltip('show');

                    });
                    // STEP 5: Listen for when the mouse stops hovering over the polygon.
                    google.maps.event.addListener(polygon, 'mouseout', function(e) {
                        //infoWindow.close();
                        this.setOptions({
                            strokeColor: '#ff0000',
                            fillColor: '#ff0000'
                        });
                        //$('#map').tooltip('hide');
                    });


                })



            }


            //CALL THIS FUNCTION TO GET BLOCK ADDRESS WHEN USER CLICKS ON A POINT INSIDE HOOD
            function getBlock(e, polygon, hoodId) {
                // Since this polygon has only one path, we can call getPath() to return the
                // MVCArray of LatLngs.
                var bounds = new google.maps.LatLngBounds();
                var vertices = polygon.getPath();
                var latLng = e.latLng;

                // Iterate over the vertices.
                for (var i = 0; i < vertices.getLength(); i++) {
                    var xy = vertices.getAt(i);
                    var loc = new google.maps.LatLng(xy.lat(), xy.lng());
                    bounds.extend(loc);

                }

                map.fitBounds(bounds);
                map.panToBounds(bounds);

                var contentString;

                // Replace the info window's content and position.
                geocoder = new google.maps.Geocoder();

                geocoder.geocode({
                        'latLng': latLng
                    },
                    function(results, status) {
                        //console.log(results[0].formatted_address)
                        if (status == google.maps.GeocoderStatus.OK) {
                            if (results[0]) {
                                var address_arr = results[0].formatted_address.split(",");
                                console.log(address_arr);
                                contentString = '<h5 name="' + hoodId + '">' + results[0].formatted_address + '</h5><div class="pull-right" > <button type="button" class="btn btn-danger btn-sm join-block" data-toggle="modal" data-target="#">Join Block</div></button>';
                            } else {
                                contentString = "No results";
                            }
                        } else {
                            contentString = status;
                        }
                        infoWindow.setContent(contentString);
                        infoWindow.setPosition(e.latLng);

                        infoWindow.open(map);

                        $('.join-block').click(function() {

                            var formatted_address = $(this).parent().parent().find('h5').text();
                            var address_arr = formatted_address.split(",");
                            var block_addr = address_arr.length>4?address_arr[address_arr.length-4]:address_arr[0];
                            $.post('php/changeblock.php', {
                                hoodId: hoodId,
                                blockName: block_addr,
                                lat: xy.lat(),
                                lng: xy.lng()
                            }, function(response) {
                                console.log(response)
                                if (response) {
                                    toastr.success("Sent request to join block !");
                                    location.href = 'home.php';
                                } else {
                                    toastr.error("Error in joining block " + response);
                                }
                            });

                        });



                    });
            }

            //CALL THIS FUNCTION TO SHOW MAP VIEW FOR SELECTED HOOD
            function singleHoodMap(e, polygon, hoodId) {
                console.log(polygon);
                map = new google.maps.Map(document.getElementById('map'), {
                    zoom: 13,
                    center: {
                        lat: 40.723592,
                        lng: -73.997864
                    },


                    mapTypeId: google.maps.MapTypeId.TERRAIN
                });

                var hoodcoords = [];
                var bounds = new google.maps.LatLngBounds();
                var vertices = polygon.getPath();
                // Iterate over the vertices.
                for (var i = 0; i < vertices.getLength(); i++) {
                    var xy = vertices.getAt(i);
                    hoodcoords.push({
                        "lat": xy.lat(),
                        "lng": xy.lng()
                    });
                    var loc = new google.maps.LatLng(xy.lat(), xy.lng());
                    bounds.extend(loc);
                }


                var polygon = new google.maps.Polygon({
                    paths: hoodcoords,
                    strokeColor: '#FF0000',
                    strokeOpacity: 0.8,
                    strokeWeight: 2,
                    fillColor: '#FF0000',
                    fillOpacity: 0.1
                });

                polygon.setMap(map);
                map.fitBounds(bounds);
                map.panToBounds(bounds);
                google.maps.event.addListener(polygon, 'click', function(e) {
                    getBlock(e, polygon, hoodId);
                });

                infoWindow = new google.maps.InfoWindow;

            }




        }
    </script>
    <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDXUQnsU2g7qb5ZBme_4AhJBJNwMtS6ewU"></script>
</body>

</html>