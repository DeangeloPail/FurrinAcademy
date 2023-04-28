<?php
$id=$_GET['id'];
include("../../config/database.php");
$sql="DELETE FROM usuario where codigo_usuario='".$id."'";
    $resultado=mysqli_query($conexion,$sql);
    if($resultado){
        header("location: ../../lista_usuario.php");
    }
?>