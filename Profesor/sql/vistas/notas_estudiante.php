<?php
include("../../config/database.php");

$id=$_GET['id'];
$sql="SELECT `cod_curs_est`, `nota_estudiante1`,`nota_estudiante2`,`nota_estudiante3`,
`nota_estudiante4`,estudiante.Nombre_estudiante,
estudiante.Apellido_estudiante,estudiante.Codigo_estudiante,
curso.nombre_curso,curso.Duracion,tipo_curso.tipocurso,area_curso.Area FROM `curso_estu`
INNER JOIN estudiante on curso_estu.Codigo_estudiante=estudiante.Codigo_estudiante
INNER JOIN curso on curso_estu.Codigo_curso=curso.codigo_curso
INNER JOIN tipo_curso on curso.tipo_curso=tipo_curso.Tipocurso_id
INNER JOIN area_curso on curso.area_curso=area_curso.id_area
WHERE curso_estu.cod_curs_est='$id'";
$resultadoCursos=mysqli_query($conexion,$sql);

$filaContenido=mysqli_fetch_assoc($resultadoCursos);
$codigo=$filaContenido["cod_curs_est"];
$nota1=$filaContenido["nota_estudiante1"];
$nota2=$filaContenido["nota_estudiante2"];
$nota3=$filaContenido["nota_estudiante3"];
$nota4=$filaContenido["nota_estudiante4"];
$nombre=$filaContenido["Nombre_estudiante"];
$apellido=$filaContenido["Apellido_estudiante"];
$cedula=$filaContenido["Codigo_estudiante"];
$nombreCurso=$filaContenido["nombre_curso"];
$duracion=$filaContenido["Duracion"];
$tipoCurso=$filaContenido["tipocurso"];
$area=$filaContenido["Area"];


?>