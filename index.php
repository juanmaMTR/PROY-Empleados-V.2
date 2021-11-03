<!DOCTYPE html>
<?php
    //Juan Manuel Toscano Reyes
    /*
    require 'procesos/config_bd.php'; //Llamo al archivo donde están las constantes
    $conexion=mysqli_connect(SERVIDORBD,USUARIO,CONTRASENIA,BASEDATOS); //Realizo la conexión con la base de datos
    */
    require 'procesos/operaciones_bd.php'; //Llamo al archivo donde están las operaciones
    $operaciones=new Operaciones(); //Inicializo la clase Operaciones
?>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="css/style.css">
        <title>Listado</title>
    </head>
    <body>
        <header>
            <h1>Listado de Empleados</h1>
        </header>
        <nav id="horizontal">
            <ul>
                <li><a href="index.php">Índice</a></li>
            </ul>
        </nav>
        <aside>
            <nav id="vertical">
                <ul>
                    <li><a href="index.php">Listado Empleados</a></li>
                    <li><a href="procesos/alta.php">Dar de Alta</a></li>
                </ul>
            </nav>
            <section>
                <form action="#" method="post">
                    <label for="dni">DNI: </label>
                    <input type="text" name="dni" id="dni"/>
                    <select name="filtrado" id="filtrado">
                        <option value="ASC">Nombre (A-Z)</option>
                        <option value="DESC">Nombre (Z-A)</option>
                    </select>
                    <input type="submit" value="Listar">
                </form>
                <?php
                    if($_POST){
                        if(trim($_POST['dni'])==""){
                            $consulta="SELECT * FROM empleados ORDER BY Nombre ".$_POST['filtrado'].";";
                        }else{
                            $consulta="SELECT * FROM empleados WHERE DNI LIKE '".$_POST['dni']."%' ORDER BY Nombre ".$_POST['filtrado'].";";
                        }
                        //$resultado=$conexion->query($consulta);
                        $resultado=$operaciones->consultar($consulta); //Llamo al método consultar que está en la clase Operaciones
                        while($fila=$resultado->fetch_assoc()){
                            echo '<p>'.$fila['DNI'].': '.$fila['Nombre'].'&nbsp&nbsp&nbsp';
                            echo '<a href="procesos/operaciones_empleados.php?IdEmpleado='.$fila['IdEmpleado'].'&op=b">Borrar</a>&nbsp&nbsp&nbsp';
                            echo '<a href="procesos/operaciones_empleados.php?IdEmpleado='.$fila['IdEmpleado'].'&op=m">Modificar</a></p>';
                        }
                        
                    }
                ?>
            </section>
        </aside>
        <footer>
            <h3>Footer</h3>
        </footer>
    </body>
</html>
<?php
    $operaciones->cerrarconexion();
?>