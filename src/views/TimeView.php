<?php

require ABSPATH. '/src/controllers/TimeController.php';


function getWeatherTime($value) {
	
	$controller = new TimeController();
	return $controller->getWeatherTime($value);
}