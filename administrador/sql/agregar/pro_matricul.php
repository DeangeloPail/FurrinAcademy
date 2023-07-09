<?php
ob_start();

$CursProfetID=$_POST['CursProfetID'];
$Profe=$_POST['codigoProfesor'];
$Curso=$_POST['codigoCurso'];

include("../../config/database.php");

$sql="INSERT INTO `curso_profe` (`codigo_cur_p`, `Codigo_profesor`, `Codigo_curso`) 
VALUES ('$CursProfetID', '$Profe', '$Curso')";
$resultado=mysqli_query($conexion,$sql);

if ($resultado){
    header('location: ../../lista_matripro.php');
}else{
    header('location: ../../formularios/agregar/pro_matricul.php');
}
?>