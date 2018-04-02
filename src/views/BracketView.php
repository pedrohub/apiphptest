<?php

require ABSPATH. '/src/controllers/BracketController.php';

/**
 * Chama o metodo controller para validar os caracteres
 * @param unknown $value
 * @return string
 */
function validateStringBracket($value) {
	
	$controller = new BracketController();
	return $controller->validateStringBracket($value);
}