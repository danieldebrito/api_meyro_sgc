<?php
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

require '../composer/vendor/autoload.php';
require './AccesoDatos.php';

//////////// entidades //////////////////////////////////////////////////////
require './maquinasFolder/maquinas/maquinaApi.php';
require './maquinasFolder/especificaciones/especificacionApi.php';
require './maquinasFolder/maquinarepuestos/maquinaRepuestoApi.php';
require './maquinasFolder/maq_rep/maq_repApi.php';
require './maquinasFolder/correctivo/correctivoApi.php';
require './sectores/sectorApi.php';

$config['displayErrorDetails'] = true;
$config['addContentLengthHeader'] = false;

$app = new \Slim\App(["settings" => $config]);

$app->get("/", function() {
  echo "
  <p style='font-size:50px;'>Hola mundo desde api_meyro_sgc</p> 
  <br> <br> 
  <p style='font-family:courier;'>Conexion ok con la API.</p>
  
  
  URL
  http://localhost/api_myr_sgc/app

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
});

$app->group('/correctivos', function () {
  $this->get('/', \correctivoApi::class . ':getAll');
  $this->get('/{idMantCorrect}', \correctivoApi::class . ':getOne');
  $this->post('/', \correctivoApi::class . ':setOne');
  $this->delete('/{idMantCorrect}[/]', \correctivoApi::class . ':delete');
  $this->post('/update[/]', \correctivoApi::class . ':updateOne');

  $this->get('/maquina/{id}', \correctivoApi::class . ':getAllMachina');

});

$app->group('/MaqRto', function () {
  $this->get('/', \maq_repApi::class . ':getAll');
  $this->get('/{id}', \maq_repApi::class . ':getOne');
  $this->post('/', \maq_repApi::class . ':setOne');
  $this->delete('/{id}[/]', \maq_repApi::class . ':delete');
  $this->post('/update[/]', \maq_repApi::class . ':updateOne');

  $this->get('/maquina/{id}', \maq_repApi::class . ':getAllMachina');

});

$app->group('/sectores', function () {
  $this->get('/', \sectorApi::class . ':getAll');
  $this->get('/{id}', \sectorApi::class . ':getOne');
  $this->post('/', \sectorApi::class . ':setOne');
  $this->delete('/{id}[/]', \sectorApi::class . ':deleteOne');
  $this->post('/update[/]', \sectorApi::class . ':updateOne');

  $this->get('/sector/{sector}', \sectorApi::class . ':getId');

});


$app->add(function ($req, $res, $next) {
  $response = $next($req, $res);
  return $response
    ->withHeader('Access-Control-Allow-Origin', 'http://localhost:4200')
    ->withHeader('Access-Control-Allow-Headers', 'X-Requested-With, Content-Type, Accept, Origin, Authorization')
    ->withHeader('Access-Control-Allow-Methods', 'GET, POST, PUT, DELETE, PATCH, OPTIONS');
});


$app->run();

/*

$app->add(function ($req, $res, $next) {
  $response = $next($req, $res);
  return $response
    ->withHeader('Access-Control-Allow-Origin', 'http://danieldebrito.com.ar')
    ->withHeader('Access-Control-Allow-Headers', 'X-Requested-With, Content-Type, Accept, Origin, Authorization')
    ->withHeader('Access-Control-Allow-Methods', 'GET, POST, PUT, DELETE, PATCH, OPTIONS');
});

*/

/*

$app->add(function ($req, $res, $next) {
  $response = $next($req, $res);
  return $response
  ->withHeader('Access-Control-Allow-Origin', 'http://localhost:4200')
  ->withHeader('Access-Control-Allow-Headers', 'X-Requested-With, Content-Type, Accept, Origin, Authorization')
    ->withHeader('Access-Control-Allow-Methods', 'GET, POST, PUT, DELETE, PATCH, OPTIONS');
});

$app->add(function ($req, $res, $next) {
  $response = $next($req, $res);
  return $response
    ->withHeader('Access-Control-Allow-Origin', 'http://juntasmeyro.com.ar')
    ->withHeader('Access-Control-Allow-Headers', 'X-Requested-With, Content-Type, Accept, Origin, Authorization')
    ->withHeader('Access-Control-Allow-Methods', 'GET, POST, PUT, DELETE, PATCH, OPTIONS');
});

*/