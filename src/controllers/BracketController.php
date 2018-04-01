<?php

class BracketController {

	public function validateStringBracket($value) {

		if(preg_match('[\(\)\[\]\{\}]', $value)){
			return "entrou";
		}
		
		return $value." agora";
	}
	
	private function validateBrackets($value){
		
		
		
	}
	
	private function validate($value){
		
		
	}
}	