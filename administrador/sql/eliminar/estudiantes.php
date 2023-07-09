<?php
$id=$_GET['id'];
include("../../config/database.php");
$sql="DELETE FROM estudiante where Codigo_estudiante='".$id."'";
    $resultado=mysqli_query($conexion,$sql);
    if($resultado){
        header("location: ../../lista_estu.php");
    }
?>