<?php
$displaying = false;
$coordinates = null;
$showHospitals = $_GET["showHospitals"];
$showSchools = $_GET["showSchools"];
$showLibraries = $_GET["showLibraries"];

if (!empty($_GET["json"])) {
    $coordinates = $_GET["json"];
    $displaying = true;


}

?>
<!DOCTYPE html>
<html lang="en">
<head>

    <!-- Basic Page Needs
    –––––––––––––––––––––––––––––––––––––––––––––––––– -->
    <meta charset="utf-8">
    <title>Location Optimizer</title>
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

    <!-- Favicon
    –––––––––––––––––––––––––––––––––––––––––––––––––– -->
    <link rel="icon" type="image/png" href="images/favicon.png">

</head>
<body>

<!-- Primary Page Layout
–––––––––––––––––––––––––––––––––––––––––––––––––– -->
<div class="container">
    <div class="row">
        <div class="four columns" style="margin-top: 3%">
            <center><h4><b>Location Optimizer</b></h4>
                <form method="GET" action="php/test.php">

                    <div>
                        <label for="schoolpriority">School Priority</label>
                        <input style="width: 100%;" value=<?php
                        echo (int)$_GET["schoolpriority"];

                        ?> type="range" id="schoolpriority" name="schoolpriority"
                               min="0" max="10">

                    </div>
                    <div>
                        <label for="hospitalpriority">Hospital Priority</label>
                        <input style="width: 100%;" value= <?php
                        echo (int)$_GET["hospitalpriority"];
                        ?> type="range" id="hospitalpriority" name="hospitalpriority"
                               min="0" max="10">

                    </div>
                    <div>
                        <label for="librarypriority">Library Priority</label>
                        <input style="width: 100%;" value= <?php
                        echo (int)$_GET["librarypriority"];
                        ?> type="range" id="librarypriority" name="librarypriority"
                               min="0" max="10">

                    </div>
                    <div>
                        <label for="k_value">K Value</label>

                        <input type="number" default=1 value=<?php
                        echo (int)$_GET["k_val"];
                        ?> id="kval" name="k_val"
                               min="1" max="10"></div>
                    Show Hospitals: <input type="checkbox" name="showHospitals" id="showhospitals"
                                           value="true" <?php if ($_GET["showHospitals"] == "true") {
                        echo "checked";
                    } ?> >
                    Show Schools: <input type="checkbox" name="showSchools" id="showschools"
                                         value="true" <?php if ($_GET["showSchools"] == "true") {
                        echo "checked";
                    } ?> >
                    Show Libraries: <input type="checkbox" name="showLibraries" id="showlibraries"
                                           value="true" <?php if ($_GET["showLibraries"] == "true") {
                        echo "checked";
                    } ?> >
                    <br><input type="submit" value="Submit">


                </form>
            </center>
        </div>
        <div class="eight columns" style="margin-top:3%">
            <?php

            if ($displaying == true) {
                $url = "https://kaveenk.me/hth/innerdisplay.php?json=" . $coordinates . "&showHospitals=" . $showHospitals . "&showSchools=" . $showSchools . "&showLibraries=" . $showLibraries;
                echo "<iframe width='820' height='600' src='" . $url . "'</iframe>";
            } else {
                echo "<iframe width='820' height='600' src='https://kaveenk.me/hth/innerdisplay.php'</iframe>";
            }
            ?>
        </div>
    </div>
</div>

<!-- End Document
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->
</body>
</html>
