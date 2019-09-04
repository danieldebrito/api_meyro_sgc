<?php
require_once 'correctivo.php';

class correctivoApi extends correctivo
{
	public function getAll($request, $response, $args) {
		$todos=correctivo::TraerTodos();
		$newResponse = $response->withJson($todos, 200);
        
        return $newResponse;
    }

	public function getOne($request, $response, $args) {
		$id=$args['idMantCorrect'];
	 	$maquinaRetorno = correctivo::TraerUno($id);
		$newResponse = $response->withJson($maquinaRetorno, 200);  
         
        return $newResponse;
    }

    public function setOne($request, $response, $args) {
		$ArrayDeParametros = $request->getParsedBody();

		$entity = new correctivo();

		//$entity->idMantCorrect=$ArrayDeParametros['idMantCorrect'];  // AI //
		$entity->idMaquina=$ArrayDeParametros['idMaquina'];
		$entity->fechaSolicitud=$ArrayDeParametros['fechaSolicitud'];
		$entity->solicitante=$ArrayDeParametros['solicitante'];
		$entity->fechaReparacion=$ArrayDeParametros['fechaReparacion'];
        $entity->mantRealizar=$ArrayDeParametros['mantRealizar'];
        $entity->fechaRealizacion=$ArrayDeParametros['fechaRealizacion'];
		$entity->realizadoPor=$ArrayDeParametros['realizadoPor'];
		$entity->fechaReparado=$ArrayDeParametros['fechaReparado'];
		$entity->horaReparado=$ArrayDeParametros['horaReparado'];
		$entity->mantRealizado=$ArrayDeParametros['mantRealizado'];
		
		$response = $entity->CargarUno();

		return $response;
    }

    public function delete($request,$response,$args){
        $id = $args["idMantCorrect"];
        $respuesta = correctivo::Baja($id);
        $newResponse = $response->withJson($respuesta,200);
        
        return $newResponse;
    }

	public function updateOne($request, $response, $args) {
	    $ArrayDeParametros = $request->getParsedBody();    	
	   
	    $entity = new correctivo();

        $entity->idMantCorrect=$ArrayDeParametros['idMantCorrect'];
        $entity->idMaquina=$ArrayDeParametros['idMaquina'];
        $entity->fechaSolicitud=$ArrayDeParametros['fechaSolicitud'];
        $entity->solicitante=$ArrayDeParametros['solicitante'];
        $entity->fechaReparacion=$ArrayDeParametros['fechaReparacion'];
        $entity->mantRealizar=$ArrayDeParametros['mantRealizar'];
        $entity->fechaRealizacion=$ArrayDeParametros['fechaRealizacion'];
        $entity->realizadoPor=$ArrayDeParametros['realizadoPor'];
        $entity->fechaReparado=$ArrayDeParametros['fechaReparado'];
        $entity->horaReparado=$ArrayDeParametros['horaReparado'];
        $entity->mantRealizado=$ArrayDeParametros['mantRealizado'];

	    $resultado = $entity->ModificarUno();
		$objDelaRespuesta= new stdclass();

	    $objDelaRespuesta->resultado=$resultado;
       
        return $response->withJson($objDelaRespuesta, 200);		
   }
}
