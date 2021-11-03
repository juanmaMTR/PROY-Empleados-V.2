<!DOCTYPE html>
<?php
    //Juan Manuel Toscano Reyes
    /*
    require 'config_bd.php'; //Llamo al archivo donde están las constantes
    $conexion=mysqli_connect(SERVIDORBD,USUARIO,CONTRASENIA,BASEDATOS); //Realizo la conexión con la base de datos
    */
    require 'operaciones_bd.php'; //Llamo al archivo donde están las operaciones
    $operaciones=new Operaciones(); //Inicializo la clase Operaciones
?>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="../css/style.css">
        <link rel="stylesheet" href="../css/borrar.css">
        <title>Borrar</title>
    </head>
    <body>
        <header>
            <h1>Borrar Datos</h1>
        </header>
        <nav id="horizontal">
            <ul>
                <li><a href="../index.php">Índice</a></li>
            </ul>
        </nav>
        <aside>
            <nav id="vertical">
                <ul>
                    <li><a href="../index.php">Listado Empleados</a></li>
                    <li><a href="alta.php">Dar de Alta</a></li>
                </ul>
            </nav>
            <section>
                <?php
                    $url=$_SERVER['REQUEST_URI'];
                    $components=parse_url($url);
                    parse_str($components['query'],$results); //Una forma de conseguir el id que paso por url
                    echo '<h3>¿Desea borrar los datos de este perfil?</h3>';
                    $consulta="SELECT * FROM empleados WHERE IdEmpleado LIKE '".$results['IdEmpleado']."';";
                    //$resultado=$conexion->query($consulta);
                    $resultado=$operaciones->consultar($consulta); //Llamo al método consultar que está en la clase Operaciones
                    while($fila=$resultado->fetch_assoc()){
                        echo '<p>'.$fila['DNI'].': '.$fila['Nombre'].'&nbsp&nbsp&nbsp</p>';
                    }
                    
                    echo '<form name="borrar" action="#" method="POST">';
                    echo '<input type="submit" value="Aceptar" name="aceptar" />';
                    echo '<input type="submit" value="Cancelar" name="cancelar" />';
                    echo '</form>';
                    if(isset($_POST['aceptar'])){
                        $consulta="DELETE FROM empleados WHERE IdEmpleado LIKE '".$results['IdEmpleado']."';";
                        //$resultado=$conexion->query($consulta);
                        $resultado=$operaciones->consultar($consulta); //Llamo al método consultar que está en la clase Operaciones
                        echo '<a href="../index.php">Volver al índice</a>';
                    }
                    if(isset($_POST['cancelar'])){
                        echo '<a href="../index.php">Volver al índice</a>';
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
    $operaciones->cerrarconexion(); //Lamo al método cerrarconexion que está en la clase Operaciones
?>