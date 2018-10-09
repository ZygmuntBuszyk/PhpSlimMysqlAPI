<?php
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;
ini_set('display_errors', 1);
require '../vendor/autoload.php';
require '../src/config/db.php';



$app = new \Slim\App;
$app->get('/hello/{name}', function(Request $request, Response $response, array $args) {
    $name = $args['name'];
    $response->getBody()->write("Hello, $name");

    return $response;
});


// Members Routes 
require '../src/routes/members.php';

$app->run();