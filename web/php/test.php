<?php




$array = array('k_num'=>$_POST["k_val"],'poi'=> array('school'=>$_POST["schoolpriority"],'hospital'=>$_POST["hospitalpriority"]));
$craftedmessage = json_encode($array);
$response = send("172.22.46.26:5216",$craftedmessage);
$resArr = array();
$resArr = json_decode($response);
//echo "<pre>"; print_r($resArr); echo "</pre>";
$resArrEncoded = json_encode($resArr);
echo $resArrEncoded;
header("Location: https://kaveenk.me/phpjstest.php?json=".$resArrEncoded);


function send($url,$message)
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
