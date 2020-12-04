<?php
include_once 'conexion.php';
$objeto = new Conexion();
$conexion = $objeto->Conectar();

$_POST = json_decode(file_get_contents("php://input"), true);
$opcion = (isset($_POST['opcion'])) ? $_POST['opcion'] : '';
$clave = (isset($_POST['clave'])) ? $_POST['clave'] : '';
$estado = (isset($_POST['estado'])) ? $_POST['estado'] : '';
$iduser= (isset($_POST['iduser'])) ? $_POST['iduser'] : '';


$materia = (isset($_POST['materia'])) ? $_POST['materia'] : '';
$usuario = (isset($_POST['usuario'])) ? $_POST['usuario'] : '';

$concepto = (isset($_POST['concepto'])) ? $_POST['concepto'] : '';
$costo = (isset($_POST['costo'])) ? $_POST['costo'] : '';
$saldo = (isset($_POST['saldo'])) ? $_POST['saldo'] : '';
$matricula = (isset($_POST['matricula'])) ? $_POST['matricula'] : '';



switch($opcion){
    case 1:
    
   
    $consulta1="CALL PagoConceptos('$concepto','$saldo','$costo');";	
    $resultado1 = $conexion->prepare($consulta1);
    $resultado1->execute();
    $consulta2="CALL ActualizarSaldo('$costo','$matricula')";
    $resultado2=$conexion->prepare($consulta2);
    $resultado2->execute();
    $consulta3="CALL RegistrarMovimientoPago('$matricula','$concepto','$costo')";
    $resultado3=$conexion->prepare($consulta3);
    $resultado3->execute();
    
    


    break;
    case 2:
    $consulta1 = "UPDATE tblconceptos SET vchconcepto='$concepto',intcosto='$costo' WHERE intidconcepto='$clave'";		
    $resultado1 = $conexion->prepare($consulta1);
    $resultado1->execute(); 


    $data=$resultado1->fetchAll(PDO::FETCH_ASSOC);
    break;        
    case 3:
    $consulta = "DELETE FROM tblconceptospendientes WHERE intidconceptopendiente='$clave' ";		
    $resultado = $conexion->prepare($consulta);
    $resultado->execute();                           
    break;         
    case 4:
    $consulta = "SELECT a.`intidconceptopendiente`,a.`vchmatricula`,b.`vchconcepto`,d.`vchmateria`, b.`intcosto`,c.`vchnombre`,c.`vchapp`,c.`vchapm`,e.`vchcarrera`,a.`bolestadoconcepto` FROM tblconceptospendientes a LEFT JOIN tblconceptos b ON a.`intidconcepto`=b.`intidconcepto` LEFT JOIN tblalumnos c ON a.`vchmatricula`=c.`vchmatricula` LEFT JOIN tblcarreras e ON c.`intidcarrera`=e.`intidcarrera` LEFT JOIN tblmaterias d ON a.`intidmateria`=d.`intidmateria` WHERE a.`vchmatricula`='$usuario' AND a.`bolestadoconcepto`='activo'";
    $resultado = $conexion->prepare($consulta);
    $resultado->execute();
    $data=$resultado->fetchAll(PDO::FETCH_ASSOC);
    break;
    case 5:
    $consulta = "SELECT * FROM tblconceptos";
    $resultado = $conexion->prepare($consulta);
    $resultado->execute();
    $data=$resultado->fetchAll(PDO::FETCH_ASSOC);
    break;
    case 6:
    $consulta = "SELECT a.`vchidcuenta`,CONCAT(b.`vchnombre`,' ',b.`vchapp`,' ',b.`vchapm`) AS titular,c.`vchcarrera`,b.`chrcuatrimestre`,b.`chrgrupo`,a.`fltsaldo` FROM tblcuentas a LEFT JOIN tblalumnos b ON a.`vchidcuenta`=b.`vchmatricula` LEFT JOIN tblcarreras c ON b.`intidcarrera`=c.`intidcarrera` WHERE a.`vchidcuenta`='$usuario'";
    $resultado = $conexion->prepare($consulta);
    $resultado->execute();
    $data=$resultado->fetchAll(PDO::FETCH_ASSOC);
    break;
    case 7:
    $consulta = "SELECT SUM(b.`intcosto`) AS adeudototal FROM tblconceptospendientes a LEFT JOIN tblconceptos b ON a.`intidconcepto`=b.`intidconcepto` LEFT JOIN tblalumnos c ON a.`vchmatricula`=c.`vchmatricula` LEFT JOIN tblcarreras e ON c.`intidcarrera`=e.`intidcarrera` LEFT JOIN tblmaterias d ON a.`intidmateria`=d.`intidmateria` WHERE a.`vchmatricula`='$usuario' AND a.`bolestadoconcepto`='activo'" ;
    $resultado = $conexion->prepare($consulta);
    $resultado->execute();
    $data=$resultado->fetchAll(PDO::FETCH_ASSOC);
    break;
    case 8:
    $consulta = "SELECT a.`intidmovimiento`,a.`vchcuenta`,b.`clvservicio`,b.`vchtipo_servicio`,d.`vchconcepto`,a.`intimporte`,e.`vchmateria`,a.`vchfecha` FROM tblmovimientos a LEFT JOIN `tbltipo_servicios` b ON a.`intidtiposervicio`=b.`intidtipo_servicio` 
    LEFT JOIN `tblconceptospendientes` c ON a.`intidconcepto`=c.`intidconceptopendiente` LEFT JOIN `tblconceptos` d ON c.`intidconcepto`=d.`intidconcepto`
    LEFT JOIN tblmaterias e ON c.`intidmateria`=e.`intidmateria` WHERE a.`vchcuenta`='$usuario'";
    $resultado = $conexion->prepare($consulta);
    $resultado->execute();
    $data=$resultado->fetchAll(PDO::FETCH_ASSOC);
    break;
    case 9:
    $consulta = "SELECT a.`intidconceptopendiente`,a.`vchmatricula`,b.`vchconcepto`,d.`vchmateria`, b.`intcosto`,c.`vchnombre`,c.`vchapp`,c.`vchapm`,e.`vchcarrera`,a.`bolestadoconcepto` FROM tblconceptospendientes a LEFT JOIN tblconceptos b ON a.`intidconcepto`=b.`intidconcepto` LEFT JOIN tblalumnos c ON a.`vchmatricula`=c.`vchmatricula` LEFT JOIN tblcarreras e ON c.`intidcarrera`=e.`intidcarrera` LEFT JOIN tblmaterias d ON a.`intidmateria`=d.`intidmateria` WHERE a.`vchmatricula`='$usuario' AND a.`bolestadoconcepto`='Inactivo'";
    $resultado = $conexion->prepare($consulta);
    $resultado->execute();
    $data=$resultado->fetchAll(PDO::FETCH_ASSOC);
    break;
    case 10:
    $consulta = "SELECT b.`vchmatricula` FROM tblusuario a LEFT JOIN tblalumnos b ON a.`intidusuario`=b.`intidusuario` WHERE a.`intidusuario`='$iduser';";
    $resultado = $conexion->prepare($consulta);
    $resultado->execute();
    $data=$resultado->fetchAll(PDO::FETCH_ASSOC);
    break;
}



print json_encode($data, JSON_UNESCAPED_UNICODE);
$conexion = NULL;