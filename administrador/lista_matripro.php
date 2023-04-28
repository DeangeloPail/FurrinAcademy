<?php
require_once 'includes/header.php';
?>

<main class="app-content">
      <div class="app-title">
        <div>
          <h1><i class="fa fa-dashboard"></i> Lista de Docentes Matriculados</h1>
          <a href="curso_profe.php" class="btn btn-primary" style="background-color:#FFC300 ; border-color: black; border-radius: 8px"  >Inscribir</a>
          <a href="reportes/matriculadocentes.php" target="_blank" class="btn btn-primary" style="background-color:#EE493B; border-color: black; border-radius: 8px" >Reporte PDF</a>
          <a href="#" class="btn btn-primary" style="background-color:#11A723  ; border-color: black; border-radius: 8px" >Reporte EXCEL</a>

    </div>         
        </div>
        <ul class="app-breadcrumb breadcrumb">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item"><a href="lista_matripro.php">Lista de Docentes Matriculados</a></li>
        </ul>
        </div>
      <div class="row">
        <div class="col-md-12">
          <div class="tile">
          <div class="tile-body">
          <div class="tile-body">
          <link rel="stylesheet" href="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.min.css">
          <?php 

include('./template/cabecera.php');
?>
<?php 
    ob_start();
  //post datos Usuario
  $CursEstID=(isset($_POST['CursEstID']))?$_POST['CursEstID']:"";
  $Profesor=(isset($_POST['Profesor']))?$_POST['Profesor']:"";
  $Curso=(isset($_POST['Curso']))?$_POST['Curso']:"";
  
  //post datos aciones-botones
  $Accion=(isset($_POST['Accion']))?$_POST['Accion']:"";
  //agrego coneccion con la base de datos
  include("./config/db.php");
  //mostrando Usuario
  $sentenciaSQL=$conexionJF->prepare("SELECT `codigo_cur_p`,profesores.Nombre_profe, curso.nombre_curso FROM curso_profe 
  INNER JOIN profesores on profesores.codigo_profesor=curso_profe.Codigo_profesor 
  INNER JOIN curso on curso.codigo_curso=curso_profe.Codigo_curso;");
  $sentenciaSQL->execute();
  $ListaCursoEs=$sentenciaSQL->fetchAll(PDO::FETCH_ASSOC);
  //mostrando Tipos de Usuario para usar en el select
  $sentenciaSQL=$conexionJF->prepare("SELECT codigo_curso,nombre_curso FROM `curso`;");
  $sentenciaSQL->execute();
  $ListaCurso=$sentenciaSQL->fetchAll(PDO::FETCH_ASSOC);
  $sentenciaSQL=$conexionJF->prepare("SELECT `codigo_profesor`,`Nombre_profe`FROM `profesores`");
  $sentenciaSQL->execute();
  $ListaProfe=$sentenciaSQL->fetchAll(PDO::FETCH_ASSOC);

      
?>

<!--mostrar datos-->

<div class="col-md-12">
    
    <table class="table table-bordered" id="example">
        <thead>
            <tr>
                <th>id</th>
                <th>Profesor</th>
                <th>nombre curso</th>

                
            </tr>
        </thead>
        <tbody>
            <?php foreach($ListaCursoEs as $CursoEsto) {?>
            <tr><td><?php echo $CursoEsto['codigo_cur_p']; ?></td>
                <td><?php echo $CursoEsto['Nombre_profe'];?></td>
                <td><?php echo $CursoEsto['nombre_curso']; ?></td>
                

            </tr>
           <?php }?>
        </tbody>
    </table>

</div>
   <script src="https://code.jquery.com/jquery-3.5.1.js"> </script>
   <script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
   <script>
      $(document).ready(function () {
      $('#example').DataTable();
      });
   </script>
</body>



<?php include('./template/pie.php');


require_once 'includes/footer.php'
?>

