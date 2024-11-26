<?php
session_start();
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
} 
else {
            if($talle === ''){
              $query = "INSERT INTO carrito VALUES ('{$_SESSION["Ncompra"]}', '$idproducto' , '$cantidad', NULL)";
              $resultado = mysqli_query($conexion, $query);
            }  
            else{
              $query = "INSERT INTO carrito VALUES ('{$_SESSION["Ncompra"]}', '$idproducto' , '$cantidad', '$talle')";
              $resultado = mysqli_query($conexion, $query);
            } 
            if (!$resultado) {
                die("Error al guardar la compra: " . mysqli_error($conexion));
            } else {
              header('Location:añadidoCArrito.html');
            }
}

// Cerrar conexión
mysqli_close($conexion);
?>
