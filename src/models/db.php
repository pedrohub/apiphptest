<?php

/**
 * Classe para fazer conexao com banco
 * 
 * @author pedro.edson.o.lima
 */
class db {
	private $dbhost = 'localhost';//ajustar para seu host
	private $dbuser = 'user';// ajustar para usuario do seu banco mysql
	private $dbpass = 'pass';// informar senha do user
	private $dbname = 'database'; // trocar para o database criado no arquivo db.sql 

	public function connect() {
		$mysql_connect_str = "mysql:host=$this->dbhost;dbname=$this->dbname";
		$dbConnection = new PDO ( $mysql_connect_str, $this->dbuser, $this->dbpass );
		$dbConnection->setAttribute ( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
		return $dbConnection;
	}
}
