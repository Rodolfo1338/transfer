<?php
include_once 'conexion.php';
$objeto = new Conexion();
$conexion = $objeto->Conectar();

$_POST = json_decode(file_get_contents("php://input"), true);
$opcion = (isset($_POST['opcion'])) ? $_POST['opcion'] : '';
$matricula = (isset($_POST['matricula'])) ? $_POST['matricula'] : '';
$nombre = (isset($_POST['nombre'])) ? $_POST['nombre'] : '';
$apaterno = (isset($_POST['apaterno'])) ? $_POST['apaterno'] : '';
$amaterno = (isset($_POST['amaterno'])) ? $_POST['amaterno'] : '';
$carrera = (isset($_POST['carrera'])) ? $_POST['carrera'] : '';
$cuatrimestre = (isset($_POST['cuatrimestre'])) ? $_POST['cuatrimestre'] : '';
$grupo = (isset($_POST['grupo'])) ? $_POST['grupo'] : '';
$curp = (isset($_POST['curp'])) ? $_POST['curp'] : '';
$direccion = (isset($_POST['direccion'])) ? $_POST['direccion'] : '';
$telefono = (isset($_POST['telefono'])) ? $_POST['telefono'] : '';
$email = (isset($_POST['email'])) ? $_POST['email'] : '';
$usuario = (isset($_POST['usuario'])) ? $_POST['usuario'] : '';
$password = (isset($_POST['password'])) ? $_POST['password'] : '';

switch($opcion){
    case 1:
        $consulta1="INSERT INTO tblusuario(vchusuario,vchpassword,intidrol) VALUES('$usuario','$password',1);";
        $consulta2 = "INSERT INTO tblalumnos VALUES('$matricula','$nombre','$apaterno','$amaterno','$cuatrimestre','$grupo','$curp','$direccion','$telefono','$email',(SELECT intidusuario FROM tblusuario WHERE vchusuario='$usuario'),$carrera);";	
        $resultado1 = $conexion->prepare($consulta1);
        $resultado1->execute();
        $resultado2= $conexion->prepare($consulta2);
        $resultado2->execute();                
        break;
    case 2:
        $consulta1 = "UPDATE tblusuario SET vchpassword='$password',intidrol=1 WHERE vchusuario='$usuario';";		
        $resultado1 = $conexion->prepare($consulta1);
        $resultado1->execute(); 
        $consulta2="UPDATE tblalumnos SET vchnombre='$nombre',vchapp='$apaterno',vchapm='$amaterno',chrcuatrimestre='$cuatrimestre',chrgrupo='$grupo',vchcurp='$curp',vchdireccion='$direccion',vchtelefono='$telefono',vchemail='$email',intidusuario=(SELECT intidusuario FROM tblusuario WHERE vchusuario='$usuario'),intidcarrera=2 WHERE vchmatricula='$matricula';";
        $resultado2 = $conexion->prepare($consulta2);
        $resultado2->execute(); 

        $data=$resultado2->fetchAll(PDO::FETCH_ASSOC);
        break;        
    case 3:
        $consulta = "DELETE FROM tblalumnos WHERE vchmatricula='$matricula' ";		
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();                           
        break;         
    case 4:
        $consulta = "SELECT * FROM tblalumnos a LEFT JOIN tblusuario b ON a.`intidusuario`=b.`intidusuario`LEFT JOIN tblcarreras c ON a.`intidcarrera`=c.`intidcarrera`";
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();
        $data=$resultado->fetchAll(PDO::FETCH_ASSOC);
        break;
}



print json_encode($data, JSON_UNESCAPED_UNICODE);
$conexion = NULL;