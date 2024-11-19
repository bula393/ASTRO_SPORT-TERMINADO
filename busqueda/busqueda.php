<?php
session_start();
$servername = "127.0.0.1";
$database = "astro_sport";
$username = "alumno";
$password = "alumnoipm";

$conexion = mysqli_connect($servername, $username, $password, $database);

if (!$conexion) {
    die("Conexion fallida: " . mysqli_connect_error());
} else {
    $consultas = "SELECT * FROM productos WHERE  modelo like '" . $_GET['busqueda'] . "%%'";
    $resultados = mysqli_query($conexion, $consultas);
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8" />
    <meta content="width=de vice-width, initial-scale=1" name="viewport" />
    <title>ASTRO SPORT</title>
    <link rel="icon" type="icon" href="/imagenes/logo-negro.png">
    <link rel="stylesheet" href="busqueda.css" />
</head>
<body>
    <header>
        <a href="\principal\principal.php"><img id="logo" src="\imagenes\logo-blanco.png" /></a>
        <img id="nombre" src="\imagenes\NOMBRELOGO.png" />
        <?php
  if(!isset($_SESSION["iniciada"])){
  echo "<div class='all-esquina'>
        <a class='sesion' href='/formulario/iniciosesion.php'><h2>INICIAR SESION</h2></a>
      </div>";
   }
   else if($_SESSION["iniciada"]){
   echo "<div class='all-esquina'>
   <img id=perfil src='\imagenes\perfil.jpg'>
        <a class='sesion' href='/opcionesU/cerrarSesion.php'><h2>CERRA SESION</h2></a>
        <div id='correo'>
          <h2 >".$_SESSION['correo']."</h2>
        </div>  
      </div>";
   }?>
    </header>
    <ul class="nav">    
        <li>
            <a href="javascript:void(0);" id="opciones"><img id="opciones" src="\imagenes\opciones.png"></a>
            <ul class="desplegable" id="menuDesplegable">
                <h2>Equipamiento</h2>
                <li><a class="desplegable" href="\seccion\seccion.php?categoria=Botines"><h3>Botines</h3></a></li>
                <li><a class="desplegable" href="\seccion\seccion.php?categoria=Guantes de Arquero"><h3>Guantes de arquero</h3></a></li>
                <li><a class="desplegable" href="\seccion\seccion.php?categoria=Remeras"><h3>Remeras de entrenamiento</h3></a></li>
                <li><a class="desplegable" href="\seccion\seccion.php?categoria=kits de entrenamiento"><h3>Kits de entrenamiento</h3></a></li>
                <h2>Indumentaria</h2>
                <li><a class="desplegable" href="\seccion\seccion.php?categoria=Accesorios"><h3>Accesorios</h3></a></li>
                <li><a class="desplegable" href="\seccion\seccion.php?categoria=Calzado"><h3>Calzado</h3></a></li>
            </ul>
        </li>
    </ul>

    <form action="/busqueda/busqueda.php" style="margin-block-end: inherit;   aling-item:center">
                    <input type="text" class="input"  placeholder= "<?php echo $_GET['busqueda'] ?>" name="busqueda" style="width: 500px;" />
                    <input type="submit" class="input" required value="🔍" />
    </form>

    <div class="desplazable">
        <?php while ($fila = mysqli_fetch_assoc($resultados)) { 
            if($fila['stock']==0){
                $stock="stock"; ?>
            <div class='item-stock' >
            <a ><img class="item_s" src="<?php echo $fila['foto']; ?>" /></a>
            <h3 class='frase'> AGOTADO </h3>

            <?php }
            else{ ?>
           
            <div class='item-container' >
            <a href="/productos/producto.php?codigo=<?php echo $fila['Codigo']; ?>"><img class="item" src="<?php echo $fila['foto']; ?>" /></a>
            <h3 class='frase'> <?php echo strtoupper($fila['modelo']); ?>  </h3>
            <?php } ?>
        </div>
            <?php } ?>
    </div>
    </div>

    <script>
        // Controlar la visibilidad del menú desplegable
        document.getElementById('opciones').addEventListener('click', function() {
            const menu = document.getElementById('menuDesplegable');
            menu.classList.toggle('show'); // Alternar la clase 'show' para mostrar/ocultar el menú
        });

        // Opcional: cerrar el menú si se hace clic fuera de él
        document.addEventListener('click', function(event) {
            const menu = document.getElementById('menuDesplegable');
            const opciones = document.getElementById('opciones');
            if (!menu.contains(event.target) && !opciones.contains(event.target)) {
                menu.classList.remove('show'); // Cerrar el menú si se hace clic fuera
            }
        });
    </script>
</body>
</html>
