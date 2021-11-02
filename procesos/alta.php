<!DOCTYPE html>
<?php
    //Juan Manuel Toscano Reyes
    /*
    require 'config_bd.php'; //Llamo al archivo donde están las constantes
    $conexion=mysqli_connect(SERVIDORBD,USUARIO,CONTRASENIA,BASEDATOS); //Realizo la conexión con la base de datos
    */
    require 'operaciones_bd.php';
    $operaciones=new Operaciones();
?>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="../css/style.css">
        <link rel="stylesheet" href="../css/alta.css">
        <title>Alta</title>
    </head>
    <body>
        <header>
            <h1>Dar de alta</h1>
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
                <form name="alta" action="#" method="POST">
                    DNI: <input type="text" name="dni" /><br />
                    Nombre: <input type="text" name="nombre" /><br />
                    Correo: <input type="text" name="correo" /><br />
                    Teléfono: <input type="text" name="telefono" /><br /><br />
                    <input type="submit" value="Enviar" name="enviar" />
                    <input type="reset" value="Borrar" />
                </form>
            </section>
        </aside>
        <footer>
            <h3>Footer</h3>
        </footer>
    </body>
</html>
<?php
    if(isset($_POST['enviar'])){

        if($_POST['correo']==''){
            $consulta="INSERT INTO empleados (DNI,Nombre,Correo,Telefono) VALUES ('".$_POST['dni']."','".$_POST['nombre']."',NULL,'".$_POST['telefono']."');";
        }else{
            $consulta="INSERT INTO empleados (DNI,Nombre,Correo,Telefono) VALUES ('".$_POST['dni']."','".$_POST['nombre']."','".$_POST['correo']."','".$_POST['telefono']."');";
        }

        
        //$resultado=$conexion->query($consulta);
        $resultado=$operaciones->consultar($consulta);
        echo 'Consulta realizada';
    }  
    

    $operaciones->cerrarconexion();
?>