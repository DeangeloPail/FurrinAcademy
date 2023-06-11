<?php
ob_start();

$ContenidoID=(isset($_POST['ContenidoID']))?$_POST['ContenidoID']:"";
$Contenido=(isset($_POST['Contenido']))?$_POST['Contenido']:"";
$unidad_curso=(isset($_POST['unidad_curso']))?$_POST['unidad_curso']:"";

include("../../config/database.php");

$sql="INSERT INTO `contenidos_unidad_curso` (`id_contenido`, `Contenido`, `unidad_curso`) 
VALUES ('$ContenidoID', '$Contenido', '$unidad_curso')";
$resultado=mysqli_query($conexion,$sql);

if ($resultado){
    header('location: ../../contenidos.php');
}else{
    header('location: ../../formularios/agregar/contenidos.php');
}
?>