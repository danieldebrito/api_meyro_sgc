<?php
class Correctivo{
	 public $idMantCorrect;
	 public $fechaSolicitud;
	 public $solicitante;
	 public $fechaReparacion;
	 public $mantRealizar;
	 public $fechaRealizacion;
	 public $realizadoPor;
	 public $fechaReparado;
	 public $horaReparado;
	 public $mantRealizado;

	public static function TraerTodos(){
		try {
			$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
			$consulta =$objetoAccesoDato->RetornarConsulta
			("SELECT * FROM `correctivos` WHERE 1");
			$consulta->execute();		
			$ret = $consulta->fetchAll(PDO::FETCH_CLASS, "Repuesto");
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
			$consulta =$objetoAccesoDato->RetornarConsulta
			("SELECT * FROM `repuestos` WHERE `idRepuesto` = $id");
			$consulta->execute();
			$ret = $consulta->fetchObject('Repuesto');
		} catch (Exception $e) {
			$mensaje = $e->getMessage();
			$respuesta = array("Estado" => "ERROR", "Mensaje" => "$mensaje");
		} finally {
			return $ret;
		}
	}

	public function CargarUno(){
		try {
			$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
			$consulta =$objetoAccesoDato->RetornarConsulta

			("INSERT INTO `repuestos`(`idMaquina`, `detalle`, `marca`, `codigo`) 
			VALUES (:idMaquina, :detalle, :marca, :codigo)");

			$consulta->bindValue(':idMaquina', $this->idMaquina, PDO::PARAM_STR);
			$consulta->bindValue(':detalle', $this->detalle, PDO::PARAM_STR);
			$consulta->bindValue(':marca', $this->marca, PDO::PARAM_STR);
			$consulta->bindValue(':codigo', $this->codigo, PDO::PARAM_STR);

			$consulta->execute();
		} catch (Exception $e) {
            $mensaje = $e->getMessage();
            $respuesta = array("Estado" => "ERROR", "Mensaje" => "$mensaje");
        } finally {
            return $objetoAccesoDato->RetornarUltimoIdInsertado();
        }		
	}

	public static function Baja($id) {
        try {
            $objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso();

			$consulta = $objetoAccesoDato->RetornarConsulta
			("DELETE FROM `repuestos` WHERE `idRepuesto` = $id");

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
		
		public function update()
		{
			$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso();
			$consulta = $objetoAccesoDato->RetornarConsulta
					("UPDATE `comanda_productos` SET 
					`id_comanda`=:id_comanda, 
					`id_producto`=:id_producto, 
					`id_empleado`=:id_empleado,
					`id_estado_producto`=:id_estado_producto,
					`cantidad`=:cantidad 
					WHERE id_comanda_producto=:id_comanda_producto");
					
					$consulta->bindValue(':id_comanda_producto', $this->id_comanda_producto, PDO::PARAM_STR);
					$consulta->bindValue(':id_comanda', $this->id_comanda, PDO::PARAM_STR);
					$consulta->bindValue(':id_producto', $this->id_producto, PDO::PARAM_STR);
					$consulta->bindValue(':id_empleado', $this->id_empleado, PDO::PARAM_STR);
					$consulta->bindValue(':id_estado_producto', $this->id_estado_producto, PDO::PARAM_STR);
					$consulta->bindValue(':cantidad', $this->cantidad, PDO::PARAM_INT);
			
			return $consulta->execute();
		}
	}
	
	//  ver no funca
/*
	public static function ModificarUno(){
		$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso();

		$consulta = $objetoAccesoDato->RetornarConsulta("
		UPDATE `repuestos` 
		SET `marca`=:marca,`codigo`=:codigo,`detalle`=:detalle 
		WHERE  `idRepuesto` = :idRepuesto");

			$consulta->bindValue(':idRepuesto', $this->idRepuesto, PDO::PARAM_STR);
			$consulta->bindValue(':marca', $this->marca, PDO::PARAM_STR);
			$consulta->bindValue(':codigo', $this->codigo, PDO::PARAM_STR);
			$consulta->bindValue(':detalle', $this->detalle, PDO::PARAM_STR);

		return $consulta->execute();
	}*/

	/*

	public static function TraerTodosMaquina($id){
		$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
		$consulta =$objetoAccesoDato->RetornarConsulta("
		SELECT repuestos.idRepuesto, repuestos.detalle, repuestos.marca, repuestos.codigo
		FROM repuestos INNER JOIN maquina_repuesto  
		ON repuestos.idRepuesto = maquina_repuesto.idRepuesto 
		WHERE maquina_repuesto.idMaquina = $id
		");
		$consulta->execute();		
		return $consulta->fetchAll(PDO::FETCH_CLASS, "Repuesto");		
	}

	public static function TraerTodosMaquina($id){
		$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
		$consulta =$objetoAccesoDato->RetornarConsulta("
		SELECT * FROM `repuestos` WHERE `idMaquina` = $id
		");
		$consulta->execute();		
		return $consulta->fetchAll(PDO::FETCH_CLASS, "Repuesto");		
	}
}*/