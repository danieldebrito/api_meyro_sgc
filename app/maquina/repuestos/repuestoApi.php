<?php
require_once 'repuesto.php';
// require_once 'IApiUsable.php';

class repuestoApi extends repuesto /* implements IApiUsable */ {

	public function getAll($request, $response, $args) {
		$todos=Repuesto::TraerTodos();
		$newResponse = $response->withJson($todos, 200);
		return $newResponse;
	}

	public function getOne($request, $response, $args) {
		$id=$args['id'];
	 	$ret = Repuesto::TraerUno($id);
		$newResponse = $response->withJson($ret, 200);  
	 	return $newResponse;
 	}

 	public function setOne($request, $response, $args) {
		$ArrayDeParametros = $request->getParsedBody();

		$marca = $ArrayDeParametros['marca'];
		$codigo = $ArrayDeParametros['codigo'];
		$detalle = $ArrayDeParametros['detalle'];

		$ent = new Repuesto();

		$ent->marca=$marca;
		$ent->codigo=$codigo;
		$ent->detalle=$detalle;
		
		$ent->CargarUno();

		$response->getBody()->write("true");

		return $response;
	}

    public function delete($request,$response,$args){
        $id = $args["id"];
        $respuesta = Repuesto::Baja($id);
        $newResponse = $response->withJson($respuesta,200);
        return $newResponse;
    }

	public function updateOne($request, $response, $args) {
		$ArrayDeParametros = $request->getParsedBody();

		$me = new Repuesto();

		$me->idRepuesto = $ArrayDeParametros['idRepuesto'];
		$me->marca = $ArrayDeParametros['marca'];
		$me->codigo = $ArrayDeParametros['codigo'];
		$me->detalle = $ArrayDeParametros['detalle'];

		$resultado = $me->ModificarUno();
		
		$objDelaRespuesta= new stdclass();
		$objDelaRespuesta->resultado = $resultado;
			
		return $response->withJson($objDelaRespuesta, 200);		
	}
}