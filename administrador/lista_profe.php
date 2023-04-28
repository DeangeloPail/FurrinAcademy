<?php
require_once 'includes/header.php';
?>

<main class="app-content">
      <div class="app-title">
        <div>
          <h1><i class="fa fa-dashboard"></i> Lista de Docentes</h1>
          <link rel="stylesheet" href="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.min.css">

          <!--<a href="lista_usuario.php" class="btn btn-primary" style="background-color:#0054A6; border-color: black;" >Regresar</a>-->
          <a href="./formularios/agregar/profesor.php" class="btn btn-primary" style="background-color:#FFC300 ; border-color: black; border-radius: 8px" >Administrar</a>
          <a href="reportes/ListadoDocentes.php" class="btn btn-primary" target="_blank" style="background-color:#EE493B; border-color: black; border-radius: 8px" >Reporte PDF</a>
          <a href="#" class="btn btn-primary" style="background-color:#11A723  ; border-color: black; border-radius: 8px" >Reporte EXCEL</a>
    </div>         
        </div>
        <ul class="app-breadcrumb breadcrumb">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg" href="index.php"></i></li>
          <li class="breadcrumb-item"><a href="lista_profe.php">lista de docentes</a></li>
          
        </ul>
        </div>
      <div class="row">
        <div class="col-md-12">
          <div class="tile">
          <div class="tile-body">
              <div class="table-responsive">
              <div class="container text-center">
<?php 
ob_start();
include('./template/cabecera.php');
include('./sql/vistas/lista_profesor.php');
?>
<script type="text/javascript">
  function confirmar(){
    return confirm('¿Estas Seguro?, se eliminaran los datos');
  }
</script>

<!--mostrar datos-->

<div class="col-md-12 table-responsive" >
    
    <table class="table table-bordered" id="tabla2">
        <thead>
            <tr>
                <th>Nombre del Docente</th>
                <th>Direccion</th>
                <th>Nombre de Usuario</th>
                <th>Acción</th>
            </tr>
        </thead>
        <tbody>
          <?php while($profesor=mysqli_fetch_assoc($resultado)) {?>
            <tr>
                <td><?php echo $profesor['Nombre_profe']; ?></td>
                <td><?php echo $profesor['Direccion']; ?></td>
                <td><?php echo $profesor['nombre_usuario']; ?></td>
                <th><?php echo "<a type='submit' class='btn btn-outline-dark'
                                  href='./formularios/editar/profesor.php?id=".$profesor['codigo_profesor']."'>
                                  <i class='bi bi-pencil-square'></i>
                                 </a>";?>
                <?php echo "<a type='submit' class='btn btn-outline-dark'
                              href='./sql/eliminar/profesor.php?id=".$profesor['codigo_profesor']."'
                              onclick='return confirmar()'>
                              <i class='bi bi-trash'></i>
                              </a>";?>  
                </th>
            </tr>
          <?php }?>
        </tbody>
    </table>

</div>
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

