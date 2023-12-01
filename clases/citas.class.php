<?php 
require_once "conexion/conexion.php";
require_once "respuestas.class.php";

class citas extends conexion {

    private $table ="citas";
    private $citaid="";
    private $pacienteid="";
    private $fecha="0000-00-00";
    private $horaInicio="00:00:00";
    private $horaFin="00:00:00";
    private $estado="Confirmada";
    private $motivo="";

    public function listaCitas($pagina=1){
          $inicio  = 0 ;
        $cantidad = 100;
        if($pagina > 1){
            $inicio = ($cantidad * ($pagina - 1)) +1 ;
            $cantidad = $cantidad * $pagina;
        }
        $query = "SELECT CitaId,PacienteId,Fecha,HoraInicio,Estado,Motivo FROM " . $this->table . " limit $inicio,$cantidad";
        $datos = parent::obtenerDatos($query);
        return ($datos);


    }

    public function obtenerCita($id){
        $query = "SELECT * FROM " . $this->table . " WHERE CitaId = '$id'";
        return parent::obtenerDatos($query);

    }

    public function obtenerCitaPorPaciente($id){
        $query = "SELECT * FROM " . $this->table . " WHERE PacienteId = '$id'";
        return parent::obtenerDatos($query);

    }

    public function post($json){
        $_respuestas = new respuestas;
        $datos = json_decode($json,true);
        if(!isset($datos['pacienteId']) ){
            return $_respuestas->error_400();
        }else{
            $this->pacienteid = $datos['pacienteId'];
            if(isset($datos['fecha'])) { $this->fecha = $datos['fecha']; }
            if(isset($datos['motivo'])) { $this->motivo = $datos['motivo']; }
            if(isset($datos['horaInicio'])) { $this->horaInicio = $datos['horaInicio']; }
            if(isset($datos['horaFin'])) { $this->horaFin = $datos['horaFin']; }
            if(isset($datos['estado'])) { $this->estado = $datos['estado']; }
            $resp = $this->insertarCita();
            if($resp){
                $respuesta = $_respuestas->response;
                $respuesta["result"] = array(
                    "citaId" => $resp
                );
                return $respuesta;
            }else{
                return $_respuestas->error_500();
            }

    }
    
    }

    private function insertarCita(){
        $query = "INSERT INTO " . $this->table . " (PacienteId,Fecha,HoraInicio,HoraFIn,Estado,Motivo) 
        values
        ('" . $this->pacienteid . "','" . $this->fecha . "','" . $this->horaInicio ."','" . $this->HoraFin . "','"  . $this->estado . "','" . $this->motivo . "')"; 
        $resp = parent::nonQueryId($query);
        if($resp){
             return $resp;
        }else{
            return 0;
        }
    }



}

?>