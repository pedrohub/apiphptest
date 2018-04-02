<?php
require_once  'db.php';

/**
 * Classe model de pessoa
 *
 * @author pedro.edson.o.lima
 */
class Contact {
	
	public $id;
	public $type;
	public $value;
	public $idPeople;
	
	/**
	 * Consulta contato pelo id da pessoa
	 * @return Array Peoble|string
	 */
	public function getByIdPeople($idPeople) {
		
		$sql = "SELECT * FROM CONTACTS C WHERE ID_PEOPLE = $idPeople";
		$itens =  array();
		
		try{
			$db = new db();
			$db = $db->connect();
		
			$stmt = $db->query($sql);
			$contacts = $stmt->fetchAll(PDO::FETCH_OBJ);
			
			if (count($contacts) > 0) {
				$db = null;
 				foreach($contacts as $item) {
 					$contact = new Contact();
 					$contact-> id = $item->id;
 					$contact-> type = $item->type;
 					$contact-> value = $item->value;
 					$contact-> idPeople = $item->id_people;
 					array_push($itens, $contact);
 				}
			}
			$db = null;
			return $itens;
		
		} catch(PDOException $e){
			return '{"error":{"text":'.$e->getMessage().'}}';
		}
	}
	
	/**
	 * Função para adicionar um contato para pessoa
	 * @param String $type
	 * @param String $value
	 * @param int $idPeople
	 * @return boolean|PDOException
	 */
	public function add($type, $value, $idPeople) {
	
		$sql = "INSERT INTO CONTACTS(TYPE, VALUE, ID_PEOPLE) VALUES (:TYPE, :VALUE, :ID_PEOPLE)";
	
		try{
			$db = new db();
			$db = $db->connect();
	
			$stmt = $db->prepare($sql);
			$stmt->bindParam('TYPE' , $type);
			$stmt->bindParam('VALUE' , $value);
			$stmt->bindParam('ID_PEOPLE' , $idPeople);
	
			$stmt->execute();
			$db = null;
			return true;
		} catch(PDOException $e){
			return $e;
		}
	}
	
	/**
	 * Função para alterar um contato
	 * @param String $type
	 * @param String $value
	 * @param int $idPeople
	 * @return boolean|PDOException
	 */
	public function update($type, $value, $idPeople) {
	
		$sql = "UPDATE CONTACTS SET VALUE =:VALUE WHERE TYPE =:TYPE and ID_PEOPLE = $idPeople";
		try{
			$db = new db();
			$db = $db->connect();
	
			$stmt = $db->prepare($sql);
			$stmt->bindParam('TYPE' , $type);
			$stmt->bindParam('VALUE' , $value);
			$stmt->execute();
			$db = null;
			return true;
		} catch(PDOException $e){
			return $e;
		}
	}
	
	/**
	 * Função para remover um contato
	 * @param int $id
	 * @return boolean|PDOException
	 */
	public function delete($id) {
	
		$sql = "DELETE FROM CONTACTS WHERE ID = $id";
		try{
			$db = new db();
			$db = $db->connect();
	
			$stmt = $db->prepare($sql);
			$stmt->execute();
			$db = null;
			return true;
		} catch(PDOException $e){
			return $e;
		}
	}
	
	
	
}