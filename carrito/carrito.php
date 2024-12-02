<?php
session_start();
$servername = "127.0.0.1";
$database = "astro_sport";
$username = "alumno";
$password = "alumnoipm";
$compra=0;
$conexion = mysqli_connect($servername, $username, $password, $database);
if (!$conexion) {
    die("Conexion fallida: " . mysqli_connect_error());
} else {
    $consulta="select * from carrito where idcompra = ". $_SESSION['Ncompra']." ;";
    $resultado = mysqli_query($conexion, $consulta);
    $total=0;


?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8" />
    <meta content="width=de vice-width, initial-scale=1" name="viewport" />
    <title>ASTRO SPORT</title>
    <link rel="icon" type="icon" href="/imagenes/logo-negro.png">
    <link rel="stylesheet" href="carrito.css" />
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
    <div class=centro>
        <?php 
                while ($fila = mysqli_fetch_assoc($resultado)) { 
                    $consultas = "SELECT * FROM productos WHERE codigo = " . $fila['producto_id'] . ";";
                    $resultados = mysqli_query($conexion, $consultas);
                    $filas = mysqli_fetch_assoc($resultados);
                    if($fila['tallaID'] != NULL){
                        $consultast = "SELECT * FROM tallas WHERE id_talla = " . $fila['tallaID'] . ";";
                        $resultadost = mysqli_query($conexion, $consultast);
                    }
                    
                    $ftalles = mysqli_fetch_assoc($resultadost);
                    $total=$total+($filas['precio']*$fila['cantidad']);
                    ?>
                    <div class="item-container">
                        <img class="item" src="<?php echo $filas['foto']; ?>" />
                        <div class="cantidad">

                            <a class="boton" href="actualizar_carrito.php?accion=restar&idcompra=<?php echo $fila['idcompra']; ?>&producto_id=<?php echo $fila['producto_id']; ?>&tallaID=<?php echo $fila['tallaID']; ?>">
                                <h1> < </h1>
                            </a>
                            <h2><?php echo $fila['cantidad']; ?></h2>
                            <a class="boton" href="actualizar_carrito.php?accion=sumar&idcompra=<?php echo $fila['idcompra']; ?>&producto_id=<?php echo $fila['producto_id']; ?>&tallaID=<?php echo $fila['tallaID']; ?>">
                                <h1> > </h1>
                            </a>
                        </div>
                         <h2>Precio:   $<?php  echo $filas['precio']*$fila['cantidad']  ?> </h2>
                         <div class="nombreproc"><h2><?php echo $filas['marca']; ?> </h2><h2>---</h2><h2> <?php echo $filas['modelo']; ?></h2></div>
                         <?php if($fila['tallaID'] != NULL){ ?>
                         <div class="nombreproc"><h2 >Talle:<?php echo $ftalles['nombre_talla'] ?> </h2> </div>
                         <?php } ?>
                         <div class="borrar"><a class="boton" href="actualizar_carrito.php?accion=borrar&idcompra=<?php echo $fila['idcompra']; ?>&producto_id=<?php echo $fila['producto_id']; ?>&tallaID=<?php echo $fila['tallaID']; ?>">
                                <h1> x </h1>
                            </a>
                            </div>
                    </div>
                <?php 
                }
                mysqli_close($conexion);
            }
                ?>
        <div class="item-container">
            <h2>Metodos de pago:</h2>
            <form method="post" action="actualizar_carrito.php?precioFinal= <?php echo $total; ?>&idcompra=<?php echo $_SESSION['Ncompra'] ?> ">
                    <select name="metodo_pago" id="">
                        <option value="pay_pal">Pay Pal</option>
                        <option value="Mastercard ">Mastercard</option>
                        <option value="apple_pay">Apple Pay</option>
                    </select>
                    <input class="comprar" type="submit" value="Comprar" />
            </form>
            <h2>Total:   $<?php echo $total ?></h2>
        </div>
    </div>   
    <script>
        // Seleccionar todos los elementos con la clase .borrar
        const borrarItems = document.querySelectorAll('.borrar');

        // Iterar sobre cada elemento y agregar el evento
        borrarItems.forEach(item => {
            item.addEventListener('mouseenter', () => {
                // Cambiar el color de fondo cuando el mouse entra
                item.closest('.item-container').style.backgroundColor = 'red'; // Cambiar el fondo a rojo
            });

            item.addEventListener('mouseleave', () => {
                // Restaurar el fondo cuando el mouse sale
                item.closest('.item-container').style.backgroundColor = 'orange'; // Fondo original
            });
        });


            
        
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
