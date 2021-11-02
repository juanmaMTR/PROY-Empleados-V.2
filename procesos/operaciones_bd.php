<?php
    class Operaciones{
        private $conexion=null;
        function __construct(){
            require 'config_bd.php';
            $this->conexion=mysqli_connect(SERVIDORBD,USUARIO,CONTRASENIA,BASEDATOS);
        }

        function consultar($consulta){
            return $this->conexion->query($consulta);
        }

        function cerrarconexion(){
            return $this->conexion->close();
        }
        
    }
?>