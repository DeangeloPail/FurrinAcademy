<?php
    include_once 'db.php';
	$usuario=$_POST['usuario'];
	$contrasena=$_POST['contrasena'];
	session_start();
	$_SESSION['usuario'] = $usuario;
    

	$sql="SELECT * from usuario WHERE nombre_usuario='$usuario' and contrasena='$contrasena'";
	$result=mysqli_query($conexion,$sql);

	$filas=mysqli_fetch_array($result);

    if($filas == true && $filas['status_usuario']==1){
        $idUsuario=$filas['codigo_usuario'];
        // validar rol
        if($filas['tipodeusuario']== 1) {
            $_SESSION['usuarioAdministrador']="ok";
            $_SESSION['nombreUsuario']=$usuario;
            header("location: ../../administrador/index.php");
        }
        if($filas['tipodeusuario']== 2){
            $_SESSION['usuarioProfesor']="ok";
            $_SESSION['nombreUsuario']=$usuario;
            header("location: ../../Profesor/Index.php");
        }
        if($filas['tipodeusuario']== 3){
            $_SESSION['usuarioEstudiante']="ok";
            $_SESSION['nombreUsuario']=$usuario;
            $_SESSION['idEstudiante']=$idUsuario;
            header("location: ../../Estudiante/index.php");
        }
    }else{
        // no existe el usuario
        header("location: ../login.php");
    }

mysqli_free_result($result);
mysqli_close($conexion);
?>