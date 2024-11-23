
<?php
	  $nombre= $_POST["NOMBRE"];
	  $apellido = $_POST["APELLIDO"];
    $direccion = $_POST["DIRECCION"];
    $contraseña = $_POST["CONTRASEÑA"];
    $dni = $_POST["DNI"];
    $telefono = $_POST["TELEFONO"];
    $edad = $_POST["EDAD"];
    $correo = $_POST["CORREO"];
    $servername = "localhost";
    $database = "astro_sport";
    $username = "root";
    $password = "12345678";
    
    $conexion = mysqli_connect($servername, $username, $password, $database); // se crea la conexion


    if (!$conexion) {
        die("Conexion fallida: " . mysqli_connect_error());
    }
    else{
        
        $query_email="select * from clientes;";
        $resultado_email=mysqli_query($conexion, $query_email);
        while($fila = mysqli_fetch_assoc($resultado_email)){
            if($fila['correo'] === $correo ){
                header('Location: FORMULARIO.php?errorC=contraseñamal');
                exit;
            }
        }
        
        //insertamos el resultado del formulario
        $query = "insert into clientes values('$dni', '$nombre', '$apellido', '$direccion', '$correo' ,'$telefono','$contraseña','$edad');";
        $resultado=mysqli_query($conexion, $query);
        header('Location: /formulario/iniciosesion.php');
    }

    mysqli_close($conexion);
?>

