<?php
include_once 'conexion.php';
$objeto = new Conexion();
$conexion = $objeto->Conectar();

$_POST = json_decode(file_get_contents("php://input"), true);
$opcion = (isset($_POST['opcion'])) ? $_POST['opcion'] : '';
$cuenta = (isset($_POST['cuenta'])) ? $_POST['cuenta'] : '';
$vencimiento = (isset($_POST['vencimiento'])) ? $_POST['vencimiento'] : '';
$codigo = (isset($_POST['codigo'])) ? $_POST['codigo'] : '';
$saldo = (isset($_POST['saldo'])) ? $_POST['saldo'] : '';
$deposito = (isset($_POST['deposito'])) ? $_POST['deposito'] : '';
$dep=0;


switch($opcion){
    case 1:
        $consulta1="INSERT INTO tblcuentas VALUES ('$cuenta','$vencimiento','$codigo','$saldo')";
        $resultado1 = $conexion->prepare($consulta1);
        $resultado1->execute();
                    
        break;
    case 2:
        $dep=$saldo+$deposito;
        $consulta1 = "UPDATE tblcuentas SET fltsaldo='$dep' WHERE vchidcuenta='$cuenta';";		
        $resultado1 = $conexion->prepare($consulta1);
        $resultado1->execute(); 
        
        $data=$resultado1->fetchAll(PDO::FETCH_ASSOC);
        break;        
    case 3:
        $consulta = "DELETE FROM tblcuentas WHERE vchidcuenta='$cuenta' ";		
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();                           
        break;         
    case 4:
        $consulta = "SELECT a.`vchidcuenta`,b.`vchnombre`,b.`vchapp`,b.`vchapm`,c.`vchcarrera`,a.`vchfechavencimiento`,a.`vchcodigoseguridad`,a.`fltsaldo` FROM tblcuentas a LEFT JOIN tblalumnos b ON a.`vchidcuenta`=b.`vchmatricula` LEFT JOIN tblcarreras c ON b.`intidcarrera`=c.`intidcarrera`";
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();
        $data=$resultado->fetchAll(PDO::FETCH_ASSOC);
        break;
    case 5:
        $consulta1="INSERT INTO tblmovimientos(vchcuenta,intidtiposervicio,`intimporte`,vchfecha) VALUES ('$cuenta',1,$saldo,(SELECT NOW()));";
        $resultado1 = $conexion->prepare($consulta1);
        $resultado1->execute();
                    
        break;
    case 6:
        $consulta1="INSERT INTO tblmovimientos(vchcuenta,intidtiposervicio,`intimporte`,vchfecha) VALUES ('$cuenta',2,$deposito,(SELECT NOW()));";
        $resultado1 = $conexion->prepare($consulta1);
        $resultado1->execute();
                    
        break;
}



print json_encode($data, JSON_UNESCAPED_UNICODE);
$conexion = NULL;