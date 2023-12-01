<?php 
require_once 'clases/respuestas.class.php';
require_once 'clases/medicamentos.class.php';

$_respuestas = new respuestas;
$_medicamentos = new medicamentos;

if($_SERVER['REQUEST_METHOD']=="GET"){

    if(isset($_GET["page"])){
        $pagina = $_GET["page"];
        $listaMedicamentos = $_medicamentos->listarMedicamentos($pagina);
        header("Content-Type: application/json");
        echo json_encode($listaMedicamentos);
        http_response_code(200);
    }else if(isset($_GET['id'])){
        $medicamentoid = $_GET['id'];
        $datosMedicamento = $_medicamentos->obtenerMedicamento($medicamentoid);
        header("Content-Type: application/json");
        echo json_encode($datosMedicamento);
        http_response_code(200);
    }
    
}else if($_SERVER['REQUEST_METHOD']=="POST"){

   

    
}else if($_SERVER['REQUEST_METHOD']=="PUT"){

  

}else if($_SERVER['REQUEST_METHOD']=="DELETE"){

    
}else{
    header('Content-Type: application/json');
    $datosArray = $_respuestas->error_405();
    echo json_encode($datosArray);
}


?>