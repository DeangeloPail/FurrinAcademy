<?php
include("./config/database.php");

$SQLmostrarCursos="SELECT curso.nombre_curso,curso.codigo_curso FROM `curso`
INNER JOIN curso_profe on curso_profe.Codigo_curso=curso.codigo_curso 
INNER JOIN profesores on curso_profe.Codigo_profesor=profesores.codigo_profesor 
INNER JOIN usuario on profesores.codigo_usuarioo=usuario.codigo_usuario 
WHERE usuario.codigo_usuario=$idProfesor";

$mostrarCursos=mysqli_query($conexion,$SQLmostrarCursos);

?>