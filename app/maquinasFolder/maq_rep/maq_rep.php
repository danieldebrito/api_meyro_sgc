<?php
class maq_rep
{
	public $idMaqRep;  // AI  //
	public $idMaquina;
 	public $idRepuesto;

	public static function TraerTodos(){
		try {
			$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
			$consulta =$objetoAccesoDato->RetornarConsulta(
				"SELECT * FROM `maq_reps`"
			);
			$consulta->execute();		
			
			$ret = $consulta->fetchAll(PDO::FETCH_CLASS, "maq_rep");
		} catch (Exception $e) {
			$mensaje = $e->getMessage();
			$respuesta = array("Estado" => "ERROR", "Mensaje" => "$mensaje");
		} finally {
			return $ret;
		}			
	}

	public static function TraerUno($id) {
		try {
			$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
			$consulta =$objetoAccesoDato->RetornarConsulta(
				"SELECT * FROM `maq_reps` WHERE `idMaqRep` = $id"
			);

			$consulta->execute();
			$ret = $consulta->fetchObject('maq_rep');
			
		} catch (Exception $e) {
            $mensaje = $e->getMessage();
            $respuesta = array("Estado" => "ERROR", "Mensaje" => "$mensaje");
        } finally {
            return $ret;
        }	
	}

	public function CargarUno(){
		$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
		$consulta =$objetoAccesoDato->RetornarConsulta(
			"INSERT INTO `maq_reps` 
				(`idMaquina`,
				`idRepuesto`)
			VALUES (
				:idMaquina,
				:idRepuesto)"
				);

		// AI //$consulta->bindValue(':idMaqRep', $this->idMaqRep, PDO::PARAM_INT);  AI
		$consulta->bindValue(':idMaquina', $this->idMaquina, PDO::PARAM_STR);
		$consulta->bindValue(':idRepuesto', $this->idRepuesto, PDO::PARAM_STR);

		$consulta->execute();		
		return $objetoAccesoDato->RetornarUltimoIdInsertado();
	}

	public static function Baja($id){
        try {
            $objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso();

            $consulta = $objetoAccesoDato->RetornarConsulta(
				"DELETE FROM `maq_reps` WHERE `idMaqRep` = $id");

            $consulta->bindValue(':idMaqRep', $id, PDO::PARAM_STR);

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
			 `maq_reps` 
			 SET 
			 `idMaquina`=:idMaquina, 
			 `idRepuesto`=:idRepuesto
			 WHERE `idMaqRep`=:idMaqRep"
			 );

			$consulta->bindValue(':idMaqRep', $this->idMaqRep, PDO::PARAM_STR);
			$consulta->bindValue(':idMaquina', $this->idMaquina, PDO::PARAM_STR);
			$consulta->bindValue(':idRepuesto', $this->idRepuesto, PDO::PARAM_STR);

		return $consulta->execute();
	}

	///////////////////////////////////  end CRUD /////////////////////////////////////////////

	public static function TraerTodosMaquina($id){
		try {
			$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
			$consulta =$objetoAccesoDato->RetornarConsulta(
				"SELECT ma.idMaquina, re.idRepuesto, re.detalle, re.marca, re.codigo
				FROM maq_reps mr, maquinas ma, maquinarepuestos re
				WHERE mr.idMaquina = ma.idMaquina
				AND mr.idRepuesto = re.idRepuesto
				AND ma.idMaquina = $id"
			);
			$consulta->execute();		
			
			$ret = $consulta->fetchAll(PDO::FETCH_CLASS);
		} catch (Exception $e) {
			$mensaje = $e->getMessage();
			$respuesta = array("Estado" => "ERROR", "Mensaje" => "$mensaje");
		} finally {
			return $ret;
		}			
	}
}