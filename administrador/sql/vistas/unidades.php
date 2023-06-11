<?php
include("../../config/database.php");

$sql="SELECT id_unidad,`Unidad` FROM `unidad_curso`";
$resultado=mysqli_query($conexion,$sql);

if(isset($_POST['curso'])){
    $codigo_curso=$_POST['curso'];

    $sqlSelectCurso="SELECT `codigo_curso` FROM `curso` Where `codigo_curso` = '$codigo_curso' ";
    $resultSelectCurso=mysqli_query($conexion,$sqlSelectCurso);
    
    // Crear un array para almacenar los datos  
    $Curso = array();

    // Recorrer los resultados y agregarlos al array
    while ($fila = mysqli_fetch_assoc($resultSelectCurso)) {
        $Curso[] = $fila;
    }
    // Imprimir el array
    echo json_encode($Curso);
}
if(isset($_POST['unidad'])){
    $codigo_unidad=$_POST['unidad'];

    $sqlSelectunidad="SELECT `Unidad` FROM `unidad_curso` Where `id_unidad` = '$codigo_unidad' ";
    $resultSelectunidad=mysqli_query($conexion,$sqlSelectunidad);
    
    // Crear un array para almacenar los datos  
    $unidad = array();

    // Recorrer los resultados y agregarlos al array
    while ($fila = mysqli_fetch_assoc($resultSelectunidad)) {
        $unidad[] = $fila;
    }
    // Imprimir el array
    echo json_encode($unidad);
}
?>