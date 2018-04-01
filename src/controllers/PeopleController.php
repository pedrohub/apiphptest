<?php

require realpath(dirname(__FILE__).'/../models/People.php');

class PeopleController {

	public function getAll() {
		$people = new People();
		return $people->getAll();
	}
	
	public function add($value, $contacts) {
		$res = null;
		$people = new People();

		if($contacts != null){
			foreach ($contacts as $item){
				if (!$this->validateTypeContact($contacts)){
					$res["cod"] = 404;
					$res["message"] = "type contact invalid";
					return $res;
				}
			}
		}
		
		$insert = $people->add($value, $contacts);
		
		if($insert) {
			$res["cod"] = 200;
		}
		return $res;
	}
	
	public function update($id, $name) {
		$res = null;
		$people = new People();
	
		if($name != null && $id != null){
			$update = $people->update($id, $name);
	
			if($update) {
				$res["cod"] = 200;
			}
			return $res;
		} else {
			$res["cod"] = 404;
			$res["message"] = "name null";
			return $res;
		}
	}
	
	public function delete($id) {
		$res = null;
		$people = new People();
	
		if($id != null){
			$delete = $people->delete($id);
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
	
	function validateTypeContact($contactsList){
		$resValidate = true;
		foreach ($contactsList as $item){
			
			$contactsValids = array("PHONE", "EMAIL", "WHATSAPP");
			if (!in_array($item["type"], $contactsValids)) {
				$resValidate = false;
				break;
			}
		}
		return $resValidate;
	}
	
}
