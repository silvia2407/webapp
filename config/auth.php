<?php
$base="https://pis.bps.go.id/hargaeceran/";

$data_array =  array(
    "email"=> "chil.diggory@gmail.com",
    "password"=>"12345"
);

$data=json_encode($data_array);

$url=$base."login";
//$url="localhost:8080/hargaeceran/login";
$curl = curl_init();

curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
curl_setopt($curl, CURLOPT_URL, $url);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
$result = curl_exec($curl);
$statusCode = curl_getinfo($curl, CURLINFO_HTTP_CODE);

curl_close($curl);

$response = json_decode($result, true);

$key=$response['token'];
?>