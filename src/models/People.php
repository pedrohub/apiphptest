<?php
require_once  'db.php';
require_once  'Contact.php';

class People {
	
	public $id;
	public $name;
	public $contacts = array();
	
	/**
	 * Return all peoples
	 * @return Array Peoble|string
	 */
	public function getAll() {
		
		$sql = "SELECT * FROM PEOPLES P";
		$itens =  array();
		
		try{
			$db = new db();
			$db = $db->connect();
		
			$stmt = $db->query($sql);
			$peoples = $stmt->fetchAll(PDO::FETCH_OBJ);
			
			if (count($peoples) > 0) {
 				foreach($peoples as $item) {
 					$people = new People();
 					$people -> id = $item->id;
 					$people -> name = $item->name;
 					$contact = new Contact();
 					$contacts = $contact -> getByIdPeople($people -> id);
 					if (count($contacts) > 0) {
 						foreach($contacts as $itemContact) {
 							array_push($people -> contacts , $itemContact);
 						}
 					}
 					array_push($itens, $people);
 				}
			}
			
			$db = null;
			return $itens;
		
		} catch(PDOException $e){
			return '{"error":{"text":'.$e->getMessage().'}}';
		}
	}
	
	public function add($value, $contacts) {
	
		$sqlAddPeople = "INSERT INTO PEOPLES(NAME) VALUES (:NAME)";
	
		try{
			$db = new db();
			$db = $db->connect();
		
			$stmt = $db->prepare($sqlAddPeople);
			$stmt->bindParam('NAME' , $value);
				
			$stmt->execute();
			$idPeople = $db->lastInsertId();
			
			if ($contacts != null) {
				foreach ($contacts as $item){
					$contact = new Contact();
					$contact -> add($item["type"], $item["value"], $idPeople);
				}
			}
			return true;
			
		} catch(PDOException $e){
			return false;
		}
	}
	
	public function update($id, $name) {
	
		$sql = "UPDATE PEOPLES SET NAME =:NAME WHERE ID = $id";
		try{
			$db = new db();
			$db = $db->connect();
	
			$stmt = $db->prepare($sql);
			$stmt->bindParam('NAME' , $name);
			$stmt->execute();
			$db = null;
			return true;
		} catch(PDOException $e){
			return $e;
		}
	}
	
	public function delete($id) {
	
		$sql = "DELETE FROM PEOPLES WHERE ID = $id";
		try{
			
			$contact = new Contact();
 			$contacts = $contact -> getByIdPeople($id);
 			if (count($contacts) > 0) {
 				foreach($contacts as $itemContact) {
 					$contact->delete($itemContact->id);
 				}
 			}
			
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