<?php
ob_start();
include("../../config/database.php");

$Unidad=(isset($_POST['Unidad']))?$_POST['Unidad']:"";
$UnidadID=(isset($_POST['UnidadID']))?$_POST['UnidadID']:"";
$Curso=(isset($_POST['Curso']))?$_POST['Curso']:"";

$sql="UPDATE `unidad_curso` SET `Unidad` = '$Unidad', 
`codigo_curso` = '$Curso' WHERE `unidad_curso`.`id_unidad` = '$UnidadID'";
$resultado=mysqli_query($conexion,$sql);

if ($resultado){
    header('location: ../../unidades.php');
}else{
    header('location: ../../formularios/agregar/unidades.php');
}
?>