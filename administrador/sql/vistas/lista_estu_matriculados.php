<?php
include("./config/database.php");

$sql="SELECT `cod_curs_est`,estudiante.Nombre_estudiante,
estudiante.Apellido_estudiante,curso.nombre_curso FROM `curso_estu` 
INNER JOIN estudiante on estudiante.Codigo_estudiante=curso_estu.Codigo_estudiante 
INNER JOIN curso on curso.codigo_curso=curso_estu.Codigo_curso;";
$resultado=mysqli_query($conexion,$sql);

?>