<?php
$id=$_GET['id'];
$estatus=$_GET['estatus'];
include("../../config/database.php");
if($estatus==1){
    $sql="UPDATE `curso` SET `statu_curso` = 2 WHERE `curso`.`codigo_curso` = '".$id."'";
    $resultado=mysqli_query($conexion,$sql);
    if($resultado){
        header("location: ../../lista_cursos.php");
    }
}else{
    $sql="UPDATE `curso` SET `statu_curso` = 1 WHERE `curso`.`codigo_curso` = '".$id."'";
    $resultado=mysqli_query($conexion,$sql);
    if($resultado){
        header("location: ../../lista_cursos.php");
    }
}
    
?>