<?php
require_once 'includes/header.php';
?>

<main class="app-content">
      <div class="app-title">
        <div>
          <h1><i class="fa fa-dashboard"></i> Lista de Estudiantes Matriculados</h1>
          <a href="./formularios/agregar/pro_matricul.php" class="btn btn-primary" style="background-color:#FFC300 ; border-color: black; border-radius: 8px"  >Inscribir</a>
          <a href="reportes/matriculaestudiantes.php" target="_blank" class="btn btn-primary" style="background-color:#EE493B; border-color: black; border-radius: 8px" >Reporte PDF</a>
          <a href="#" class="btn btn-primary" style="background-color:#11A723  ; border-color: black; border-radius: 8px" >Reporte EXCEL</a>

    </div>         
        </div>
        <ul class="app-breadcrumb breadcrumb">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item"><a href="lista_matriestu.php">Lista de Estudiantes Matriculados</a></li>
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
include('./sql/vistas/lista_profe_matriculados.php');
?>
<script type="text/javascript">
  function confirmar(){
    return confirm('¿Estas Seguro?, se eliminaran los datos');
  }
</script>


<!--mostrar datos-->

<div class="col-md-12">
    <table class="table table-bordered" id="tabla2">
        <thead>
            <tr>
                <th>id</th>
                <th>Profesor</th>
                <th>Nombre de curso</th>
                <th>Accion</th>

                
                
            </tr>
        </thead>
        <tbody>
          <?php while($cursoProfe=mysqli_fetch_assoc($resultado))  {?>
            <tr><td><?php echo $cursoProfe['codigo_cur_p']; ?></td>
                <td><?php echo $cursoProfe['Nombre_profe'];?></td>
                <td><?php echo $cursoProfe['nombre_curso']; ?></td>
                <td><?php echo "<a type='submit' class='btn btn-outline-dark'
                                  href='./formularios/editar/pro_matricul.php?id=".$cursoProfe['codigo_cur_p']."'>
                                  <i class='bi bi-pencil-square'></i>
                                 </a>";?>
                <?php echo "<a type='submit' class='btn btn-outline-dark'
                              href='./sql/eliminar/pro_matricul.php?id=".$cursoProfe['codigo_cur_p']."'
                              onclick='return confirmar()'>
                              <i class='bi bi-trash'></i>
                              </a>";?> 
                </td>
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

<link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.3/css/bootstrap.min.css" rel="stylesheet"/>
<link href="https://cdn.datatables.net/v/bs5/jq-3.6.0/jszip-2.5.0/dt-1.13.4/b-2.3.6/b-colvis-2.3.6/b-html5-2.3.6/b-print-2.3.6/datatables.min.css" rel="stylesheet"/>
 
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.3/js/bootstrap.bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/v/bs5/jq-3.6.0/jszip-2.5.0/dt-1.13.4/b-2.3.6/b-colvis-2.3.6/b-html5-2.3.6/b-print-2.3.6/datatables.min.js"></script>
<script src="./js/datatable.js"></script>
</body>



<?php include('./template/pie.php');?>


 <?php
require_once 'includes/footer.php'
?>