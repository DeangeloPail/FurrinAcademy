<?php
$id=$_GET['id'];
include("../../config/database.php");
$sql="DELETE FROM profesores where codigo_profesor='".$id."'";
    $resultado=mysqli_query($conexion,$sql);
    if($resultado){
        header("location: ../../lista_profe.php");
    }
?>