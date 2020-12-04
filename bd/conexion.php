<?php
    class Conexion{
        public static function Conectar(){
            define('servidor', 'localhost');
            //local
            define('nombre_bd', 'bdtransfer');
            define('usuario', 'root');
            define('password', ''); 
            //hosting
            // define('nombre_bd', 'aswfcpbu_bdtransfer');
            // define('usuario', 'aswfcpbu_rodolfo');
            // define('password', 'equipo42017'); 
            $opciones = array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8');            
            try{
                $conexion = new PDO("mysql:host=".servidor."; dbname=".nombre_bd, usuario, password, $opciones);
                return $conexion;
            }catch (Exception $e){
                die("El error de Conexión es: ". $e->getMessage());
            }
        }
    }
?>