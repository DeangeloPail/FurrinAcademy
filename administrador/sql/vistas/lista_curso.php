<?php
ob_start();

include("./config/database.php");

$sql="SELECT codigo_curso, nombre_curso, Duracion, statu_curso, area_curso.Area,
tipo_curso.tipocurso, usuario.nombre_usuario FROM `curso` 
INNER JOIN area_curso ON curso.area_curso=area_curso.id_area 
INNER JOIN tipo_curso ON curso.tipo_curso=tipo_curso.Tipocurso_id 
INNER JOIN usuario ON curso.codigo_usuario=usuario.codigo_usuario";
$resultado=mysqli_query($conexion,$sql);

?>