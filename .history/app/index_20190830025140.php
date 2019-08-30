<?php
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

require '../composer/vendor/autoload.php';
require './AccesoDatos.php';

//////////// entidades //////////////////////////////////////////////////////
require './maquinas/maquinas/maquinaApi.php';
require './maquinas/especificaciones/especificacionApi.php';
require './maquinas/maquinaRepuestos/maquinaRepuestoApi.php';
require './maquinas/maq_rep/maq_repApi.php';
require './maquinas/correctivo/correctivoApi.php';

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

$app->group('/correctivos', function () {
  $this->get('/', \correctivoApi::class . ':getAll');
  $this->get('/{idMantCorrect}', \correctivoApi::class . ':getOne');
  $this->post('/', \correctivoApi::class . ':setOne');
  $this->delete('/{idMantCorrect}[/]', \correctivoApi::class . ':delete');
  $this->post('/update[/]', \correctivoApi::class . ':updateOne');
});

$app->group('/maq_reps', function () {
  $this->get('/', \maq_repApi::class . ':getAll');
  $this->get('/{id}', \maq_repApi::class . ':getOne');
  $this->post('/', \maq_repApi::class . ':setOne');
  $this->delete('/{id}[/]', \maq_repApi::class . ':delete');
  $this->post('/update[/]', \maq_repApi::class . ':updateOne');
});


$app->add(function ($req, $res, $next) {
  $response = $next($req, $res);
  return $response
          ->withHeader('Access-Control-Allow-Origin', 'http://localhost:4200')
          ->withHeader('Access-Control-Allow-Headers', 'X-Requested-With, Content-Type, Accept, Origin, Authorization')
          ->withHeader('Access-Control-Allow-Methods', 'GET, POST, PUT, DELETE, PATCH, OPTIONS');
});

$app->run();