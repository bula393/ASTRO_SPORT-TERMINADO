<?php
    session_start();
    $servername = "127.0.0.1";
    $database = "astro_sport";
    $username = "alumno";
    $password = "alumnoipm";
    $conexion = mysqli_connect($servername, $username, $password, $database);
    if (isset($_GET['accion'], $_GET['idcompra'], $_GET['producto_id'], $_GET['tallaID'])) {
        $accion = $_GET['accion'];
        $idcompra = intval($_GET['idcompra']);
        $producto_id = intval($_GET['producto_id']);
        $tallaID = intval($_GET['tallaID']);

        // Definir la consulta SQL según la acción
        if ($accion === 'restar') {
            $cambiarcant = "UPDATE carrito SET cantidad = if(cantidad-1>0,cantidad-1,cantidad) WHERE idcompra = $idcompra AND producto_id = $producto_id AND tallaID = $tallaID";
        } elseif ($accion === 'sumar') {
            $cambiarcant = "UPDATE carrito SET cantidad = cantidad + 1 WHERE idcompra = $idcompra AND producto_id = $producto_id AND tallaID = $tallaID";
        } elseif ($accion === 'borrar'){
            $cambiarcant = "DELETE from carrito WHERE idcompra = $idcompra AND producto_id = $producto_id AND tallaID = $tallaID";
        }

        // Ejecutar la consulta
        if (isset($cambiarcant)) {
            $ejec = mysqli_query($conexion, $cambiarcant);
            if (!$ejec) {
                echo "Error al actualizar el carrito: " . mysqli_error($conexion);
            }
        }
    }

    if (isset($_GET['precioFinal'],$_GET['idcompra'])){
        $metodo = $_POST["metodo_pago"];
        $fecha_hoy = date("Y-m-d");
        $datos_compra="select * from compra where id=". $_GET['idcompra'] .";";
        $datos=mysqli_query($conexion, $datos_compra);
        $fila = mysqli_fetch_assoc($datos);
        $_SESSION['Ncompra']=$_SESSION['Ncompra']+1;
        $finalcompra="UPDATE compra set pagado='". $metodo ."' where id=". $_GET['idcompra'] .";";
        $ejec = mysqli_query($conexion, $finalcompra);
        $finalcompra="UPDATE compra set precioFinal=". $_GET['precioFinal'] ." where id=". $_GET['idcompra'] .";";
        $ejec = mysqli_query($conexion, $finalcompra);
        $finalcompra="INSERT INTO compra VALUES ('{$_SESSION['Ncompra']}', '$fecha_hoy',NULL, '{$fila['Cliente_Dni']}', NULL)";
        $ejec = mysqli_query($conexion, $finalcompra);
        header('Location: paginaDC.html');
        exit;
    }
    // Redireccionar de vuelta a la página del carrito
    header('Location: carrito.php');
    exit;
?>
