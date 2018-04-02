<?php

/**
 * Classe Controller Time
 * Consultar a api openweathermap pela cidade
 * @author pedro.edson.o.lima
 *
 */
class TimeController {

	/**
	 * Retorna informações do tempo para uma cidade
	 * @param String $value
	 * @return NULL|string
	 */
	public function getWeatherTime($value) {

		if ($value == null || empty($value)){
			return null;
		}
		
		$endereço_ws_json = "http://api.openweathermap.org/data/2.5/weather?q=$value&appid=9409df1e7ee8e1852ecc6a0765953d5d";
		$res = json_decode(file_get_contents($endereço_ws_json,true));
		
		if ($res->cod == 200) {
			$name = $res->name;
			$main = $res->main;
			$temp = $main->temp-273.15; 
			$clouds = $res->clouds;
			$all = $clouds->all;
			$humidity = (int)$main->humidity;
			return "Em $name ".number_format($temp, 2, ',','.')."&#176;C. ".
			"Chuva: $all%. ".
			"Umidade relativa do ar: ".$humidity."%";
		} 
		
		return null;
	}
}	