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
    echo "<div class='all-sesion'>
          <a class='sesion' href='/formulario/iniciosesion.php'><h4>INICIAR SESION</h4></a>
        </div>";
    }
    else if($_SESSION["iniciada"]){
    echo "<div class='all-sesion'>
    <img id=perfil src='\imagenes\perfil.jpg'>
          <a class='sesion' href='/opcionesU/cerrarSesion.php'><h5>CERRA SESION</h5></a>

        </div>";
    }?>
    </header>
    <ul class="nav">    
        <li>
            <a href="javascript:void(0);" id="opciones"><img id="opciones" src="\imagenes\opciones.png"></a>
            <ul class="desplegable" id="menuDesplegable">
            <h1>Equipamiento</h1>

                    <li><div class="all-esquina"><a  href="\seccion\seccion.php?categoria=Botines"><h4>Botines</h4></a></div></li>
                    <li><div class="all-esquina"><a  href="\seccion\seccion.php?categoria=Guantes de Arquero"><h4>Guantes de arquero</h4></a></div></li>
                    <li><div class="all-esquina"><a  href="\seccion\seccion.php?categoria=Remeras"><h4>Remeras de entrenamiento</h4></a></div></li>
                    <li><div class="all-esquina"><a  href="\seccion\seccion.php?categoria=kits de entrenamiento"><h4>Kits de entrenamiento</h4></a></div></li>

                    <h1>Indumentaria</h1>

                    <li><div class="all-esquina"><a  href="\seccion\seccion.php?categoria=Accesorios"><h4>Accesorios</h4></a></div></li>
                    <li><div class="all-esquina"><a  href="\seccion\seccion.php?categoria=Calzado"><h4>Calzado</h4></a></div> </li>
                </ul>
        </li>
    </ul>

    <form action="/busqueda/busqueda.php" style="margin-block-end: inherit;   aling-item:center">
                    <input type="text" class="input"  placeholder= "<?php echo $_GET['busqueda'] ?>" name="busqueda" style="width: 500px;" />
                    <input type="submit" class="input" required value="🔍" />
    </form>

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
                        <h3 class="frase">Precio:<?php echo $fila['precio']; ?></h3>
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
