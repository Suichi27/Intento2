<?php 
require_once "conexion/conexion.php";
require_once "respuestas.class.php";

class medicamentos extends conexion {

    private $table = "medicamentos";
    private $medicamentoid = "";
    private $nombre ="";
    private $costo = "";
    private $fechaVencimiento = "0000-00-00";
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

    public function post($json){
        $_respuestas = new respuestas;
        $datos = json_decode($json,true);
                if(!isset($datos['nombre'])){
                    return $_respuestas->error_400();
                }else{
                    $this->nombre = $datos['nombre'];                   
                    if(isset($datos['costo'])) { $this->costo = $datos['costo']; }
                    if(isset($datos['fechaVencimiento'])) { $this->fechaVencimiento = $datos['fechaVencimiento']; }
                    if(isset($datos['img'])) { $this->img = $datos['img']; }
                    $resp = $this->insertarMedicamento();
                    if($resp){
                        $respuesta = $_respuestas->response;
                        $respuesta["result"] = array(
                            "medicamentoId" => $resp
                        );
                        return $respuesta;
                    }else{
                        return $_respuestas->error_500();
                    }
                }

    }
    private function insertarMedicamento(){
        $query = "INSERT INTO " . $this->table . " (`Nombre`, `Costo`, `FechaVencimiento`, `img`)
        values
        ('" . $this->nombre . "','" . $this->costo . "','" . $this->fechaVencimiento ."','" . $this->img ."')"; 
        $resp = parent::nonQueryId($query);
        if($resp){
             return $resp;
        }else{
            return 0;
        }
    }
    

    public function put($json){
        $_respuestas = new respuestas;
        $datos = json_decode($json,true);
                if(!isset($datos['medicamentoId'])){
                    return $_respuestas->error_400();
                }else{
                    $this->medicamentoId = $datos['medicamentoId'];         
                    if(isset($datos['nombre'])) { $this->nombre = $datos['nombre']; }        
                    if(isset($datos['costo'])) { $this->costo = $datos['costo']; }
                    if(isset($datos['fechaVencimiento'])) { $this->fechaVencimiento = $datos['fechaVencimiento']; }
                    if(isset($datos['img'])) { $this->img = $datos['img']; }
                    $resp = $this->modificarMedicamento();
                    if($resp){
                        $respuesta = $_respuestas->response;
                        $respuesta["result"] = array(
                            "medicamentoId" => $this->medicamentoId
                        );
                        return $respuesta;
                    }else{
                        return $_respuestas->error_500();
                    }
                }

    }

    private function modificarMedicamento(){
        $query = "UPDATE " . $this->table . " SET Nombre ='" . $this->nombre . "',Costo = '" . $this->costo . "', FechaVencimiento = '" . $this->fechaVencimiento . "', img = '" . $this->img .
         "' WHERE MedicamentoId = '" . $this->medicamentoId . "'"; 
          
        $resp = parent::nonQuery($query);
        if($resp){
             return $resp;
        }else{
            return 0;
        }
    }   


  public function delete($json){
        $_respuestas = new respuestas;
        $datos = json_encode($json,true);
        if(!isset($datos['medicamentoId'])){
            return $_respuestas->error_400();
        }else{
            $this->medicamentoId = $datos['medicamentoId'];               
            $resp = $this->eliminarMedicamento();
            if($resp){
                $respuesta = $_respuestas->response;
                $respuesta["result"] = array(
                    "medicamentoId" => $this->medicamentoId
                );
               return $respuesta;
            }else{
                return $_respuestas->error_500();
            }
        }
    }
   

  

    private function eliminarMedicamento(){
        $query = "DELETE FROM " . $this->table . " WHERE MedicamentoId= '" . $this->medicamentoid . "'";
        $resp = parent::nonQuery($query);
        if($resp >= 1 ){
            return $resp;
        }else{
            return 0;
        }
    }



}


?>