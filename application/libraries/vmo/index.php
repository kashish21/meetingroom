<?php
require("autoload.php");

// $lib = new \Vimeo\Vimeo('c6d6f99ef81a5802de503f361efbdab2d1f89565', 'gIe5K1JSYu0w84hHo1acGtAoZEwNSwPU3/78KM2xzffnNd3qYXiQXTB5EgaWDLiaYrHJjbqHaT8V073MflV1D0RPAVkE4sdnDnxHhqmQ4iSaY5aF50KRC7iaG/Q4owzW');

$lib = new \Vimeo\Vimeo('83d4fd643c20aa82b539634b3f5cfb52c608b91d','l7XBMs5NYreFum04rk2gj5HDEAlJHGwsF+DUWC2ShDyw1i0S3B8FxSimQOeFnMBk1GSDfmdPQE9L0tFKSodxMFHBkHXi6l8YtP79Zt6MPeufIhzc6WzK9FQo3wIC971b');


$url = $lib->buildAuthorizationEndpoint('http://localhost/vimeoAPI/index.php', 'public private purchased create edit delete interact upload video_files', '11');

// `redirect_uri` must be provided, and must match your configured URI
$token = $lib->accessToken(code, redirect_uri);

// Usable access token
var_dump($token['body']['access_token']);

// Accepted scopes
var_dump($token['body']['scope']);

// Set the token
$lib->setToken($token['body']['access_token']);



echo '<pre>';
var_dump($response);
?>