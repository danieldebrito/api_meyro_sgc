<?php
class Repuesto{
	 public $idRepuesto;
	 public $detalle;
	 public $marca;
	 public $codigo;

	public static function TraerTodos(){
		$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
		$consulta =$objetoAccesoDato->RetornarConsulta(
			"SELECT * FROM `maquinarepuestos` WHERE 1"
		);
		$consulta->execute();		
		return $consulta->fetchAll(PDO::FETCH_CLASS, "Repuesto");		
	}

	public static function TraerUno($id) {
		$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
		$consulta =$objetoAccesoDato->RetornarConsulta(
			"SELECT * FROM `maquinarepuestos` WHERE `idRepuesto` = $id"
		);
		$consulta->execute();
		$ret = $consulta->fetchObject('Repuesto');
		return $ret;
	}

	public function CargarUno(){
		$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
		$consulta =$objetoAccesoDato->RetornarConsulta(
			"INSERT INTO `maquinarepuestos`(`detalle`, `marca`, `codigo`) 
			VALUES (:detalle, :marca, :codigo)"
			);

		// AI // $consulta->bindValue(':idRepuesto', $this->idMaquina, PDO::PARAM_STR);
		$consulta->bindValue(':detalle', $this->detalle, PDO::PARAM_STR);
		$consulta->bindValue(':marca', $this->marca, PDO::PARAM_STR);
		$consulta->bindValue(':codigo', $this->codigo, PDO::PARAM_STR);

		$consulta->execute();		
		return $objetoAccesoDato->RetornarUltimoIdInsertado();
	}

	public static function Baja($id) {
        try {
            $objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso();

            $consulta = $objetoAccesoDato->RetornarConsulta(
				"DELETE FROM `maquinarepuestos` WHERE `idRepuesto` = $id"
			);

            $consulta->bindValue(':idRepuesto', $id, PDO::PARAM_STR);

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
			"UPDATE `maquinarepuestos` 
			SET `marca`=:marca,`codigo`=:codigo,`detalle`=:detalle 
			WHERE  `idRepuesto` = :idRepuesto");

			$consulta->bindValue(':idRepuesto', $this->idRepuesto, PDO::PARAM_STR);
			$consulta->bindValue(':marca', $this->marca, PDO::PARAM_STR);
			$consulta->bindValue(':codigo', $this->codigo, PDO::PARAM_STR);
			$consulta->bindValue(':detalle', $this->detalle, PDO::PARAM_STR);

		return $consulta->execute();
	}

	public static function TraerTodosMaquina($id){
		$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
		$consulta =$objetoAccesoDato->RetornarConsulta(
			"SELECT * FROM `maquinarepuestos` WHERE `idMaquina` = $id"
		);
		$consulta->execute();		
		return $consulta->fetchAll(PDO::FETCH_CLASS, "Repuesto");		
	}
}