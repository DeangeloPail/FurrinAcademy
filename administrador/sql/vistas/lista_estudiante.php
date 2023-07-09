<?php
ob_start();

include("./config/database.php");

$sql="SELECT `Codigo_estudiante`,`Nombre_estudiante`,`Apellido_estudiante`,
`Direccion`,`Telefono`,usuario.nombre_usuario FROM `estudiante`
INNER JOIN usuario on estudiante.codigo_usuario=usuario.codigo_usuario";
$resultado=mysqli_query($conexion,$sql);

?>