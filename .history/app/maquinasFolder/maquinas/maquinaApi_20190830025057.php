<?php
require_once 'maquina.php';
// require_once 'IApiUsable.php';

class maquinaApi extends maquina /* implements IApiUsable */ {

	public function getAll($request, $response, $args) {
		$todos=maquina::TraerTodos();
		$newResponse = $response->withJson($todos, 200);
		return $newResponse;
	}

	public function getOne($request, $response, $args) {
		$id=$args['id'];
	 	$maquinaRetorno = maquina::TraerUno($id);
		$newResponse = $response->withJson($maquinaRetorno, 200);  
	 	return $newResponse;
 }

 public function setOne($request, $response, $args) {
		$ArrayDeParametros = $request->getParsedBody();

		$idMaquina = $ArrayDeParametros['idMaquina'];
		$detalle = $ArrayDeParametros['detalle'];
		$marca = $ArrayDeParametros['marca'];
		$sector = $ArrayDeParametros['sector'];
		$estado = $ArrayDeParametros['estado'];
		$urlImagen = $ArrayDeParametros['urlImagen'];
		$fabricanteNombre = $ArrayDeParametros['fabricanteNombre'];
		$fabricanteDireccion = $ArrayDeParametros['fabricanteDireccion'];
		$fabricanteTelefono = $ArrayDeParametros['fabricanteTelefono'];
		$fabricanteContacto = $ArrayDeParametros['fabricanteContacto'];

		$entity = new maquina();

		$entity->idMaquina=$idMaquina;
		$entity->detalle=$detalle;
		$entity->marca=$marca;
		$entity->sector=$sector;
		$entity->estado=$estado;
		$entity->urlImagen=$urlImagen;
		$entity->fabricanteNombre=$fabricanteNombre;
		$entity->fabricanteDireccion=$fabricanteDireccion;
		$entity->fabricanteTelefono=$fabricanteTelefono;
		$entity->fabricanteContacto=$fabricanteContacto;
		
		$entity->CargarUno();

		$response->getBody()->write("true");

		return $response;
}

    public function delete($request,$response,$args){
        $id = $args["id"];
        $respuesta = maquina::Baja($id);
        $newResponse = $response->withJson($respuesta,200);
        return $newResponse;
    }

	public function updateOne($request, $response, $args) {

		$ArrayDeParametros = $request->getParsedBody();    	
	   
	   $entity = new maquina();

	   $entity->idMaquina=$ArrayDeParametros["idMaquina"];
	   $entity->detalle=$ArrayDeParametros["detalle"];
	   $entity->marca=$ArrayDeParametros["marca"];
	   $entity->sector=$ArrayDeParametros["sector"];
	   $entity->estado=$ArrayDeParametros["estado"];
	   $entity->urlImagen=$ArrayDeParametros["urlImagen"];
	   $entity->fabricanteNombre=$ArrayDeParametros["fabricanteNombre"];
	   $entity->fabricanteDireccion=$ArrayDeParametros["fabricanteDireccion"];
	   $entity->fabricanteTelefono=$ArrayDeParametros["fabricanteTelefono"];
	   $entity->fabricanteContacto=$ArrayDeParametros["fabricanteContacto"];

		$resultado = $entity->ModificarUno();
		$objDelaRespuesta= new stdclass();

	   $objDelaRespuesta->resultado=$resultado;
	   return $response->withJson($objDelaRespuesta, 200);		
   }
}