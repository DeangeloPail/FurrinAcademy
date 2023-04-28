<?php
require_once 'includes/header.php';
?>

<main class="app-content">
      <div class="app-title">
        <div>
          <h1><i class="fa fa-dashboard"></i>Cursos y Programas</h1>
          <a href="./formularios/agregar/cursos.php" class="btn btn-primary" style="background-color:#FFC300 ; border-color: black; border-radius: 8px" >Administrar</a>
          <a href="reportes/ListadodeProgramas.php" target="_blank" class="btn btn-primary" style="background-color:#EE493B; border-color: black; border-radius: 8px" >Reporte PDF</a>
          <a href="#" class="btn btn-primary" style="background-color:#11A723  ; border-color: black; border-radius: 8px" >Reporte EXCEL</a>
    </div>         
        </div>
        <ul class="app-breadcrumb breadcrumb">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item"><a href="lista_cursos.php">Cursos y Programas</a></li>
        </ul>
        </div>
      <div class="row">
        <div class="col-md-12">
          <div class="tile">
          <div class="tile-body">
              <div class="table-responsive">
              <div class="container text-center">
              <?php 

include('./template/cabecera.php');
include('./sql/vistas/lista_curso.php');
?>
<script type="text/javascript">
  function confirmar(){
    return confirm('¿Estas Seguro?, se eliminaran los datos');
  }
</script>
<!--mostrar datos-->
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.min.css">
<div class="col-md-12" >
    
    <table class="table table-bordered" id="tabla2">
        <thead>
            <tr>
                <th>Nombre </th>
                <th>Duracion</th>
                <th>Area</th>
                <th>Tipo </th>
                <th>Creador</th>
                <th>Accion </th>

                
            </tr>
        </thead>
        <tbody>
            <?php while($curso=mysqli_fetch_assoc($resultado))  {?>
            <tr>

                <td><?php echo $curso['nombre_curso']; ?></td>
                <td><?php echo $curso['Duracion']; ?> horas</td>
                <td><?php echo $curso['Area']; ?></td>
                <td><?php echo $curso['tipocurso']; ?></td>
                <td><?php echo $curso['nombre_usuario']; ?></td>
                <th><?php echo "<a type='submit' class='btn btn-outline-dark'
                                  href='./formularios/editar/cursos.php?id=".$curso['codigo_curso']."'>
                                  <i class='bi bi-pencil-square'></i>
                                 </a>";?>
                <?php echo "<a type='submit' class='btn btn-outline-dark'
                              href='./sql/eliminar/cursos.php?id=".$curso['codigo_curso']."'
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
