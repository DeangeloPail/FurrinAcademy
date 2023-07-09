<?php
include("./config/database.php");

$sql="SELECT `codigo_cur_p`,profesores.Nombre_profe, curso.nombre_curso FROM curso_profe 
INNER JOIN profesores on profesores.codigo_profesor=curso_profe.Codigo_profesor 
INNER JOIN curso on curso.codigo_curso=curso_profe.Codigo_curso;";
$resultado=mysqli_query($conexion,$sql);

?>