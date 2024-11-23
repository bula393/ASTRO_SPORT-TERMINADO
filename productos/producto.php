<?php
session_start();
$servername = "localhost";
$database = "astro_sport";
$username = "root";
$password = "12345678";
    $conexion = mysqli_connect($servername, $username, $password, $database); // se crea la conexion


    if (!$conexion) {
        die("Conexion fallida: " . mysqli_connect_error());
    }
    else{
        $query = "select  * from productos where Codigo=".$_GET['codigo']."";
        $querys = "select  * from tallas where id_categoria in(select id from categoria where id in(select categoria_id from subcategoria where idsubcategoria in(select subcategoria_idsubcategoria from productos where Codigo=".$_GET['codigo'].")))";
        $consultas= mysqli_query($conexion,$query );
        $consultass  = mysqli_query($conexion,$querys);
        $fila=mysqli_fetch_assoc($consultas);
    }

    mysqli_close($conexion);
?>
<html>
  <head>
    <meta charset="utf-8" />
    <meta content="width=de vice-width, initial-scale=1" name="viewport" />
    <title>ASTRO SPORT</title>
    <link rel="icon" type="icon" href="/imagenes/logo-negro.png">
    <link rel="stylesheet" href="productos.css" />
  </head>
  <body>
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
    <div id="conjunto">
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
 
    
    <img id="central" src="<?php echo $fila['foto'] ?>" alt="">
      <div class="especificaciones">

      <h1>    
        <?php echo strtoupper($fila['marca']) ?> 
      </h1> 

      <h1 >
        <?php echo strtoupper($fila['modelo']) ?> 
      </h1> 

        <h2 id="talle">TALLE</h2>
        <form action="productos.php" method="post">
          <input type="hidden" name="idproducto" value="<?php echo $_GET['codigo']; ?>" />
          <div class="tallas-container">
              <?php
              while($filas = mysqli_fetch_assoc($consultass)) {
                  echo '<button type="button" class="talla-button" onclick="selectTalla(\'' . $filas['id_talla'] . '\')">' . $filas['nombre_talla'] . '</button>';
              }
              ?>
          </div>
          <input type="hidden" id="tallaSeleccionada" name="talla" required />
          <input type="number" class="input" placeholder="CANTIDAD" required name="cantidad" />
          <input type="submit" class="input" required value="AÑADIR AL CARRITO" />
      </form>

      <script>
        function selectTalla(talla) {
            document.getElementById('tallaSeleccionada').value = talla;
            // Opcional: Puedes añadir una clase activa para estilizar el botón seleccionado
            const buttons = document.querySelectorAll('.talla-button');
            buttons.forEach(button => {
                button.classList.remove('active');
            });
            event.target.classList.add('active');
        }
    </script>

      <h2 >
        precio:$<?php echo $fila['precio'] ?> 
      </h2> 

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

