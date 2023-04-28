<?php
require_once 'includes/header.php';
?>

<main class="app-content">
      <div class="app-title">
        <div>
          <h1><i class="fa fa-dashboard"></i> Lista de Contenidos Pedagogicos</h1>
          <a href="Conteaccion.php" class="btn btn-primary" style="background-color:#FFC300 ; border-color: black; border-radius: 8px"  >Administrar</a>
          <a href="reportes/repor_usu.php" target="_blank" class="btn btn-primary" style="background-color:#EE493B; border-color: black; border-radius: 8px" >Reporte PDF</a>
          <a href="Useraccion.php" class="btn btn-primary" style="background-color:#11A723  ; border-color: black; border-radius: 8px" >Reporte EXCEL</a>

    </div>         
        </div>
        <ul class="app-breadcrumb breadcrumb">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item"><a href="contenidos.php">Lista de Contenidos Pedagogicos</a></li>
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
  $ContenidoID=(isset($_POST['ContenidoID']))?$_POST['ContenidoID']:"";
  $Contenido=(isset($_POST['Contenido']))?$_POST['Contenido']:"";
  $unidad_curso=(isset($_POST['unidad_curso']))?$_POST['unidad_curso']:"";
  
  //post datos aciones-botones
  $Accion=(isset($_POST['Accion']))?$_POST['Accion']:"";
  //agrego coneccion con la base de datos
  include("./config/db.php");
  //mostrando Usuario
  $sentenciaSQL=$conexionJF->prepare("SELECT `id_contenido`,`Contenido`,unidad_curso.Unidad,curso.nombre_curso 
  FROM `contenidos_unidad_curso` INNER JOIN unidad_curso ON contenidos_unidad_curso.unidad_curso=unidad_curso.id_unidad 
  INNER JOIN curso ON unidad_curso.codigo_curso=curso.codigo_curso;");
  $sentenciaSQL->execute();
  $ListaContenido=$sentenciaSQL->fetchAll(PDO::FETCH_ASSOC);
  //mostrando Tipos de Usuario para usar en el select
  $sentenciaSQL=$conexionJF->prepare("SELECT `id_unidad`,`Unidad` FROM`unidad_curso`;");
  $sentenciaSQL->execute();
  $Listaunidad_curso=$sentenciaSQL->fetchAll(PDO::FETCH_ASSOC);


      
?>


<!--mostrar datos-->

<div class="col-md-12">
    
    <table class="table table-bordered" id="example">
        <thead>
            <tr>
                <th>Codigo</th>
                <th>Contenido</th>
                <th>Unidad</th>
                <th>Curso</th>

                
            </tr>
        </thead>
        <tbody>
            <?php foreach($ListaContenido as $contenidido) {?>
            <tr>
                <td><?php echo $contenidido['id_contenido']; ?></td>
                <td><?php echo $contenidido['Contenido']; ?></td>
                <td><?php echo $contenidido['Unidad']; ?></td>
                <td><?php echo $contenidido['nombre_curso']; ?></td>
   

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