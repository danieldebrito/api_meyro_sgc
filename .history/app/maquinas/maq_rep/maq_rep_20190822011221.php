<?php
class Especificacion
{
	public $idEspecificacion;  // AI  //
	public $idMaquina;
 	public $detalle;

	public static function TraerTodos(){
		$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
		$consulta =$objetoAccesoDato->RetornarConsulta
		("SELECT * FROM `especificaciones` WHERE 1");
		$consulta->execute();		
		return $consulta->fetchAll(PDO::FETCH_CLASS, "Especificacion");		
	}

	public static function TraerUno($id) {
		$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
		$consulta =$objetoAccesoDato->RetornarConsulta("
		SELECT * FROM `especificaciones` WHERE `idEspecificacion` = $id
		");
		$consulta->execute();
		$ret = $consulta->fetchObject('Especificacion');
		return $ret;
	}

	public function CargarUno(){
		$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
		$consulta =$objetoAccesoDato->RetornarConsulta(
			"INSERT INTO `especificaciones` 
				(`idMaquina`, 
				`detalle`)
			VALUES (
				:idMaquina,
				:detalle)"
				);

		// AI //$consulta->bindValue(':idEspecificacion', $this->idEspecificacion, PDO::PARAM_STR);  AI
		$consulta->bindValue(':idMaquina', $this->idMaquina, PDO::PARAM_STR);
		$consulta->bindValue(':detalle', $this->detalle, PDO::PARAM_STR);

		$consulta->execute();		
		return $objetoAccesoDato->RetornarUltimoIdInsertado();
	}

	public static function Baja($id)
    {
        try {
            $objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso();

            $consulta = $objetoAccesoDato->RetornarConsulta("
			DELETE FROM `especificaciones` WHERE `idEspecificacion` = $id
			");

            $consulta->bindValue(':idEspecificacion', $id, PDO::PARAM_STR);

            $consulta->execute();

            $respuesta = array("Estado" => true, "Mensaje" => "Eliminado Correctamente");
        } catch (Exception $e) {
            $mensaje = $e->getMessage();
            $respuesta = array("Estado" => false, "Mensaje" => "$mensaje");
        }
        finally {
            return $respuesta;
        }
    }

	public function ModificarUno(){
		$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso();

		$consulta = $objetoAccesoDato->RetornarConsulta(
			"UPDATE
			 `especificaciones` 
			 SET 
			 `idMaquina`=:idMaquina, 
			 `detalle`=:detalle
			 WHERE `idEspecificacion` = :idEspecificacion"
			 );

			$consulta->bindValue(':idEspecificacion', $this->idEspecificacion, PDO::PARAM_STR);
			$consulta->bindValue(':idMaquina', $this->idMaquina, PDO::PARAM_STR);
			$consulta->bindValue(':detalle', $this->detalle, PDO::PARAM_STR);

		return $consulta->execute();
	}

	public static function TraerTodosMaquina($id){
		$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
		$consulta =$objetoAccesoDato->RetornarConsulta("
		SELECT * FROM `especificaciones` WHERE `idMaquina` = $id
		");
		$consulta->execute();		
		return $consulta->fetchAll(PDO::FETCH_CLASS, "Especificacion");		
	}

	public function BajaTodosMaquina($id)
    {
        try {
            $objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso();

            $consulta = $objetoAccesoDato->RetornarConsulta("
			DELETE FROM `especificaciones` WHERE `idMaquina` = $id
			");

            $consulta->bindValue(':idMaquina', $id, PDO::PARAM_STR);
            $consulta->execute();

            $respuesta = array("Estado" => true, "Mensaje" => "Eliminado Correctamente");
        } catch (Exception $e) {
            $mensaje = $e->getMessage();
            $respuesta = array("Estado" => false, "Mensaje" => "$mensaje");
        }
        finally {
            return $respuesta;
        }
    }
}