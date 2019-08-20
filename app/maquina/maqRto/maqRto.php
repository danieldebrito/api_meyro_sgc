<?php
class maqRto{
	public $idmaqrto;
	public $idMaquina;
	public $idRepuesto;

	public static function readAll(){
        try {
            $objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso();
            $consulta = $objetoAccesoDato->RetornarConsulta(
				"SELECT * FROM `maqrtos` WHERE 1"
			);
            $consulta->execute();
            $ret = $consulta->fetchAll(PDO::FETCH_CLASS, "maqRto");
        } catch (Exception $e) {
            $mensaje = $e->getMessage();
            $respuesta = array("Estado" => "ERROR", "Mensaje" => "$mensaje");
        } finally {
            return $ret;
        }
    }

    public static function read($idmaqrto){
        try {
            $objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso();
            $consulta = $objetoAccesoDato->RetornarConsulta(
			"SELECT *
			FROM `maqrtos`
			WHERE `idmaqrto` = '$idmaqrto'
			");
            $consulta->execute();
            $ret = $consulta->fetchObject('maqrto');
        } catch (Exception $e) {
            $mensaje = $e->getMessage();
            $respuesta = array("Estado" => "ERROR", "Mensaje" => "$mensaje");
        } finally {
            return $ret;
        }
	}

    public function create()
    {
        try {
            $objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso();
            $consulta = $objetoAccesoDato->RetornarConsulta("
			INSERT INTO `maqrtos`
				(`idmaqrto`,
				`idMaquina`,
                `idRepuesto`)
			VALUES (
				:idmaqrto,
				:idMaquina,
                :idRepuesto)
		");

            $consulta->bindValue(':idmaqrto', $this->producto, PDO::PARAM_INT);
            $consulta->bindValue(':idMaquina', $this->idMaquina, PDO::PARAM_STR);
            $consulta->bindValue(':idRepuesto', $this->idRepuesto, PDO::PARAM_INT);

            $consulta->execute();
        } catch (Exception $e) {
            $mensaje = $e->getMessage();
            $respuesta = array("Estado" => "ERROR", "Mensaje" => "$mensaje");
        } finally {
            return $objetoAccesoDato->RetornarUltimoIdInsertado();
        }
    }

    public static function delete($idmaqrto){
        try {
            $objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso();
            $consulta = $objetoAccesoDato->RetornarConsulta("
                DELETE FROM `maqrtos` 
                WHERE `idmaqrto` = '$idmaqrto'
            ");
            $consulta->bindValue(':idmaqrto', $idmaqrto, PDO::PARAM_STR);
            $consulta->execute();
            $respuesta = array("Estado" => true, "Mensaje" => "Eliminado Correctamente");

        } catch (Exception $e) {
            $mensaje = $e->getMessage();
            $respuesta = array("Estado" => false, "Mensaje" => "$mensaje");

        } finally {
            return $respuesta;
        }
	}

    public function update()
    {
        $objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso();
        $consulta = $objetoAccesoDato->RetornarConsulta(
				"UPDATE 
				`maqrtos` 
                SET 
				`idMaquina`=:idMaquina, 
                `idRepuesto`=:idRepuesto
                WHERE idmaqrto=:idmaqrto");
                
				$consulta->bindValue(':idmaqrto', $this->idmaqrto, PDO::PARAM_INT);
				$consulta->bindValue(':idMaquina', $this->idMaquina, PDO::PARAM_STR);
				$consulta->bindValue(':idRepuesto', $this->idRepuesto, PDO::PARAM_INT);
        
        return $consulta->execute();
    }
}