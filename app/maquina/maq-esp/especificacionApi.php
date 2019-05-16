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

		$maquina = new maquina();

		$maquina->idMaquina=$idMaquina;
		$maquina->detalle=$detalle;
		$maquina->marca=$marca;
		$maquina->sector=$sector;
		$maquina->estado=$estado;
		$maquina->urlImagen=$urlImagen;
		$maquina->fabricanteNombre=$fabricanteNombre;
		$maquina->fabricanteDireccion=$fabricanteDireccion;
		$maquina->fabricanteTelefono=$fabricanteTelefono;
		$maquina->fabricanteContacto=$fabricanteContacto;
		
		$maquina->CargarUno();

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

		$miMaquina = new maquina();

		$miMaquina->idMaquina = $ArrayDeParametros['idMaquina'];
		$miMaquina->detalle = $ArrayDeParametros['detalle'];
		$miMaquina->marca = $ArrayDeParametros['marca'];
		$miMaquina->sector = $ArrayDeParametros['sector'];
		$miMaquina->estado = $ArrayDeParametros['estado'];
		$miMaquina->urlImagen = $ArrayDeParametros['urlImagen'];
		$miMaquina->fabricanteNombre = $ArrayDeParametros['fabricanteNombre'];
		$miMaquina->fabricanteDireccion = $ArrayDeParametros['fabricanteDireccion'];
		$miMaquina->fabricanteTelefono = $ArrayDeParametros['fabricanteTelefono'];
		$miMaquina->fabricanteContacto = $ArrayDeParametros['fabricanteContacto'];
	
		$resultado = $miMaquina->ModificarUno();
		
		$objDelaRespuesta= new stdclass();
		$objDelaRespuesta->resultado = $resultado;
			
		return $response->withJson($objDelaRespuesta, 200);		
	}
}