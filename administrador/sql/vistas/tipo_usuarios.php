<?php
include("../../config/database.php");

$sql="SELECT * FROM `tipo_de_usuario`";
$tipUsuario=mysqli_query($conexion,$sql);

?>