<?php
session_start();

include('conexion.php');

if (isset($_POST['userNameUs']) && isset($_POST['passwordUs'])) {
    function validar($dato) {
        $dato = trim($dato);
        $dato = stripcslashes($dato);
        $dato = htmlspecialchars($dato);
        return $dato;
    }

    $usuario = validar($_POST['userNameUs']);
    $password = validar($_POST['passwordUs']);

    if (!filter_var($usuario, FILTER_VALIDATE_EMAIL) && !preg_match('/^[a-zA-Z0-9_.-]+$/', $usuario)) {
        header("Location: inicioSes.php?Error=El formato de usuario no es válido");
        exit();
    }

    if (strlen($password) < 6) {
        header("Location: inicioSes.php?Error=La contraseña debe ser de al menos 6 caracteres");
        exit();
    }

    $password = md5($password);

    $stmt = mysqli_prepare($conexion, "SELECT * FROM usuarios WHERE userNameUs = ? AND passwordUs = ?");
    mysqli_stmt_bind_param($stmt, "ss", $usuario, $password);
    mysqli_stmt_execute($stmt);
    $resultado = mysqli_stmt_get_result($stmt);

    if (mysqli_num_rows($resultado) === 1) {
        $row = mysqli_fetch_assoc($resultado);

        if ($row['userNameUs'] === $usuario && $row['passwordUs'] === $password) {
            $_SESSION['userNameUs'] = $row['userNameUs'];
            $_SESSION['nombreUs'] = $row['nombreUs'];
            $_SESSION['cedulaUsuarios'] = $row['cedulaUsuarios'];
            header("Location: cancha.php");
            exit();
        } else {
            header("Location: inicioSes.php?Error=El usuario o la contraseña son incorrectos");
            exit();
        }
    } else {
        header("Location: inicioSes.php?Error=El usuario no existe");
        exit();
    }
}

?>