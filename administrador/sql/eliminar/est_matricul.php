<?php
$id=$_GET['id'];
include("../../config/database.php");
$sql="DELETE FROM curso_estu where cod_curs_est ='".$id."'";
    $resultado=mysqli_query($conexion,$sql);
    if($resultado){
        header("location: ../../lista_matriestu.php");
    }
?>