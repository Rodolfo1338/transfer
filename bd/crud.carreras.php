<?php
include_once 'conexion.php';
$objeto = new Conexion();
$conexion = $objeto->Conectar();

$_POST = json_decode(file_get_contents("php://input"), true);
$opcion = (isset($_POST['opcion'])) ? $_POST['opcion'] : '';
$clave = (isset($_POST['clave'])) ? $_POST['clave'] : '';
$carrera = (isset($_POST['carrera'])) ? $_POST['carrera'] : '';




switch($opcion){
    case 1:
        $consulta1="INSERT INTO tblcarreras(vchcarrera) VALUES ('$carrera')";	
        $resultado1 = $conexion->prepare($consulta1);
        $resultado1->execute();
                     
        break;
    case 2:
        $consulta1 = "UPDATE tblcarreras SET vchcarrera='$carrera' WHERE intidcarrera='$clave'";		
        $resultado1 = $conexion->prepare($consulta1);
        $resultado1->execute(); 
         

        $data=$resultado1->fetchAll(PDO::FETCH_ASSOC);
        break;        
    case 3:
        $consulta = "DELETE FROM tblcarreras WHERE intidcarrera='$clave' ";		
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();                           
        break;         
    case 4:
        $consulta = "SELECT * FROM tblcarreras";
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();
        $data=$resultado->fetchAll(PDO::FETCH_ASSOC);
        break;
}



print json_encode($data, JSON_UNESCAPED_UNICODE);
$conexion = NULL;