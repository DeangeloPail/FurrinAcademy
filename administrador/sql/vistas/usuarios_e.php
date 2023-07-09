<?php
ob_start();
include("../../config/database.php");

$sqlUsuarios="SELECT * FROM `usuario` WHERE `tipodeusuario`=3";
$Usuarios=mysqli_query($conexion,$sqlUsuarios)
?>