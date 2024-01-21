<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Registro</title>
    <link rel="stylesheet" href="estilos.css">
</head>
<body>
    <div class="container">
    <h1>Registrate</h1>
    <form action="registro.php" method="post">
        <hr>

        <?php

        if (isset($_GET['Error'])){
        ?>
            <p class="error">
                <?php
                echo $_GET['Error'];
                ?>

            </p>
        <?php    
        }
        ?>

        </hr>
        <div class="form-group">
            <label for="Nombre">Nombre</label>
            <input type="text" class="form-control" id="nombre" name="nombreUs" placeholder="Ingrese su nombre">
        </div>
        <div class="form-group">
            <label for="apellido">Apellido</label>
            <input type="text" class="form-control" id="apellido" name="apellidoUs" placeholder="Ingrese su apellido">
        </div>
        <div class="form-group">
        <label for="email">Correo electrónico</label>
        <input type="email" class="form-control" id="email" name="correoUs" placeholder="Ingrese su correo electrónico">
        </div>
        <div class="form-group">
        <label for="Usuario">Usuario</label>
        <input type="text" class="form-control" id="Usuario" name="userNameUs" placeholder="Ingrese su usuario">
        </div>
        <div class="form-group">
        <label for="id">Cedula</label>
        <input type="text" class="form-control" id="id" name="cedulaUsuarios" placeholder="Ingrese su cedula">
        </div>
        <div class="form-group">
        <label for="password">Contraseña</label>
        <input type="password" class="form-control" id="password" name="passwordUs" placeholder="Ingrese su contraseña">
        </div>
        <button type="submit" class="btn btn-primary">Registrarse</button>
        <br>

        <a href="http://localhost/Pag_Inicio/Pag_Inicio.proyecto/Inicio_de_sesion_sport_j.s.a/inicioSes.php">¿Ya tienes cuenta?</a>
       
    </form>
    </div>
</body>
</html>