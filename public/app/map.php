
<?php

require '../config.php';


$add = urlencode($_POST['address']);
$suburb = urlencode($_POST['suburb']);
$city = urlencode($_POST['city']);
$country  = urlencode($_POST['country']);
$zip = $_POST['zip'];

// $geocode=file_get_contents('http://maps.google.com/maps/api/geocode/json?address='.$add.',+'.$suburb.',+'.$city.',+'.$country.'&sensor=false');

// start a connection using cURL
$connection = curl_init();

curl_setopt($connection, CURLOPT_URL, 'http://maps.google.com/maps/api/geocode/json?address='.$add.',+'.$suburb.',+'.$city.',+'.$country.'&sensor=false');
curl_setopt($connection, CURLOPT_RETURNTRANSFER, true);

//proxy settings 

// At home comment out next 3 line because proxy dosen't require
// But at yoobee you will require next 3 line so dont need to comment out

// curl_setopt($connection, CURLOPT_PROXY, 'proxy');
// curl_setopt($connection, CURLOPT_PROXYPORT, '3128');
// curl_setopt($connection, CURLOPT_PROXYUSERPWD, YOOBEE_LOGIN.':'.YOOBEE_PASSWORD);

$geocode = curl_exec($connection);

//Close the connection
curl_close($connection);

// Header
header('Content-Type: application/json');

// Send the JSON back
echo $geocode;







