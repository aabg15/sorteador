<?php
include_once '../../Config/Config.php';

 class Conexion2{
     
     public static function Conectar(){
         define('servidor',HOST);
         define('nombre_bd',BD);
         define('usuario',DB_USER);
         define('password',PASS);   

        // $opciones = array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8');
         
         try{
            $conexion = new PDO("mysql:host=".servidor.";dbname=".nombre_bd, usuario, password);             
            $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $conexion; 
         }catch (Exception $e){
             die("El error de Conexión es :".$e->getMessage());
         }         
     }
     
 }

 ?>
