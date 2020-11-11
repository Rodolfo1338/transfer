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



switch($opcion){
    case 1:
        $consulta1="INSERT INTO tblconceptospendientes(bolestadoconcepto,intidconcepto,vchmatricula,intidmateria) VALUES ('$estado','$concepto','$matricula','$materia')";	
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
        $consulta = "SELECT a.`intidconceptopendiente`,a.`vchmatricula`,b.`vchconcepto`,d.`vchmateria`, b.`intcosto`,c.`vchnombre`,c.`vchapp`,c.`vchapm`,e.`vchcarrera`,a.`bolestadoconcepto` FROM tblconceptospendientes a LEFT JOIN tblconceptos b ON a.`intidconcepto`=b.`intidconcepto` LEFT JOIN tblalumnos c ON a.`vchmatricula`=c.`vchmatricula` LEFT JOIN tblcarreras e ON c.`intidcarrera`=e.`intidcarrera` LEFT JOIN tblmaterias d ON a.`intidmateria`=d.`intidmateria`";
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();
        $data=$resultado->fetchAll(PDO::FETCH_ASSOC);
        break;
}



print json_encode($data, JSON_UNESCAPED_UNICODE);
$conexion = NULL;