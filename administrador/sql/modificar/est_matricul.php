<?php
ob_start();

$CursEstID=$_POST['CursEstID'];
$Estudiante=$_POST['codigoEstudiante'];
$Curso=$_POST['codigoCurso'];

include("../../config/database.php");

$sql="UPDATE `curso_estu` SET `Codigo_estudiante` = '$Estudiante', `Codigo_curso` = '$Curso'
 WHERE `curso_estu`.`cod_curs_est` = '$CursEstID'";
$resultado=mysqli_query($conexion,$sql);

if ($resultado){
    header('location: ../../lista_matriestu.php');
}else{
    header('location: ../../formularios/editar/est_matricul.php');
}
?>