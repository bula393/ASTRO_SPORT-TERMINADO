<?php
session_start();
$servername = "localhost";
$database = "astro_sport";
$username = "root";
$password = "12345678";

$conexion = mysqli_connect($servername, $username, $password, $database);

if (!$conexion) {
    die("Conexion fallida: " . mysqli_connect_error());
} else {
    $consultas = "SELECT * FROM productos WHERE subcategoria_idsubcategoria IN (SELECT idsubcategoria FROM subcategoria WHERE categoria_id=(SELECT id FROM categoria WHERE nombre='" . $_GET['categoria'] . "')) AND subcategoria_idsubcategoria % 2 = 0;";
    $resultados = mysqli_query($conexion, $consultas);
    $consulta = "SELECT * FROM productos WHERE subcategoria_idsubcategoria IN (SELECT idsubcategoria FROM subcategoria WHERE categoria_id=(SELECT id FROM categoria WHERE nombre='" . $_GET['categoria'] . "')) AND subcategoria_idsubcategoria % 2 != 0;";
    $resultado = mysqli_query($conexion, $consulta);
    $sub = "SELECT nombre FROM subcategoria WHERE categoria_id=(SELECT id FROM categoria WHERE nombre='" . $_GET['categoria'] . "') AND idsubcategoria % 2 = 0;";
    $subs = "SELECT nombre FROM subcategoria WHERE categoria_id=(SELECT id FROM categoria WHERE nombre='" . $_GET['categoria'] . "') AND idsubcategoria % 2 != 0;";
    $resultadol = mysqli_query($conexion, $sub);
    $resultadot = mysqli_query($conexion, $subs);
}

mysqli_close($conexion);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8" />
    <meta content="width=de vice-width, initial-scale=1" name="viewport" />
    <title>ASTRO SPORT</title>
    <link rel="icon" type="icon" href="/imagenes/logo-negro.png">
    <link rel="stylesheet" href="seccion.css" />
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
    
    <h1 class="subseccion"><?php echo strtoupper($_GET['categoria']); ?></h1>
    
    <ul class="nav">    
        <li>
            <a href="javascript:void(0);" id="opciones"><img id="opciones" src="\imagenes\opciones.png"></a>
            <ul class="desplegable" id="menuDesplegable">
            <h1>Equipamiento</h1>

                <li><div class="all-esquina"><a  href="\seccion\seccion.php?categoria=Botines"><h3>Botines</h3></a></div></li>
                <li><div class="all-esquina"><a  href="\seccion\seccion.php?categoria=Guantes de Arquero"><h3>Guantes de arquero</h3></a></div></li>
                <li><div class="all-esquina"><a  href="\seccion\seccion.php?categoria=Remeras"><h3>Remeras de entrenamiento</h3></a></div></li>
                <li><div class="all-esquina"><a  href="\seccion\seccion.php?categoria=kits de entrenamiento"><h3>Kits de entrenamiento</h3></a></div></li>

                <h1>Indumentaria</h1>

                <li><div class="all-esquina"><a  href="\seccion\seccion.php?categoria=Accesorios"><h3>Accesorios</h3></a></div></li>
                <li><div class="all-esquina"><a  href="\seccion\seccion.php?categoria=Calzado"><h3>Calzado</h3></a></div> </li>
            </ul>
        </li>
    </ul>

    <?php while ($fila = mysqli_fetch_assoc($resultadol)) { ?>
        <h1 class="subseccion"><?php echo strtoupper($fila['nombre']); ?></h1>
    <?php } ?>

    <div class="carrusel">
    <button class="btn-prev"> &lt; </button>
    <div class="desplazable">
        <?php 
        if ($resultados && mysqli_num_rows($resultados) > 0) {
            while ($fila = mysqli_fetch_assoc($resultados)) { 
                if ($fila['stock'] == 0) { ?>
                    <div class="item-stock">
                        <a>
                            <img class="item_s" src="<?php echo htmlspecialchars($fila['foto']); ?>" alt="Imagen del producto agotado" />
                        </a>
                        <h3 class="frase">AGOTADO</h3>
                    </div>
                <?php } else { ?>
                    <div class="item-container">
                        <a href="/productos/producto.php?codigo=<?php echo htmlspecialchars($fila['Codigo']); ?>">
                            <img class="item" src="<?php echo htmlspecialchars($fila['foto']); ?>" alt="Imagen del producto" />
                        </a>
                        <h3 class="frase"><?php echo strtoupper(htmlspecialchars($fila['modelo'])); ?></h3>
                        <h3 class="frase">Precio:$<?php echo $fila['precio']; ?></h3>
                    </div>
                <?php } ?>
            <?php } 
        } else { ?>
            <p>No hay productos disponibles.</p>
        <?php } ?>
    </div>
    <button class="btn-next"> &gt; </button>
</div>


    <?php while ($fila = mysqli_fetch_assoc($resultadot)) { ?>
        <h1 class="subseccion"><?php echo strtoupper($fila['nombre']); ?></h1>
    <?php } ?>

    <div class="carrusel">
    <button class="btn-prev"> &lt; </button>
    <div class="desplazable">
        <?php 
        if ($resultado && mysqli_num_rows($resultado) > 0) {
            while ($fila = mysqli_fetch_assoc($resultado)) { 
                if ($fila['stock'] == 0) { ?>
                    <div class="item-stock">
                        <a>
                            <img class="item_s" src="<?php echo htmlspecialchars($fila['foto']); ?>" alt="Imagen del producto agotado" />
                        </a>
                        <h3 class="frase">AGOTADO</h3>
                    </div>
                <?php } else { ?>
                    <div class="item-container">
                        <a href="/productos/producto.php?codigo=<?php echo htmlspecialchars($fila['Codigo']); ?>">
                            <img class="item" src="<?php echo htmlspecialchars($fila['foto']); ?>" alt="Imagen del producto" />
                        </a>
                        <h3 class="frase"><?php echo strtoupper(htmlspecialchars($fila['modelo'])); ?></h3>
                        <h3 class="frase">Precio:$<?php echo $fila['precio']; ?></h3>
                    </div>
                <?php } ?>
            <?php } 
        } else { ?>
            <p>No hay productos disponibles.</p>
        <?php } ?>
    </div>
    <button class="btn-next"> &gt; </button>
</div>
<script>
document.addEventListener("DOMContentLoaded", function () {
    // Seleccionar todos los carruseles en la página
    const carruseles = document.querySelectorAll(".carrusel");

    carruseles.forEach((carrusel) => {
        const desplazable = carrusel.querySelector(".desplazable");
        const btnPrev = carrusel.querySelector(".btn-prev");
        const btnNext = carrusel.querySelector(".btn-next");

        // Desplazar hacia la izquierda
        btnPrev.addEventListener("click", () => {
            desplazable.scrollBy({
                left: -300, // Ajusta el desplazamiento según el tamaño del elemento
                behavior: "smooth",
            });
        });

        // Desplazar hacia la derecha
        btnNext.addEventListener("click", () => {
            desplazable.scrollBy({
                left: 300,
                behavior: "smooth",
            });
        });
    });
});
</script>

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
