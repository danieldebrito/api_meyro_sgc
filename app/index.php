<?php
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

require '../composer/vendor/autoload.php';
require './AccesoDatos.php';
require './maquinas/maquinaApi.php';

$config['displayErrorDetails'] = true;
$config['addContentLengthHeader'] = false;

$app = new \Slim\App(["settings" => $config]);

$app->get("/test", function() {
	echo "Hola mundo desde la API";
});

$app->group('/maquina', function () {
    // http://localhost/api_meyro_sgc/app/index.php/maquina
  $this->get('/', \maquinaApi::class . ':getAll');

    // http://localhost/api_meyro_sgc/app/index.php/maquina
  $this->get('/{id}', \maquinaApi::class . ':getOne');

    // http://localhost/api_meyro_sgc/app/index.php/maquina  
    // +  body  +  form-data  y poner los parametros, 
  $this->post('/', \maquinaApi::class . ':setOne');

  $this->delete('/{id}[/]', \maquinaAPI::class . ':delete');

    // http://localhost/api_meyro_sgc/app/index.php/maquina/update
    // +  body  +  form-data  y poner todos los parametros
  $this->post('/update[/]', \maquinaApi::class . ':updateOne');
});

// cors habilitadas
$app->add(function ($req, $res, $next) {
  $response = $next($req, $res);
  return $response
          ->withHeader('Access-Control-Allow-Origin', 'http://localhost:4200')
          ->withHeader('Access-Control-Allow-Headers', 'X-Requested-With, Content-Type, Accept, Origin, Authorization')
          ->withHeader('Access-Control-Allow-Methods', 'GET, POST, PUT, DELETE, OPTIONS');
});

$app->run();