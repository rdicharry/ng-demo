<?php
require_once(dirname(__DIR__,3)."/vendor/autoload.php");
//require_once(dirname(__DIR__, 3)."/php/classes/weather.php");
//require_once(dirname(__DIR__, 3)."/php/lib/xsrf.php");
require_once("/etc/apache2/capstone-mysql/encrypted-config.php");

//require_once("vendor/autoload.php"); // composer's autoload

use GuzzleHttp\Client;

// start the session and create a xsrf token
if(session_status() !== PHP_SESSION_ACTIVE) {
	session_start();
}

// prepare an empty reply
$reply = new stdClass();
$reply->status = 200;
$reply->data = null;

try {
	$config = readConfig("/etc/apache2/capstone-mysql/growify.ini");

	$key = $config["darksky"];
	$location = "35.0853,106.6056";

	$base_url = "https://api.darksky.net/forecast";

	$client = new Client([
		'base_uri'=>$base_url,
		'timeout'=>2.0
	]);

	// send a request to darksky via https
	// I think this blocks on response?
	$response = $client->request('GET', "/forecast/".$key."/".$location);



	$result = json_decode($response->getBody(), true);

	$dailyForecast = $result["daily"];
	$data = $dailyForecast["data"];
	$temperatureMax = $data[0]["temperatureMax"];
	$timestamp = $data[0]["timestamp"];
	$tempartureMin = $data[0]["temperatureMin"];
	$windSpeed = $data[0]["windSpeed"];






} catch (\Exception $e) {
	throw new Exception($e->getMessage());
}