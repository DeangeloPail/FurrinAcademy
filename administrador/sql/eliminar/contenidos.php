<?php
$id=$_GET['id'];
include("../../config/database.php");
$sql="DELETE FROM contenidos_unidad_curso where id_contenido ='".$id."'";
    $resultado=mysqli_query($conexion,$sql);
    if($resultado){
        header("location: ../../contenidos.php");
    }
?>