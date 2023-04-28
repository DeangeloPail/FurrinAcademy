<?php
require_once 'includes/header.php';
?>

<main class="app-content">
      <div class="app-title">
        <div>
          <h1><i class="fa fa-dashboard"></i> Lista de Modulos Educativos</h1>
          <a href="Uniaccion.php" class="btn btn-primary" style="background-color:#FFC300 ; border-color: black; border-radius: 8px"  >Administrar</a>
          <a href="#" target="_blank" class="btn btn-primary" style="background-color:#EE493B; border-color: black; border-radius: 8px" >Reporte PDF</a>
          <a href="#" class="btn btn-primary" style="background-color:#11A723  ; border-color: black; border-radius: 8px" >Reporte EXCEL</a>

    </div>         
        </div>
        <ul class="app-breadcrumb breadcrumb">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item"><a href="#">Lista de Modulos Educativos</a></li>
        </ul>
        </div>
      <div class="row">
        <div class="col-md-12">
          <div class="tile">
          <div class="tile-body">
          <div class="tile-body">

          <?php 

include('./template/cabecera.php');
?>
<?php 
    ob_start();
  //post datos Usuario
  $UnidadID=(isset($_POST['UnidadID']))?$_POST['UnidadID']:"";
  $Unidad=(isset($_POST['Unidad']))?$_POST['Unidad']:"";
  $Curso=(isset($_POST['Curso']))?$_POST['Curso']:"";
  
  //post datos aciones-botones
  $Accion=(isset($_POST['Accion']))?$_POST['Accion']:"";
  //agrego coneccion con la base de datos
  include("./config/db.php");
  //mostrando Usuario
  $sentenciaSQL=$conexionJF->prepare("SELECT id_unidad,`Unidad`,curso.nombre_curso 
  FROM `unidad_curso` INNER JOIN curso on curso.codigo_curso=unidad_curso.codigo_curso;");
  $sentenciaSQL->execute();
  $ListaunidadCursa=$sentenciaSQL->fetchAll(PDO::FETCH_ASSOC);
  //mostrando Tipos de Usuario para usar en el select
  $sentenciaSQL=$conexionJF->prepare("SELECT codigo_curso,nombre_curso FROM `curso`;");
  $sentenciaSQL->execute();
  $ListaCurso=$sentenciaSQL->fetchAll(PDO::FETCH_ASSOC);

 

      
?>


<!--mostrar datos-->

<div class="col-md-12 text-align-center">
    
    <table class="table table-bordered" id="example">
        <thead>
            <tr>
                <th>Unidad</th>
                <th>Unidad</th>
                <th>Curso</th>
                       
            </tr>
        </thead>
        <tbody>
            <?php foreach($ListaunidadCursa as $unidadCurso) {?>
            <tr>
              
                <td><?php echo $unidadCurso['id_unidad']; ?></td>
                <td><?php echo $unidadCurso['Unidad']; ?></td>
                <td><?php echo $unidadCurso['nombre_curso']; ?></td>
                

                

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
   <link rel="stylesheet" href="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.min.css">
</body>



<?php include('./template/pie.php');

       

                    





   

 


require_once 'includes/footer.php'
?>