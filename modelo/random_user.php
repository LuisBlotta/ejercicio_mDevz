<?php

function random_user(){
ini_set("date.timezone", "America/Argentina/Buenos_Aires");

$URL_API = "https://randomuser.me/api/";



$ch = curl_init();

curl_setopt($ch, CURLOPT_URL, $URL_API);
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLINFO_HEADER_OUT, true);

$result = curl_exec($ch);
$info = curl_getinfo($ch);


    $data = json_decode($result, true);

 //var_dump($data);
$img= $data['results'][0]['picture']['large'];

curl_close($ch);
return $img;
}

