<?php
include_once('./config/database.php');

ob_start();
$sqlDatos="SELECT * FROM `estudiante`WHERE`codigo_usuario`='$idEstudiante';";
$resultaDatos = mysqli_query($conexion, $sqlDatos);


$sqlNotas="SELECT estudiante.Codigo_estudiante,`Nombre_estudiante`,`Apellido_estudiante`,`Direccion`,`Telefono`,
curso_estu.nota_estudiante1,curso_estu.nota_estudiante2,curso_estu.nota_estudiante3,
curso_estu.nota_estudiante4,curso.nombre_curso FROM `estudiante`
INNER join curso_estu on estudiante.Codigo_estudiante=curso_estu.Codigo_estudiante
INNER JOIN curso on curso_estu.Codigo_curso=curso.codigo_curso
WHERE estudiante.codigo_usuario= '$idEstudiante'";
$resultadoNotas = mysqli_query($conexion, $sqlNotas);

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