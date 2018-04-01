<?php

require ABSPATH. '/src/controllers/BracketController.php';


function validateStringBracket($value) {
	
	$controller = new BracketController();
	return $controller->validateStringBracket($value);
}