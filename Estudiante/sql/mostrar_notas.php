<?php
include_once('./config/database.php');

ob_start();

$sql="SELECT curso.nombre_curso FROM `usuario`
INNER JOIN estudiante on estudiante.codigo_usuario=usuario.codigo_usuario
INNER  JOIN curso_estu on estudiante.Codigo_estudiante=curso_estu.Codigo_estudiante
INNER JOIN curso on curso_estu.Codigo_curso=curso.codigo_curso
WHERE usuario.codigo_usuario='$idEstudiante'";
$resultado = mysqli_query($conexion, $sql);
if ($resultado){
    $contador=mysqli_num_rows($resultado);
}
?>