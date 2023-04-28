<?php
ob_start();
include("../../config/database.php");

$sqlUsuarios="SELECT * FROM `usuario` WHERE `tipodeusuario`=2";
$Usuarios=mysqli_query($conexion,$sqlUsuarios)
?>