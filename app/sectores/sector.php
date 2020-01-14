<?php
class sector
{
	public $idSector;  // AI  //
 	public $sector;

	public static function TraerTodos(){
		try {
			$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
			$consulta =$objetoAccesoDato->RetornarConsulta(
				"SELECT * FROM `sectores`"
			);
			$consulta->execute();		
			
			$ret = $consulta->fetchAll(PDO::FETCH_CLASS, "sector");
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
				"SELECT * FROM `sectores` WHERE `idSector` = $id"
			);

			$consulta->execute();
			$ret = $consulta->fetchObject('sector');
			
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
			"INSERT INTO `sectores`(`sector`) VALUES (:sector)"
		);

		$consulta->bindValue(':sector', $this->sector, PDO::PARAM_STR);

		$consulta->execute();		
		return $objetoAccesoDato->RetornarUltimoIdInsertado();
	}

	public static function Baja($id){
        try {
            $objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso();

            $consulta = $objetoAccesoDato->RetornarConsulta(
				"DELETE FROM `sectores` WHERE `idSector` = $id");

            $consulta->bindValue(':idSector', $id, PDO::PARAM_INT);

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
			"UPDATE `sectores` SET `sector`= :sector WHERE `idSector` = :idSector"
			 );

			$consulta->bindValue(':idSector', $this->idSector, PDO::PARAM_INT);
			$consulta->bindValue(':sector', $this->sector, PDO::PARAM_STR);

		return $consulta->execute();
	}
}