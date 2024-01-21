<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>Inicio de Sesión</title>

</head>
<body>
    <div class="login-container">
        <h2>Iniciar sesión</h2>
        <form action="Inicio_sesion.php" method="post">
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
            <label for="username">Usuario:</label>
            <input type="text" id="username" name="userNameUs" required placeholder="Ingrese su usuario">

            <label for="password">Contraseña:</label>
            <input type="password" id="password" name="passwordUs" required placeholder="Ingrese su contraseña">
            <button type= "submit">Iniciar sesión</button>
            <br>
            <a class="recuperar" href="Pag_Inicio.proyecto/Login de resgistro/index.html">¿Olvidaste tu contraseña?</a>
            <a href="/Pag_Inicio/Pag_Inicio/Pag_Inicio.proyecto/Login%20de%20resgistro/FormRegis.php?">Crear cuenta</a>
        </form>
    </div>
</body>
</html>
