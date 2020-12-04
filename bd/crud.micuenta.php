<?php
include_once 'conexion.php';
$objeto = new Conexion();
$conexion = $objeto->Conectar();

$_POST = json_decode(file_get_contents("php://input"), true);
$opcion = (isset($_POST['opcion'])) ? $_POST['opcion'] : '';
$clave = (isset($_POST['clave'])) ? $_POST['clave'] : '';
$estado = (isset($_POST['estado'])) ? $_POST['estado'] : '';
$concepto = (isset($_POST['concepto'])) ? $_POST['concepto'] : '';
$matricula = (isset($_POST['matricula'])) ? $_POST['matricula'] : '';
$materia = (isset($_POST['materia'])) ? $_POST['materia'] : '';
$usuario = (isset($_POST['usuario'])) ? $_POST['usuario'] : '';



switch($opcion){
             
    case 1:
        $consulta = "SELECT a.`vchidcuenta`,CONCAT(b.`vchnombre`,' ',b.`vchapp`,' ',b.`vchapm`) AS titular,c.`vchcarrera`,b.`chrcuatrimestre`,b.`chrgrupo`,a.`fltsaldo` FROM tblcuentas a LEFT JOIN tblalumnos b ON a.`vchidcuenta`=b.`vchmatricula` LEFT JOIN tblcarreras c ON b.`intidcarrera`=c.`intidcarrera` WHERE a.`vchidcuenta`='$usuario'";
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();
        $data=$resultado->fetchAll(PDO::FETCH_ASSOC);
        break;
    case 2:
        $consulta = "SELECT * FROM tblconceptos";
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();
        $data=$resultado->fetchAll(PDO::FETCH_ASSOC);
        break;
    
}



print json_encode($data, JSON_UNESCAPED_UNICODE);
$conexion = NULL;