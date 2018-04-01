<?php
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;


require 'vendor/autoload.php';
//require '../src/config/db.php';

require 'vendor/autoload.php';

$app = new \Slim\App;

require 'config.php';
require 'src/views/v1/PeopleView.php';



$app->run();