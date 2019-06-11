<?php
class MaquinaRepuesto{
	public $idMaquina;
	public $idRepuesto;

	public function CargarUno(){
		$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
		$consulta =$objetoAccesoDato->RetornarConsulta("
		INSERT INTO `maquina_repuesto`(`idMaquina`, `idRepuesto`)
		VALUES (:idMaquina,:idRepuesto)
		");

		$consulta->bindValue(':idMaquina', $this->idMaquina, PDO::PARAM_STR);
		$consulta->bindValue(':idRepuesto', $this->idRepuesto, PDO::PARAM_STR);

		$consulta->execute();		
		return $objetoAccesoDato->RetornarUltimoIdInsertado();
	}

	public function Baja() {
        try {
            $objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso();

			$consulta = $objetoAccesoDato->RetornarConsulta("
			DELETE FROM `maquina_repuesto` 
			WHERE `idMaquina` = :idMaquina 
			AND `idRepuesto` = :idRepuesto
			");

			$consulta->bindValue(':idMaquina', $this->idMaquina, PDO::PARAM_STR);
			$consulta->bindValue(':idRepuesto', $this->idRepuesto, PDO::PARAM_STR);

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