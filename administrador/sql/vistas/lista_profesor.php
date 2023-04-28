<?php
include("./config/database.php");

$sql="SELECT codigo_profesor,`Nombre_profe`,
`Direccion`,usuario.nombre_usuario FROM profesores 
INNER JOIN usuario ON usuario.codigo_usuario=codigo_usuarioo";
$resultado=mysqli_query($conexion,$sql);

?>