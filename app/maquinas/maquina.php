<?php
class maquina
{
	public $id;
 	public $detalle;
  	public $marca;
	public $sector;
	public $fabricante_nombre;
	public $fabricante_direccion;
	public $fabricante_telefono;
	public $fabricante_contacto;

	public static function TraerTodos(){
		$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
		$consulta =$objetoAccesoDato->RetornarConsulta("
		SELECT * FROM `maquina` WHERE 1
		");
		$consulta->execute();		
		return $consulta->fetchAll(PDO::FETCH_CLASS, "maquina");		
	}

	public static function TraerUno($id) {
		$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
		$consulta =$objetoAccesoDato->RetornarConsulta("
		SELECT * FROM `maquina` WHERE `id` =  $id
		");
		$consulta->execute();
		$maquina = $consulta->fetchObject('maquina');
		return $maquina;
	}

	public function CargarUno(){
		$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
		$consulta =$objetoAccesoDato->RetornarConsulta("
		INSERT INTO `maquina` 
				(`id`, 
				`detalle`, 
				`marca`, 
				`fabricante_nombre`, 
				`fabricante_direccion`, 
				`fabricante_telefono`, 
				`fabricante_contacto`, 
				`sector`) 
			VALUES (
				:id,
				:detalle,
				:marca,
				:fabricante_nombre,
				:fabricante_direccion,
				:fabricante_telefono,
				:fabricante_contacto,
				:sector)
		");

		$consulta->bindValue(':id', $this->id, PDO::PARAM_STR);
		$consulta->bindValue(':detalle', $this->detalle, PDO::PARAM_STR);
		$consulta->bindValue(':marca', $this->marca, PDO::PARAM_STR);
		$consulta->bindValue(':fabricante_nombre', $this->fabricante_nombre, PDO::PARAM_STR);
		$consulta->bindValue(':fabricante_direccion', $this->fabricante_direccion, PDO::PARAM_STR);
		$consulta->bindValue(':fabricante_telefono', $this->fabricante_telefono, PDO::PARAM_STR);
		$consulta->bindValue(':fabricante_contacto', $this->fabricante_contacto, PDO::PARAM_STR);
		$consulta->bindValue(':sector', $this->sector, PDO::PARAM_STR);
		$consulta->execute();		
		return $objetoAccesoDato->RetornarUltimoIdInsertado();
	}

	public function BorrarUno(){
		$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
		$consulta =$objetoAccesoDato->RetornarConsulta("
			DELETE FROM `maquina` WHERE `id` = :id
			");	
			$consulta->bindValue(':id', $this->id, PDO::PARAM_INT);		
			$consulta->execute();
			return $consulta->rowCount();
	}

	public function ModificarUno(){
		$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso();

		$consulta = $objetoAccesoDato->RetornarConsulta(
			"UPDATE
			 `maquina` 
			 SET 
			 `id`=:id, `detalle`=:detalle, `marca`=:marca, `sector`=:sector, `fabricante_nombre`=:fabricante_nombre, `fabricante_direccion`=:fabricante_direccion, `fabricante_telefono`=:fabricante_telefono, `fabricante_contacto`=:fabricante_contacto 
			 WHERE `id` = :id"
			 );
		$consulta->bindValue(':id', $this->id, PDO::PARAM_STR);	
		$consulta->bindValue(':detalle', $this->detalle, PDO::PARAM_STR);
		$consulta->bindValue(':marca', $this->marca, PDO::PARAM_STR);
		$consulta->bindValue(':sector', $this->sector, PDO::PARAM_STR);
		$consulta->bindValue(':fabricante_nombre', $this->fabricante_nombre, PDO::PARAM_STR);
		$consulta->bindValue(':fabricante_direccion', $this->fabricante_direccion, PDO::PARAM_STR);
		$consulta->bindValue(':fabricante_telefono', $this->fabricante_telefono, PDO::PARAM_STR);
		$consulta->bindValue(':fabricante_contacto', $this->fabricante_contacto, PDO::PARAM_STR);

		return $consulta->execute();
	}
}