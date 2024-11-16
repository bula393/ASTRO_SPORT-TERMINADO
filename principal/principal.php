<?php session_start(); ?>
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
      <div class='medio'>
      <ul class="nav">    
      <li>
      <ul class="desplegable">

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
        <video class="video2" autoplay muted loop>
            <source src="/imagenes/videoproductos.mp4" type="video/mp4">
        </video> 
   <!--     <div class="galeria">
          <img src="" alt="Imagen de Producto">
          <img src="" alt="Imagen de Producto">
          <img src="" alt="Imagen de Producto">
          <img src="" alt="Imagen de Producto">
          <img src="" alt="Imagen de Producto">
          <img src="" alt="Imagen de Producto">
      </div> -->
      
      <script>
  // Simulación de URLs de imágenes desde una base de datos
//  const imagePaths = [
//    '/imagenes/BOTINES-s-tapones/BotinDeFutsal7.webp', 
//    '/imagenes/BOTINES-s-tapones/BotinDeFutsal8.webp', 
//    '/imagenes/guantes/guantes1.jpg', 
//    '/imagenes/guantes/guantesflat7.jpg', 
//    '/imagenes/musculasas/remeraM1.jpg',  
//    '/imagenes/musculasas/remeraM3.jpg', 
//    '/imagenes/musculasas/remeraM5.webp', 
//    '/imagenes/musculasas/remeraM6.jpg', 
//    '/imagenes/remeras-depor/remera5.jpg', 
//    '/imagenes/remeras-depor/remera6.jpg', 
//    '/imagenes/KitsDeEntrenamiento/barra.jpg',
//    '/imagenes/KitsDeEntrenamiento/guantesbox.jpg', 
//    '/imagenes/Calzado/ZapatillasPaCorrer.avif', 
//    '/imagenes/Calzado/ZapatillasPaCorrer2.avif'
//  ];
//
//  const images = document.querySelectorAll('.galeria img');
//  let availableImages = [...imagePaths];
//
//  // Función para asignar imágenes iniciales únicas
//  function assignInitialImages() {
//    images.forEach((img, index) => {
//      img.src = availableImages[index % availableImages.length];
//    });
//  }
//
//  // Función para cambiar dos imágenes aleatoriamente con desvanecimiento
//  function changeImages() {
//    if (availableImages.length < 2) {
//      availableImages = [...imagePaths];
//    }
//
//    // Selecciona dos índices de imágenes aleatorias
//    const index1 = Math.floor(Math.random() * images.length);
//    let index2;
//    do {
//      index2 = Math.floor(Math.random() * images.length);
//    } while (index1 === index2);
//
//    // Aplicar efecto de desvanecimiento
//    images[index1].classList.add('hidden');
//images[index2].classList.add('hidden');
//
//setTimeout(() => {
//  const newImg1 = availableImages.splice(Math.floor(Math.random() * availableImages.length), 1)[0];
//  const newImg2 = availableImages.splice(Math.floor(Math.random() * availableImages.length), 1)[0];
//
//  images[index1].src = newImg1;
//  images[index2].src = newImg2;
//
//  setTimeout(() => {
//    images[index1].classList.remove('hidden');
//    images[index2].classList.remove('hidden');
//    availableImages.push(newImg1, newImg2);
//  }, 4
//  000);
//}, 2000);
// // Tiempo de espera para completar la opacidad
//  }
//
//  // Asignar las imágenes iniciales al cargar la página
//  assignInitialImages();
//
//  // Ejecutar la función cada 2 segundos
//  setInterval(changeImages, 2000);
</script>

        <nav>
    </nav>
  </body>
</html>


