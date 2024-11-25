<html>
  <head>
    <meta charset="utf-8" />
    <meta content="width=de vice-width, initial-scale=1" name="viewport" />
    <title>ASTRO SPORT</title>
    <link rel="icon" type="icon" href="/imagenes/logo-negro.png">
    <link rel="stylesheet" href="inicio secion.css" />
  </head>
  <body>
    <header>
      <a href="\principal\principal.php"><img id=logo src="\imagenes\logo-blanco.png"/></a>
      <img id=nombre src="\imagenes\NOMBRELOGO.png"/>
      <div class='all-esquina'>
          <a class='sesion' href='/formulario/FORMULARIO.php'><h2>REGISTRARSE</h2></a>
        </div>
    </header>
        <nav>
                      <form action="iniciarSesion.php" method="post">  
                          <input type="text "  required class="input" placeholder="CORREO" name="CORREO"/>
                          <input type="password"  required class="input" placeholder="CONTRASEÑA" name="CONTRASEÑA"/>
                          <input type="submit" class="input" value="INICIAR"/>
                      </form>

        <script>
            // Función para cerrar el cartel
            function cerrarCartel() {
                document.getElementById('cartel').style.display = 'none';
            }
        </script>
        </nav>
          <?php if($_GET['errorC'] === 'contraseñamal'){ ?>
               
               <div class="overlay" id="cartel">
                 <div class="mensaje">
                     <button class="cerrar" onclick="cerrarCartel()">×</button>
                     <h2>Contraseña Incorrecta</h2>
                 </div>
               </div>
             <?php } ?>
             <?php if($_GET['errorC'] === 'no email'){ ?>
               
               <div class="overlay" id="cartel">
                 <div class="mensaje">
                     <button class="cerrar" onclick="cerrarCartel()">×</button>
                     <h2>Email no registrado</h2>
                 </div>
               </div>
             <?php } ?>
  </body>
</html>

