<?php

$ch = curl_init();

$url = 'https://jsonplaceholder.typicode.com';

$tablica_parametrow = [
	'id' => 59
];
$parametry_get = http_build_query($tablica_parametrow);

$url .= '/posts?' . $parametry_get;

curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

$rezultat = curl_exec($ch);

curl_close($ch);

$rezultat = json_decode($rezultat);

echo '<pre>';
var_dump($rezultat[0]->title);
