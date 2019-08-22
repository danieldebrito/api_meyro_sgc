<?php
class maq_rep
{
	public $idmaq_rep;  // AI  //
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
				"SELECT * FROM `maq_reps` WHERE `idmaq_rep` = $id"
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

		// AI //$consulta->bindValue(':idmaq_rep', $this->idmaq_rep, PDO::PARAM_INT);  AI
		$consulta->bindValue(':idMaquina', $this->idMaquina, PDO::PARAM_STR);
		$consulta->bindValue(':idRepuesto', $this->idRepuesto, PDO::PARAM_STR);

		$consulta->execute();		
		return $objetoAccesoDato->RetornarUltimoIdInsertado();
	}

	public static function Baja($id){
        try {
            $objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso();

            $consulta = $objetoAccesoDato->RetornarConsulta(
				"DELETE FROM `maq_reps` WHERE `idmaq_rep` = $id");

            $consulta->bindValue(':idmaq_rep', $id, PDO::PARAM_STR);

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
			 WHERE `idmaq_rep`=:idmaq_rep"
			 );

			$consulta->bindValue(':idmaq_rep', $this->idmaq_rep, PDO::PARAM_STR);
			$consulta->bindValue(':idMaquina', $this->idMaquina, PDO::PARAM_STR);
			$consulta->bindValue(':idRepuesto', $this->idRepuesto, PDO::PARAM_STR);

		return $consulta->execute();
	}
}