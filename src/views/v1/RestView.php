<?php
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

require ABSPATH. 'src/controllers/ContactController.php';
require ABSPATH. 'src/controllers/PeopleController.php';

$app = new \Slim\App;

$app->get('/api/v1/peoples', function(Request $request, Response $response){

	try{
		header("Content-Type: application/json; charset=UTF-8");
		$controller = new PeopleController();
		$peoples = $controller->getAll();

		return json_encode($peoples, JSON_PRETTY_PRINT);

	} catch(PDOException $e){
		echo '{"error":{"text":'.$e->getMessage().'}}';
	}
});

$app->post('/api/v1/peoples/add', function(Request $request, Response $response){

	$name = $request->getParam('name');
	$contacts = $request->getParam('contacts');

	if ($name != null){
		$controller = new PeopleController();
		$res = $controller->add($name, $contacts);

		return json_encode($res, JSON_PRETTY_PRINT);
	}

});

$app->post('/api/v1/contacts/add', function(Request $request, Response $response){

	$type = $request->getParam('type');
	$value = $request->getParam('value');
	$idPeople = $request->getParam('idPeople');
	
	$controller = new ContactController();
	$res = $controller->add($type, $value, $idPeople);

	return json_encode($res, JSON_PRETTY_PRINT);
});

$app->put('/api/v1/contacts/update/{idPeople}', function(Request $request, Response $response){

	$type = $request->getParam('type');
	$value = $request->getParam('value');
	$idPeople = $request->getAttribute('idPeople');
	
	$controller = new ContactController();
	$res = $controller->update($type, $value, $idPeople);
	
	return json_encode($res, JSON_PRETTY_PRINT);
});


$app->delete('/api/v1/contacts/delete/{id}', function(Request $request, Response $response){

	$id = $request->getAttribute('id');
	
	$controller = new ContactController();
	$res = $controller->delete($id);
	
	return json_encode($res, JSON_PRETTY_PRINT);
});