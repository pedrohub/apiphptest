<?php
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

require '../vendor/autoload.php';
require '../config.php';
require '../src/views/BracketView.php';
require '../src/views/TimeView.php';

$app = new \Slim\App;
$container = $app->getContainer();
$container['view'] = new \Slim\Views\PhpRenderer('../src/views/templates/');

$app->get('/', function ($request, $response) {
    //$name = $request->getAttribute('name');
    
	$response = $this->view->render($response, 'template.phtml');
	//$valor = validateStringBracket("teste");
    //$response->getBody()->write($valor);

    return $response;
});

$app->post('/', function(Request $request, Response $response) {
	//var_dump($request);
	$name = $request->getParam('value');
echo $name;
$valor = validateStringBracket($name);
	$vargs['value'] =  $valor;
	//$response->getBody()->write("teste");
	$response = $this->view->render($response, 'template.phtml', $vargs);
	
	return $response;
});

$app->get('/time', function ($request, $response) {
	$response = $this->view->render($response, 'time.php');
	return $response;
});
	
$app->post('/time', function(Request $request, Response $response) {
	$cidade = $request->getParam('cidade');
	$valor = getWeatherTime($cidade);
	$vargs['value'] =  $valor;
	$response = $this->view->render($response, 'time.php', $vargs);
	return $response;
});


$app->run();