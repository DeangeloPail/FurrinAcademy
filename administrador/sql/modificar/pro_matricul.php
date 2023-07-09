<?php
ob_start();

$CursProfetID=$_POST['CursProfetID'];
$Profe=$_POST['codigoProfesor'];
$Curso=$_POST['codigoCurso'];

include("../../config/database.php");

$sql="UPDATE `curso_profe` SET `Codigo_profesor` = '$Profe', `Codigo_curso` = '$Curso'
 WHERE `curso_profe`.`codigo_cur_p` = '$CursProfetID'";
$resultado=mysqli_query($conexion,$sql);

if ($resultado){
    header('location: ../../lista_matripro.php');
}else{
    header('location: ../../formularios/editar/pro_matricul.php');
}
?>