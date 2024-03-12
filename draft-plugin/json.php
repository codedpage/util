<?php
header('Access-Control-Allow-Origin: *'); 
header("Access-Control-Allow-Credentials: true");
header('Access-Control-Allow-Methods: GET, PUT, POST, DELETE, OPTIONS');
header('Access-Control-Max-Age: 1000');
header('Access-Control-Allow-Headers: Origin, Content-Type, X-Auth-Token , Authorization');
header("Content-Type: application/json; charset=UTF-8");
$FILE = "/opt/homebrew/var/www/draft/edit/draft5.txt";
$data = file_get_contents($FILE);
$data = json_decode($data);
$data = json_encode($data, JSON_PRETTY_PRINT);
file_put_contents($FILE, $data);
echo  $data;
exit;