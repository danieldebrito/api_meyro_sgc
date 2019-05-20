<?php
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

require '../composer/vendor/autoload.php';
require './AccesoDatos.php';

///////////////////////////////////// entidades ///////////
require './maquina/maquinas/maquinaApi.php';
require './maquina/especificaciones/especificacionApi.php';

$config['displayErrorDetails'] = true;
$config['addContentLengthHeader'] = false;

$app = new \Slim\App(["settings" => $config]);

$app->get("/test", function() {
	echo "Hola mundo desde la API";
});

$app->group('/maquina', function () {
    // http://localhost/api_meyro_sgc/app/index.php/maquina/
  $this->get('/', \maquinaApi::class . ':getAll');

    // http://localhost/api_meyro_sgc/app/index.php/maquina/200
  $this->get('/{id}', \maquinaApi::class . ':getOne');

    // http://localhost/api_meyro_sgc/app/index.php/maquina/  
    // +  body  +  form-data  y poner los parametros, 
  $this->post('/', \maquinaApi::class . ':setOne');

  $this->delete('/{id}[/]', \maquinaAPI::class . ':delete');

    // http://localhost/api_meyro_sgc/app/index.php/maquina/update/
    // +  body  +  form-data  y poner todos los parametros
  $this->post('/update[/]', \maquinaApi::class . ':updateOne');    ////////  VER NO FUNCA
});



$app->group('/especificacion', function () {
// http://localhost/api_meyro_sgc/app/index.php/especificacion/
$this->get('/', \especificacionApi::class . ':getAll');
// http://localhost/api_meyro_sgc/app/index.php/especificacion/17
$this->get('/{id}', \especificacionApi::class . ':getOne');

$this->get('/maquinas/{id}', \especificacionApi::class . ':getAllMaquina');
// http://localhost/api_meyro_sgc/app/index.php/especificacion/
$this->post('/', \especificacionApi::class . ':setOne');
// http://localhost/api_meyro_sgc/app/index.php/especificacion/17
$this->delete('/{id}[/]', \especificacionApi::class . ':delete');
// http://localhost/api_meyro_sgc/app/index.php/especificacion/update/
$this->post('/update[/]', \especificacionApi::class . ':updateOne');
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