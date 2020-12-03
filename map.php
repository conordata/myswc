<?php

if(!isset($_SESSION))
{
    session_start();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>mySWC-Maps</title>

    <link rel="stylesheet" href="assets/style/menu.css">
    <link rel="stylesheet" href="assets/style/main.css">

    <style>
        #map {
            height: 600px;
            background-color: grey;
            margin-top: -15px;
            margin-left: 250px;  
        }
    </style>
   
</head>
<body>
    <section>
        <?php include_once 'commons/menu.php';?>

        <?php include_once 'commons/header.php';?>

        <?php 
            include_once 'modals/Fhistoric.php';
            $historic=Fhistoric::getAllHistoricDay();
        ?>
       
    </section>

    <section class="body-container">


        <div id="map">
            <script>


            function initMap() {

                var locations = [];


                var xmlhttp = new XMLHttpRequest();
                xmlhttp.onreadystatechange = function() {
                    if (this.readyState == 4 && this.status == 200) {
                        locations=(JSON.parse(this.responseText));

                        var center = {lat: 20.595164, lng: 78.963606};

                        var map = new google.maps.Map(document.getElementById('map'), {
                            zoom: 9,
                            center: center
                        });
                        var infowindow =  new google.maps.InfoWindow({});
                        var marker, count;
                        for (count = 0; count < locations.length; count++) {
                            marker = new google.maps.Marker({
                                position: new google.maps.LatLng(locations[count][1], locations[count][2]),
                                map: map,
                                title: locations[count][0]
                            });
                            google.maps.event.addListener(marker, 'click', (function (marker, count) {
                                return function () {
                                    infowindow.setContent(locations[count][0]);
                                    infowindow.open(map, marker);
                                }
                            })(marker, count));
                        }

                    }
                };
                xmlhttp.open('GET', 'http://127.0.0.1/myswc/controllers/getMaps.php');
                xmlhttp.send();

            }


        </script>

    </div>

    <!-- <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD_0-Ytq5LDCQ1I1a3fL6SncIWGHu0nmIU&callback=initMap"></script> -->
        
            
    </section>
</body>

</html>