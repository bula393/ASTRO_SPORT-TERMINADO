<?php
$codigo_compra=0;
$idproducto = $_POST['idproducto'];
$talle = $_POST['talla'];
$cantidad = $_POST['cantidad'];
$servername = "127.0.0.1";
$database = "astro_sport";
$username = "alumno";
$password = "alumnoipm";

// Crear conexión
$conexion = mysqli_connect($servername, $username, $password, $database);

if (!$conexion) {
    die("Conexión fallida: " . mysqli_connect_error());
} else {
            $query = "INSERT INTO carrito VALUES ('$codigo_compra', '$idproducto' , '$cantidad', '$talle')";
            $resultado = mysqli_query($conexion, $query);

            if (!$resultado) {
                die("Error al guardar la compra: " . mysqli_error($conexion));
            } else {
              header('Location: producto.php?codigo=' . $idproducto);
            }
}

// Cerrar conexión
mysqli_close($conexion);
?>
