<?php

require ABSPATH. '/src/controllers/TimeController.php';

/**
 * Chama o controller para retornar condições do tempo
 * @param String $value
 * @return Ambigous <NULL, string>
 */
function getWeatherTime($value) {
	
	$controller = new TimeController();
	return $controller->getWeatherTime($value);
}