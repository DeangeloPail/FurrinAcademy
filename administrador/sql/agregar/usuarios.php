<?php
ob_start();
include("../../config/database.php");

$Usuario=(isset($_POST['usuario']))?$_POST['usuario']:"";
$Constrasena=(isset($_POST['constrasena']))?$_POST['constrasena']:"";
$TipUsuario=(isset($_POST['TipUsuario']))?$_POST['TipUsuario']:"";

if (isset($_POST['usuario'])) {
    $Usuario = $_POST['usuario'];
    $sqlUsuario = "SELECT * FROM usuario WHERE nombre_usuario = '$Usuario'";
    $resultadoUsuario = mysqli_query($conexion, $sqlUsuario);
    if (mysqli_num_rows($resultadoUsuario) > 0) {
      $mensaje = '<script>alert("El usuario existe en la base de datos");</script>'; // se guarda en mensaje el texto que quieras mostrar
      header("location: ../../formularios/agregar/usuarios.php?Message=".urlencode($mensaje));
    } else {

        $sql="INSERT INTO `usuario` (`codigo_usuario`, `nombre_usuario`, `contrasena`, `tipodeusuario`)
        VALUES (NULL, '$Usuario', '$Constrasena', '$TipUsuario')";
        $resultado=mysqli_query($conexion,$sql);

        if ($resultado){
            header('location: ../../lista_usuario.php');
        }else{
            header('location: ../../formularios/agregar/usuarios.php');
        }
    }
}

?>