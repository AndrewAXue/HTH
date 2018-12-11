<?php

$showHospitals = $_GET["showHospitals"];
$showSchools = $_GET["showSchools"];
$showLibraries = $_GET["showLibraries"];
$showCommunityCentres = $_GET["showCommunityCentres"];
$showTourismPOI = $_GET["showTourismPOI"];

if ((int)$_GET["schoolpriority"] + (int)$_GET["librarypriority"] + (int)$_GET["hospitalpriority"] + (int)$_GET["communitycentrespriority"] + (int)$_GET["tourismpoipriority"] == 0) {
    $array = array('k_num' => (int)$_GET["k_val"], 'poi' => array('school' => 1, 'hospital' => 1, 'libraries' => 1, 'community_centres'=>1,'tourism_poi'=>1));
} else {


    $array = array('k_num' => (int)$_GET["k_val"], 'poi' => array('school' => (int)$_GET["schoolpriority"], 'hospital' => (int)$_GET["hospitalpriority"], 'libraries' => (int)$_GET["librarypriority"],'community_centres' => (int)$_GET["communitycentrespriority"],'tourism_poi'=>(int)$_GET["tourismpoipriority"]));
}
$craftedmessage = json_encode($array);
$response = send("35.231.54.245:5216", $craftedmessage);
$resArr = array();
$resArr = json_decode($response);
//echo "<pre>"; print_r($resArr); echo "</pre>";
$resArrEncoded = json_encode($resArr);
echo $resArrEncoded;

header("Location: https://kaveenk.me/hth/index.php?json=" . $resArrEncoded . "&showHospitals=" . $showHospitals . "&k_val=" . $_GET["k_val"] . "&schoolpriority=" . $_GET["schoolpriority"] . "&hospitalpriority=" . $_GET["hospitalpriority"] . "&showSchools=" . $showSchools . "&librarypriority=" . $_GET["librarypriority"] . "&showLibraries=" . $showLibraries."&communitycentrespriority=".$_GET["communitycentrespriority"]."&showCommunityCentres=".$showCommunityCentres."&tourismpoipriority=".$_GET["tourismpoipriority"]."&showTourismPOI=".$showTourismPOI);


function send($url, $message)
{
    $options = array(
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_HEADER => false,
        CURLOPT_HTTPHEADER => array("Content-type: application/json"),
        CURLOPT_ENCODING => "",
        CURLOPT_CONNECTTIMEOUT => 120,
        CURLOPT_TIMEOUT => 120,
        CURLOPT_POST => true,
        CURLOPT_POSTFIELDS => $message
    );

    $ch = curl_init($url);
    curl_setopt_array($ch, $options);

    $content = curl_exec($ch);

    curl_close($ch);

    return $content;
}
