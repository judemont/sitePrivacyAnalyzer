<?php
header('Content-Type: application/json');
error_reporting(E_ALL);
ini_set('display_errors', 1);

const API_KEYS = ["5963b220-6193-400d-848a-b9363bca4952"];

$domain = $_GET['domain'];


$apiKey = API_KEYS[array_rand(API_KEYS)];
$url = "https://api.builtwith.com/free1/api.json?KEY=$apiKey&LOOKUP=$domain";

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
$response = curl_exec($ch);
curl_close($ch);

$responseData = json_decode($response, true);

$groups = [];
foreach ($responseData['groups'] as $group) {
    $groups[] = $group['name'];
}

echo json_encode(array(
    "domain" => $domain,
    "ads" => in_array("ads", $groups),
    "analytics" => in_array("analytics", $groups),
));

?>