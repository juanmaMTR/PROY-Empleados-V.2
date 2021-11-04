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
        //Función para cerrar la conexión
        function cerrarconexion(){
            return $this->conexion->close(); //Cierro la conexión con la bd.
        }
        //Función que hace la busqueda del listado por DNI
        function busquedadni(){
            if(trim($_POST['busqueda'])==""){
                $consulta="SELECT * FROM empleados ;";
            }else{
                $consulta="SELECT * FROM empleados WHERE DNI LIKE '".$_POST['busqueda']."%';";
            }
            //$resultado=$conexion->query($consulta);
            $resultado=$this->consultar($consulta); //Llamo al método consultar que está en la clase Operaciones
            if($resultado->num_rows==0){
                echo 'No hay ningún empleado con este DNI.';
            }else{
                while($fila=$resultado->fetch_assoc()){
                    echo '<p>'.$fila['DNI'].': '.$fila['Nombre'].'&nbsp&nbsp&nbsp';
                    echo '<a href="procesos/operaciones_empleados.php?IdEmpleado='.$fila['IdEmpleado'].'&op=b">Borrar</a>&nbsp&nbsp&nbsp';
                    echo '<a href="procesos/operaciones_empleados.php?IdEmpleado='.$fila['IdEmpleado'].'&op=m">Modificar</a></p>';
                }
            }
            
            
        }
        //Función que hace la búsqueda del listado por Nombre
        function busquedanombre(){
            $consulta="SELECT * FROM empleados WHERE Nombre LIKE '".$_POST['busqueda']."%';";
            
            $resultado=$this->consultar($consulta);
            /*while($fila=$resultado->fetch_array(MYSQLI_ASSOC)){
                echo '<p>'.$fila['DNI'].': '.$fila['Nombre'].'&nbsp&nbsp&nbsp';
                echo '<a href="procesos/operaciones_empleados.php?IdEmpleado='.$fila['IdEmpleado'].'&op=b">Borrar</a>&nbsp&nbsp&nbsp';
                echo '<a href="procesos/operaciones_empleados.php?IdEmpleado='.$fila['IdEmpleado'].'&op=m">Modificar</a></p>';
            }*/
            //$fila=$resultado->fetch_array(MYSQLI_ASSOC);
            if($resultado->num_rows==0){
                echo 'No hay ningún empleado con este nombre.';
            }
            else
            {
                while($fila=$resultado->fetch_array(MYSQLI_ASSOC)){
                    echo '<p>'.$fila['DNI'].': '.$fila['Nombre'].'&nbsp&nbsp&nbsp';
                    echo '<a href="procesos/operaciones_empleados.php?IdEmpleado='.$fila['IdEmpleado'].'&op=b">Borrar</a>&nbsp&nbsp&nbsp';
                    echo '<a href="procesos/operaciones_empleados.php?IdEmpleado='.$fila['IdEmpleado'].'&op=m">Modificar</a></p>';
                }
            }
            
            
        }
        
    }
?>