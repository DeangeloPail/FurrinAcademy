<?php
ob_start();

include("../../config/database.php");

$sqlCurso="SELECT codigo_curso,nombre_curso FROM `curso` WHERE`statu_curso` = 1";
$resultCurso=mysqli_query($conexion,$sqlCurso);

$sqlEstudiante="SELECT `Codigo_estudiante`,`Nombre_estudiante`,`Apellido_estudiante` FROM `estudiante`";
$resultEstudiante=mysqli_query($conexion,$sqlEstudiante);

if(isset($_POST['estudainte'])){
    $codigo_estudiante=$_POST['estudainte'];

    $sqlSelectEstudiante="SELECT `Codigo_estudiante` FROM `estudiante` Where `Codigo_estudiante` = '$codigo_estudiante' ";
    $resultSelectEstudiante=mysqli_query($conexion,$sqlSelectEstudiante);
    
    // Crear un array para almacenar los datos  
    $estudiante = array();

    // Recorrer los resultados y agregarlos al array
    while ($fila = mysqli_fetch_assoc($resultSelectEstudiante)) {
        $estudiante[] = $fila;
    }
    // Imprimir el array
    echo json_encode($estudiante);
}
if(isset($_POST['idMat']) && isset($_POST['curso'])){
    $codigo_curso=$_POST['curso'];
    $valIdMatricula=$_POST['idMat'];

    $sqlSelectCurso="SELECT `codigo_curso` FROM `curso` Where `codigo_curso` = '$codigo_curso' ";
    $resultSelectCurso=mysqli_query($conexion,$sqlSelectCurso);
    $filaSelectCurso=mysqli_fetch_assoc($resultSelectCurso);
    $codigoCurso=$filaSelectCurso['codigo_curso'];

    $resultado="$valIdMatricula $codigoCurso";

    echo json_encode($resultado);
}
?>