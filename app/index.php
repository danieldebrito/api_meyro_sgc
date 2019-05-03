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
    // http://localhost/api_meyro/index.php/pedido/01
  $this->get('/', \maquinaApi::class . ':getAll');

    // http://localhost/api_meyro/index.php/pedido/
  $this->get('/{id}', \maquinaApi::class . ':getOne');

    // http://localhost/api_meyro/index.php/pedido/   +  body  +  form-data  y poner los parametros, 
  $this->post('/', \maquinaApi::class . ':setOne');

    // http://localhost/api_meyro/index.php/pedido/ + body + x-www.form.urlencoded y poner lo parametros
  $this->delete('/', \maquinaApi::class . ':deleteOne');

    // http://localhost/api_meyro/index.php/pedido/update +  body  +  form-data  y poner todos los tres parametros
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