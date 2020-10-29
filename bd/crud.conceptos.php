<?php
include_once 'conexion.php';
$objeto = new Conexion();
$conexion = $objeto->Conectar();

$_POST = json_decode(file_get_contents("php://input"), true);
$opcion = (isset($_POST['opcion'])) ? $_POST['opcion'] : '';
$clave = (isset($_POST['clave'])) ? $_POST['clave'] : '';
$concepto = (isset($_POST['concepto'])) ? $_POST['concepto'] : '';
$costo = (isset($_POST['costo'])) ? $_POST['costo'] : '';



switch($opcion){
    case 1:
        $consulta1="INSERT INTO tblconceptos(vchconcepto,intcosto) VALUES ('$concepto','$costo')";	
        $resultado1 = $conexion->prepare($consulta1);
        $resultado1->execute();
                     
        break;
    case 2:
        $consulta1 = "UPDATE tblconceptos SET vchconcepto='$concepto',intcosto='$costo' WHERE intidconcepto='$clave'";		
        $resultado1 = $conexion->prepare($consulta1);
        $resultado1->execute(); 
         

        $data=$resultado1->fetchAll(PDO::FETCH_ASSOC);
        break;        
    case 3:
        $consulta = "DELETE FROM tblconceptos WHERE intidconcepto='$clave' ";		
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();                           
        break;         
    case 4:
        $consulta = "SELECT * FROM tblconceptos";
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();
        $data=$resultado->fetchAll(PDO::FETCH_ASSOC);
        break;
}



print json_encode($data, JSON_UNESCAPED_UNICODE);
$conexion = NULL;