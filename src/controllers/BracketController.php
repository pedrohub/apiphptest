<?php

/**
 * Classe Controller para validar os caracteres brackets
 * 
 * @author pedro.edson.o.lima
 */
class BracketController {

	/**
	 * Balanced brackets
	 * @param String $value
	 * @return string
	 */
	public function validateStringBracket($value) {

		$nok = "$value fora do padr&atilde;o";
		$ok = "$value est&aacute; no padr&atilde;o correto";
		
		if(preg_match('/[\(\)\[\]\{\}]/', $value)){
		
			if(!$this->validateSize($value)){
				return $nok;
			}
		
			//converter para validar o caracteres
			$arrayValue = str_split($value);
			$count = count($arrayValue)-1;
		
			if ($arrayValue[$count] == "{" || $arrayValue[$count] == "[" || $arrayValue[$count] == "("){
				return $nok;
			}
				
			if ($arrayValue[0] == "]" || $arrayValue[0] == "}" || $arrayValue[0] == ")"){
				return $nok;
			}	
			
			$caracteresClose = array("}", ")", "]");
			
			$countMatch = 0;
			for ($i = 0; $i < $count; $i++) {
				
				if (($arrayValue[$i] < $count) && (!in_array($arrayValue[$i], $caracteresClose))){
					$countMatch = 0;
					if(($arrayValue[$i] == "[") && ($arrayValue[$i+1] == "]" || $arrayValue[$i+1] == "{")) {
						$countMatch++;
					} else if((($arrayValue[$i] == "(") && ($arrayValue[$i+1] == ")"))) {
						$countMatch++;
					} else if(($arrayValue[$i] == "{") && ($arrayValue[$i+1] == "}" || $arrayValue[$i+1] == "(")) {
						$countMatch++;
					}
				}
 			}
 			
 			if ($countMatch == 0) {
 				return $nok;
 			}
			
			return $ok;
		}
		
		return $nok;
	}
	
	/**
	 * Validar match dos caracteres
	 * @param Char[] $value
	 * @return boolean
	 */
	private function validateSize($value){
		
		if((substr_count($value , '(') == substr_count($value , ')'))
				&& (substr_count($value , '[') == substr_count($value , ']'))
				&& (substr_count($value , '{') == substr_count($value , '}'))){
			return true;
		}
		
		return false;
		
	}
	
}	