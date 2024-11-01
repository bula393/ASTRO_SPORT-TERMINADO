<?php 
session_start();
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

                <li><a class="desplegable" href="\seccion\seccion.php?categoria=Botines"><h3>Botines</h3></a></li>
                <li><a class="desplegable" href="\seccion\seccion.php?categoria=Guantes de Arquero"><h3>Guantes de arquero</h3></a></li>
                <li><a class="desplegable" href="\seccion\seccion.php?categoria=Remeras"><h3>Remeras de entrenamiento</h3></a></li>
                <li><a class="desplegable" href="\seccion\seccion.php?categoria=kits de entrenamiento"><h3>Kits de entrenamiento</h3></a></li>
  
                <h1>Indumentaria</h1>
  
                <li><a class="desplegable" href="\seccion\seccion.php?categoria=Accesorios"><h3>Accesorios</h3></a></li>
                <li><a class="desplegable" href="\seccion\seccion.php?categoria=Calzado"><h3>Calzado</h3></a> </li>
          </ul>
        </li>
      </ul> 
        <video class="video2" autoplay muted loop>
            <source src="/imagenes/videoproductos.mp4" type="video/mp4">
        </video>
    </div>
        <nav>
    </nav>
  </body>
</html>

