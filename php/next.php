<?php

require_once ('../global.php');

$v = $_GET["v"];
$v = str_replace(' ', '+', $v);

$n = $_GET["n"];

if(isset($n)){$n=$n+1;}
else {$n=0;}

$url = 'https://www.googleapis.com/youtube/v3/search?part=snippet&q='.$v.'&maxResults=50&order=relevance&safeSearch=strict&type=video&videoDimension=2d&regionCode='.$country_code.'&videoEmbeddable=true&videoSyndicated=true&key='.$v3api;

$content = file_get_contents($url);
$json = json_decode($content, true);

    $vidId = $json['items'][$n]['id']['videoId'];

$redirect = $folder.'play?v='.$vidId.'&s='.$v.'&n='.$n;

header("Location: $redirect");
?>