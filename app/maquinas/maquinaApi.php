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

		$id = $ArrayDeParametros['id'];
		$detalle = $ArrayDeParametros['detalle'];
		$marca = $ArrayDeParametros['marca'];
		$sector = $ArrayDeParametros['sector'];
		$fabricante_nombre = $ArrayDeParametros['fabricante_nombre'];
		$fabricante_direccion = $ArrayDeParametros['fabricante_direccion'];
		$fabricante_telefono = $ArrayDeParametros['fabricante_telefono'];
		$fabricante_contacto = $ArrayDeParametros['fabricante_contacto'];

		$maquina = new maquina();

		$maquina->id=$id;
		$maquina->detalle=$detalle;
		$maquina->marca=$marca;
		$maquina->sector=$sector;
		$maquina->fabricante_nombre=$fabricante_nombre;
		$maquina->fabricante_direccion=$fabricante_direccion;
		$maquina->fabricante_telefono=$fabricante_telefono;
		$maquina->fabricante_contacto=$fabricante_contacto;
		
		$maquina->CargarUno();

		$response->getBody()->write("true");

		return $response;
}

public function deleteOne($request, $response, $args) {
		$ArrayDeParametros = $request->getParsedBody();
		$id=$ArrayDeParametros['id'];

		$maquina = new maquina();
		$maquina->id=$id;
		$cantidadDeBorrados=$maquina->BorrarUno();


		$objDelaRespuesta= new stdclass();
		$objDelaRespuesta->cantidad=$cantidadDeBorrados;

		if($cantidadDeBorrados>0){
			$objDelaRespuesta->resultado = true;
			} else {
			$objDelaRespuesta->resultado = false;
		}
		
		$newResponse = $response->withJson($objDelaRespuesta, 200);  

		return $newResponse;
}

public function updateOne($request, $response, $args) {
		$ArrayDeParametros = $request->getParsedBody();

		$miMaquina = new maquina();

		$miMaquina->id = $ArrayDeParametros['id'];
		$miMaquina->detalle = $ArrayDeParametros['detalle'];
		$miMaquina->marca = $ArrayDeParametros['marca'];
		$miMaquina->sector = $ArrayDeParametros['sector'];
		$miMaquina->fabricante_nombre = $ArrayDeParametros['fabricante_nombre'];
		$miMaquina->fabricante_direccion = $ArrayDeParametros['fabricante_direccion'];
		$miMaquina->fabricante_telefono = $ArrayDeParametros['fabricante_telefono'];
		$miMaquina->fabricante_contacto = $ArrayDeParametros['fabricante_contacto'];
	
		$resultado = $miMaquina->ModificarUno();
		
		$objDelaRespuesta= new stdclass();
		$objDelaRespuesta->resultado = $resultado;
			
		return $response->withJson($objDelaRespuesta, 200);		
	}
}