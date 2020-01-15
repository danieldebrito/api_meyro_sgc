<?php
require_once 'sector.php';
require_once 'IApiUsable.php';

class sectorApi extends sector implements IApiUsable {

	public function getAll($request, $response, $args) {

		$todos=sector::TraerTodos();

		$newResponse = $response->withJson($todos, 200);
		return $newResponse;
	}

	public function getOne($request, $response, $args) {

		$id=$args['id'];
	 	$ret = sector::TraerUno($id);
		$newResponse = $response->withJson($ret, 200);  
	 	return $newResponse;
	}

 	public function setOne($request, $response, $args) {
		$ArrayDeParametros = $request->getParsedBody();

		$ent = new sector();

		$ent->sector = $ArrayDeParametros['sector'];
		
		$ent->CargarUno();

		$response->getBody()->write("true");

		return $response;
	}

    public function deleteOne($request,$response,$args){

        $id = $args["id"];
        $respuesta = sector::Baja($id);
        $newResponse = $response->withJson($respuesta,200);
        return $newResponse;
	}

	public function updateOne($request, $response, $args) {
		$ArrayDeParametros = $request->getParsedBody();

		$me = new sector();

		$me->idSector = $ArrayDeParametros['idSector'];
		$me->sector = $ArrayDeParametros['sector'];

		$resultado = $me->ModificarUno();
		
		$objDelaRespuesta= new stdclass();
		$objDelaRespuesta->resultado = $resultado;
			
		return $response->withJson($objDelaRespuesta, 200);		
	}

	public function getId($request, $response, $args) {

		$sector=$args['sector'];
	 	$ret = sector::TraerId($sector);
		$newResponse = $response->withJson($ret, 200);  
	 	return $newResponse;
	}
}