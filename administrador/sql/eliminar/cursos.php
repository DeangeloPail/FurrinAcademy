<?php
$id=$_GET['id'];
include("../../config/database.php");
$sql="DELETE FROM curso where codigo_curso ='".$id."'";
    $resultado=mysqli_query($conexion,$sql);
    if($resultado){
        header("location: ../../lista_cursos.php");
    }
?>