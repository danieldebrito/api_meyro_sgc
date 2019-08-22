<?php
require_once 'maq_rep.php';
// require_once 'IApiUsable.php';

class maq_repApi extends maq_rep /* implements IApiUsable */ {

	public function getAll($request, $response, $args) {
		$todos=maq_rep::TraerTodos();
		$newResponse = $response->withJson($todos, 200);
		return $newResponse;
	}

	public function getOne($request, $response, $args) {
		$id=$args['id'];
	 	$ret = maq_rep::TraerUno($id);
		$newResponse = $response->withJson($ret, 200);  
	 	return $newResponse;
	}

 	public function setOne($request, $response, $args) {
		$ArrayDeParametros = $request->getParsedBody();

		//$idEspecificacion = $ArrayDeParametros['idEspecificacion'];  AI
		$idMaquina = $ArrayDeParametros['idMaquina'];
		$idRepuesto = $ArrayDeParametros['idRepuesto'];

		$ent = new maq_rep();

		//$ent->idEspecificacion=$idEspecificacion;
		$ent->idMaquina=$idMaquina;
		$ent->idRepuesto=$idRepuesto;
		
		$ent->CargarUno();

		$response->getBody()->write("true");

		return $response;
	}

    public function delete($request,$response,$args){
        $id = $args["id"];
        $respuesta = idmaq_rep::Baja($id);
        $newResponse = $response->withJson($respuesta,200);
        return $newResponse;
	}

	public function updateOne($request, $response, $args) {
		$ArrayDeParametros = $request->getParsedBody();

		$me = new Especificacion();

		$me->idmaq_rep = $ArrayDeParametros['idmaq_rep'];
		$me->idMaquina = $ArrayDeParametros['idMaquina'];
		$me->idRepuesto = $ArrayDeParametros['idRepuesto'];

		$resultado = $me->ModificarUno();
		
		$objDelaRespuesta= new stdclass();
		$objDelaRespuesta->resultado = $resultado;
			
		return $response->withJson($objDelaRespuesta, 200);		
	}
}