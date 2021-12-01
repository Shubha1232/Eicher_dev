<?php

$apiKey = 'mapynn6ps9fj10fz8l'; //get your own

$Url = 'http://api.mapyfind.com:8080/group/search';

$secretKey = 'mapynn6ps9fj10fz8l'; //valid admin secretKey

$address = '21'; //secretKey's addressword

$ch = curl_init();

curl_setopt($ch, CURLOPT_URL, $Url."token?api_key=".$apiKey."&api_key=".$apiKey);

curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

curl_setopt($ch, CURLOPT_POSTFIELDS, "grant_type=address&client_id={$apiKey}&secretKey={$secretKey}&address={$address}");

curl_setopt($ch, CURLOPT_POST, 1);

$headers = array();

$headers[] = "Content-Type: application/x-www-form-urlencoded";

$headers[] = "Accept: application/json";

curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

$result = curl_exec($ch);

if (curl_errno($ch)) {

echo 'Error:' . curl_error($ch);

}

curl_close ($ch);                                                                                                                

echo $result;

?>