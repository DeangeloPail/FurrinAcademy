<?php
require ('fpdf.php');

class PDF extends FPDF
{
// Cabecera de página
function Header()
{
   // Logo
   $this->Image('FURRIN.png',10,8,33);
    $this->SetFont('Arial','B',10);
    // Movernos a la derecha
    $this->Cell(80);
    // Título
    $this->Cell(30,10,'Republica Bolivarina de Venezuela',0,0,'C');
    $this->Ln(3.5);
    $this->SetFont('Arial','B',10);
    $this->Cell(80);
    $this->Cell(30,10,'Ministerios del Poder Popular para la Educacion',0,0,'C');
    $this->Ln(3.5);
    $this->SetFont('Arial','B',10);
    $this->Cell(80);
    $this->Cell(30,10,'Escuela de Formacion Profesional Furrin Academy',0,0,'C');
    $this->Ln(3.5);
    $this->SetFont('Arial','B',10);
    $this->Cell(80);
    $this->Cell(30,10,'Aragua-Venezuela',0,0,'C');
    $this->Ln(20);
  
    $this->SetFont('Arial','B',15);
    $this->Cell(80);
    $this->Cell(30,10,'Estudiantes Matriculados',0,0,'C');
    $this->Ln(10);
 //Impresion
    $this->SetFont('Arial','B',10);
    $this->Cell(60, 10, 'Nombre', 1, 0, 'C', 0);
    $this->Cell(60, 10, 'Apellido', 1, 0, 'C', 0);
    $this->Cell(60, 10, 'Curso Inscrito', 1, 1, 'C', 0);

   
}

// Pie de página
function Footer()
{
    // Posición: a 1,5 cm del final
    $this->SetY(-15);
    // Arial italic 8
    $this->SetFont('Arial','I',8);
    // Número de página
    $this->Cell(0,10,'Powered By ProYeidWeb'.$this->PageNo().'/{}',0,0,'C');
}
}

require 'cn.php';
$consulta = "SELECT `cod_curs_est`,estudiante.Nombre_estudiante, estudiante.Apellido_estudiante,curso.nombre_curso FROM `curso_estu` INNER JOIN estudiante on estudiante.Codigo_estudiante=curso_estu.Codigo_estudiante INNER JOIN curso on curso.codigo_curso=curso_estu.Codigo_curso";
$resultado = $mysqli->query($consulta);

$pdf = new PDF();
$pdf->AddPage();
$pdf->SetFont('Arial','B',10);

while($row = $resultado->fetch_assoc()){
    $pdf->Cell(60, 10, $row['Nombre_estudiante'], 1, 0, 'C', 0);
    $pdf->Cell(60, 10, $row['Apellido_estudiante'], 1, 0, 'C', 0);
    $pdf->Cell(60, 10, $row['nombre_curso'], 1, 1, 'C', 0);


}

$pdf->Output();
?>