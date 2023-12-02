<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>API - Prubebas</title>
    <link rel="stylesheet" href="assets/estilo.css" type="text/css">
</head>
<body>

<div  class="container">
    <h1>Api de pruebas</h1>
    <div class="divbody">
        <h3>Auth - login</h3>
        <code>
           POST  /auth
           <br>
           {
               <br>
               "usuario" :"",  -> REQUERIDO
               <br>
               "password": "" -> REQUERIDO
               <br>
            }
            <br>
            <br>
        </code>
    </div>      
    <div class="divbody">   
        <h3>Pacientes</h3>
        <code>
           GET  /pacientes?page=$numeroPagina
           <br>
           GET  /pacientes?id=$idPaciente
        </code>
        <br><br>
        <code>
        <br>
           POST  /pacientes
           <br> 
           {
            <br> 
               "nombre" : "",               -> REQUERIDO
               <br> 
               "dni" : "",                  
               <br> 
               "correo":"",                
               <br> 
               "codigoPostal" :"",             
               <br>  
               "genero" : "",        
               <br>        
               "telefono" : "",       
               <br>       
               "fechaNacimiento" : "",       
           }
           <br><br>
        </code>
        <code>
        <br>
           PUT  /pacientes
           <br> 
           {
            <br> 
               "nombre" : "",               
               <br> 
               "dni" : "",                  
               <br> 
               "correo":"",                 
               <br> 
               "codigoPostal" :"",             
               <br>  
               "genero" : "",        
               <br>        
               "telefono" : "",       
               <br>       
               "fechaNacimiento" : "",      
               <br>           
               <br>       
               "pacienteId" : ""   -> REQUERIDO
               <br>
           }
           <br><br>
        </code>
        <code>
        <br>
           DELETE  /pacientes
           <br> 
           {      
               "pacienteId" : ""   -> REQUERIDO
               <br>
           }
           <br>
        </code>
    </div>


</div>
   
    <div class="divbody">   
        <h3>Citas</h3>
        <code>
           GET  /citas?page=$numeroPagina
           <br>
           GET  /citas?id=$idCita
           <br>
           GET  /citas?idP=$idPaciente
        </code>
        <br><br>
        <code>
        <br>
           POST  /citas
           <br> 
           {
            <br> 
               "paciente" : "",     
               <br> 
               "fecha" : "",                  
               <br> 
               "horaInicio":"",                
               <br> 
               "horaFIn" :"",             
               <br>  
               "estado" : "",        
               <br>        
               "motivo" : "",       
               <br>            
           }
           <br><br>
        </code>
        <code>
        <br>
           PUT  /citas
           <br> 
           {
            <br> 
               "paciente" : "",     
               <br> 
               "fecha" : "",                  
               <br> 
               "horaInicio":"",                
               <br> 
               "horaFIn" :"",             
               <br>  
               "estado" : "",        
               <br>        
               "motivo" : "",       
               <br>   
               "idCita" :"",         
           }
           <br><br>
        </code>
        <code>
        <br>
           DELETE  /citas
           <br> 
           {      <br>
               "citaId" : ""   -> REQUERIDO
               <br>
           }
           <br>
        </code>
    </div>

        
    <div class="divbody">   
        <h3>Medicamentos</h3>
        <code>
           GET  /medicamentos?page=$numeroPagina
           <br>
           GET  /medicamentos?id=$idMedicamento
           <br>
        </code>
        <br><br>
        <code>
        <br>
           POST  /medicamentos
           <br> 
           {
            <br> 
               "nombre" : "",     
               <br> 
               "costo" : "",                  
               <br> 
               "fechaVencimiento":"",                
               <br> 
               "img" :"",             
               <br>  
           }
           <br><br>
        </code>
        <code>
        <br>
           PUT  /medicamentos
           <br> 
           {
            <br> 
            "nombre" : "",     
               <br> 
               "costo" : "",                  
               <br> 
               "fechaVencimiento":"",                
               <br> 
               "img" :"",             
               <br>  
               <br>   
               "idMedicamento" :"",         
           }
           <br><br>
        </code>
        <code>
        <br>
           DELETE  /medicamentos
           <br> 
           {      <br>
               "medicamentoId" : ""   -> REQUERIDO
               <br>
           }
           <br>
        </code>
    </div>


</body>
</html>