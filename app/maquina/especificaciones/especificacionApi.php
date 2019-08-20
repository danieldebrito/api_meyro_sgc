<?php
require_once 'especificacion.php';
// require_once 'IApiUsable.php';

class especificacionApi extends especificacion /* implements IApiUsable */ {

	public function getAll($request, $response, $args) {
		$todos=Especificacion::TraerTodos();
		$newResponse = $response->withJson($todos, 200);
		return $newResponse;
	}

	public function getOne($request, $response, $args) {
		$id=$args['id'];
	 	$ret = Especificacion::TraerUno($id);
		$newResponse = $response->withJson($ret, 200);  
	 	return $newResponse;
 }

 public function setOne($request, $response, $args) {
		$ArrayDeParametros = $request->getParsedBody();

		//$idEspecificacion = $ArrayDeParametros['idEspecificacion'];  AI
		$idMaquina = $ArrayDeParametros['idMaquina'];
		$detalle = $ArrayDeParametros['detalle'];

		$ent = new Especificacion();

		//$ent->idEspecificacion=$idEspecificacion;
		$ent->idMaquina=$idMaquina;
		$ent->detalle=$detalle;
		
		$ent->CargarUno();

		$response->getBody()->write("true");

		return $response;
}

    public function delete($request,$response,$args){
        $id = $args["id"];
        $respuesta = Especificacion::Baja($id);
        $newResponse = $response->withJson($respuesta,200);
        return $newResponse;
    }

public function updateOne($request, $response, $args) {
		$ArrayDeParametros = $request->getParsedBody();

		$me = new Especificacion();

		$me->idEspecificacion = $ArrayDeParametros['idEspecificacion'];
		$me->idMaquina = $ArrayDeParametros['idMaquina'];
		$me->detalle = $ArrayDeParametros['detalle'];

		$resultado = $me->ModificarUno();
		
		$objDelaRespuesta= new stdclass();
		$objDelaRespuesta->resultado = $resultado;
			
		return $response->withJson($objDelaRespuesta, 200);		
	}

	public function getAllMaquina($request, $response, $args) {
		$idMaquina = $args['id'];
	 	$ret = Especificacion::TraerTodosMaquina($idMaquina);
		$newResponse = $response->withJson($ret, 200);  
	 	return $newResponse;
	 }
	 
	 public function deleteTodosMaquina($request,$response,$args){
        $id = $args["id"];
        $respuesta = Especificacion::BajaTodosMaquina($id);
        $newResponse = $response->withJson($respuesta,200);
        return $newResponse;
    }
}