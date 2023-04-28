<?php
include("../../config/database.php");

$sql="SELECT codigo_curso,nombre_curso FROM `curso`";
$ListaCurso=mysqli_query($conexion,$sql);

$sqlAreaCurso="SELECT * FROM `area_curso`";
$resultadoTPAreaCurso=mysqli_query($conexion,$sqlAreaCurso);

$sqlUsuario="SELECT nombre_usuario, codigo_usuario FROM `usuario` WHERE tipodeusuario= 1";
$resultadoTpUsuario=mysqli_query($conexion,$sqlUsuario);

$sqlTpCurso="SELECT * FROM `tipo_curso`";
$resultadoCurso=mysqli_query($conexion,$sqlTpCurso);
?>