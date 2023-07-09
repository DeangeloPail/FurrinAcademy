<?php
require_once 'includes/header.php';
?>

<main class="app-content">
      <div class="app-title">
        <div>
          <h1><i class="fa fa-dashboard"></i> Lista de Modulos Educativos</h1>
          <a href="./formularios/agregar/unidades.php" class="btn btn-primary" style="background-color:#FFC300 ; border-color: black; border-radius: 8px"  >Administrar</a>
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
  ob_start();

  include('./template/cabecera.php');
  include('./sql/vistas/lista_unidades.php');
?>
<script type="text/javascript">
  function confirmar(){
    return confirm('¿Estas Seguro?, se eliminaran los datos');
  }
</script>


<!--mostrar datos-->

<div class="col-md-12 text-align-center">
    
    <table class="table table-bordered" id="example">
        <thead>
            <tr>
                <th>Unidad</th>
                <th>Curso</th>
                <th>Accion</th>
            </tr>
        </thead>
        <tbody>
            <?php  while($unidadCurso=mysqli_fetch_assoc($resultado)){?>
            <tr>
              
                <td><?php echo $unidadCurso['Unidad']; ?></td>
                <td><?php echo $unidadCurso['nombre_curso']; ?></td>
                <th><?php echo "<a type='submit' class='btn btn-outline-dark'
                                  href='./formularios/editar/unidades.php?id=".$unidadCurso['id_unidad']."'>
                                  <i class='bi bi-pencil-square'></i>
                  </a>";?>
                <?php echo "<a type='submit' class='btn btn-outline-dark'
                              href='./sql/eliminar/unidades.php?id=".$unidadCurso['id_unidad']."'
                              onclick='return confirmar()'>
              <i class='bi bi-trash'></i>
              </a>";?>  
                </th>
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