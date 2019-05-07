<?php
class maquina
{
	public $idMaquina;
 	public $detalle;
  	public $marca;
	public $sector;
	public $idProveedorFabricante;
	public $estado;

	public static function TraerTodos(){
		$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
		$consulta =$objetoAccesoDato->RetornarConsulta("
		SELECT * FROM `maquinas` WHERE 1
		");
		$consulta->execute();		
		return $consulta->fetchAll(PDO::FETCH_CLASS, "maquina");		
	}

	public static function TraerUno($id) {
		$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
		$consulta =$objetoAccesoDato->RetornarConsulta("
		SELECT * FROM `maquinas` WHERE `idMaquina` =  $id
		");
		$consulta->execute();
		$maquina = $consulta->fetchObject('maquina');
		return $maquina;
	}

	public function CargarUno(){
		$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
		$consulta =$objetoAccesoDato->RetornarConsulta("
		INSERT INTO `maquinas` 
				(`idMaquina`, 
				`detalle`, 
				`marca`, 
				`sector`, 
				`idProveedorFabricante`, 
				`estado`) 
			VALUES (
				:idMaquina,
				:detalle,
				:marca,
				:sector,
				:idProveedorFabricante,
				:estado)
		");

		$consulta->bindValue(':idMaquina', $this->idMaquina, PDO::PARAM_STR);
		$consulta->bindValue(':detalle', $this->detalle, PDO::PARAM_STR);
		$consulta->bindValue(':marca', $this->marca, PDO::PARAM_STR);
		$consulta->bindValue(':sector', $this->sector, PDO::PARAM_STR);
		$consulta->bindValue(':idProveedorFabricante', $this->idProveedorFabricante, PDO::PARAM_STR);
		$consulta->bindValue(':estado', $this->estado, PDO::PARAM_STR);

		$consulta->execute();		
		return $objetoAccesoDato->RetornarUltimoIdInsertado();
	}

	public static function Baja($id)
    {
        try {
            $objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso();

            $consulta = $objetoAccesoDato->RetornarConsulta("
			DELETE FROM `maquinas` WHERE `idMaquina` = $id
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

	public function ModificarUno(){
		$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso();

		$consulta = $objetoAccesoDato->RetornarConsulta(
			"UPDATE
			 `maquinas` 
			 SET 
			 `idMaquina`=:idMaquina, `detalle`=:detalle, `marca`=:marca, `sector`=:sector, `idProveedorFabricante`=:idProveedorFabricante, `estado`=:estado
			 WHERE `id` = :id"
			 );

			$consulta->bindValue(':idMaquina', $this->idMaquina, PDO::PARAM_STR);
			$consulta->bindValue(':detalle', $this->detalle, PDO::PARAM_STR);
			$consulta->bindValue(':marca', $this->marca, PDO::PARAM_STR);
			$consulta->bindValue(':sector', $this->sector, PDO::PARAM_STR);
			$consulta->bindValue(':idProveedorFabricante', $this->idProveedorFabricante, PDO::PARAM_STR);
			$consulta->bindValue(':estado', $this->estado, PDO::PARAM_STR);

		return $consulta->execute();
	}
}