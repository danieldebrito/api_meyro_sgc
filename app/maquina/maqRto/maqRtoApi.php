<?php
require_once 'maqRto.php';

class maqRtoApi extends maqRto {

	public function readAllApi($request, $response, $args)
    {
        $all = maqRto::readAll();
        $newResponse = $response->withJson($all, 200);
        return $newResponse;
    }

    public function readApi($request, $response, $args)
    {
        $id = $args['idmaqrto'];
        $Ret = maqrto::read($id);
        $newResponse = $response->withJson($Ret, 200);
        return $newResponse;
	}

    public function CreateApi($request, $response, $args)
    {
        $ArrayDeParametros = $request->getParsedBody();

        $idmaqrto = $ArrayDeParametros['idmaqrto'];
        $idMaquina = $ArrayDeParametros['idMaquina'];
        $idRepuesto = $ArrayDeParametros['idRepuesto'];

        $entity = new producto();
        $entity->idmaqrto = $idmaqrto;
        $entity->idMaquina = $idMaquina;
        $entity->idRepuesto = $idRepuesto;

        $entity->create();
        $response->getBody()->write("true");

        return $response;
    }

    public function deleteApi($request, $response, $args)
    {
        $id = $args["idmaqrto"];
        $respuesta = maqrto::delete($id);
        $newResponse = $response->withJson($respuesta, 200);
        return $newResponse;
	}

    public function updateApi($request, $response, $args)
    {
        $ArrayDeParametros = $request->getParsedBody();
        $entity = new producto();
        $entity->idmaqrto = $ArrayDeParametros['idmaqrto'];
        $entity->idMaquina = $ArrayDeParametros['idMaquina'];
        $entity->idRepuesto = $ArrayDeParametros['idRepuesto'];

        $resultado = $entity->update();
        $objDelaRespuesta = new stdclass();
        $objDelaRespuesta->resultado = $resultado;
        return $response->withJson($objDelaRespuesta, 200);
    }
}