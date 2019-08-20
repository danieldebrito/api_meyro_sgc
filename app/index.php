<?php
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

require '../composer/vendor/autoload.php';
require './AccesoDatos.php';

//////////// entidades //////////////////////////////////////////////////////
require './maquina/maquinas/maquinaApi.php';
require './maquina/especificaciones/especificacionApi.php';
require './maquina/maquinaRepuestos/maquinaRepuestoApi.php';
require './maquina/maqRto/maqRtoApi.php';

$config['displayErrorDetails'] = true;
$config['addContentLengthHeader'] = false;

$app = new \Slim\App(["settings" => $config]);

$app->get("/", function() {
  echo "
  <p style='font-size:50px;'>Hola mundo desde api_meyro_sgc</p> 
  <br> <br> 
  <p style='font-family:courier;'>Conexion ok con la API.</p>
  ";
});

$app->group('/maquinas', function () {
  $this->get('/', \maquinaApi::class . ':getAll');
  $this->get('/{id}', \maquinaApi::class . ':getOne');
  $this->post('/', \maquinaApi::class . ':setOne');
  $this->delete('/{id}[/]', \maquinaAPI::class . ':delete');
  $this->post('/update[/]', \maquinaApi::class . ':updateOne');
});

$app->group('/especificaciones', function () {
$this->get('/', \especificacionApi::class . ':getAll');
$this->get('/{id}', \especificacionApi::class . ':getOne');
$this->post('/', \especificacionApi::class . ':setOne');
$this->delete('/{id}[/]', \especificacionApi::class . ':delete');
$this->post('/update[/]', \especificacionApi::class . ':updateOne');

$this->get('/maquinas/{id}', \especificacionApi::class . ':getAllMaquina');
$this->delete('/maquinas/{id}[/]', \especificacionApi::class . ':deleteTodosMaquina');
});

$app->group('/maquinaRepuestos', function () {
  $this->get('/', \repuestoApi::class . ':getAll');
  $this->get('/{id}', \repuestoApi::class . ':getOne');
  $this->post('/', \repuestoApi::class . ':setOne');
  $this->delete('/{id}[/]', \repuestoApi::class . ':delete');
  $this->post('/update[/]', \repuestoApi::class . ':updateOne');
  $this->get('/porMaquina/{id}[/]', \repuestoApi::class . ':getAllMachine');
  });

  $app->group('/maqRtos', function () {
    $this->get('/', \maqRtoApi::class . ':getAll');
    $this->get('/{id}', \maqRtoApi::class . ':getOne');
    $this->post('/', \maqRtoApi::class . ':setOne');
    $this->delete('/{id}[/]', \maqRtoApi::class . ':delete');
    $this->post('/update[/]', \maqRtoApi::class . ':updateOne');
  });

$app->add(function ($req, $res, $next) {
  $response = $next($req, $res);
  return $response
          ->withHeader('Access-Control-Allow-Origin', 'http://localhost:4200')
          ->withHeader('Access-Control-Allow-Headers', 'X-Requested-With, Content-Type, Accept, Origin, Authorization')
          ->withHeader('Access-Control-Allow-Methods', 'GET, POST, PUT, DELETE, OPTIONS');
});

$app->run();