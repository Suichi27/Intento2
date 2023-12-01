<?php 
require_once "conexion/conexion.php";
require_once "respuestas.class.php";

class citas extends conexion {

    private $table ="citas";
    private $citaid="";
    private $pacienteid="";
    private $fecha="";
    private $horaInicio="";
    private $horaFin="";
    private $estado="";
    private $Motivo="";

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

}

?>