<?php
    class Operaciones{
        private $conexion=null;
        function __construct(){
            require 'config_bd.php'; //LLamo a este archivo que es donde se encuentran las constantes para conectar con la bd.
            $this->conexion=mysqli_connect(SERVIDORBD,USUARIO,CONTRASENIA,BASEDATOS); //Realizo la conexión con la bd.
        }

        function consultar($consulta){
            return $this->conexion->query($consulta); //Realizo las consultas con la bd.
        }

        function cerrarconexion(){
            return $this->conexion->close(); //Cierro la conexión con la bd.
        }
        
    }
?>