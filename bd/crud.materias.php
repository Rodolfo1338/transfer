<?php
include_once 'conexion.php';
$objeto = new Conexion();
$conexion = $objeto->Conectar();

$_POST = json_decode(file_get_contents("php://input"), true);
$opcion = (isset($_POST['opcion'])) ? $_POST['opcion'] : '';
$clave = (isset($_POST['clave'])) ? $_POST['clave'] : '';
$materia = (isset($_POST['materia'])) ? $_POST['materia'] : '';




switch($opcion){
    case 1:
        $consulta1="INSERT INTO tblmaterias(vchmateria) VALUES ('$materia')";	
        $resultado1 = $conexion->prepare($consulta1);
        $resultado1->execute();
                     
        break;
    case 2:
        $consulta1 = "UPDATE tblmaterias SET vchmateria='$materia' WHERE intidmateria='$clave'";		
        $resultado1 = $conexion->prepare($consulta1);
        $resultado1->execute(); 
         

        $data=$resultado1->fetchAll(PDO::FETCH_ASSOC);
        break;        
    case 3:
        $consulta = "DELETE FROM tblmaterias WHERE intidmateria='$clave' ";		
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();                           
        break;         
    case 4:
        $consulta = "SELECT * FROM tblmaterias";
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();
        $data=$resultado->fetchAll(PDO::FETCH_ASSOC);
        break;
}



print json_encode($data, JSON_UNESCAPED_UNICODE);
$conexion = NULL;