<?php
include_once 'conexion.php';
$objeto = new Conexion();
$conexion = $objeto->Conectar();

$_POST = json_decode(file_get_contents("php://input"), true);
$opcion = (isset($_POST['opcion'])) ? $_POST['opcion'] : '';
$clave = (isset($_POST['clave'])) ? $_POST['clave'] : '';
$nombre = (isset($_POST['nombre'])) ? $_POST['nombre'] : '';
$apaterno = (isset($_POST['apaterno'])) ? $_POST['apaterno'] : '';
$amaterno = (isset($_POST['amaterno'])) ? $_POST['amaterno'] : '';
$rfc = (isset($_POST['rfc'])) ? $_POST['rfc'] : '';
$direccion = (isset($_POST['direccion'])) ? $_POST['direccion'] : '';
$puesto = (isset($_POST['puesto'])) ? $_POST['puesto'] : '';
$usuario = (isset($_POST['usuario'])) ? $_POST['usuario'] : '';
$password = (isset($_POST['password'])) ? $_POST['password'] : '';


switch($opcion){
    case 1:
        $consulta1="INSERT INTO tblusuario(vchusuario,vchpassword,intidrol) VALUES('$usuario',md5('$password'),'$puesto');";
        $consulta2 = "INSERT INTO tblempledos(vchnombre,vchapp,vchapm,vchrfc,vchdireccion,intidrol,intidusuario) VALUES('$nombre','$apaterno','$amaterno','$rfc','$direccion','$puesto',(SELECT intidusuario FROM tblusuario WHERE vchusuario='$usuario'));";	
        $resultado1 = $conexion->prepare($consulta1);
        $resultado1->execute();
        $resultado2= $conexion->prepare($consulta2);
        $resultado2->execute();                
        break;
    case 2:
        if($puesto!=''){
            if($password!=''){
                $consulta1 = "UPDATE tblusuario SET vchpassword=MD5('$password'),intidrol=$puesto WHERE vchusuario='$usuario';";       
                $resultado1 = $conexion->prepare($consulta1);
                $resultado1->execute(); 
                $consulta2="UPDATE tblempledos SET vchnombre='$nombre',vchapp='$apaterno',vchapm='$amaterno',vchrfc='$rfc',vchdireccion='$direccion',intidrol=$puesto,intidusuario=(SELECT intidusuario FROM tblusuario WHERE vchusuario='$usuario') WHERE intidempleado=$clave;";
                $resultado2 = $conexion->prepare($consulta2);
                $resultado2->execute(); 

                $data=$resultado2->fetchAll(PDO::FETCH_ASSOC);
            }else{

                $consulta2="UPDATE tblempledos SET vchnombre='$nombre',vchapp='$apaterno',vchapm='$amaterno',vchrfc='$rfc',vchdireccion='$direccion',intidrol=$puesto,intidusuario=(SELECT intidusuario FROM tblusuario WHERE vchusuario='$usuario') WHERE intidempleado=$clave;";
                $resultado2 = $conexion->prepare($consulta2);
                $resultado2->execute(); 

                $data=$resultado2->fetchAll(PDO::FETCH_ASSOC);
            }
            
            
        }else{
            if($password!=''){
                $consulta1 = "UPDATE tblusuario SET vchpassword=MD5('$password') WHERE vchusuario='$usuario';";       
                $resultado1 = $conexion->prepare($consulta1);
                $resultado1->execute(); 
                $consulta2="UPDATE tblempledos SET vchnombre='$nombre',vchapp='$apaterno',vchapm='$amaterno',vchrfc='$rfc',vchdireccion='$direccion',intidusuario=(SELECT intidusuario FROM tblusuario WHERE vchusuario='$usuario') WHERE intidempleado=$clave;";
                $resultado2 = $conexion->prepare($consulta2);
                $resultado2->execute(); 

                $data=$resultado2->fetchAll(PDO::FETCH_ASSOC);
            }else{
                
                $consulta2="UPDATE tblempledos SET vchnombre='$nombre',vchapp='$apaterno',vchapm='$amaterno',vchrfc='$rfc',vchdireccion='$direccion',intidusuario=(SELECT intidusuario FROM tblusuario WHERE vchusuario='$usuario') WHERE intidempleado=$clave;";
                $resultado2 = $conexion->prepare($consulta2);
                $resultado2->execute(); 

                $data=$resultado2->fetchAll(PDO::FETCH_ASSOC);
            }

           
        }
        
        break;        
    case 3:
        $consulta = "DELETE FROM tblempledos WHERE intidempleado='$clave' ";		
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();                           
        break;         
    case 4:
        $consulta = "SELECT * FROM tblempledos a LEFT JOIN tblusuario b ON a.`intidusuario`=b.`intidusuario` LEFT JOIN tblroles c ON a.`intidrol`=c.`intidrol` WHERE a.`intidrol` NOT IN(1);";
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();
        $data=$resultado->fetchAll(PDO::FETCH_ASSOC);
        break;
    case 5:
        $consulta = "SELECT * FROM tblroles WHERE vchrol NOT IN('Alumno');";
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();
        $data=$resultado->fetchAll(PDO::FETCH_ASSOC);
        break;
    case 6:
        $consulta = "SELECT * FROM tblroles ORDER BY  vchrol='$puesto' DESC";
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();
        $data=$resultado->fetchAll(PDO::FETCH_ASSOC);
        break;
}



print json_encode($data, JSON_UNESCAPED_UNICODE);
$conexion = NULL;