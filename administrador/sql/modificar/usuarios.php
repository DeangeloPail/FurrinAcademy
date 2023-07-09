<?php
ob_start();
include("../../config/database.php");
$Id=(isset($_POST['UsuarioID']))?$_POST['UsuarioID']:"";
$Usuario=(isset($_POST['usuario']))?$_POST['usuario']:"";
$Constrasena=(isset($_POST['constrasena']))?$_POST['constrasena']:"";
$TipUsuario=(isset($_POST['TipUsuario']))?$_POST['TipUsuario']:"";

$sql="SELECT * FROM usuario WHERE `codigo_usuario` = $Id";
$datos=mysqli_query($conexion,$sql);
$filaDatos=mysqli_fetch_assoc($datos);
$NombreUsuario=$filaDatos["nombre_usuario"];

if($NombreUsuario == $Usuario){
    $sql="UPDATE usuario SET nombre_usuario = '".$Usuario."', 
    contrasena = '".$Constrasena."', tipodeusuario = '".$TipUsuario."' 
    WHERE usuario.codigo_usuario = '".$Id."'";
    $resultado=mysqli_query($conexion,$sql);
    
    if ($resultado){
        header('location: ../../lista_usuario.php');
    }else{
        header('location: ../../lista_usuario.php');
    }
}else{
    $sqlUsuario = "SELECT * FROM usuario WHERE nombre_usuario = '".$Usuario."'";
    $resultadoUsuario = mysqli_query($conexion, $sqlUsuario);
    if (mysqli_num_rows($resultadoUsuario) > 0) {
      $mensaje = '<script>alert("El usuario existe en la base de datos");</script>'; // se guarda en mensaje el texto que quieras mostrar
      header("location: ../../formularios/editar/usuarios.php?id=".$Id."&Message=".urlencode($mensaje));
    } else {
    
        $sql="UPDATE usuario SET nombre_usuario = '".$Usuario."', 
        contrasena = '".$Constrasena."', tipodeusuario = '".$TipUsuario."' 
        WHERE usuario.codigo_usuario = '".$Id."'";
        $resultado=mysqli_query($conexion,$sql);
    
        if ($resultado){
        header('location: ../../lista_usuario.php');
        }else{
        header('location: ../../lista_usuario.php');
        }
    }
}
?>