<?php
include("./config/database.php");

$sql="SELECT id_unidad,`Unidad`,curso.nombre_curso 
FROM `unidad_curso` INNER JOIN curso on curso.codigo_curso=unidad_curso.codigo_curso;";
$resultado=mysqli_query($conexion,$sql);

?>