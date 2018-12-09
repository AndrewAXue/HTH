<?php
$displaying = false;
$coordinates = null;
if (!empty($_GET["json"])) {
     $coordinates = $_GET["json"];
     $displaying = true;


}

?>
<!DOCTYPE html>
<html>
<head>
    <title>Simple Map</title>
    <meta name="viewport" content="initial-scale=1.0">
    <meta charset="utf-8">

    <meta charset="utf-8">
    <title>TITLE</title>
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Mobile Specific Metas
    –––––––––––––––––––––––––––––––––––––––––––––––––– -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- FONT
    –––––––––––––––––––––––––––––––––––––––––––––––––– -->
    <link href="//fonts.googleapis.com/css?family=Raleway:400,300,600" rel="stylesheet" type="text/css">

    <!-- CSS
    –––––––––––––––––––––––––––––––––––––––––––––––––– -->
    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="css/skeleton.css">


    <style>
        /* Always set the map height explicitly to define the size of the div
         * element that contains the map. */
        #map {
            height: 100%;
        }

        /*Optional: Makes the sample page fill the window.*/
        html, body {
            height: 100%;
            margin: 0;
            padding: 0;
        }
    </style>
</head>


<body>


<center><h4>Optimized Selection</h4></center>

<center>
    <div class="row">
        <form method="GET" action="php/test.php">

            <div>
                <input type="range" id="schoolpriority" name="schoolpriority"
                       min="0" max="10">
                <label for="schoolpriority">School Priority</label>
            </div>
            <div>
                <input type="range" id="hospitalpriority" name="hospitalpriority"
                       min="0" max="10">
                <label for="hospitalpriority">Hospital Priority</label>
            </div>
            <div><label for="k_value">K Value</label>

                <input type="number" id="kval" name="k_val"
                       min="1" max="10"></div>
            <input type="submit" value="Submit">
    </div>



</form>
<p id="testing">testing 123</p>
</center>
<div id="map"></div>
<script>
    var map;

    function initMap() {
        var hamilton = {lat: 43.2557, lng: -79.8711};

        var map = new google.maps.Map(document.getElementById('map'), {
            zoom: 11,
            center: hamilton
        });


        var array = '<?php echo $coordinates ?>';
        var obj = JSON.parse(array);


        for (i = 0; i< obj.length;i++)
        {
            var markerLocation = new google.maps.LatLng(parseFloat(obj[i][1]),parseFloat(obj[i][0]));


            var marker = new google.maps.Marker({
                position: markerLocation,
                map: map,
                title: "test"
            });
        }
    }




</script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDAhFU8SCQEF1LBtl0rt1O0JadwXGFKEUI&callback=initMap"
        async defer></script>

</body>
</html>
