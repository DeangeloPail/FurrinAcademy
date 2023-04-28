<?php
$id=$_GET['id'];
include("../../config/database.php");
$sql="DELETE FROM unidad_curso where id_unidad ='".$id."'";
    $resultado=mysqli_query($conexion,$sql);
    if($resultado){
        header("location: ../../lista_cursos.php");
    }
?>