<?php
error_reporting(0);
$usuario=$_POST['usuario'];
$contraseña=$_POST['contraseña'];
session_start();

// cadea local
$conexion=mysqli_connect("localhost","root","","bdtransfer");

// cadena para hosting
// $conexion=mysqli_connect("localhost","aswfcpbu_rodolfo","equipo42017","aswfcpbu_bdtransfer");

$consulta="SELECT * FROM tblusuario WHERE vchusuario='$usuario' AND vchpassword=md5('$contraseña')";

$resultado=mysqli_query($conexion,$consulta);

$filas=mysqli_fetch_array($resultado);


$idusuario=$filas['intidusuario'];
$nombre_usuario = $filas['vchusuario'];
$rol_usuario=$filas['intidrol'];
$_SESSION['usuario']=$nombre_usuario;
$_SESSION['idusuario']=$idusuario;
$rol = $filas['intidrol'];

if($rol){
    $_SESSION['rol'] = $rol;
    header("location:inicio.php");
}else{
    ?>
    <?php
        include("index.php");

    ?>
        
    <?php
}


mysqli_free_result($resultado);
mysqli_close($conexion);
