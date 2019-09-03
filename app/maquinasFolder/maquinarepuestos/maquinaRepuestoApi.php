<?php
require_once 'maquinaRepuesto.php';
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

		//$idRepuesto = $ArrayDeParametros['idRepuesto'];
		$detalle = $ArrayDeParametros['detalle'];
		$marca = $ArrayDeParametros['marca'];
		$codigo = $ArrayDeParametros['codigo'];

		$ent = new Repuesto();

		//$ent->idRepuesto=$idRepuesto;
		$ent->detalle=$detalle;
		$ent->marca=$marca;
		$ent->codigo=$codigo;
		
		$response = $ent->CargarUno();  // retorna el ultimo id insertado

		// $response->getBody()->write("true");

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
		$me->detalle = $ArrayDeParametros['detalle'];
		$me->marca = $ArrayDeParametros['marca'];
		$me->codigo = $ArrayDeParametros['codigo'];

		$resultado = $me->ModificarUno();
		
		$objDelaRespuesta= new stdclass();
		$objDelaRespuesta->resultado = $resultado;
			
		return $response->withJson($objDelaRespuesta, 200);		
	}

}