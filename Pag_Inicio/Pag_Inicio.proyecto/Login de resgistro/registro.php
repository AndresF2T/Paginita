<?php
 session_start();

 include_once('conecta.php');

 if(isset($_POST['nombreUs']) && isset($_POST['apellidoUs']) && isset($_POST['correoUs']) && isset($_POST['cedulaUsuarios']) && isset($_POST['passwordUs']) && isset($_POST['userNameUs']) ){
        function validar(){
            $dato = trim($dato);
            $dato = stripcslashes($dato);
            $dato = htmlspecialchars($dato);
            return $dato;

        }
        $apellidoUs = validar($_POST['apellidoUs']);
        $nombreUs = validar($_POST['nombreUs']);
        $correoUs = validar($_POST['correoUs']);
        $cedulaUsuarios = validar($_POST['cedulaUsuarios']);
        $passwordUs = validar($_POST['passwordUs']);
        $userNameUs = validar($_POST['userNameUs']);

        $datosUsuario = "userNameUs=" . $userNameUs . "&nombreUs=" . $nombreUs;

        if(empty($userNameUs)){
            header("Location: FormRegis.php?Error=el usuario es necesario&$datosUsuario");
            exit();
        }elseif(empty($passwordUs)){
            header("Location: FormRegis.php?Error=La contraseña es necesaria&$datosUsuario");
            exit();
        }elseif(empty($cedulaUsuarios)){
            header("Location: FormRegis.php?Error=La cedula es necesaria$datosUsuario");
            exit();
        }elseif(empty($correoUs)){
            header("Location: FormRegis.php?Error=El correo es necesario$datosUsuario");
            exit();
        }elseif(empty($nombreUs)){
            header("Location: FormRegis.php?Error=El nombre es necesario$datosUsuario");
            exit();
        }elseif(empty($apellidoUs)){
            header("Location: FormRegis.php?Error=El apellido es necesario$datosUsuario");
            exit();
        }else{
            $passwordUs = md5($passwordUs);
            $sql = "SELECT * FROM usuarios WHERE userNameUs = '$userNameUs'";
            $query= $conexion->query($sql);

            if(mysqli_num_rows($query) > 0){
                header("Location: FormRegis.php?Error=¡El usuario ya existe!");
                exit();

            }else{
                $query2 = "";
                $sql2 = "INSERT INTO usuarios(nombreUs, apellidoUs, userNameUs, passwordUs VALUES('$nombreUs','$apellidoUs','$userNameUs','$passwordUs')";
                $query2= $conexion->query($sql2);

                if($query2){
                    header("Location: FormRegis.php?success=¡El usuario fue creado con exito!");
                    exit();

                }else{
                    header("Location: FormRegis.php?success=¡Ocurrio un error!");
                    exit();
                }
            }

        }
 }else{
    header("Location: FormRegis.php?");
    exit();
 }

?>

