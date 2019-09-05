<?php
class correctivo
{
    public $idMantCorrect;
    public $idMaquina;
    public $fechaSolicitud;
    public $solicitante;
    public $fechaReparacion;
    public $mantRealizar;
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
            $ret = $consulta->fetchAll(PDO::FETCH_CLASS, "correctivo");
            
		} catch (Exception $e) {
			$mensaje = $e->getMessage();
			$respuesta = array("Estado" => "ERROR", "Mensaje" => "$mensaje");
		} finally {
			return $ret;
		}		
    }

	public static function TraerUno($idMantCorrect) {
		try {
			$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
			$consulta =$objetoAccesoDato->RetornarConsulta
			("SELECT * FROM `correctivos` WHERE `idMantCorrect` =  $idMantCorrect");
			$consulta->execute();
			$ret = $consulta->fetchObject('correctivo');
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
			$consulta =$objetoAccesoDato->RetornarConsulta(
                "INSERT INTO `correctivos` 
					(`idMaquina`,
					`fechaSolicitud`,
					`solicitante`,
					`fechaReparacion`,  
					`mantRealizar`, 
					`realizadoPor`, 
					`fechaReparado`, 
                    `horaReparado`,
                    `mantRealizado`)
				VALUES (
					:idMaquina, 
					:fechaSolicitud, 
					:solicitante, 
					:fechaReparacion, 
					:mantRealizar, 
                    :realizadoPor,
                    :fechaReparado,  
					:horaReparado, 
					:mantRealizado)
			");

			// $consulta->bindValue(':idMantCorrect', $this->idMantCorrect, PDO::PARAM_STR); // AI //
			$consulta->bindValue(':idMaquina', $this->idMaquina, PDO::PARAM_STR);
			$consulta->bindValue(':fechaSolicitud', $this->fechaSolicitud, PDO::PARAM_STR);
			$consulta->bindValue(':solicitante', $this->solicitante, PDO::PARAM_STR);
			$consulta->bindValue(':fechaReparacion', $this->fechaReparacion, PDO::PARAM_STR);
			$consulta->bindValue(':mantRealizar', $this->mantRealizar, PDO::PARAM_STR);
			$consulta->bindValue(':realizadoPor', $this->realizadoPor, PDO::PARAM_STR);
            $consulta->bindValue(':fechaReparado', $this->fechaReparado, PDO::PARAM_STR);
            $consulta->bindValue(':horaReparado', $this->horaReparado, PDO::PARAM_STR);
			$consulta->bindValue(':mantRealizado', $this->mantRealizado, PDO::PARAM_STR);

            $consulta->execute();
            
		} catch (Exception $e) {
            $mensaje = $e->getMessage();
            $respuesta = array("Estado" => "ERROR", "Mensaje" => "$mensaje");
        } finally {
            return $objetoAccesoDato->RetornarUltimoIdInsertado();
        }		
	}

	public static function Baja($idMantCorrect)
    {
        try {
            $objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso();

			$consulta = $objetoAccesoDato->RetornarConsulta
			("DELETE FROM `correctivos` WHERE `idMantCorrect` = $idMantCorrect");

            $consulta->bindValue(':idMantCorrect', $idMantCorrect, PDO::PARAM_STR);
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
		try {
			$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso();
			
			$consulta =$objetoAccesoDato->RetornarConsulta
			("UPDATE `maquinas` SET 
			`idMaquina`=:idMaquina,
			`fechaSolicitud`=:fechaSolicitud,
			`solicitante`=:solicitante,
			`fechaReparacion`=:fechaReparacion,
			`mantRealizar`=:mantRealizar,
			`realizadoPor`=:realizadoPor,
            `fechaReparado`=:fechaReparado,
			`horaReparado`=:horaReparado,
			`mantRealizado`=:mantRealizado 
			WHERE 
			`idMantCorrect`=:idMantCorrect");  

			$consulta->bindValue(':idMantCorrect', $this->idMantCorrect, PDO::PARAM_INT);
			$consulta->bindValue(':idMaquina', $this->idMaquina, PDO::PARAM_STR);
			$consulta->bindValue(':fechaSolicitud', $this->fechaSolicitud, PDO::PARAM_STR);
			$consulta->bindValue(':solicitante', $this->solicitante, PDO::PARAM_STR);
			$consulta->bindValue(':fechaReparacion', $this->fechaReparacion, PDO::PARAM_STR);
            $consulta->bindValue(':mantRealizar', $this->mantRealizar, PDO::PARAM_STR);
			$consulta->bindValue(':realizadoPor', $this->realizadoPor, PDO::PARAM_STR);
			$consulta->bindValue(':fechaReparado', $this->fechaReparado, PDO::PARAM_STR);
			$consulta->bindValue(':horaReparado', $this->horaReparado, PDO::PARAM_STR);
			$consulta->bindValue(':mantRealizado', $this->fabrimantRealizadocanteContacto, PDO::PARAM_STR);

		} catch (Exception $e) {
            $mensaje = $e->getMessage();
            $respuesta = array("Estado" => false, "Mensaje" => "$mensaje");

        } finally {
            return $consulta->execute();
        }
	}
	
		///////////////////////////////////  end CRUD /////////////////////////////////////////////

		public static function TraerTodosMaquina($id){
			try {
				$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
				$consulta =$objetoAccesoDato->RetornarConsulta(
					"SELECT * 
					FROM `correctivos` 
					WHERE `idMaquina` = $id"
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
