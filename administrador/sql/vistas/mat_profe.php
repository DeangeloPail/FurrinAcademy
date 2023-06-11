<?php
ob_start();

include("../../config/database.php");

$sqlCurso="SELECT codigo_curso,nombre_curso FROM `curso`";
$resultCurso=mysqli_query($conexion,$sqlCurso);

$sqlProfesor="SELECT codigo_profesor,Nombre_profe FROM `profesores`";
$resultProfesor=mysqli_query($conexion,$sqlProfesor);

if(isset($_POST['Profesor'])){
    $codigo_Profesor=$_POST['Profesor'];

    $sqlSelectProfesor="SELECT `codigo_profesor` FROM `profesores` Where `codigo_profesor` = '$codigo_Profesor' ";
    $resultSelectProfesor=mysqli_query($conexion,$sqlSelectProfesor);
    
    // Crear un array para almacenar los datos  
    $Profesor = array();

    // Recorrer los resultados y agregarlos al array
    while ($fila = mysqli_fetch_assoc($resultSelectProfesor)) {
        $Profesor[] = $fila;
    }
    // Imprimir el array
    echo json_encode($Profesor);
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