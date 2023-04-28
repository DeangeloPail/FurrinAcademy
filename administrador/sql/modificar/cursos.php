<?php
ob_start();
include("../../config/database.php");
$CodigoCurso=(isset($_POST['CodigoCurso']))?$_POST['CodigoCurso']:"";
$NombreCurso=(isset($_POST['NombreCurso']))?$_POST['NombreCurso']:"";
$Duracion=(isset($_POST['Duracion']))?$_POST['Duracion']:"";
$AreaCurso=(isset($_POST['AreaCurso']))?$_POST['AreaCurso']:"";
$TipoCurso=(isset($_POST['TipoCurso']))?$_POST['TipoCurso']:"";
$CodigoUsuario=(isset($_POST['CodigoUsuario']))?$_POST['CodigoUsuario']:"";

$sql="UPDATE `curso` SET `nombre_curso` = '$NombreCurso',
 `Duracion` = '$Duracion', `area_curso` = '$AreaCurso',`tipo_curso` = '$TipoCurso', 
 `codigo_usuario` = '$CodigoUsuario' WHERE `curso`.`codigo_curso` = '$CodigoCurso'";
$resultado=mysqli_query($conexion,$sql);

if ($resultado){
    header('location: ../../lista_cursos.php');
}else{
    header('location: ../../formularios/editar/cursos.php?id='.$CodigoCurso.'');
}
?>