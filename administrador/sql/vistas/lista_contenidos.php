<?php
ob_start();

include("./config/database.php");

$sql="SELECT `id_contenido`,`Contenido`,unidad_curso.Unidad,curso.nombre_curso 
FROM `contenidos_unidad_curso` INNER JOIN unidad_curso ON contenidos_unidad_curso.unidad_curso=unidad_curso.id_unidad 
INNER JOIN curso ON unidad_curso.codigo_curso=curso.codigo_curso;";
$resultado=mysqli_query($conexion,$sql);
?>