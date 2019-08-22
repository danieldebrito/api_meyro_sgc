<?php
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

require '../composer/vendor/autoload.php';
require './AccesoDatos.php';

//////////// entidades //////////////////////////////////////////////////////
require './maquina/maquinas/maquinaApi.php';
require './maquina/especificaciones/especificacionApi.php';
require './maquina/maquinaRepuestos/maquinaRepuestoApi.php';
require './maquina/maq_rep/maq_repApi.php';
require './maquina/correctivo/correctivoApi.php';

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

$app->group('/maqreps', function () {
  $this->get('/', \maqrepApi::class . ':getAll');
    /*
    $this->get('/{id}', \maquinaApi::class . ':getOne');
    $this->post('/', \maquinaApi::class . ':setOne');
    $this->delete('/{id}[/]', \maquinaAPI::class . ':delete');
    $this->post('/update[/]', \maquinaApi::class . ':updateOne');
    */
});

$app->group('/correctivos', function () {
  $this->get('/', \correctivoApi::class . ':getAll');
  $this->get('/{idMantCorrect}', \correctivoApi::class . ':getOne');
  $this->post('/', \correctivoApi::class . ':setOne');
  $this->delete('/{idMantCorrect}[/]', \correctivoApi::class . ':delete');
  $this->post('/update[/]', \correctivoApi::class . ':updateOne');
});

/* maq_rep */

$app->group('/maq_rep', function () {
  $this->get('/', \correctivoApi::class . ':getAll');/*
  $this->get('/{idMantCorrect}', \correctivoApi::class . ':getOne');
  $this->post('/', \correctivoApi::class . ':setOne');
  $this->delete('/{idMantCorrect}[/]', \correctivoApi::class . ':delete');
  $this->post('/update[/]', \correctivoApi::class . ':updateOne');*/
});


$app->add(function ($req, $res, $next) {
  $response = $next($req, $res);
  return $response
          ->withHeader('Access-Control-Allow-Origin', 'http://localhost:4200')
          ->withHeader('Access-Control-Allow-Headers', 'X-Requested-With, Content-Type, Accept, Origin, Authorization')
          ->withHeader('Access-Control-Allow-Methods', 'GET, POST, PUT, DELETE, OPTIONS');
});

$app->run();