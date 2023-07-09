<?php
$id=$_GET['id'];
include("../../config/database.php");
$sql="DELETE FROM curso_profe where codigo_cur_p ='".$id."'";
    $resultado=mysqli_query($conexion,$sql);
    if($resultado){
        header("location: ../../lista_matripro.php");
    }
?>