<?php
$id=$_GET['id'];
$estatus=$_GET['estatus'];
include("../../config/database.php");
if($estatus==1){
    $sql="UPDATE `usuario` SET `status_usuario` = 2 WHERE `usuario`.`codigo_usuario` = '".$id."'";
    $resultado=mysqli_query($conexion,$sql);
    if($resultado){
        header("location: ../../lista_usuario.php");
    }
}else{
    $sql="UPDATE `usuario` SET `status_usuario` = 1 WHERE `usuario`.`codigo_usuario` = '".$id."'";
    $resultado=mysqli_query($conexion,$sql);
    if($resultado){
        header("location: ../../lista_usuario.php");
    }
}
    
?>