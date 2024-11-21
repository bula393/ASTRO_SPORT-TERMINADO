<?php
    $correo = $_POST["CORREO"];
    $contraseña = $_POST["CONTRASEÑA"];
    $servername = "127.0.0.1";
    $database = "astro_sport";
    $username = "alumno";
    $password = "alumnoipm";
    
    $conexion = mysqli_connect($servername, $username, $password, $database); // se crea la conexion


    if (!$conexion) {
        die("Conexion fallida: " . mysqli_connect_error());
    }
    else{
        //insertamos el resultado del formulario
        $query = "select * from clientes where correo = '$correo'";
        //esto es la consulta que realizo para saber si la contraseña coincide con el mail y la guardo en la variable query
        $resultado=mysqli_query($conexion, $query);
        //la variable resultado va a guardar el resultado del comando donde se realiza la consulta
        if(mysqli_num_rows($resultado)  == 0){
            echo "Error";
            echo $correo;
        }
        else {
            $fila=mysqli_fetch_assoc($resultado);
            if($fila["contraseña"] == $contraseña){
                session_start();
                $querys = "select * from compra where id = (select max(id) from compra)";
                $resultados=mysqli_query($conexion, $querys);
                $filas=mysqli_fetch_assoc($resultados);
                $fecha_hoy = date("Y-m-d");
                if(mysqli_num_rows($resultados) == 0 ){
                    $queryss = "INSERT INTO compra VALUES ('0', '$fecha_hoy',NULL, '{$fila['DNI']}', NULL)";
                    $resultadoss=mysqli_query($conexion, $queryss);
                    $_SESSION["Ncompra"]=0;
                }
                else{
                    if(($filas["pagado"]==NULL)and($fila["DNI"]==$filas["Cliente_Dni"]))
                    {
                        $_SESSION["Ncompra"]=$filas["id"];
                    }
                    else{
                        $_SESSION["Ncompra"]=$filas["id"]+1;
                        $queryss = "INSERT INTO compra VALUES ('{$_SESSION['Ncompra']}', '$fecha_hoy',NULL, '{$fila['DNI']}', NULL)";
                        $resultadoss=mysqli_query($conexion, $queryss);
                    }
                }
                $_SESSION["correo"] = $correo;
                $_SESSION["contraseña"] = $contraseña;
                $_SESSION["iniciada"] = true;
                header('Location: /principal/principal.php');
            } else {
                echo "Contraseña incorrecta";
            }
            
        }
    }
    mysqli_close($conexion);
?> 
<html>
    <header>
        <h1>
        
        </h1>
    
    </header>
</html>