<?php session_start(); 
$servername = "127.0.0.1";
$database = "astro_sport";
$username = "alumno";
$password = "alumnoipm";
$compra=0;
$conexion = mysqli_connect($servername, $username, $password, $database);
if (!$conexion) {
    die("Conexion fallida: " . mysqli_connect_error());
} else {
    $consulta="select foto from productos;";
    $resultado = mysqli_query($conexion, $consulta);
    $imagenes = [];
    while ($fila = mysqli_fetch_assoc($resultado)) {
      $imagenes[] = $fila['foto'];
  }
}
mysqli_close($conexion);

?>
<html>
  <head>
    <meta charset="utf-8" />
    <meta content="width=de vice-width, initial-scale=1" name="viewport" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Rowdies:wght@300;400;700&display=swap" rel="stylesheet">
    <title>ASTRO SPORT</title>
    <link rel="icon" href="/imagenes/logo-negro.png" />
    <link rel="stylesheet" href="principal.css" />
  </head>
  <body>
  <div id="loader" class="loader">
        <img src="/imagenes/logo-blanco.png" alt="Logo de la página" class="loader-logo">
    </div>
    <script>
        window.addEventListener('load', function() {
            // Espera 3 segundos antes de ocultar la pantalla de carga
            setTimeout(function() {
                document.getElementById('loader').style.display = 'none';
                document.body.style.overflow = 'auto'; // Permite el desplazamiento una vez que se carga el contenido
            }, 2000); // Cambia el tiempo de espera según lo necesites (3000 ms = 3 segundos)
        });
    </script>
  <header>
  <a href="\principal\principal.php"><img id=logo src="\imagenes\logo-blanco.png"/></a>
  <img id=nombre src="\imagenes\NOMBRELOGO.png"/>
  <a href="\carrito\carrito.php"> <img id=logo src="\imagenes\carrito.png"/> </a>
  <form action="/busqueda/busqueda.php">
    <input type="text" class="input" placeholder="buscar" name="busqueda" />
    <input type="submit" class="input" required value="🔍" />
    </form>
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
      <div class='medio'>
      <ul class="desplegable">

                <h1>Equipamiento</h1>

                <li><div class="all-esquina"><a  href="\seccion\seccion.php?categoria=Botines"><h4>Botines</h4></a></div></li>
                <li><div class="all-esquina"><a  href="\seccion\seccion.php?categoria=Guantes de Arquero"><h4>Guantes de arquero</h4></a></div></li>
                <li><div class="all-esquina"><a  href="\seccion\seccion.php?categoria=Remeras"><h4>Remeras de entrenamiento</h4></a></div></li>
                <li><div class="all-esquina"><a  href="\seccion\seccion.php?categoria=kits de entrenamiento"><h4>Kits de entrenamiento</h4></a></div></li>
  
                <h1>Indumentaria</h1>
  
                <li><div class="all-esquina"><a  href="\seccion\seccion.php?categoria=Accesorios"><h4>Accesorios</h4></a></div></li>
                <li><div class="all-esquina"><a  href="\seccion\seccion.php?categoria=Calzado"><h4>Calzado</h4></a></div> </li>
                  </ul>
    <!--     <video class="video2" autoplay muted loop>
            <source src="/imagenes/videoproductos.mp4" type="video/mp4">
        </video> -->
        <div class="galeria" id="galeria">
        <?php
        // Imprimir las primeras 6 imágenes de la base de datos
        for ($i = 0; $i < 6; $i++) {
            if (isset($imagenes[$i])) {
                echo "<img src='{$imagenes[$i]}' alt='Imagen de Producto'>";
            } else {
                echo "<img src='placeholder.jpg' alt='Imagen no disponible'>";
            }
        }
        ?>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const galeria = document.getElementById('galeria');
            const imagenes = <?php echo json_encode($imagenes); ?>; // Array de imágenes desde PHP
            const imgs = galeria.querySelectorAll('img');
            const totalImgs = imgs.length;

            // Función para seleccionar una imagen aleatoria del array de la base de datos
            function imagenAleatoria() {
                return imagenes[Math.floor(Math.random() * imagenes.length)];
            }

            // Función para cambiar dos imágenes al azar
            function cambiarImagenes() {
                const index1 = Math.floor(Math.random() * totalImgs);
                let index2;
                do {
                    index2 = Math.floor(Math.random() * totalImgs);
                } while (index1 === index2);

                // Ocultar las imágenes seleccionadas con desvanecimiento
                imgs[index1].classList.add('hidden');
                imgs[index2].classList.add('hidden');

                setTimeout(() => {
                    // Cambiar las imágenes por nuevas aleatorias
                    imgs[index1].src = imagenAleatoria();
                    imgs[index2].src = imagenAleatoria();

                    // Mostrar las nuevas imágenes con desvanecimiento
                    imgs[index1].classList.remove('hidden');
                    imgs[index2].classList.remove('hidden');
                }, 2000); // Tiempo del desvanecimiento (1 segundo)
            }

            // Cambiar imágenes cada 2 segundos
            setInterval(cambiarImagenes, 3000);
        });
    </script>
      


        <nav>
    </nav>
  </body>
</html>


