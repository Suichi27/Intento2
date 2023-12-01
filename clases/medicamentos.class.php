<?php 
require_once "conexion/conexion.php";
require_once "respuestas.class.php";

class medicamentos extends conexion {

    private $table = "medicamentos";
    private $medicamentoid = "";
    private $costo = "";
    private $fechaVencimiento = "";
    private $img = "";

    public function listarMedicamentos($pagina =1){
        $inicio  = 0 ;
        $cantidad = 100;
        if($pagina > 1){
            $inicio = ($cantidad * ($pagina - 1)) +1 ;
            $cantidad = $cantidad * $pagina;
        }
        $query = "SELECT MedicamentoId,Nombre,Costo,FechaVencimiento,img FROM " . $this->table . " limit $inicio,$cantidad";
        $datos = parent::obtenerDatos($query);
        return ($datos);
    }

    public function obtenerMedicamento($id){
        $query = "SELECT * FROM " . $this->table . " WHERE MedicamentoId = '$id'";
        return parent::obtenerDatos($query);

    }

}


?>