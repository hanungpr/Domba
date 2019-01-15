<?php

function rand2($length = 10) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyz';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}
function visit(){
    $ch = curl_init();

curl_setopt($ch, CURLOPT_URL, 'https://app.viral-loops.com/api/v2/events');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'OPTIONS');

curl_setopt($ch, CURLOPT_ENCODING, 'gzip, deflate');

$headers = array();
$headers[] = 'Access-Control-Request-Method: POST';
$headers[] = 'Origin: https://primexbt.com';
$headers[] = 'Referer: https://primexbt.com/';
$headers[] = 'User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/71.0.3578.98 Safari/537.36';
$headers[] = 'Access-Control-Request-Headers: content-type';
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

$result = curl_exec($ch);
return $result;
}
function hpr($reff){
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, 'https://app.viral-loops.com/api/v2/events');
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, '{"publicToken":"RlnFOgDUuNs_mkW38dAZJLG3_Fc","params":{"event":"registration","user":{"firstname":"'.rand2(15).'","email":"'.rand2(15).'@gmail.com"},"referrer":{"referralCode":"'.$reff.'"},"refSource":"copy"}}');\
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
    curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 5);
    curl_setopt($ch, CURLOPT_ENCODING, 'gzip, deflate');
    
    $headers = array();
    $headers[] = 'Accept: application/json, text/plain, */*';
    $headers[] = 'Referer: https://primexbt.com/';
    $headers[] = 'Origin: https://primexbt.com';
    $headers[] = 'User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/71.0.3578.98 Safari/537.36';
    $headers[] = 'Content-Type: application/json;charset=UTF-8';
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    
    $result = curl_exec($ch);
    return $result;
}
$reff = "RCb0657";
visit();
$ekse = hpr($reff);
if (stripos($ekse , "isNew")){
    echo "".$ekse;
    $page = $_SERVER['PHP_SELF'];
    $sec = "3";
    header("Refresh: $sec; url=$page");
} else if (stripos($ekse , "Access denied")){
    echo "<h2>AKSES DENIED</h2>";
} else if (stripos($ekse , "Too Many Requests")){
    echo "<h2>Too Many Requests</h2>";
    $page = $_SERVER['PHP_SELF'];
    $sec = "15";
    header("Refresh: $sec; url=$page");
} else {
    echo "<h2>GAGAL</h2>";
    $page = $_SERVER['PHP_SELF'];
    $sec = "3";
    header("Refresh: $sec; url=$page");
}
