<html>
  <head>
    <meta charset="utf-8" />
    <meta content="width=de vice-width, initial-scale=1" name="viewport" />
    <title>ASTRO SPORT</title>
    <link rel="icon" type="icon" href="/imagenes/logo-negro.png">
    <link rel="stylesheet" href="formulario.css" />
  </head>
  <body>
    <header>
      <a href="../principal/principal.php"><img id=logo src="../imagenes/logo-blanco.png"/></a>
      <img id=nombre src="../imagenes/NOMBRELOGO.png"/>
      <div class='all-esquina'>
        <a class='sesion' href='/formulario/iniciosesion.php'><h2>INICIAR SESION</h2></a>
      </div>
    </header>
        <nav>
        <form action="../formulario/form.php" method="post">
      
            <input type="text" class="input" required placeholder="NOMBRE" name="NOMBRE" />
            <input type="text" class="input" required placeholder="APELLIDO" name="APELLIDO" />
            <input type="text" class="input" required placeholder="DIRECCION" name="DIRECCION"/>
            <input type="text" minlength="8" required class="input" placeholder="CONTRASEÑA" name="CONTRASEÑA" />
            <input type="number"  class="input" required placeholder="DNI" name="DNI" />
              <input type="number" class="input" required placeholder="TELEFONO" name="TELEFONO" />
              <input type="number" class="input" required placeholder="EDAD" name="EDAD"/>
              <input type="text" class="input" required placeholder="CORREO" name="CORREO"/>
            <input type="submit" class="input" required value="REGISTRARSE" />

        </form>
        <?php if($_GET['errorC'] === 'contraseñamal'){ ?>
               
               <div class="overlay" id="cartel">
                 <div class="mensaje">
                     <button class="cerrar" onclick="cerrarCartel()">×</button>
                     <h2>Este Mail ya  esta registrado</h2>
                 </div>
               </div>
             <?php } ?>
 
     <script>
         // Función para cerrar el cartel
         function cerrarCartel() {
             document.getElementById('cartel').style.display = 'none';
         }
     </script>
    </nav>
  </body>
</html>

