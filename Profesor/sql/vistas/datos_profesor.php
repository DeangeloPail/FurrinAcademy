<?php
ob_start();
include("./config/database.php");
$sql="SELECT curso.nombre_curso, `Duracion`,
 area_curso.Area, tipo_curso.tipocurso, 
 profesores.Nombre_profe 
 FROM `curso` 
 INNER JOIN area_curso on area_curso.id_area=curso.area_curso 
 INNER JOIN tipo_curso on tipo_curso.Tipocurso_id=tipo_curso.Tipocurso_id 
 INNER JOIN curso_profe on curso_profe.Codigo_curso=curso.codigo_curso 
 INNER JOIN profesores on curso_profe.Codigo_profesor=profesores.codigo_profesor 
 INNER JOIN usuario on profesores.codigo_usuarioo=usuario.codigo_usuario 
 WHERE usuario.codigo_usuario=$idProfesor";
$resultado=mysqli_query($conexion,$sql);

$sqlProfesor="SELECT `Nombre_profe`,`Direccion` FROM `profesores`WHERE`codigo_usuarioo`= $idProfesor ";
$resultadoProfesor= mysqli_query($conexion,$sqlProfesor);
?>