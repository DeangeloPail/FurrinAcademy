<?php
include("./config/database.php");

$sql="SELECT codigo_usuario, tipo_de_usuario.Tipodeusuario,`nombre_usuario`,`contrasena`
FROM usuario INNER JOIN tipo_de_usuario ON usuario.tipodeusuario=tipo_de_usuario.codigo_tusuario";
$resultado=mysqli_query($conexion,$sql);

?>