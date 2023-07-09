
<?php
ob_start();

$CursEstID=$_POST['CursEstID'];
$Estudiante=$_POST['codigoEstudiante'];
$Curso=$_POST['codigoCurso'];

include("../../config/database.php");

$sql="INSERT INTO `curso_estu` (`cod_curs_est`, `Codigo_estudiante`, `Codigo_curso`) 
VALUES ('$CursEstID', '$Estudiante', '$Curso')";
$resultado=mysqli_query($conexion,$sql);

if ($resultado){
    header('location: ../../lista_matriestu.php');
}else{
    header('location: ../../formularios/agregar/est_matricul.php');
}
?>