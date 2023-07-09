<?php
ob_start();
include("../../config/database.php");
$codigoCursEstudainte=$_POST['codigo'];
$nota1=$_POST['nota1'];
$nota2=$_POST['nota2'];
$nota3=$_POST['nota3'];
$nota4=$_POST['nota4'];
$sql="UPDATE `curso_estu` 
SET `nota_estudiante1` = '$nota1', 
`nota_estudiante2` = '$nota2', 
`nota_estudiante3` = '$nota3', 
`nota_estudiante4` = '$nota4' 
WHERE `curso_estu`.`cod_curs_est` = '$codigoCursEstudainte'";
$resultado=mysqli_query($conexion,$sql);
if($resultado){
    header("location: ../../Index.php");
}
?>
