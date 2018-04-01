<?php
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

require ABSPATH. 'src/controllers/PeopleController.php';

$app = new \Slim\App;

// Get all
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