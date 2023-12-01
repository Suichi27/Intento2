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

    //recibimos los datos enviados
    $postBody = file_get_contents("php://input");
    //enviamos los datos al manejador
    $datosArray = $_medicamentos->post($postBody);
    //delvovemos una respuesta 
     header('Content-Type: application/json');
     if(isset($datosArray["result"]["error_id"])){
         $responseCode = $datosArray["result"]["error_id"];
         http_response_code($responseCode);
     }else{
         http_response_code(200);
     }
     echo json_encode($datosArray);
    

    
}else if($_SERVER['REQUEST_METHOD']=="PUT"){


     //recibimos los datos enviados
     $postBody = file_get_contents("php://input");
     //enviamos datos
     $datosArray = $_medicamentos->put($postBody);
      //delvovemos una respuesta 
      header('Content-Type: application/json');
      if(isset($datosArray["result"]["error_id"])){
          $responseCode = $datosArray["result"]["error_id"];
          http_response_code($responseCode);
      }else{
          http_response_code(200);
      }
      echo json_encode($datosArray);
  

}else if($_SERVER['REQUEST_METHOD']=="DELETE"){
//recibimos los datos enviados
$postBody = file_get_contents("php://input");
//enviamos datos al manejador
$datosArray = $_medicamentos->delete($postBody);
  //delvovemos una respuesta 
header('Content-Type: application/json');
if(isset($datosArray["result"]["error_id"])){
   $responseCode = $datosArray["result"]["error_id"];
   http_response_code($responseCode);
}else{
   http_response_code(200);
}
echo json_encode($datosArray);


    
}else{
    header('Content-Type: application/json');
    $datosArray = $_respuestas->error_405();
    echo json_encode($datosArray);
}


?>