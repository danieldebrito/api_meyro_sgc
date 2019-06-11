<?php
require_once 'maquina_repuesto.php';

class MaquinaRepuestoApi extends MaquinaRepuesto {

 	public function setOne($request, $response, $args) {
		$ArrayDeParametros = $request->getParsedBody();

		$idMaquina = $ArrayDeParametros['idMaquina'];
		$idRepuesto = $ArrayDeParametros['idRepuesto'];

		$ent = new MaquinaRepuesto();

		$ent->idMaquina=$idMaquina;
		$ent->idRepuesto=$idRepuesto;
		
		$ent->CargarUno();

		$response->getBody()->write("true");

		return $response;
	}

    public function delete($request,$response,$args){
		$ArrayDeParametros = $request->getParsedBody();

		$idMaquina = $ArrayDeParametros['idMaquina'];
		$idRepuesto = $ArrayDeParametros['idRepuesto'];

        $respuesta = MaquinaRepuesto::Baja();
        $newResponse = $response->withJson($respuesta,200);
        return $newResponse;
    }
}