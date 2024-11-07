
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
    $password = "";
    
    $conexion = mysqli_connect($servername, $username, $password, $database); // se crea la conexion


    if (!$conexion) {
        die("Conexion fallida: " . mysqli_connect_error());
    }
    else{
        //insertamos el resultado del formulario
        $query = "insert into clientes values('$dni', '$nombre', '$apellido', '$direccion', '$correo' ,'$telefono','$contraseña','$edad');";
        $resultado=mysqli_query($conexion, $query);
        header('Location: /formulario/iniciosesion.php');
    }

    mysqli_close($conexion);
?>

