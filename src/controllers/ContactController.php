<?php

require_once realpath(dirname(__FILE__).'/../models/Contact.php');

/**
 * Classe Controller de Contatos
 * 
 * @author pedro.edson.o.lima
 *
 */
class ContactController {

	/**
	 * Função para adicionar um contato
	 * @param String $type
	 * @param String $value
	 * @param int $idPeople
	 * @return Ambigous <NULL, string>|Ambigous <string, number>
	 */
	public function add($type, $value, $idPeople) {
		$res = null;
		$contact = new Contact();

		if($type != null && $value != null && $idPeople != null){
			if (!$this->validateTypeContact($type)){
				$res["cod"] = 404;
				$res["message"] = "type contact invalid";
				return $res;
			}
			$insert = $contact->add($type, $value, $idPeople);
			
			if($insert) {
				$res["cod"] = 200;
			}
			return $res;
		}
	}
	
	/**
	 * Função para alterar um contato
	 * @param String $type
	 * @param String $value
	 * @param int $idPeople
	 * @return Ambigous <NULL, string>|Ambigous <string, number>
	 */
	public function update($type, $value, $idPeople) {
		$res = null;
		$contact = new Contact();
	
		if($type != null && $value != null && $idPeople != null){
			if (!$this->validateTypeContact($type)){
				$res["cod"] = 404;
				$res["message"] = "type contact invalid";
				return $res;
			}
			$update = $contact->update($type, $value, $idPeople);
				
			if($update) {
				$res["cod"] = 200;
			}
			return $res;
		}
	}
	
	/**
	 * Função para deletar um contato
	 * @param int $id
	 * @return number|string
	 */
	public function delete($id) {
		$res = null;
		$contact = new Contact();
	
		if($id != null){
			$delete = $contact->delete($id);
			if($delete) {
				$res["cod"] = 200;
			}
			return $res;
		} else {
			$res["cod"] = 404;
			$res["message"] = "id null";
			return $res;
		}
	}
	
	/**
	 * Validar os tipos de contatos
	 * @param unknown $type
	 * @return boolean
	 */
	function validateTypeContact($type){
		$resValidate = true;
		$contactsValids = array("PHONE", "EMAIL", "WHATSAPP");
		if (!in_array($type, $contactsValids)) {
			$resValidate = false;
		}
		return $resValidate;
	}
	
}
