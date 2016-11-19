<?php

require_once(dirname(__DIR__, 3)."/php/classes/weather.php");
require_once(dirname(__DIR__, 3)."/php/lib/xsrf.php");
require_once("/etc/apache2/capstone-mysql/encrypted-config.php");





// start the session and create a xsrf token
if(session_status() !== PHP_SESSION_ACTIVE) {
	session_start();
}

// prepare an empty reply
$reply = new stdClass();
$reply->status = 200;
$reply->data = null;

$currentWeather = Weather::getCurrentWeather();

try {






} catch (\Exception $e) {
	throw new Exception($e->getMessage());
}